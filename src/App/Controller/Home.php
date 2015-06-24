<?php

namespace App\Controller;

use Fw\Component\Controllers\Controller;
use Fw\Component\Dispatching\HttpRequest;

class Home implements Controller {

    public function __invoke(HttpRequest $request) {
        echo 'Hello';
    }

}