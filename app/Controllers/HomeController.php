<?php
namespace App\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index(Application $app, Request $request){
        return $app['twig']->render('index.twig');
    }
}
