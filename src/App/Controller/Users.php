<?php

namespace App\Controller;

use Fw\Component\Controllers\Controller;
use Fw\Component\Dispatching\HttpRequest;
use Fw\Component\Dispatching\WebResponse;
use Fw\Component\Databases\MysqlPDO\MysqlPDO;

class Users implements Controller {

    public function __construct() {

    }

    public function __invoke(HttpRequest $request) {

        $name='Eva';
        $surname='Domènech';

        $result = array('name' => $name, 'last_name' => $surname);

        $template = 'index.html.twig';

        $response = new WebResponse($result, $template);

        return $response;

    }

}