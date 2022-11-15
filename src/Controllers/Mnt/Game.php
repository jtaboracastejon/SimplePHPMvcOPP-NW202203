<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Game extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Videojuego",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "game_name" => "",
        "game_type" => "",
        "game_brand" => "",
        "game_console" => "",
        "game_status" => "",
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
        Renderer::render("mnt/Game", $this->viewData);
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
            if (!isset($_GET["game_id"])) {
                $this->errorRedir();
            }

            $game_id = intval($_GET["game_id"]);
            $dbQuote = \Dao\Mnt\Games::getGameById($game_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"ACC", "text"=>"Acción"],
            ["value"=>"AVT", "text"=>"Aventuras"],
            ["value"=>"CFC", "text"=>"Ciencia Ficción"],
            ["value"=>"FTS", "text"=>"Fantasía"]
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
        $this->viewData["game_name"] = $_POST["game_name"];
        $this->viewData["game_type"] = $_POST["game_type"];
        $this->viewData["game_brand"] = $_POST["game_brand"];
        $this->viewData["game_console"] = $_POST["game_console"];
        $this->viewData["game_status"] = $_POST["game_status"];
        $this->viewData["act_selected"] = $_POST["game_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["game_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Games::insertGame(
            $this->viewData["game_name"],
            $this->viewData["game_type"],
            $this->viewData["game_brand"],
            $this->viewData["game_console"],
            $this->viewData["game_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Games",
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
                    $this->viewData["game_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["game_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["game_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            
            $this->viewData["mode_dsc"] = sprintf(
                
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["game_id"],
                $this->viewData["game_name"]
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
            "index.php?page=mnt-Games",
            "Algo Inesperado sucedió!"
        );
    }
}
?>