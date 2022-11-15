<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Microcontroller extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Microcontrolador",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "mc_name" => "",
        "mc_hertz" => "",
        "mc_ports" => "",
        "mc_brand" => "",
        "mc_type" => "",
        "mc_status" => "",
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
        Renderer::render("mnt/microcontroller", $this->viewData);
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
            if (!isset($_GET["mc_id"])) {
                $this->errorRedir();
            }

            $mc_id = intval($_GET["mc_id"]);
            $dbQuote = \Dao\Mnt\Microcontrollers::getMicrocontrollerById($mc_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"ARB", "text"=>"Arquitectura de Rango Base"],
            ["value"=>"ARM", "text"=>"Arquitectura de rango medio"],
            ["value"=>"AAR", "text"=>"Arquitectura de alto rendimiento"]
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
        $this->viewData["mc_name"] = $_POST["mc_name"];
        $this->viewData["mc_hertz"] = $_POST["mc_hertz"];
        $this->viewData["mc_ports"] = $_POST["mc_ports"];
        $this->viewData["mc_brand"] = $_POST["mc_brand"];
        $this->viewData["mc_type"] = $_POST["mc_type"];
        $this->viewData["mc_status"] = $_POST["mc_status"];
        $this->viewData["act_selected"] = $_POST["mc_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["mc_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Microcontrollers::insertMicrocontroller(
            $this->viewData["mc_name"],
            $this->viewData["mc_hertz"],
            $this->viewData["mc_ports"],
            $this->viewData["mc_brand"],
            $this->viewData["mc_status"],
            $this->viewData["mc_type"]
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Microcontrollers",
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
                    $this->viewData["mc_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["mc_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["mc_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["mc_id"],
                $this->viewData["mc_name"]
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
            "index.php?page=mnt-Microcontrollers",
            "Algo Inesperado sucedió!"
        );
    }
}
?>