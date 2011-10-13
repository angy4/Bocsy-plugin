<?php
if (empty($_SESSION['bsession'])) {
	include('error.php');
} else {
$soap->Logout($_SESSION['bsession']);

session_unset();
session_destroy();

?>

<form>
Logout successful
<input type="submit" value="OK">
</form>
<?php
}
?> 

