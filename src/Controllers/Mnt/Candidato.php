<?php

namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Candidato extends PublicController
{
    private $viewData = array(
        "id" => "",
        "identidad" => "",
        "nombre" => "",
        "edad" => ""
    );

    public function run(): void
    {
        if ($this->isPostBack()) {
            if ($this->validate_inputs()) {
                $this->on_insert_clicked();
            }
        }
        Renderer::render("mnt/candidato", $this->viewData);
    }
    private function validate_inputs()
    {
        $this->viewData["identidad"] = $_POST["identidad"];
        $this->viewData["nombre"] = $_POST["nombre"];
        $this->viewData["edad"] = $_POST["edad"];
        return true;
    }
    private function on_insert_clicked()
    {
        $insertResult = \Dao\Mnt\Candidatos::agregarCandidato(
            $this->viewData["identidad"],
            $this->viewData["nombre"],
            $this->viewData["edad"],
        );
        if($insertResult){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-candidatos",
                "Candidato guardado exitosamente"
            );
        }else{
            $this->errorRedir();
        }
    }

    private function errorRedir()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=Mnt-candidatos",
            "Algo Inesperado sucedió!"
        );
    }
}
