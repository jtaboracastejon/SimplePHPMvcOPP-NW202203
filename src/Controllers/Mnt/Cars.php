<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Cars extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["cars"] = \Dao\Mnt\Cars::getCars();

        Renderer::render("mnt/Cars",$viewData);
    }
}
?>