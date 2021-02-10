<?php

// Fire all our initial functions at the start
add_action( 'after_setup_theme', 'ksaslab_start', 16 );

function ksaslab_start() {

	// launching operation cleanup
	add_action( 'init', 'ksaslab_head_cleanup' );

	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'ksaslab_remove_wp_widget_recent_comments_style', 1 );

	// clean up comment styles in the head
	add_action( 'wp_head', 'ksaslab_remove_recent_comments_style', 1 );

	// clean up gallery output in wp
	add_filter( 'gallery_style', 'ksaslab_gallery_style' );

	// cleaning up excerpt
	add_filter( 'excerpt_more', 'ksaslab_excerpt_more' );

} /* end joints start */

// The default WordPress head is a mess. Let's clean it up by removing all the junk we don't need.
function ksaslab_head_cleanup() {
	// Remove category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	// Remove post and comment feeds
	remove_action( 'wp_head', 'feed_links', 2 );
	// Remove EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// Remove Windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Remove index link
	remove_action( 'wp_head', 'index_rel_link' );
	// Remove previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// Remove start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// Remove links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// Remove WP version
	remove_action( 'wp_head', 'wp_generator' );
} /* end Joints head cleanup */

// Remove injected CSS for recent comments widget
function ksaslab_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// Remove injected CSS from recent comments widget
function ksaslab_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
}

// Remove injected CSS from gallery
function ksaslab_gallery_style( $css ) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

// This removes the annoying […] to a Read More link
function ksaslab_excerpt_more( $more ) {
	global $post;
	// edit here if you like
	return '<a class="excerpt-read-more" href="' . get_permalink( $post->ID ) . '" title="' . __( 'Read', 'ksaslab' ) . get_the_title( $post->ID ) . '">' . __( '... Read more &raquo;', 'ksaslab' ) . '</a>';
}

// Stop WordPress from using the sticky class (which conflicts with Foundation), and style WordPress sticky posts using the .wp-sticky class instead
function remove_sticky_class( $classes ) {
	if ( in_array( 'sticky', $classes ) ) {
		$classes   = array_diff( $classes, array( 'sticky' ) );
		$classes[] = 'wp-sticky';
	}

	return $classes;
}
add_filter( 'post_class', 'remove_sticky_class' );

// This is a modified the_author_posts_link() which just returns the link. This is necessary to allow usage of the usual l10n process with printf()
function ksaslab_get_the_author_posts_link() {
	global $authordata;
	if ( ! is_object( $authordata ) ) {
		return false;
	}
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s', 'ksaslab' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}
function my_gallery_default_type_set_link( $settings ) {
	$settings['galleryDefaults']['link'] = 'file';
	return $settings;
}
add_filter( 'media_view_settings', 'my_gallery_default_type_set_link' );

// function remove_jquery_migrate( &$scripts) {
	// if(!is_admin()) {
		// $scripts->remove('jquery');
		// $scripts->add('jquery', false, array( 'jquery-core' ), '1.12.4');
	// }
// }
// add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

/*
function ksas_upgrade_jquery() {
	if ( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', '3.4.1', false);
		wp_enqueue_script('jquery');
	}
}
add_action( 'wp_enqueue_scripts', 'ksas_upgrade_jquery' );*/

// Remove plugin CSS on specific page types
function dequeue_css() {
	if ( is_home() || is_front_page() ) {
		wp_dequeue_style( 'tablepress-default' );
		wp_dequeue_style( 'tablepress-responsive-tables' );
		wp_dequeue_style( 'fancybox' );
	}
	if ( is_singular( array( 'people', 'profile', 'testimonial', 'bulletinboard', 'ksasexhibits' ) ) ) {
		wp_dequeue_style( 'tablepress-default' );
		wp_dequeue_style( 'tablepress-responsive-tables' );
		wp_dequeue_style( 'fancybox' );
	}
	if ( is_page_template( array( 'template-people-directory' ) ) ) {
		wp_dequeue_style( 'fancybox' );
	}
	if ( is_page( 'people' ) ) {
		wp_dequeue_style( 'tablepress-default' );
		wp_dequeue_style( 'tablepress-responsive-tables' );
		wp_dequeue_style( 'fancybox' );
	}
}
add_action( 'wp_print_styles', 'dequeue_css', 100 );

// Remove inline width and height attributes for post thumbnails & image insert
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
	return $html;
}
