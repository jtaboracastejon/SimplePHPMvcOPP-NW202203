<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Softwares extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["softwares"] = \Dao\Mnt\Softwares::getSoftwares();

        Renderer::render("mnt/Softwares",$viewData);
    }
}
?>