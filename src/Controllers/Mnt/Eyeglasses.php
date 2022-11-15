<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Eyeglasses extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["eyeglasses"] = \Dao\Mnt\Eyeglasses::getEyeglasses();

        Renderer::render("mnt/Eyeglasses",$viewData);
    }
}
?>