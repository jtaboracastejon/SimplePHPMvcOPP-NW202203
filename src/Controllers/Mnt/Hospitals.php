<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Hospitals extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["hospitals"] = \Dao\Mnt\Hospitals::getHospitals();

        Renderer::render("mnt/Hospitals",$viewData);
    }
}
?>