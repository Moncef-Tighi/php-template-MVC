<?php

require("../core framework/router.php");

//Il faut require les controllers : 
require("../application/Controllers/controllerFactory.php");
require("../application/Controllers/Posts.php");
require("../application/Controllers/Home.php");


$url= $_SERVER['QUERY_STRING'];

$router = new Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);


$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

// echo('<pre>');
// var_dump($router->getRoutes());
// echo('</pre>');


// if($router->match($url) ) {
//     var_dump($router->getparams());
// } else {
//     echo "The route ` " .$url. " ` dosen't exist";
// }

$router->dispatch($url);

?>