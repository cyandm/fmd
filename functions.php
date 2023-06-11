<?php
/****************************** Required Files */
require_once( __DIR__ . '/inc/classes/cyn-customize.php' );

/***************************** User Login / Logut */
function cyn_logout_user() {
	wp_redirect( site_url() );
	exit();
}

add_action( 'wp_logout', 'logout_user' );

add_filter( 'login_errors', function () {
	return null;
} );
/***************************** Enqueue Style And Scripts */

function cyn_enqueue_files() {
	wp_enqueue_style( 'cyn-final', get_stylesheet_directory_uri() . '/css/normal.css', [], false, 'all' );
	wp_enqueue_style( 'cyn-icon', get_stylesheet_directory_uri() . '/fonts/icon/cyn-icon.css', [], false, 'all' );
	wp_enqueue_style( 'cyn-style', get_stylesheet_uri(), [], false, 'all' );
	wp_dequeue_style( 'wp-block-library' );

	wp_enqueue_script( 'cyn-script', get_stylesheet_directory_uri() . '/js/dist/scripts.bundle.min.js', [], false, true );
	wp_dequeue_script( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'cyn_enqueue_files' );

remove_action( 'wp-head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/***************************** Theme Setup*/

function cyn_theme_setup() {
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( [ 
		'header-menu' => 'Header',
		'footer-us-menu' => 'Footer - Us',
		'footer-what-we-do-menu' => 'Footer - What We Do?',
		'footer-know-more-menu' => 'Footer - Know More'
	] );
}
add_action( 'after_setup_theme', 'cyn_theme_setup' );

/***************************** Theme initialize */

function cyn_theme_init() {

}
add_action( 'init', 'cyn_theme_init' );


/***************************** Instance Classes */
$cyn_customize = new cyn_customize;