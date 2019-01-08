<?php
$password = $_REQUEST['password'];

if ( $password == '8804' )
{
  session_start();

  $_SESSION['auth'] = 'true';
  
  header('Location:/maintenance', true, 301);
}else{
  echo '<p>パスワードが間違ってます</p>';

  // セッションの値を初期化
  $_SESSION = array();

  // セッションを破棄
  session_destroy();
}


?>
