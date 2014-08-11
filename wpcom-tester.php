<?php
/**
 * Plugin Name: WPCOM Tester
 * Plugin URI: http://wordpress.org/extend/plugins/wpcom-tester/
 * Description: Adds basic functionality to replicate the WP.com environment by defining and loading specific variables, functionality, and compatibility files.
 * Author: <a href="http://lukemcdonald.com">Luke McDonald</a>
 * Version: 1.0.0
 */

/**
 * Define IS_WPCOM global, which is available on WP.com.
 */
if ( ! defined( 'IS_WPCOM' ) ) {
	define( 'IS_WPCOM', true );
}

/**
 * Load WPCOM compatability file.
 *
 * Themes can define WordPress.com-specific code by adding a wpcom.php file in
 * either an /inc or /includes folder. This file can be used for defining
 * palettes for the Customizer, the $themecolors global, and anything else that
 * should only apply to the WordPress.com environment.
 *
 * The including happens on the after_setup_theme hook, but at a high priority:
 * add_action( 'after_setup_theme', 'wpcom_load_theme_compat_file', 0 );
 *
 * Including happens much like functions.php. If the file is present in a child
 * theme, it will be loaded from there first; if it's also present in the parent
 * theme, that will also be included immediately afterwards.
 */
function wpcom_tester_setup() {
	$wpcom_files = array(
		get_stylesheet_directory() . '/inc/wpcom.php',
		get_stylesheet_directory() . '/includes/wpcom.php',
		get_template_directory() . '/inc/wpcom.php',
		get_template_directory() . '/includes/wpcom.php',
	);

	foreach ( $wpcom_files as $file ) {
		if ( file_exists( $file ) ) {
			require_once( $file );
		}
	}
}
add_action( 'after_setup_theme', 'wpcom_tester_setup', 0 );
