<?php

namespace Core; 

class View {
    public static function render($view, $args=[]) {
        //Permet de require automatiquement les view
        extract($args, EXTR_SKIP);
        $file = "../application/Views/$view";
        if (is_readable($file)){
            require $file;
        } else {
            echo "$file not found";
        }
    }
}

?>