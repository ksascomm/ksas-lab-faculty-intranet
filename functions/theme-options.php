<?php
/**
 * Define our settings sections
 *
 * array key=$id, array value=$title in: add_settings_section( $id, $title, $callback, $page );
 *
 * @return array
 */
function flagship_sub_options_page_sections() {

	$sections = array();
	// $sections[$id] 				= __($title, 'flagship_sub_textdomain');
	$sections['homepage_section']   = __('Homepage Options', 'flagship_sub_textdomain');
	$sections['select_section']     = __('Content Options', 'flagship_sub_textdomain');
	$sections['footer_section']     = __('Footer Options', 'flagship_sub_textdomain');
	$sections['technical_section']  = __('Technical Options', 'flagship_sub_textdomain');
	return $sections;
}

/**
 * Define our form fields (settings)
 *
 * @return array
 */
function flagship_sub_options_page_fields() {
	// Text Form Fields section
	// Select Form Fields section
	$options[0] =
	array(
		'section' => 'homepage_section',
		'id'      => FLAGSHIP_SUB_SHORTNAME . '_feed_name',
		'title'   => __( 'Homepage Sub-head', 'flagship_sub_textdomain' ),
		'desc'    => __( 'Enter the headline for the news feed on the homepage', 'flagship_sub_textdomain' ),
		'type'    => 'text',
		'class'   => 'nohtml',
		'std'    => '',
	);
	$options[1] =
	array(
		'section' => 'homepage_section',
		'id'      => FLAGSHIP_SUB_SHORTNAME . '_news_quantity',
		'title'   => __( 'Homepage Posts', 'flagship_sub_textdomain' ),
		'desc'    => __( 'Enter the number of posts you would like displayed on the homepage', 'flagship_sub_textdomain' ),
		'type'    => 'text',
		'class'   => 'numeric',
		'std'    => '',
	);
	$options[6] =
	array(
		'section' => 'technical_section',
		'id'      => FLAGSHIP_SUB_SHORTNAME . '_google_analytics',
		'title'   => __( 'Google Analytics ID', 'flagship_sub_textdomain' ),
		'desc'    => __( 'Enter your Google Analytics ID ie. UA-2497774-9', 'flagship_sub_textdomain' ),
		'type'    => 'text',
		'class'   => 'nohtml',
		'std'     => 'UA-100553583-1',
	);
	$options[11] =
	array(
		'section' => 'footer_section',
		'id'      => FLAGSHIP_SUB_SHORTNAME . '_copyright',
		'title'   => __( 'Department Address', 'flagship_sub_textdomain' ),
		'desc'    => __( 'Enter the department address', 'flagship_sub_textdomain' ),
		'type'    => 'textarea',
		'std'    => 'Zanvyl Krieger School of Arts & Sciences',
	);
	$options[16] =
	array(
		'section' => 'select_section',
		'id'      => FLAGSHIP_SUB_SHORTNAME . '_color_scheme',
		'title'   => __( 'Color Scheme', 'flagship_sub_textdomain' ),
		'desc'    => __( 'Choose your theme color scheme: Heritage or Spirit blue', 'flagship_sub_textdomain' ),
		'type'    => 'select',
		'choices' => array('heritage', 'spirit'),
		'std'    => 'heritage',
	);
	return $options;

}


