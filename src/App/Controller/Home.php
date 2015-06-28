<?php

namespace App\Controller;

use Fw\Component\Controllers\Controller;
use Fw\Component\Databases\MysqlPDO\MysqlPDOConnection;
use Fw\Component\Dispatching\HttpRequest;
use Fw\Component\Dispatching\WebResponse;
use Fw\Component\Databases\Database;
use \PDO;



class Home implements Controller {

    public function __invoke(HttpRequest $request, Database $db) {

        $id=2;

        $statement =$db->database->prepare('SELECT name, surname FROM user WHERE id= :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);


        $template = 'index.html.twig';

        $response = new WebResponse($result[0], $template);

        return $response;

    }

}