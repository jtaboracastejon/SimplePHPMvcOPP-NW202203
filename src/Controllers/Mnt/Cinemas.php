<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Cinemas extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["cinemas"] = \Dao\Mnt\Cinemas::getCinemas();

        Renderer::render("mnt/Cinemas",$viewData);
    }
}
?>