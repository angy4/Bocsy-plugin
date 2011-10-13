<?php
/*
Plugin Name: bocsy
Plugin URI: http://www.thegeekgroup.org
Description: Wordpress interface for bocsy [bocsy]
Version: 0.1
Author: ajprog and angy
Author URI: http://www.thegeekgroup.org
*/

class Bocsy {

	function __construct() {
		do_action( 'bocsy_pre_init' );

		$this->constants();
		
		add_shortcode( 'bocsy', array('Bocsy', 'bocsy_handler') );
		add_action('template_redirect', 'bocsy_session', 0);	
        	function bocsy_session() {
                	$session_id = session_id();
               		if (empty($session_id))
                	        session_start();
        	}
		
		do_action( 'bocsy_init' );
	}
	
	function constants() {
		define ("PLUGIN_DIR_BOCSY", basename(dirname(__FILE__)));
		define ("PLUGIN_URL_BOCSY", get_settings("siteurl")."/wp-content/plugins/".PLUGIN_DIR_BOCSY);
		define ("PLUGIN_PATH_BOCSY",ABSPATH."wp-content/plugins/".PLUGIN_DIR_BOCSY);
		do_action( 'bocsy_started' );
	}


	function install() {
	}

	function bocsy_handler() {
		$q = $_POST['page'];
		$d = new Dispatch();
		return $d->dispatch($q);
	}

}
include_once('core/dispatch.php');
$bocsy = new Bocsy();

register_activation_hook( __FILE__, array( $bocsy, 'install' ) )
?>


