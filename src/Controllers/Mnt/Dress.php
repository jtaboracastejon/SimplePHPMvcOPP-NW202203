<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Dress extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Vestido",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "dress_name" => "",
        "dress_style" => "",
        "dress_pieces" => "",
        "dress_color" => "",
        "dress_status" => "",
        "act_selected" => true,
        "ina_selected" => false,
        "readOnly" => false,
        "showSaveBtn" => true
    );

    private $styles=array();
	public function run() :void{
        $this->onForm_loaded();
        if($this->isPostBack()){
            $this->process_postBack();
        }
        $this->pre_render();
        Renderer::render("mnt/dress", $this->viewData);
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
            if (!isset($_GET["dress_id"])) {
                $this->errorRedir();
            }

            $dress_id = intval($_GET["dress_id"]);
            $dbQuote = \Dao\Mnt\Dresses::getDressById($dress_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->styles=[
            ["value"=>"CRC", "text"=>"Corte recto"],
            ["value"=>"ABL", "text"=>"Ablusados"],
            ["value"=>"CIM", "text"=>"Corte Imperio"],
            ["value"=>"TUB", "text"=>"Tubo"]
        ];

        
        $this->viewData["arrStyles"] = $this->styles;
    }

    private function process_postBack()
    {
        if($this->validate_inputs()){
            $this->on_insert_clicked();
        }
    }

    private function validate_inputs()
    {
        $this->viewData["dress_name"] = $_POST["dress_name"];
        $this->viewData["dress_style"] = $_POST["dress_style"];
        $this->viewData["dress_pieces"] = $_POST["dress_pieces"];
        $this->viewData["dress_color"] = $_POST["dress_color"];
        $this->viewData["dress_status"] = $_POST["dress_status"];
        $this->viewData["act_selected"] = $_POST["dress_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["dress_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Dresses::insertDress(
            $this->viewData["dress_name"],
            $this->viewData["dress_style"],
            $this->viewData["dress_pieces"],
            $this->viewData["dress_color"],
            $this->viewData["dress_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Dresses",
                "Registro guardado Exitosamente!"
            );
        }
    }

    private function pre_render()
    {
        $this->viewData["arrstyles"]
                = \Utilities\ArrUtils::objectArrToOptionsArray(
                    $this->styles,
                    'value',
                    'text',
                    'value',
                    $this->viewData["dress_style"]
                );       
        $this->viewData["act_selected"] = $this->viewData["dress_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["dress_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["dress_id"],
                $this->viewData["dress_name"]
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
            "index.php?page=mnt-Dresses",
            "Algo Inesperado sucedió!"
        );
    }
}
?>