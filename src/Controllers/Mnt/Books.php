<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Books extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["books"] = \Dao\Mnt\Books::getBooks();

        Renderer::render("mnt/Books",$viewData);
    }
}
?>