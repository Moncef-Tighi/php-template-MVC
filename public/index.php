<?php

require("../core framework/router.php");

$url= $_SERVER['QUERY_STRING'];

$router = new Router();

$router->add('', 'Home', 'index');
$router->add('posts', 'Posts', 'index');
$router->add('posts/new', 'Posts', 'new');

// echo('<pre>');
// var_dump($router->getRoutes());
// echo('</ pre>');


if($router->match($url) ) {
    var_dump($router->getparams());
} else {
    echo "The route ` " .$url. " ` dosen't exist";
}
?>