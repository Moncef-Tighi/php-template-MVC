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

    protected function convertToStudlyCaps($string) {
        //ça part du principe que les noms de class seront en StudlyCaps.
        return str_replace(' ','',ucwords(str_replace('-', ' ', $string)));
    }

    protected function convertToCamelCase($string) {
        //ça part du principe que les méthodes seront écrites en camelCase.
        return lcfirst($this->convertToStudlyCaps($string));
    }

    public function dispatch($url) {
        //les liens qu'on reçoit seront dans un format slug : name-last-name
        //Il faut les convertir vers le même format que celui utilisé par les noms de class : NameLastName

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            if (class_exists($controller) ) {
                $controller_object = new $controller();
                
                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);
                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    echo "La méthode $action (Dans le controller $controller) n'existe pas.";
                }
            } else {
                echo "La class $controller n'existe pas";
            }
        } else {
            echo 'Aucune route trouvé.';
        }
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