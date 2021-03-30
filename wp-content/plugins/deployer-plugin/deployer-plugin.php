<?php
/*
Plugin Name: Deployer Plugin
Plugin URI: https://deployer.ihorvorotnov.com/
Description: Just a test plugin.
Version: 1.0.0
Author: Ihor Vorotnov
Author URI: https://ihorvorotnov.com
License: GPLv2 or later
Text Domain: deployer-plugin
*/

if ( ! function_exists( 'add_action' ) ) {
	die( 'Go away! You are drunk.' );
}

add_action ( 'wp_footer', static function () {
	var_dump( 'Hello, world. I am a plugin.' );
}, 11 );
