<?php
// SIDEBARS AND WIDGETIZED AREAS
function ksaslab_register_sidebars() {
	register_sidebar(
        array(
			'id' => 'offcanvas',
			'name' => __('Offcanvas', 'ksaslab'),
			'description' => __('The offcanvas sidebar.', 'ksaslab'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		)
        );

	register_sidebar(
        array(
			'id' => 'homepage1',
			'name' => __('Homepage Left', 'ksaslab'),
			'description' => __('The left column on the homepage.', 'ksaslab'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		)
        );

	register_sidebar(
        array(
			'id' => 'homepage2',
			'name' => __('Homepage Right', 'ksaslab'),
			'description' => __('The right column on the homepage.', 'ksaslab'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		)
        );

	register_sidebar(
         array(
			 'name' => 'Sidebar 1',
			 'id' => 'sidebar-1',
			 'description' => __('Sidebar #1. Call this sidebar on each page you want it to appear', 'ksaslab'),
			 'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
			 'after_widget' => '</div>',
			 'before_title' => '<h4 class="widgettitle">',
			 'after_title' => '</h4>',
		 )
        );
    register_sidebar(
         array(
			 'name' => 'Sidebar 2',
			 'id' => 'sidebar-2',
			 'description' => __('Sidebar #2. Call this sidebar on each page you want it to appear', 'ksaslab'),
			 'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
			 'after_widget' => '</div>',
			 'before_title' => '<h4 class="widgettitle">',
			 'after_title' => '</h4>',
		 )
        );
    register_sidebar(
         array(
			 'name' => 'Sidebar 3',
			 'id' => 'sidebar-3',
			 'description' => __('Sidebar #3. Call this sidebar on each page you want it to appear', 'ksaslab'),
			 'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
			 'after_widget' => '</div>',
			 'before_title' => '<h4 class="widgettitle">',
			 'after_title' => '</h4>',
		 )
        );
    register_sidebar(
         array(
			 'name' => 'Sidebar 4',
			 'id' => 'sidebar-4',
			 'description' => __('Sidebar #4. Call this sidebar on each page you want it to appear', 'ksaslab'),
			 'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
			 'after_widget' => '</div>',
			 'before_title' => '<h4 class="widgettitle">',
			 'after_title' => '</h4>',
		 )
        );
    register_sidebar(
         array(
			 'name' => 'Sidebar 5',
			 'id' => 'sidebar-5',
			 'description' => __('Sidebar #5. Call this sidebar on each page you want it to appear', 'ksaslab'),
			 'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
			 'after_widget' => '</div>',
			 'before_title' => '<h4 class="widgettitle">',
			 'after_title' => '</h4>',
		 )
        );
    register_sidebar(
         array(
			 'name' => 'Sidebar 6',
			 'id' => 'sidebar-6',
			 'description' => __('Sidebar #6. Call this sidebar on each page you want it to appear', 'ksaslab'),
			 'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
			 'after_widget' => '</div>',
			 'before_title' => '<h4 class="widgettitle">',
			 'after_title' => '</h4>',
		 )
        );
    register_sidebar(
         array(
			 'name' => 'Sidebar 7',
			 'id' => 'sidebar-7',
			 'description' => __('Sidebar #7. Call this sidebar on each page you want it to appear', 'ksaslab'),
			 'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
			 'after_widget' => '</div>',
			 'before_title' => '<h4 class="widgettitle">',
			 'after_title' => '</h4>',
		 )
        );

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'ksaslab'),
		'description' => __('The second (secondary) sidebar.', 'ksaslab'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} /* end register sidebars */

add_action( 'widgets_init', 'ksaslab_register_sidebars' );