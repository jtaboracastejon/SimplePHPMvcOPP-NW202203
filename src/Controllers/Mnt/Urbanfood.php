<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Urbanfood extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Urbanfood",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "urbfood_name" => "",
        "urbfood_type" => "",
        "urbfood_brand" => "",
        "urbfood_url" => "",
        "urbfood_status" => "",
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
        Renderer::render("mnt/Urbanfood", $this->viewData);
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
            if (!isset($_GET["urbfood_id"])) {
                $this->errorRedir();
            }

            $urbfood_id = intval($_GET["urbfood_id"]);
            $dbQuote = \Dao\Mnt\Urbanfoods::getUrbanfoodById($urbfood_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"HBG", "text"=>"Hamburguesas"],
            ["value"=>"SCH", "text"=>"Sandwiches"],
            ["value"=>"PLL", "text"=>"Pollo"]
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
        $this->viewData["urbfood_name"] = $_POST["urbfood_name"];
        $this->viewData["urbfood_type"] = $_POST["urbfood_type"];
        $this->viewData["urbfood_brand"] = $_POST["urbfood_brand"];
        $this->viewData["urbfood_url"] = $_POST["urbfood_url"];
        $this->viewData["urbfood_status"] = $_POST["urbfood_status"];
        $this->viewData["act_selected"] = $_POST["urbfood_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["urbfood_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Urbanfoods::insertUrbanfood(
            $this->viewData["urbfood_name"],
            $this->viewData["urbfood_type"],
            $this->viewData["urbfood_brand"],
            $this->viewData["urbfood_url"],
            $this->viewData["urbfood_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Urbanfoods",
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
                    $this->viewData["urbfood_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["urbfood_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["urbfood_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["urbfood_id"],
                $this->viewData["urbfood_name"]
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
            "index.php?page=mnt-Urbanfoods",
            "Algo Inesperado sucedió!"
        );
    }
}
?>