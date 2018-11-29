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

/*
$dbopts = parse_url(getenv('DATABASE_URL'));
$app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
               array(
                'pdo.server' => array(
                   'driver'   => 'pgsql',
                   'user' => $dbopts["user"],
                   'password' => $dbopts["pass"],
                   'host' => $dbopts["host"],
                   'port' => $dbopts["port"],
                   'dbname' => ltrim($dbopts["path"],'/')
                   )
               )
);
*/
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
  $member['result'] = '';
  return $app['twig']->render('regist.twig', $member);
});

$app->get('/score', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('score.twig');
});

$app->run();
