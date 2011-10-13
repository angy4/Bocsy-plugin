<?php

if (empty($_SESSION['bsession'])) {
	$session = $soap->Login($_POST['crypt'], '', $_POST['ip']);
	if (empty($session)) {
		echo "Error, invalid login sequence or login card"; return; }
	$_SESSION['bsession'] = $session;
}
?>
<h2>Hello <?php echo $soap->UserName($_SESSION['bsession']); ?></h2>
<form name="menu" method="post" action="">
<select name="page">
<optgroup label="General">
<option value="me">Me</option>
<option value="logout">Logout</option>
<optgroup label="Time track">
<option value="tlogin">Login into building</option>
<option value="tlogout">Logout of building</option>
</select>
<input type="submit" name="submit" value="Execute">
</form>


