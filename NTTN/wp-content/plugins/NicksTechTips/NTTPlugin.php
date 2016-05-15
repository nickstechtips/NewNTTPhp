<?php
/*
Plugin Name:NTTPlugin
Description: A tool to help manage Nicks Tech Tips
Version: 1.0
Author: Nick Seeber
Author URI: http://www.nickstechtips.com
 */

$dir = NTTPlugin_dir();

function NTTPlugin_init() {
		 
}



function settings() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	include_once  "$dir/views/settings.php";
} 


function NTTPlugin_css(){
	include_once  "$dir/views/Common/header.php";
}

function NTTPlugin_js() {
	include_once  "$dir/views/Common/footer.php";
}

function NTTPlugin_admin_js(){
	include_once  "$dir/views/Common/admin-footer.php";
}

function NTTPlugin_activation() {
	
}

function NTTPlugin_deactivation() {
	
}

function add_interface_menu() {
	$page_title = "NTT Plugin";
	$menu_title = "NTT Plugin";
	$capability = "10";
	$menu_slug = "NTTPlugin";
	$mainPage = "settings";
	


	add_menu_page($page_title, $menu_title, $capability, $menu_slug, $mainPage);

}


function NTTPlugin_dir() {
	return dirname(__FILE__);
} 

// Add initialization and activation hooks
add_action('init', 'NTTPlugin_init');
add_action( 'admin_menu', 'add_interface_menu' );

add_action('wp_head', 'NTTPlugin_css');
add_action('wp_footer', 'NTTPlugin_js');

add_action('admin_print_scripts', 'NTTPlugin_css');
add_action('admin_print_footer_scripts', 'NTTPlugin_admin_js');

register_activation_hook("$dir/NTTPlugin.php", 'NTTPluginactivation');
register_deactivation_hook("$dir/NTTPlugin.php", 'NTTPlugindeactivation');

?>
