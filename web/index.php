<?php

require '../vendor/autoload.php';

use Fw\Application;
use Fw\Component\Routing\PhpParser;
use Fw\Component\Dispatching\HttpDispatcher;
use Fw\Component\Dispatching\HttpRequest;
use Fw\Component\Dispatching\Request;
use App\Controller\Home;
use App\Controller\Welcome;
use Fw\Component\Dispatching\JsonResponse;
use Fw\Component\Dispatching\WebResponse;
use Fw\Component\Views\JsonView;
use Fw\Component\Views\WebView;

$application= new Application;
$routing = new PhpParser();


if (!isset($_SERVER['PATH_INFO'])) {
    $route=$_SERVER['REQUEST_URI'];
} else {
    $route = $_SERVER['PATH_INFO'];
}


$routes = array(
    'Home'=> array(
        'route'=>'/',
        'method'=>'get'
    ),

    'Welcome' => array(
        'route'=>'/welcome',
        'method'=>'get'
    ),
);

if (!$route) {
    $route='/';
}

$route_name = $routing->parseRoute($route, $routes);

$controllers = array(
    'Home' => array(
        'controller'=>'App\Controller\Home'
    ),
    'Welcome'=>array(
        'controller'=>'App\Controller\Welcome'
    )
);


$get_controller = new HttpDispatcher;

$controller = $get_controller->dispatchController($route_name, $controllers);

$controller_i = new $controller;

$request = new Request();
$httprequest = new HttpRequest($request, $_GET, $_POST, $_SERVER);

$response = $controller_i($httprequest);

if ($response instanceof JsonResponse) {

    $result = new JsonView();

   $result->render($response->getResponse());


} else if ($response instanceof WebResponse) {

}



$application->run();