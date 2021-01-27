    <?php

    //Disable custom colors & font sizes. Allow align-wide.
    function ksas_disable_gutenberg_colour_settings() {
    // Disable custom colors
    add_theme_support( 'disable-custom-colors' );
    // Add foundation color palette to the editor
    add_theme_support( 'editor-color-palette' );

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

    }
    add_action( 'after_setup_theme', 'ksas_disable_gutenberg_colour_settings' );


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


    function custom_gutenberg_css(){
    // if you don't add this line, your stylesheet won't be added
    add_theme_support( 'editor-styles' ); 

    // tries to include editor-style.css directly from your theme folder
    add_editor_style( 'gutenberg-editor/editor-style.css' ); 
    }
    add_action( 'after_setup_theme', 'custom_gutenberg_css' );
