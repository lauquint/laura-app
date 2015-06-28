<?php

require '../vendor/autoload.php';

require __DIR__ . '/../src/config/db.php';

use Fw\Application;
use Fw\Component\Databases\MysqlPDO\MysqlPDO;
//use Fw\Component\Databases\MysqlPDO\MysqlPDOConnection;



$application = new Application;

$twig_fileystem = __DIR__ . '/../src/templates';

$options = array(
    'cache' => false,
    'debug' => true,
    'autoescape' => false
);

$loader = new Twig_Loader_Filesystem($twig_fileystem);

$twig = new Twig_Environment($loader, $options);

$application->setTemplateEngine($twig);

//$pdo = new MysqlPDOConnection($db_config);

$pdo = new PDO('mysql:host=localhost;dbname=fw_app', 'root', '');

$database = new MysqlPDO($pdo);

$application->setDatabase($database);

$application->run();