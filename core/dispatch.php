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

	$bsession = $_SESSION['bsession'];

	if (empty($bsession)) {
		include(PLUGIN_PATH_BOCSY . '/page/login.php');
	}

switch ($q){
	case "empty":
	case "home":
		include(PLUGIN_PATH_BOCSY . '/page/home.php');
		break;
	case "logout":
		include(PLUGIN_PATH_BOCSY . '/page/logout.php');
		break;
	default:
		include(PLUGIN_PATH_BOCSY . '/page/error.php');
}

}
}
?>

