<?php
$password = $_REQUEST['password'];

if ( $password == '8804' )
{
  header('/maintenance', true, 301);
}
echo '<p>パスワードが間違ってます</p>';

<form name="entryForm" method="POST" target="_self" action="auth.php">
<p>パスワード？<br>
<input type="password" name="password" value=""></p>
<input class="a1btns" type="submit" name="a1submit" value="送信">
</form>
?>
