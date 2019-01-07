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

$score = array();

for ($i = 1; $i <= 20; $i++) {

  $key = 'entryDate_'.$i;
  $entryDate = $_REQUEST[$key];

  $key = 'player1name_'.$i;
  $player1name = $_REQUEST[$key];

  $key = 'class1_'.$i;
  $class1 = $_REQUEST[$key];

  $key = 'score1_'.$i;
  $score1 = $_REQUEST[$key];

  $key = 'p1Masu_'.$i;
  $p1masu = $_REQUEST[$key];

  $key = 'player2name_'.$i;
  $player2name = $_REQUEST[$key];

  $key = 'class2_'.$i;
  $class2 = $_REQUEST[$key];

  $key = 'score2_'.$i;
  $score2 = $_REQUEST[$key];

  $key = 'p2Masu_'.$i;
  $p2masu = $_REQUEST[$key];

  if ( $p1masu != null && $p2masu != null )
  {
    $cnt++;
    $score[] = array( 'entryDate' => $entryDate
                    , 'player1name' => $player1name
                    , 'class1' => $class1
                    , 'score1' => $score1
                    , 'p1masu' => $p1masu
                    , 'player2name' => $player2name
                    , 'class2' => $class2
                    , 'score2' => $score2
                    , 'p2masu' => $p2masu
               );
  }

}

echo '登録件数：', $cnt, '件です。';
var_dump($score);
?>
