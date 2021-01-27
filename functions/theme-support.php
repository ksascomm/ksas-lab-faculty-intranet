<?php

// Adding WP Functions & Theme Support
function ksaslab_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	// Add Support for WP Controlled Title Tag
	//add_theme_support( 'title-tag' );

	// Add HTML5 Support
	add_theme_support(
         'html5',
	         array(
				 'comment-list',
				 'comment-form',
				 'search-form',
	         )
	);

	// Adding post format support
	add_theme_support(
    'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat',               // chat transcript
		)
	);

	// Enable block styles on the front end
    add_theme_support( 'wp-block-styles' );

	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'ksaslab_theme_support', 1200 );

} /* end theme support */

add_action( 'after_setup_theme', 'ksaslab_theme_support' );

add_action( 'wp_head',    'ksas_default_site_icon', 99 );
add_action( 'login_head', 'ksas_default_site_icon', 99 );

function ksas_default_site_icon()
{
    if( ! has_site_icon()  && ! is_customize_preview() )
    {
       echo '<link rel="shortcut icon" type="image/png" href="'.get_template_directory_uri().'/assets/images/favicons/favicon.ico" />';
    	
		echo '<link rel="icon" type="image/png" sizes="16x16" href="'.get_template_directory_uri().'/assets/images/favicons/favicon-16x16.png" />';
		echo '<link rel="icon" type="image/png" sizes="32x32" href="'.get_template_directory_uri().'/assets/images/favicons/favicon-32x32.png" />';
		echo '<link rel="icon" type="image/png" sizes="96x96" href="'.get_template_directory_uri().'/assets/images/favicons/favicon-96x96.png" />';
		echo '<link rel="apple-touch-icon" sizes="120x120" href="'.get_template_directory_uri().'/assets/images/favicons/apple-touch-icon-120x120.png" />';
		echo '<link rel="apple-touch-icon" sizes="152x152" href="'.get_template_directory_uri().'/assets/images/favicons/apple-touch-icon-152x152.png" />';
		echo '<link rel="apple-touch-icon" sizes="180x180" href="'.get_template_directory_uri().'/assets/images/favicons/apple-touch-icon-180x180.png" />';
    }
} 