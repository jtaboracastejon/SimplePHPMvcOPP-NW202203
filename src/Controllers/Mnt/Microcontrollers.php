<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Microcontrollers extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["microcontrollers"] = \Dao\Mnt\Microcontrollers::getMicrocontrollers();

        Renderer::render("mnt/Microcontrollers",$viewData);
    }
}
?>