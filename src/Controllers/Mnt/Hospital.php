<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Hospital extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Hospital",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "hsp_name" => "",
        "hsp_type" => "",
        "hsp_brand" => "",
        "hsp_url" => "",
        "hsp_status" => "",
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
        Renderer::render("mnt/hospital", $this->viewData);
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
            if (!isset($_GET["hsp_id"])) {
                $this->errorRedir();
            }

            $hsp_id = intval($_GET["hsp_id"]);
            $dbQuote = \Dao\Mnt\Hospitals::getHospitalById($hsp_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"GNL", "text"=>"Hospital General "],
            ["value"=>"UNI", "text"=>"Hospital universitario"],
            ["value"=>"PED", "text"=>"Hospital pediátrico"]
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
        $this->viewData["hsp_name"] = $_POST["hsp_name"];
        $this->viewData["hsp_type"] = $_POST["hsp_type"];
        $this->viewData["hsp_brand"] = $_POST["hsp_brand"];
        $this->viewData["hsp_url"] = $_POST["hsp_url"];
        $this->viewData["hsp_status"] = $_POST["hsp_status"];
        $this->viewData["act_selected"] = $_POST["hsp_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["hsp_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Hospitals::insertHospital(
            $this->viewData["hsp_name"],
            $this->viewData["hsp_type"],
            $this->viewData["hsp_brand"],
            $this->viewData["hsp_url"],
            $this->viewData["hsp_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Hospitals",
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
                    $this->viewData["hsp_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["hsp_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["hsp_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["hsp_id"],
                $this->viewData["hsp_name"]
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
            "index.php?page=mnt-Hospitals",
            "Algo Inesperado sucedió!"
        );
    }
}
?>