<?php
namespace application\Controllers;

use \Core\View;

class Home extends \Controller {
    public function indexAction(){
            //echo "Bienvenue dans l'action index du controller home";
            View::render("Home/accueil.php");
        }
    }

?>