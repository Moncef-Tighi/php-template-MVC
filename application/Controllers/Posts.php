<?php

class Posts {
    public function index() {
        echo "Bienvenue dans l'action index du controller posts";
        echo "<p>Paramètre queryString : <p>" . print_r($_GET). "</p>";
    }

    public function addNew() {
        echo "Bienvenue dans l'action addNew du controller posts";
    }
}

?>