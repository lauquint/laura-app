<?php

namespace App\Controller;

use Fw\Component\Controllers\Controller;
use Fw\Component\Dispatching\HttpRequest;
use Fw\Component\Dispatching\WebResponse;



class Home implements Controller {

    public function __invoke(HttpRequest $request) {

        $name='Eva';
        $surname='Doménech';

        $result = array('name' => $name, 'last_name' => $surname);

        $template = 'index.html.twig';

        $response = new WebResponse($result, $template);

        return $response;


        //$loader = new \Twig_Loader_Filesystem(__DIR__ .'/../../templates' );

        //$twig = new Twig_Environment($loader);
       // echo $twig->render('index.html.twig', array('name' => $name));


    }

}