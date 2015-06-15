<?php

require '../vendor/autoload.php';

use Fw\Application;
use Fw\Component\Routing\PhpParser;
use Fw\Component\Dispatching\HttpDispatcher;
use App\Controller\Home;
use App\Controller\Welcome;

$application= new Application;
$routing = new PhpParser();

$route = $_SERVER['PATH_INFO'];

$routes = array(
    'Home'=>array('/', 'get'),
    'Welcome'=>array('/welcome', 'get'),
);

if (!$route) {
    $route='/';
}

$route_name = $routing->parseRoute($route, $routes);

$controllers = array(
    'Home'=>'App\Controller\Home',
    'Welcome'=>'App\Controller\Welcome',
);

$get_controller = new HttpDispatcher;
$controller = $get_controller->dispatchController($route_name, $controllers);

$controller_i = new $controller;

$controller_i();

$application->run();