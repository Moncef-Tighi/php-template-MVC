<?php

class Router {

    protected $routes= []; 

    //Paramètres de la route 
    protected $params = [];

    public function add($route, $controller, $action) {
        //Conversion de la route vers une regex
        $route = preg_replace('/\//', '\\/', $route);
        
        //Conversion des variablee
        $route = preg_replace('/\{([a-z]+)\}/', '(?P</1>[a-z-]+)', $route);

        //Ajout du début et du marqueur pour ignorer la casse

        $route= '/^' . $route . '$/i';
        $this->routes[$route]= ['controller' => $controller, 'action' => $action];
    }


    public function match($url) {
        foreach($this->routes as $route=> $params) {
            if (preg_match("/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/", $url, $matches) ) {
                $params= [];

                foreach($matches as $key=>$match) {
                    if (is_string($key)) {
                        $params[$key]= $match;
                    }
                }
                var_dump($params);
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