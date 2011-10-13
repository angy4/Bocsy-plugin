<?php
$ip = $_SERVER['REMOTE_ADDR'];
?>
<form name="login_card" method="post" action="">
Card<input type="text" name="crypt" size="15">
<input type="hidden" name="page" value="home"><br>
<input type="hidden" name="ip" value="<?php echo $ip; ?>">
<input type="submit" name="Submit" value="Login" class="input">
</form>

