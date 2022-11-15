<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Dresses extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["dresses"] = \Dao\Mnt\Dresses::getDresses();

        Renderer::render("mnt/Dresses",$viewData);
    }
}
?>