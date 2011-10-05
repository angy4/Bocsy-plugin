<?php
if (empty($_SESSION['bsession'])) {
	include('error.php');
} else {
$soap->Logout($_SESSION['session']);

session_unset();
session_destroy();

header('location: index.php');
}
?> 
