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

}






?>