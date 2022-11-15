<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Games extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["games"] = \Dao\Mnt\Games::getGames();

        Renderer::render("mnt/Games",$viewData);
    }
}
?>