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
$score = array();

$dateFrom = $_REQUEST['dateFrom'];
$dateTo = $_REQUEST['dateTo'];

$scorelist = $dtutils->getRankingList($dateFrom,$dateTo);
$ranking = $dtutils->aggregateRanking($scorelist);

echo $app['twig']->render('ranking.twig', array('dateFrom' => $dateFrom, 'dateTo' => $dateTo, 'scorelist' => $scorelist, 'ranking' => $ranking) );
