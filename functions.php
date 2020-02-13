<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php');
require_once(get_template_directory().'/functions/theme-options.php');
require_once(get_template_directory().'/functions/theme-options-init.php');
require_once(get_template_directory().'/functions/page-metabox.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// FontAwesome alt tags to links for WCAG
require_once(get_template_directory().'/functions/fontawesome.php');

// Breadcrumbs
require_once(get_template_directory().'/functions/breadcrumbs.php');

// Custom Open Graph tags
 require_once(get_template_directory().'/functions/open-graph.php');

/** Gutenberg editor support */
 require_once(get_template_directory().'/functions/gutenberg.php' );

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
 require_once(get_template_directory().'/functions/admin.php');
