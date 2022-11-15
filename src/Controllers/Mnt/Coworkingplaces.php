<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Coworkingplaces extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["coworkingplaces"] = \Dao\Mnt\Coworkingplaces::getCoworkingplaces();

        Renderer::render("mnt/Coworkingplaces",$viewData);
    }
}
?>