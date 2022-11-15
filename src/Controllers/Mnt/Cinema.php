<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Cinema extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Cinema",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "cinema_name" => "",
        "cinema_brand" => "",
        "cinema_seats" => "",
        "cinema_type" => "",
        "cinema_status" => "",
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
        Renderer::render("mnt/Cinema", $this->viewData);
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
            if (!isset($_GET["cinema_id"])) {
                $this->errorRedir();
            }

            $cinema_id = intval($_GET["cinema_id"]);
            $dbQuote = \Dao\Mnt\Cinemas::getCinemaById($cinema_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"SPR", "text"=>"Sala Premier"],
            ["value"=>"S3D", "text"=>"Sala 3D"],
            ["value"=>"AUC", "text"=>"Autocine"]
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
        $this->viewData["cinema_name"] = $_POST["cinema_name"];
        $this->viewData["cinema_seats"] = $_POST["cinema_seats"];
        $this->viewData["cinema_brand"] = $_POST["cinema_brand"];
        $this->viewData["cinema_type"] = $_POST["cinema_type"];
        $this->viewData["cinema_status"] = $_POST["cinema_status"];
        $this->viewData["act_selected"] = $_POST["cinema_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["cinema_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Cinemas::insertCinema(
            $this->viewData["cinema_name"],
            $this->viewData["cinema_brand"],
            $this->viewData["cinema_seats"],
            $this->viewData["cinema_type"],
            $this->viewData["cinema_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Cinemas",
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
                    $this->viewData["cinema_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["cinema_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["cinema_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["cinema_id"],
                $this->viewData["cinema_name"]
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
            "index.php?page=mnt-Cinemas",
            "Algo Inesperado sucedió!"
        );
    }
}
?>