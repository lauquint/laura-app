<?php

//TODO prod should hace Caching configured

require '../vendor/autoload.php';

include __DIR__ . '/../src/config/db.php';
$twig_fileystem = __DIR__ . '/../src/templates';

use Fw\Application;
use Fw\Component\Databases\MysqlPDO\MysqlPDO;
use Fw\Component\Databases\MysqlPDO\MysqlPDOConnection;


$application = new Application;

$options = array(
    'cache' => false,
    'debug' => true,
    'autoescape' => false
);

$loader = new Twig_Loader_Filesystem($twig_fileystem);

$twig = new Twig_Environment($loader, $options);

$application->setTemplateEngine($twig);

$pdo = new MysqlPDOConnection($db_config);

$database = new MysqlPDO($pdo->pdo);

$application->setDatabase($database);

$application->run();