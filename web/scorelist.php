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

// $dateFrom = $_REQUEST['dateFrom'];
// $dateTo = $_REQUEST['dateTo'];

$memberno = $_REQUEST['p1No'];

//現在の月を取得
$nowMonth = date('Y-n');
//現在の日付から、月初と月末の日付を取得
$fromDate = date('Y-m-d', strtodate('first day of ' . $nowMonth));
$toDate = date('Y-m-d', strtodate('last day of ' . $nowMonth));
$nowDate = date('Y-m-d');
//先月の月初と月末の日付を取得
$prevFromDate = date('Y-m-d', strtodate($nowDate . 'first day of previous month'));
$prevToDate = date('Y-m-d', strtodate($nowDate . 'last day of previous month'));

//全試合結果を取得
$scorelistall = $dtutils->getScoreList($prevFromDate,$toDate);

//先月の結果を集計
$rankinglistPrev = $dtutils->getMatchReport($prevFromDate,$prevToDate,$memberno);
$rankingbasePrev = $dtutils->aggregateRankingBase($rankinglist);

// ドロップダウン用のメンバーリスト取得
$memberlist = $dtutils->getMemberList();

echo $app['twig']->render('scorelist.twig', array('dateFrom' => $prevFromDate, 'dateTo' => $toDate, 'scorelist' => $scorelistall, 'memberlist' => $memberlist) );
