<?php

namespace Core; 

class View {
    public static function render($view) {
        //Permet de require automatiquement les view
        $file = "../application/Views/$view";
        if (is_readable($file)){
            require $file;
        } else {
            echo "$file not found";
        }
    }
}

?>