<?php

require '../vendor/autoload.php';

use Fw\Application;

$application= new Application;

$twig_fileystem=__DIR__ . '/../src/templates';

$options = array(
    'cache' => false,
    'debug' => true,
    'autoescape' => false
);

$loader = new \Twig_Loader_Filesystem($twig_fileystem);

$twig = new \Twig_Environment($loader, $options);


$application->setTemplateEngine($twig);

$application->run();