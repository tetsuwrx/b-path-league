<?php

require('../vendor/autoload.php');
require('library/DataUtils.php');

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

$dtutils = new DataUtils();

// $memberlist = $utils->getMemberList();

// $entryDate = date("Y-m-d");

// echo $app['twig']->render('scoreregist.twig', array('entryDate' => $entryDate, 'memberlist' => $memberlist) );

$cnt = 0;

echo '登録件数：', $cnt, '件です。'

?>
