<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.


/************* ADD THEME OPTIONS *******************/
// Add Theme Options Page
if ( ! function_exists( 'create_theme_options' ) ) {
    function create_theme_options() {
        require_once('theme-options-init.php');
    }
	if (is_admin() ) {
		create_theme_options();
	}
}
	// Collect current theme option values
	function flagship_sub_get_global_options() {
		$flagship_sub_option = array();
		$flagship_sub_option = get_option('flagship_sub_options');
		return $flagship_sub_option;
		}

	// Function to call theme options in theme files
		$flagship_sub_option = flagship_sub_get_global_options();

		// Add custom background option

function academic_flagship_theme_support() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 125, 125, true );   // default thumb size
	add_image_size( 'rss', 300, 150, true );
	add_image_size( 'directory', 150, 216, true );
	add_image_size( 'news', 175, 175, true );
	add_image_size( 'featured-small', 640, 200, true ); // name, width, height, crop
	add_image_size( 'featured-medium', 1280, 400, true );
	add_image_size( 'featured-large', 1440, 400, true );
	add_image_size( 'featured-xlarge', 1920, 400, true );

	add_theme_support( 'automatic-feed-links' ); // rss thingy
}

// Initiate Theme Support
add_action('after_setup_theme','academic_flagship_theme_support');