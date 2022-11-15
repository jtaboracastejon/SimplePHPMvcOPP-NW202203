<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Coworkingplace extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Lugar de Trabajo",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "cwp_name" => "",
        "cwp_email" => "",
        "cwp_phone" => "",
        "cwp_type" => "",
        "cwp_status" => "",
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
        Renderer::render("mnt/coworkingplace", $this->viewData);
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
            if (!isset($_GET["cwp_id"])) {
                $this->errorRedir();
            }

            $cwp_id = intval($_GET["cwp_id"]);
            $dbQuote = \Dao\Mnt\Coworkingplaces::getCoworkingplaceById($cwp_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"CVL", "text"=>"Convencional "],
            ["value"=>"CRP", "text"=>"Corporativo"],
            ["value"=>"PRV", "text"=>"Privado"]
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
        $this->viewData["cwp_name"] = $_POST["cwp_name"];
        $this->viewData["cwp_phone"] = $_POST["cwp_phone"];
        $this->viewData["cwp_email"] = $_POST["cwp_email"];
        $this->viewData["cwp_type"] = $_POST["cwp_type"];
        $this->viewData["cwp_status"] = $_POST["cwp_status"];
        $this->viewData["act_selected"] = $_POST["cwp_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["cwp_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Coworkingplaces::insertCoworkingplace(
            $this->viewData["cwp_name"],
            $this->viewData["cwp_email"],
            $this->viewData["cwp_phone"],
            $this->viewData["cwp_type"],
            $this->viewData["cwp_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Coworkingplaces",
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
                    $this->viewData["cwp_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["cwp_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["cwp_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["cwp_id"],
                $this->viewData["cwp_name"]
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
            "index.php?page=mnt-Coworkingplaces",
            "Algo Inesperado sucedió!"
        );
    }
}
?>