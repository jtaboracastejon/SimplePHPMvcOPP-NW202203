<?php 
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
class Student extends PublicController{
    private $arrModeDsc = array(
        "INS" => "Agregar nuevo Estudiante",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "student_name" => "",
        "student_birthdate" => "",
        "student_gender" => "",
        "student_email" => "",
        "student_phone" => "",
        "student_status" => "",
        "act_selected" => true,
        "ina_selected" => false,
        "readOnly" => false,
        "showSaveBtn" => true
        
    );

    private $genders=array();
	public function run() :void{
        $this->onForm_loaded();
        if($this->isPostBack()){
            $this->process_postBack();
        }
        $this->pre_render();
        Renderer::render("mnt/student", $this->viewData);
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
            if (!isset($_GET["student_id"])) {
                $this->errorRedir();
            }

            $Student_id = intval($_GET["student_id"]);
            $dbQuote = \Dao\Mnt\Students::getStudentById($Student_id);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
        $this->genders=[
            ["value"=>"MCN", "text"=>"Masculino"],
            ["value"=>"FMO", "text"=>"Femenino "]
        ];

        
        $this->viewData["arrGenders"] = $this->genders;
    }

    private function process_postBack()
    {
        if($this->validate_inputs()){
            $this->on_insert_clicked();
        }
    }

    private function validate_inputs()
    {
        $this->viewData["student_name"] = $_POST["student_name"];
        $this->viewData["student_birthdate"] = $_POST["student_birthdate"];
        $this->viewData["student_gender"] = $_POST["student_gender"];
        $this->viewData["student_email"] = $_POST["student_email"];
        $this->viewData["student_phone"] = $_POST["student_phone"];
        $this->viewData["student_status"] = $_POST["student_status"];
        $this->viewData["act_selected"] = $_POST["student_status"] == "ACT";
        $this->viewData["ina_selected"] = $_POST["student_status"] == "INA";
        return true;
    }

    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Students::insertStudent(
            $this->viewData["student_name"],
            $this->viewData["student_birthdate"],
            $this->viewData["student_gender"],
            $this->viewData["student_email"],
            $this->viewData["student_phone"],
            $this->viewData["student_status"]
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt-Students",
                "Registro guardado Exitosamente!"
            );
        }
    }

    private function pre_render()
    {
        $this->viewData["arrGenders"]
                = \Utilities\ArrUtils::objectArrToOptionsArray(
                    $this->genders,
                    'value',
                    'text',
                    'value',
                    $this->viewData["student_gender"]
                );       
        $this->viewData["act_selected"] = $this->viewData["student_status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["student_status"] === "INA";
        if ($this->viewData["mode"] !== "INS") {
            $this->viewData["mode_dsc"] = sprintf(
                $this->arrModeDsc[$this->viewData["mode"]],
                $this->viewData["student_id"],
                $this->viewData["student_name"]
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
            "index.php?page=mnt-Students",
            "Algo Inesperado sucedió!"
        );
    }
}
?>