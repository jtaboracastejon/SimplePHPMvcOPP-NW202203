<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Book extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo libro",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "book_name" => "",
        "book_date" => "",
        "book_author" => "",
        "book_type" => "",
        "book_barcode" => "",
        "book_status" => "",
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
        Renderer::render("mnt/book", $this->viewData);
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
            if (!isset($_GET["book_id"])) {
                $this->errorRedir();
            }

            $book_id = intval($_GET["book_id"]);
            $dbQuote = \Dao\Mnt\Books::getBookById($book_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->types=[
            ["value"=>"CNT", "text"=>"Científicos"],
            ["value"=>"TEC", "text"=>"Técnicos"],
            ["value"=>"BIG", "text"=>"Biográficos "]
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
        $this->viewData["book_name"] = $_POST["book_name"];
        $this->viewData["book_date"] = $_POST["book_date"];
        $this->viewData["book_author"] = $_POST["book_author"];
        $this->viewData["book_type"] = $_POST["book_type"];
        $this->viewData["book_barcode"] = $_POST["book_barcode"];
        $this->viewData["book_status"] = $_POST["book_status"];
        $this->viewData["act_selected"] = $_POST["book_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["book_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Books::insertBook(
            $this->viewData["book_name"],
            $this->viewData["book_date"],
            $this->viewData["book_author"],
            $this->viewData["book_type"],
            $this->viewData["book_barcode"],
            $this->viewData["book_status"]
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Books",
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
                    $this->viewData["book_type"]
                );       
        $this->viewData["act_selected"] = $this->viewData["book_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["book_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["book_id"],
                $this->viewData["book_name"]
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
            "index.php?page=mnt-Books",
            "Algo Inesperado sucedió!"
        );
    }
}
?>