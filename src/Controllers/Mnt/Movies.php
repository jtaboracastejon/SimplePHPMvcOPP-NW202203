<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Movies extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["movies"] = \Dao\Mnt\Movies::getMovies();

        Renderer::render("mnt/Movies",$viewData);
    }
}
?>