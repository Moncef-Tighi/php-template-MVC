<?php

/*
    Le rôle de cette class est de servir de template de base pour les autres controllers.
    Plus tard, on pourra implémenter les opérations CRUD de base ici pour ne pas devoir le faire
    Dans tout les controllers.
*/
abstract class Controller {

    protected $route_params=[];

    public function __construct($route_params)
    {
        $this->route_params= $route_params;
    }
    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            echo "Method $method not found in controller " . get_class($this);
        }
    }

    /**
     * Before filter - called before an action method.
     *
     * @return void
     */
    protected function before()
    {
    }

    /**
     * After filter - called after an action method.
     *
     * @return void
     */
    protected function after()
    {
    }

}






?>