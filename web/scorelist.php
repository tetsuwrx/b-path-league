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
$memberno = $_REQUEST['p1No'];

$scorelist = $dtutils->getScoreList($dateFrom,$dateTo);

$memberlist = $dtutils->getMemberList();
var_dump($memberno);
$rankinglist = $dtutils->getMatchReport($dateFrom,$dateTo,$memberno);
$rankingbase = $dtutils->aggregateRankingBase($rankinglist);

echo $app['twig']->render('scorelist.twig', array('dateFrom' => $dateFrom, 'dateTo' => $dateTo, 'scorelist' => $scorelist, 'memberlist' => $memberlist) );
