<?php

/*
 * Dispatcher for Bocsy
 * If no $_POST['page'] -> login
 * usage of sessions
 */

class Dispatch extends Bocsy {
function dispatch($q = 'empty') {
	try {
		$soap = new SoapClient("http://dv.komput.net/test/bocsy.wsdl",     array('location'=>"http://dv.komput.net/test/bocsy.php"));
	} catch (Exception $e) {
		echo $e;
	}

switch ($q){


	case "home":
	include_once(PLUGIN_PATH_BOCSY . '/page/home.php');
	break;

	case "logout":
	include_once(PLUGIN_PATH_BOCSY . '/page/logout.php');
	break;

	case "empty":
	if (empty($_POST['page'])) {
	$bsession = $_SESSION['bsession'];

	if (empty($bsession)) {
		include_once(PLUGIN_PATH_BOCSY . '/page/login.php');
	} else {
		include_once(PLUGIN_PATH_BOCSY . '/page/home.php');
	}
	}
	break;

}
}

}
?>


