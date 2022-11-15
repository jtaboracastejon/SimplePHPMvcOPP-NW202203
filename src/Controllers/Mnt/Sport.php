<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Sport extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Deporte",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "sport_name" => "",
        "sport_type" => "",
        "sport_ranking" => "",
        "sport_commet" => "",
        "sport_status" => "",
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
        Renderer::render("mnt/sport", $this->viewData);
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
            if (!isset($_GET["sport_id"])) {
                $this->errorRedir();
            }

            $sport_id = intval($_GET["sport_id"]);
            $dbQuote = \Dao\Mnt\Sports::getSportById($sport_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"ACS", "text"=>"Acuáticos"],
            ["value"=>"EQU", "text"=>"Equipo"],
            ["value"=>"MTR", "text"=>"Motor"],
            ["value"=>"XTR", "text"=>"Extremos"],
            ["value"=>"MTL", "text"=>"Mentales"]
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
        $this->viewData["sport_name"] = $_POST["sport_name"];
        $this->viewData["sport_type"] = $_POST["sport_type"];
        $this->viewData["sport_ranking"] = $_POST["sport_ranking"];
        $this->viewData["sport_commet"] = $_POST["sport_commet"];
        $this->viewData["sport_status"] = $_POST["sport_status"];
        $this->viewData["act_selected"] = $_POST["sport_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["sport_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Sports::insertSport(
            $this->viewData["sport_name"],
            $this->viewData["sport_type"],
            $this->viewData["sport_ranking"],
            $this->viewData["sport_commet"],
            $this->viewData["sport_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Sports",
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
                    $this->viewData["sport_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["sport_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["sport_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            
            $this->viewData["mode_dsc"] = sprintf(
                
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["sport_status"],
                $this->viewData["sport_name"]
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
            "index.php?page=mnt-Sports",
            "Algo Inesperado sucedió!"
        );
    }
}
?>