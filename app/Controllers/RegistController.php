<?php
namespace App\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class RegistController
{
    public function regist(Application $app, Request $request){
        return $app['twig']->render('regist.twig');
    }
}
