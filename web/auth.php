<?php
$password = $_REQUEST['password'];

if ( $password == '8804' )
{
  header('/maintenance', true, 301);
}
echo '<p>パスワードが間違ってます</p>';

?>
