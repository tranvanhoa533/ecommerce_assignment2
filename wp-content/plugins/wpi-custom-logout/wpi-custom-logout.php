<?php
/**
 * Plugin Name: WPi Custom Logout
 * Plugin URI:  http://wooprali.prali.in/plugins/wpi-custom-logout
 * Description: This plugin in used for custom logout page redirection to home page
 * Version: 1.1.0
 * Author: wooprali
 * Author URI: http://wooprali.prali.in
 * Text Domain: wooprali
 * Domain Path: /locale/
 * Network: true
 * License: GPL2
 */
defined('ABSPATH') or die("No script kiddies please!");
add_action('wp_logout','go_home');
function go_home(){
	global $current_user; // Use global
	//get_currentuserinfo(); // Make sure global is set, if not set it.
	if ( user_can( $current_user, "subscriber" ) ){ // Check user object has not got subscriber role		
 		wp_redirect( home_url() );
		exit();
		//var_dump( $current_user);
	}  	
}
?>