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

$matchno = $_REQUEST['matchno'];

$matchdate = $_REQUEST['matchdate'];

$player1no = $_REQUEST['player1no'];
$player1score = $_REQUEST['player1score'];
$player1win = $_REQUEST['player1win'];
$player1runout = $_REQUEST['player1runout'];
$player2no = $_REQUEST['player2no'];
$player2score = $_REQUEST['player2score'];
$player2win = $_REQUEST['player2win'];
$player2runout = $_REQUEST['player2runout'];

$match = array( 'matchno' => $matchno
              , 'matchdate' => $matchdate
              , 'player1no' => $player1no
              , 'player1score' => $score1
              , 'player1win' => $p1win
              , 'player1runout' => $p1masu
              , 'player2no' => $player2no
              , 'player2score' => $score2
              , 'player2win' => $p2win
              , 'player2runout' => $p2masu
          );

var_dump($match);
//$dtutils->updateMatchScore($match);

echo 'スコア修正を行いました：<br>';

echo '<p>';
echo '<a class="gotoMenu" href="/scoremainte">前へ戻る</a>';
echo '</p>';

echo '<p>';
echo '<a class="gotoMenu" href="/maintenance">メニューへ</a>';
echo '</p>';

?>
