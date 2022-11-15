<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Software extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Software",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "sw_name" => "",
        "sw_os" => "",
        "sw_type" => "",
        "sw_brand" => "",
        "sw_version" => "",
        "sw_status" => "",
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
        Renderer::render("mnt/Software", $this->viewData);
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
            if (!isset($_GET["sw_id"])) {
                $this->errorRedir();
            }

            $sw_id = intval($_GET["sw_id"]);
            $dbQuote = \Dao\Mnt\Softwares::getSoftwareById($sw_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"SDA", "text"=>"Software de aplicación"],
            ["value"=>"SDP", "text"=>"Software de programación"],
            ["value"=>"SDS", "text"=>"Software de sistema"]
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
        $this->viewData["sw_name"] = $_POST["sw_name"];
        $this->viewData["sw_os"] = $_POST["sw_os"];
        $this->viewData["sw_brand"] = $_POST["sw_brand"];
        $this->viewData["sw_version"] = $_POST["sw_version"];
        $this->viewData["sw_type"] = $_POST["sw_type"];
        $this->viewData["sw_status"] = $_POST["sw_status"];
        $this->viewData["act_selected"] = $_POST["sw_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["sw_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Softwares::insertSoftware(
            $this->viewData["sw_name"],
            $this->viewData["sw_os"],
            $this->viewData["sw_type"],
            $this->viewData["sw_brand"],
            $this->viewData["sw_version"],
            $this->viewData["sw_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Softwares",
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
                    $this->viewData["sw_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["sw_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["sw_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["sw_id"],
                $this->viewData["sw_name"]
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
            "index.php?page=mnt-Softwares",
            "Algo Inesperado sucedió!"
        );
    }
}
?>