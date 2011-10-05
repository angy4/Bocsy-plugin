<?php
/*
Plugin Name: bocsy
Plugin URI: http://www.thegeekgroup.org
Description: Wordpress interface for bocsy [bocsy]
Version: 0.1
Author: ajprog and angy
Author URI: http://www.thegeekgroup.org
*/

/*  Copyright 2010 ajprog

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*

foreach($_REQUEST as $key => $value){
	if(get_magic_quotes_gpc()){$value = stripslashes($value);}
	if (is_array($value)) {
		foreach($value as $key2 => $value2){
			$_REQUEST[$key] = mysql_real_escape_string(trim($value2));
		} } }
*/



/**
 * Bocsy
 *
 * Main Bocsy Plugin Class
 * 
 * @package bocsy
 */
class Bocsy {

	/**
	 * Start Bocsy on plugins loaded
	 */
	function __construct() {
		// Previous to initializing
		do_action( 'bocsy_pre_init' );

		// Initialize
		$this->constants();
		
		// Define shortcodes and hooks
		add_shortcode( 'bocsy', array('Bocsy', 'bocsy_handler') );
		add_action('template_redirect', 'bocsy_session', 0);	
        	function bocsy_session() {
                	$session_id = session_id();
               		if (empty($session_id))
                	        session_start();
        	}
		
		// Finished initializing
		do_action( 'bocsy_init' );
	}
	
	/**
	 * Initialize the basic Bocsy constants
	 */
	function constants() {
		// Set the core file path
		define ("PLUGIN_DIR_BOCSY", basename(dirname(__FILE__)));
		define ("PLUGIN_URL_BOCSY", get_settings("siteurl")."/wp-content/plugins/".PLUGIN_DIR_BOCSY);
		define ("PLUGIN_PATH_BOCSY",ABSPATH."wp-content/plugins/".PLUGIN_DIR_BOCSY);
		do_action( 'bocsy_started' );
	}


	/**
	 * Bocsy Activation Hook
	 */
	function install() {
		//This is for any things needed on plugin install		
	}

	/**
	 * Bocsy Main Plugin Call
	 */
	function bocsy_handler() {
		include('core/soap.php');
		$q = $_POST['page'];
		$d = new Dispatch();
		return $d->dispatch($q);
		// return "Hello World!!";
	}

}
include('core/dispatch.php');
// Start Bocsy
$bocsy = new Bocsy();

// Activation
register_activation_hook( __FILE__, array( $bocsy, 'install' ) )

?>

