<?php
require get_template_directory() . '/includes/blocks/hero/init.php';

function admin_styles() {
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/assets/css/admin-defaults.css', array(), '');
}
add_action( 'admin_enqueue_scripts', 'admin_styles' );

function web_scripts() {
// Include Styles
	wp_enqueue_style('style_main', get_template_directory_uri() . '/assets/css/style.min.css', array(), null, '');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), null, '');

// Include Scripts
    wp_enqueue_script('main_js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, '');
}
add_action( 'wp_enqueue_scripts', 'web_scripts' );

/* Disable WordPress Admin Bar for all users */
// add_filter( 'show_admin_bar', '__return_false' );

// Theme Support
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'widgets' );

// Register menus
// register_nav_menus(array(
//     'header-menu' => __( 'Header menu' ),
// 	'footer-menu' => __( 'Footer menu' ),
// ));

// Add "svg" support
function stablehouse_svg_mime_type( $mimes = array() ) {
	$mimes[ 'svg' ]  = 'image/svg+xml';
	$mimes[ 'svgz' ] = 'image/svg+xml';
	return $mimes;
   }
add_filter( 'upload_mimes', 'stablehouse_svg_mime_type' );

// Remove update ACF
function my_remove_update_nag($value) {
	unset($value->response[ 'advanced-custom-fields-pro/acf.php' ]);
	return $value;
}
add_filter('site_transient_update_plugins', 'my_remove_update_nag');