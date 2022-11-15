<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Movie extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nueva pelicula",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "movie_name" => "",
        "movie_type" => "",
        "movie_mainlead" => "",
        "movie_producer" => "",
        "movie_status" => "",
        "act_selected" => true,
        "ina_selected" => false,
        "readOnly" => false,
        "showSaveBtn" => true
    );

    private $types=array();
	public function run() :void{
        $this->onForm_loaded();
        if($this->isPostBack()){
            $this->process_postBack();
        }
        $this->pre_render();
        Renderer::render("mnt/movie", $this->viewData);
	}

    public function onForm_loaded(){
        if (!isset($_GET["mode"])) {
            $this->errorRedir();
        }
        $this->viewData["mode"] = $_GET["mode"];
        if (!isset($this->arrModeDsc[$this->viewData["mode"]])) {
            $this->errorRedir();
        }

        if ($this->viewData["mode"] !== "INS") {
            if (!isset($_GET["movie_id"])) {
                $this->errorRedir();
            }

            $movie_id = intval($_GET["movie_id"]);
            $dbQuote = \Dao\Mnt\Movies::getMovieById($movie_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"ACC", "text"=>"Acción"],
            ["value"=>"AVT", "text"=>"Aventuras"],
            ["value"=>"CFC", "text"=>"Ciencia Ficción"],
            ["value"=>"FTS", "text"=>"Fantasía"],
            ["value"=>"DRM", "text"=>"Drama"]
        ];

        
        $this->viewData["arrTypes"] = $this->types;
    }

    private function process_postBack()
    {
        if($this->validate_inputs()){
            $this->on_insert_clicked();
        }
    }

    private function validate_inputs()
    {
        $this->viewData["movie_name"] = $_POST["movie_name"];
        $this->viewData["movie_mainlead"] = $_POST["movie_mainlead"];
        $this->viewData["movie_type"] = $_POST["movie_type"];
        $this->viewData["movie_producer"] = $_POST["movie_producer"];
        $this->viewData["movie_status"] = $_POST["movie_status"];
        $this->viewData["act_selected"] = $_POST["movie_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["movie_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Movies::insertMovie(
            $this->viewData["movie_name"],
            $this->viewData["movie_type"],
            $this->viewData["movie_mainlead"],
            $this->viewData["movie_producer"],
            $this->viewData["movie_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Movies",
                "Registro guardado Exitosamente!"
            );
        }
    }

    private function pre_render()
    {
        $this->viewData["arrTypes"]
                = \Utilities\ArrUtils::objectArrToOptionsArray(
                    $this->types,
                    'value',
                    'text',
                    'value',
                    $this->viewData["movie_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["movie_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["movie_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["movie_id"],
                $this->viewData["movie_name"]
            );
        } else {
            $this->viewData["mode_dsc"] = $this->arrModeDsc["INS"];
        }
        $this->viewData["readOnly"] = $this->viewData["mode"] == "DEL" || $this->viewData["mode"] == "DSP";
        $this->viewData["showSaveBtn"] = !($this->viewData["mode"] == "DSP");
    }

    private function errorRedir()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt-Movies",
            "Algo Inesperado sucedió!"
        );
    }
}
?>