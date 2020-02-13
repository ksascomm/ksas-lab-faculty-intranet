<?php
if ( ! function_exists( 'foundationpress_gutenberg_support' ) ) :
	function foundationpress_gutenberg_support() {
    // Add foundation color palette to the editor
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'Heritage Blue', 'ksasacademic' ),
            'slug' => 'heritage',
            'color' => '#002d72',
        ),
        array(
            'name' => __( 'Spirit Blue', 'ksasacademic' ),
            'slug' => 'spirit',
            'color' => '#68ace5',
        ),
        array(
            'name' => __( 'Black', 'ksasacademic' ),
            'slug' => 'black',
            'color' => '#31261d',
        ),
        array(
            'name' => __( 'White', 'ksasacademic' ),
            'slug' => 'white',
            'color' => '#fefefe',
        ),
    ) );
	}
	add_action( 'after_setup_theme', 'foundationpress_gutenberg_support' );

	// Disable custom colors
	add_theme_support( 'disable-custom-colors' );

	// Set normal font size
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'Normal', 'ksasacademic' ),
			'shortName' => __( 'N', 'ksasacademic' ),
			'size' => 16,
			'slug' => 'normal'
		),
	) );

	// Disable custom font sizing
	add_theme_support( 'disable-custom-font-sizes' );

    // Enable widge alignments
    add_theme_support( 'align-wide' );

endif;

/**
 * Gutenberg scripts and styles
 * @link https://www.billerickson.net/block-styles-in-gutenberg/
 */
function custom_gutenberg_scripts() {

    wp_enqueue_script(
        'custom-editor', 
        get_stylesheet_directory_uri() . '/gutenberg-editor/editor.js', 
        array( 'wp-blocks', 'wp-dom' ), 
        filemtime( get_stylesheet_directory() . '/gutenberg-editor/editor.js' ),
        true
    );
}
add_action( 'enqueue_block_editor_assets', 'custom_gutenberg_scripts' );

add_action( 'after_setup_theme', 'custom_gutenberg_css' );
 
function custom_gutenberg_css(){
 
    add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
    add_editor_style( 'gutenberg-editor/editor-style.css' ); // tries to include editor-style.css directly from your theme folder
 
}