<?php
$password = $_REQUEST['password'];

if ( $password == '8804' )
{
  header('https://b-path-league.herokuapp.com/maintenance', true, 301);
}
echo '<p>パスワードが間違ってます</p>';

?>
