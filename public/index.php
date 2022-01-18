<?php

require("../core framework/router.php");

$url= $_SERVER['QUERY_STRING'];

$router = new Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');

echo('<pre>');
var_dump($router->getRoutes());
echo('</pre>');


if($router->match($url) ) {
    var_dump($router->getparams());
} else {
    echo "The route ` " .$url. " ` dosen't exist";
}
?>