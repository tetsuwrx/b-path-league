<?php

require('../vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});

$app->get('/regist', function(Request $request) use($app) {
  $app['monolog']->addDebug('logging output.');
  $member = array();
  $member['no'] = $request->get('memberno');
  $member['name'] = $request->get('membername');
  $member['sex'] = $request->get('membersex');
  $member['class'] = $request->get('memberclass');
  return $app['twig']->render('regist.twig', $member);
});

$app->run();
