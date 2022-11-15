<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Musictrack extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Musictrack",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "mst_name" => "",
        "mst_album" => "",
        "mst_type" => "",
        "mst_author" => "",
        "mst_status" => "",
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
        Renderer::render("mnt/Musictrack", $this->viewData);
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
            if (!isset($_GET["mst_id"])) {
                $this->errorRedir();
            }

            $mst_id = intval($_GET["mst_id"]);
            $dbQuote = \Dao\Mnt\Musictracks::getMusictrackById($mst_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"M4A", "text"=>"M4A"],
            ["value"=>"FLA", "text"=>"FLAC"],
            ["value"=>"MP3", "text"=>"MP3"]
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
        $this->viewData["mst_name"] = $_POST["mst_name"];
        $this->viewData["mst_album"] = $_POST["mst_album"];
        $this->viewData["mst_type"] = $_POST["mst_type"];
        $this->viewData["mst_author"] = $_POST["mst_author"];
        $this->viewData["mst_status"] = $_POST["mst_status"];
        $this->viewData["act_selected"] = $_POST["mst_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["mst_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Musictracks::insertMusictrack(
            $this->viewData["mst_name"],
            $this->viewData["mst_album"],
            $this->viewData["mst_type"],
            $this->viewData["mst_author"],
            $this->viewData["mst_status"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Musictracks",
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
                    $this->viewData["mst_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["mst_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["mst_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["mst_id"],
                $this->viewData["mst_name"]
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
            "index.php?page=mnt-Musictracks",
            "Algo Inesperado sucedió!"
        );
    }
}
?>