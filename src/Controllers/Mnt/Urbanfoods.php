<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;
class Urbanfoods extends PublicController{
    
    public function run(): void
    {
        $viewData = array();
        $viewData["urbanfoods"] = \Dao\Mnt\Urbanfoods::getUrbanfoods();
        
        
        Renderer::render("mnt/urbanfoods",$viewData);
    }
}
?>