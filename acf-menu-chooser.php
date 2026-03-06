<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Plugin Name: Advanced Custom Fields: Menu Chooser
 * Plugin URI: https://github.com/reyhoun/acf-menu-chooser
 * Description: List WordPress Menus in a select ACF field.
 * Version: 1.2.0
 * Author: Reyhoun
 * Author URI: http://reyhoun.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.0
 * Requires PHP: 5.6
 * GitHub Plugin URI: https://github.com/reyhoun/acf-menu-chooser
 * GitHub Branch:     master
*/


load_plugin_textdomain( 'acf-menu-chooser', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );


function include_field_types_menu_chooser( $version ) {

	if ( $version >= 6 ) {
		include_once 'acf-menu-chooser-v6.php';
	} else {
		include_once 'acf-menu-chooser-v5.php';
	}

}

add_action( 'acf/include_field_types', 'include_field_types_menu_chooser' );
