<?php
/**
* Plugin Name: Step child
* Plugin URI: https://plugins.followmedarling.se/
* Description: Load css, js, fonts and php instead of relying on Customizer/Additional CSS and various plugins.
* Version: 1.0.0
* Author: Jonk @ Follow me Darling
* Author URI: https://followmedarling.se/
* Domain Path: /languages
* Text Domain: step_child
**/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Load language */
add_action( 'init', 'step_child_load_textdomain' );
function step_child_load_textdomain() {
    load_plugin_textdomain( 'step_child', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

/* Set ver to this like so: step_child_get_asset_last_modified_time( get_theme_file_path( 'js/file.js' ) ) to get the time modded as ver */
function step_child_get_asset_last_modified_time( $path ) {
	return gmdate( 'YmdHis', filemtime( $path ) );
}

/* Get current plugin version number */
function step_child_get_plugin_version() {
	$plugin_version = get_file_data( __FILE__, array( 'Version' => 'Version' ), false )['Version'];
	return esc_attr( $plugin_version );
}

/* Enque the files for front end */
add_action( 'wp_enqueue_scripts', 'enqueue_step_child', 999 );
function enqueue_step_child() {
    // Style
    wp_register_style( 
        'step-child-style', 
        plugins_url( 'css/style.css', __FILE__ ),
        array(),
        step_child_get_asset_last_modified_time( plugin_dir_path( __FILE__ ) . 'css/style.css' )
    );
    wp_enqueue_style( 'step-child-style' );
    // Script
    wp_register_script( 
        'step-child-script', 
        plugins_url( 'js/script.js', __FILE__ ),
        array( 'jquery' ), 
        step_child_get_asset_last_modified_time( plugin_dir_path( __FILE__ ) . 'js/script.js' ),
        true
    );
    wp_enqueue_script( 'step-child-script' );
}

/* Enque the files for back end */
if ( is_admin() ) {
	add_action( 'admin_enqueue_scripts', 'enqueue_step_child_admin' );
	function enqueue_step_child_admin() {
        // Style
		wp_register_style( 
            'step-child-admin-style', 
            plugins_url( 'css/wp-admin.css', __FILE__ ), 
            array(), 
            step_child_get_asset_last_modified_time( plugin_dir_path( __FILE__ ) . 'css/wp-admin.css' ),
        );
        wp_enqueue_style( 'step-child-admin-style' );
	}
}

/* Include stuff */
include_once( 'inc/acf-json.php' );

/* Require functions */
require_once( 'functions/wordpress/index.php' );

require_once( 'functions/plugins/index.php' );

require_once( 'functions/themes/index.php' );
