<?php

class Posts extends Controller{
    public function index() {
        echo "Bienvenue dans l'action index du controller posts";
        echo "<p>Paramètre queryString : <p>" . print_r($_GET). "</p>";
    }

    public function addNew() {
        echo "Bienvenue dans l'action addNew du controller posts";
    }
    public function edit() {
        echo "Bienvenue dans l'action index du controller posts";
        echo "<p>Paramètres de la route : <pre>";
        htmlspecialchars(print_r($this->route_params, true)). '</pre></p>';
    }
}

?>