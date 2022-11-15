<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Eyeglass extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Deporte",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "egl_name" => "",
        "egl_type" => "",
        "egl_designer" => "",
        "egl_color" => "",
        "Eyeglass_status" => "",
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
        Renderer::render("mnt/eyeglass", $this->viewData);
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
            if (!isset($_GET["egl_id"])) {
                $this->errorRedir();
            }

            $egl_id = intval($_GET["egl_id"]);
            $dbQuote = \Dao\Mnt\Eyeglasses::getEyeglassById($egl_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"BIX", "text"=>"Biconvexas"],
            ["value"=>"PLX", "text"=>"Planoconvexas"],
            ["value"=>"CCX", "text"=>"Cóncavo-convexas"]
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
        $this->viewData["egl_name"] = $_POST["egl_name"];
        $this->viewData["egl_type"] = $_POST["egl_type"];
        $this->viewData["egl_designer"] = $_POST["egl_designer"];
        $this->viewData["egl_color"] = $_POST["egl_color"];
        $this->viewData["Eyeglass_status"] = $_POST["Eyeglass_status"];
        $this->viewData["act_selected"] = $_POST["Eyeglass_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["Eyeglass_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Eyeglasses::insertEyeglass(
            $this->viewData["egl_name"],
            $this->viewData["egl_type"],
            $this->viewData["egl_designer"],
            $this->viewData["egl_color"],
            $this->viewData["Eyeglass_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Eyeglasses",
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
                    $this->viewData["egl_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["Eyeglass_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["Eyeglass_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            
            $this->viewData["mode_dsc"] = sprintf(
                
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["Eyeglass_status"],
                $this->viewData["egl_name"]
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
            "index.php?page=mnt-Eyeglasses",
            "Algo Inesperado sucedió!"
        );
    }
}
?>