<?php
/**
 * Plugin Name: WPCOM Tester
 * Plugin URI: http://wordpress.org/extend/plugins/wpcom-tester/
 * Description: This plugin loads the <code>wpcom.php</code> compatibility file from <code>inc/</code> or <code>includes/</code> folder if it exists. The plugin also defines the <code>IS_WPCOM</code> constant.
 * Author: <a href="http://lukemcdonald.com">Luke McDonald</a>
 * Version: 1.0.0
 *
 * @package WPCOM_Tester
 * @author Luke McDonald
 * @version 1.0.0
 */

if ( ! defined( 'IS_WPCOM' ) ) {
	define( 'IS_WPCOM', true );
}

function wpcom_tester_setup() {
	locate_template( array( 'inc/wpcom.php', 'includes/wpcom.php' ), true );
}
add_action( 'after_setup_theme', 'wpcom_tester_setup' );

