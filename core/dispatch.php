<?php

/*
 * Dispatcher for Bocsy
 * If no $_POST['page'] -> login
 * usage of sessions
 */

$bsession = $_SESSION['bsession'];

if (empty($bsession)) {
	$r = $client->call('Login', '%uioÉ');
	echo $r;
}

?>
