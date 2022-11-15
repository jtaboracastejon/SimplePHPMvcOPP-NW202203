<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Sports extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["sports"] = \Dao\Mnt\Sports::getSports();

        Renderer::render("mnt/Sports",$viewData);
    }
}
?>