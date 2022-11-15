<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Students extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["students"] = \Dao\Mnt\Students::GetStudents();

        Renderer::render("mnt/Students",$viewData);
    }
}
?>