<?php 
namespace Controllers\mnt;
use Controllers\PublicController;
use Views\Renderer;

class Musictracks extends PublicController{
    public function run(): void
    {
        $viewData = array();
        $viewData["musictracks"] = \Dao\Mnt\Musictracks::getMusictracks();

        Renderer::render("mnt/Musictracks",$viewData);
    }
}
?>