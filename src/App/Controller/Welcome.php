<?php

namespace App\Controller;

use Fw\Component\Controllers\Controller;
use Fw\Component\Dispatching\HttpRequest;
use Fw\Component\Dispatching\JsonResponse;

class Welcome implements Controller {

    public function __invoke(HttpRequest $request) {

        $name='Eva';
        $surname = 'Doménech';

        $result['name'] = array('first_name' => $name, 'last_name' => $surname);

        $response = new JsonResponse($result);

        return $response;

    }

}