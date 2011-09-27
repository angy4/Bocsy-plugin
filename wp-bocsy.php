<?php
/**
  * Plugin Name: WP-Bocsy
  * Plugin URI: http://dv.komput.net/gitweb/
  * Description: BOCSy Plugin
  * Version: 0
  * Author: angy, tysk, dr_jkl, ajprog
  * Author URI: http://thegeekgroup.org
  **/

class WP_Bocsy {

  function WP_Bocsy() {
    add_action('plugins_loaded', array($this, 'init'), 8);
  }

  function init() {
    do_action('wpbocsy_pre_init');
    $this->start();
    do_action('wpbocsy_init');
  }

  function start() {
    define('WPBOCSY_FILE_PATH', dirname(__FILE__));
    define('WPBOCSY_DIR_NAME', basename(WPSC_FILE_PATH));
    define('WPBOCSY_FILER', dirname(plugin_basename(__FILE__)));
    define('WPBOCSY_URL', plugin_url('', __FILE__));
    do_action('wpbocsy_booted');
  }

  function install() {
    require_once(dirname(__FILE__) . '/wpbocsy-core/wpbocsy-installer.php');
  }

$wpbocsy = new WP_Bocsy();

register_activation_hook(__FILE__, array($wpbocsy, 'install');
?>
