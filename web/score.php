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
$score['entryDate'] = $_REQUEST['entryDate'];
$p1name = explode(",", $_REQUEST['p1Name']);
$p1no = $p1name[0];
$score['p1no'] = $p1no;
$score['p1score'] = $_REQUEST['p1Score'];
$score['p1win'] = $_REQUEST['p1Winner'];

$p2name = explode(",", $_REQUEST['p2Name']);
$p2no = $p2name[0];
$score['p2no'] = $p2no;
$score['p2score'] = $_REQUEST['p2Score'];
$score['p2win'] = $_REQUEST['p2Winner'];

$result = $dtutils->checkMemberList($score);

registScore($score);

echo "登録完了しました";

$memberlist = $dtutils->getMemberList();

echo $app['twig']->render('score.twig', array('entryDate' => $entryDate, 'memberlist' => $memberlist));
