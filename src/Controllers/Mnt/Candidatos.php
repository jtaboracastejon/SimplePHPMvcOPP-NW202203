<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Candidatos extends PublicController{
    
	/**
	 */
	public function run(): void {
        $viewData=array();
        $viewData["candidatos"] = \Dao\Mnt\Candidatos::obtenerCandidatos();
        Renderer::render("mnt/candidatos", $viewData);
	}
}

?>