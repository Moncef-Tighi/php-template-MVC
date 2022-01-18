<?php

class Router {

    protected $routes= []; 

    //Paramètres de la route 
    protected $params = [];

    public function add($route, $params=[]) {
        //Conversion de la route vers une regex
        $route = preg_replace('/\//', '\\/', $route);
        
        //Conversion des paramètres comme {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        //Conversion des variables uniques comme {id:\d+}
        //On ajoute la regex quand on créé la route pour savoir que c'est une variable 
        $route= preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        //Ajout du début et du marqueur pour ignorer la casse 
        $route= '/^' . $route . '$/i';
        $this->routes[$route]= $params;
    }


    public function match($url) {
        foreach($this->routes as $route=> $params) {

            //Ancienne regex pour les URL fixe : /^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/

            if (preg_match($route, $url, $matches) ) {
                //$params= [];

                foreach($matches as $key=>$match) {
                    if (is_string($key)) {
                        $params[$key]= $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    //Getters

    public function getRoutes() {
        return $this->routes;
    }

    public function getParams() {
        return $this->params;
    }

}

?>  