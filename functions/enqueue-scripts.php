<?php
function site_scripts() {
	global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way.

	// Adding scripts file in the footer.
	wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/scripts/js' ), true );

	// Register main stylesheet.
	wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime( get_template_directory() . '/assets/styles/scss' ), 'all' );

	// Enqueue FontAwesome from CDN.
	wp_register_script( 'fontawesome', 'https://kit.fontawesome.com/ed22ca715b.js', array(), '5.15.2', false );
	wp_enqueue_script( 'fontawesome' );
	wp_script_add_data( 'fontawesome', array( 'crossorigin' ), array( 'anonymous' ) );

	// Enqueue Fancyboyx from CDN.
	wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array(), '3.5.7', true );
	wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', array(), '3.5.7', 'all' );

	// Comment reply script for threaded comments.
	if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1 ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'site_scripts', 999 );

// Defer non-essential/plugin javascript files.
// Defer jQuery Parsing using the HTML5 defer property.
function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) {
		return $url; // don't break WP Admin!
	}
	if ( false === strpos( $url, '.js' ) ) {
		return $url;
	}
	if ( strpos( $url, 'jquery.js' ) ) {
		return $url;
	}
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );
