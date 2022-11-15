<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Car extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Carro",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "car_model" => "",
        "car_owner" => "",
        "car_plaque" => "",
        "car_year" => "",
        "car_color" => "",
        "car_motor" => "",
        "car_status" => "",
        "act_selected" => true,
        "ina_selected" => false,
        "readOnly" => false,
        "showSaveBtn" => true
        
    );

    private $model=array();
	public function run() :void{
        $this->onForm_loaded();
        if($this->isPostBack()){
            $this->process_postBack();
        }
        $this->pre_render();
        Renderer::render("mnt/car", $this->viewData);
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
            if (!isset($_GET["cars_id"])) {
                $this->errorRedir();
            }

            $car_id = intval($_GET["cars_id"]);
            $dbQuote = \Dao\Mnt\cars::getCarById($car_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->model=[
            ["value"=>"SDN", "text"=>"Sedan"],
            ["value"=>"HBK", "text"=>"Hatchback "],
            ["value"=>"SUV", "text"=>"SUV "]
        ];

        
        $this->viewData["arrModel"] = $this->model;
    }

    private function process_postBack()
    {
        if($this->validate_inputs()){
            $this->on_insert_clicked();
        }
    }

    private function validate_inputs()
    {
        $this->viewData["car_model"] = $_POST["car_model"];
        $this->viewData["car_owner"] = $_POST["car_owner"];
        $this->viewData["car_plaque"] = $_POST["car_plaque"];
        $this->viewData["car_year"] = $_POST["car_year"];
        $this->viewData["car_color"] = $_POST["car_color"];
        $this->viewData["car_motor"] = $_POST["car_motor"];
        $this->viewData["car_status"] = $_POST["car_status"];
        $this->viewData["act_selected"] = $_POST["car_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["car_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\cars::insertCar(
            $this->viewData["car_model"],
            $this->viewData["car_owner"],
            $this->viewData["car_plaque"],
            $this->viewData["car_year"],
            $this->viewData["car_color"],
            $this->viewData["car_motor"],
            $this->viewData["car_status"]
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-cars",
                "Registro guardado Exitosamente!"
            );
        }
    }

    private function pre_render()
    {
        $this->viewData["arrModel"]
                = \Utilities\ArrUtils::objectArrToOptionsArray(
                    $this->model,
                    'value',
                    'text',
                    'value',
                    $this->viewData["car_model"]
                );       
        $this->viewData["act_selected"] = $this->viewData["car_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["car_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["cars_id"],
                $this->viewData["car_model"]
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
            "index.php?page=mnt-cars",
            "Algo Inesperado sucedió!"
        );
    }
}
?>