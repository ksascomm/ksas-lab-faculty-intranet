<?php
/**
 * Define Constants
 */
define('FLAGSHIP_SUB_SHORTNAME', 'flagship_sub'); // used to prefix the individual setting field id see flagship_sub_options_page_fields()
define('FLAGSHIP_SUB_PAGE_BASENAME', 'flagship_sub-settings'); // the settings page slug

/**
 * Specify Hooks/Filters
 */
add_action( 'admin_menu', 'flagship_sub_add_menu' );
add_action( 'admin_init', 'flagship_sub_register_settings' );


/**
 * Include the required files
 */
// page settings sections & fields as well as the contextual help text.
require_once('theme-options.php');
function flagship_sub_get_settings_page_cap() {
	return 'edit_theme_options';
}
// Hook into option_page_capability_{option_page}
add_filter( 'option_page_capability_flagship_sub_options', 'flagship_sub_get_settings_page_cap' );


/**
 * Helper function for defining variables for the current page
 *
 * @return array
 */
function flagship_sub_get_settings() {
	
	$output = array();
	
	// put together the output array 
	$output['flagship_sub_option_name'] 		= 'flagship_sub_options'; // the option name as used in the get_option() call.
	$output['flagship_sub_page_title'] 		= __( 'Theme Options','flagship_sub_textdomain'); // the settings page title
	$output['flagship_sub_page_sections'] 	= flagship_sub_options_page_sections(); // the setting section
	$output['flagship_sub_page_fields'] 		= flagship_sub_options_page_fields(); // the setting fields
	
return $output;
}

/**
 * Helper function for registering our form field settings
 *
 * src: http://alisothegeek.com/2011/01/wordpress-settings-api-tutorial-1/
 * @param (array) $args The array of arguments to be used in creating the field
 * @return function call
 */
function flagship_sub_create_settings_field( $args = array() ) {
	// default array to overwrite when calling the function
	$defaults = array(
		'id'      => 'default_field', 					// the ID of the setting in our options array, and the ID of the HTML form element
		'title'   => 'Default Field', 					// the label for the HTML form element
		'desc'    => 'This is a default description.', 	// the description displayed under the HTML form element
		'std'     => '', 								// the default value for this setting
		'type'    => 'text', 							// the HTML form element to use
		'section' => 'main_section', 					// the section this setting belongs to � must match the array key of a section in flagship_sub_options_page_sections()
		'choices' => array(), 							// (optional): the values in radio buttons or a drop-down menu
		'class'   => '' 								// the HTML form element class. Is used for validation purposes and may be also use for styling if needed.
	);
	
	// "extract" to be able to use the array keys as variables in our function output below
	extract( wp_parse_args( $args, $defaults ) );
	
	// additional arguments for use in form field output in the function flagship_sub_form_field_fn!
	$field_args = array(
		'type'      => $type,
		'id'        => $id,
		'desc'      => $desc,
		'std'       => $std,
		'choices'   => $choices,
		'label_for' => $id,
		'class'     => $class
	);

	add_settings_field( $id, $title, 'flagship_sub_form_field_fn', __FILE__, $section, $field_args );

}

/**
 * Register our setting, settings sections and settings fields
 */
function flagship_sub_register_settings(){
	
	// get the settings sections array
	$settings_output 	= flagship_sub_get_settings();
	$flagship_sub_option_name = $settings_output['flagship_sub_option_name'];
	
	//setting
	register_setting($flagship_sub_option_name, $flagship_sub_option_name, 'flagship_sub_validate_options' );
	
	//sections
	if(!empty($settings_output['flagship_sub_page_sections'])){
		// call the "add_settings_section" for each!
		foreach ( $settings_output['flagship_sub_page_sections'] as $id => $title ) {
			add_settings_section( $id, $title, 'flagship_sub_section_fn', __FILE__);
		}
	}
		
	//fields
	if(!empty($settings_output['flagship_sub_page_fields'])){
		// call the "add_settings_field" for each!
		foreach ($settings_output['flagship_sub_page_fields'] as $option) {
			flagship_sub_create_settings_field($option);
		}
	}
}


/**
 * The Admin menu page
 */
function flagship_sub_add_menu(){

	$settings_output 		= flagship_sub_get_settings();
	
	// Display Settings Page link under the "Appearance" Admin Menu
	// add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);
	$flagship_sub_settings_page = add_theme_page(__('Theme Options'), __('Theme Options','flagship_sub_textdomain'), 'edit_theme_options', FLAGSHIP_SUB_PAGE_BASENAME, 'flagship_sub_settings_page_fn');
		// contextual help
		// css & js
/* 		add_action( 'load-'. $flagship_sub_settings_page, 'flagship_sub_settings_scripts' );	 */
}

// ************************************************************************************************************

// Callback functions

/**
 * Section HTML, displayed before the first option
 * @return echoes output
 */
function  flagship_sub_section_fn($desc) {
	echo "<p>" . __('Settings for this section','flagship_sub_textdomain') . "</p>";
}

/*
 * Form Fields HTML
 * All form field types share the same function!!
 * @return echoes output
 */
function flagship_sub_form_field_fn($args = array()) {
	
	extract( $args );
	
	// get the settings sections array
	$settings_output 	= flagship_sub_get_settings();
	
	$flagship_sub_option_name = $settings_output['flagship_sub_option_name'];
	$options 			= get_option($flagship_sub_option_name);
	
	// pass the standard value if the option is not yet set in the database
	if ( !isset( $options[$id] ) && 'type' != 'checkbox' ) {
		$options[$id] = $std;
	}
	
	// additional field class. output only if the class is defined in the create_setting arguments
	$field_class = ($class != '') ? ' ' . $class : '';
	
	// switch html display based on the setting type.	
	switch ( $type ) {
		case 'text':
			$options[$id] = stripslashes($options[$id]);
			$options[$id] = esc_attr( $options[$id]);
			echo "<input class='regular-text$field_class' type='text' id='$id' name='" . $flagship_sub_option_name . "[$id]' value='$options[$id]' />";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
		break;
		
		case "multi-text":
			foreach($choices as $item) {
				$item = explode("|",$item); // cat_name|cat_slug
				$item[0] = esc_html__($item[0], 'flagship_sub_textdomain');
				if (!empty($options[$id])) {
					foreach ($options[$id] as $option_key => $option_val){
						if ($item[1] == $option_key) {
							$value = $option_val;
						}
					}
				} else {
					$value = '';
				}
				echo "<span>$item[0]:</span> <input class='$field_class' type='text' id='$id|$item[1]' name='" . $flagship_sub_option_name . "[$id|$item[1]]' value='$value' /><br/>";
			}
			echo ($desc != '') ? "<span class='description'>$desc</span>" : "";
		break;
		
		case 'textarea':
			$options[$id] = stripslashes($options[$id]);
			$options[$id] = esc_html( $options[$id]);
			echo "<textarea class='textarea$field_class' type='text' id='$id' name='" . $flagship_sub_option_name . "[$id]' rows='5' cols='30'>$options[$id]</textarea>";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : ""; 		
		break;
		
		case 'select':
			echo "<select id='$id' class='select$field_class' name='" . $flagship_sub_option_name . "[$id]'>";
				foreach($choices as $item) {
					$value 	= esc_attr($item, 'flagship_sub_textdomain');
					$item 	= esc_html($item, 'flagship_sub_textdomain');
					
					$selected = ($options[$id]==$value) ? 'selected="selected"' : '';
					echo "<option value='$value' $selected>$item</option>";
				}
			echo "</select>";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : ""; 
		break;
		
		case 'select2':
			echo "<select id='$id' class='select$field_class' name='" . $flagship_sub_option_name . "[$id]'>";
			foreach($choices as $item) {
				
				$item = explode("|",$item);
				$item[0] = esc_html($item[0], 'flagship_sub_textdomain');
				
				$selected = ($options[$id]==$item[1]) ? 'selected="selected"' : '';
				echo "<option value='$item[1]' $selected>$item[0]</option>";
			}
			echo "</select>";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
		break;
		
		case 'checkbox':
			echo "<input class='checkbox$field_class' type='checkbox' id='$id' name='" . $flagship_sub_option_name . "[$id]' value='1' " . checked( $options[$id], 1, false ) . " />";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
		break;
		
		case "multi-checkbox":
			foreach($choices as $item) {
				
				$item = explode("|",$item);
				$item[0] = esc_html($item[0], 'flagship_sub_textdomain');
				
				$checked = '';
				
			    if ( isset($options[$id][$item[1]]) ) {
					if ( $options[$id][$item[1]] == 'true') {
			   			$checked = 'checked="checked"';
					}
				}
				
				echo "<input class='checkbox$field_class' type='checkbox' id='$id|$item[1]' name='" . $flagship_sub_option_name . "[$id|$item[1]]' value='1' $checked /> $item[0] <br/>";
			}
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
		break;
	}
}

/**
 * Admin Settings Page HTML
 * 
 * @return echoes output
 */
function flagship_sub_settings_page_fn() {
	// get the settings sections array
	$settings_output = flagship_sub_get_settings();
?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"></div>
		<h2><?php echo $settings_output['flagship_sub_page_title']; ?></h2>
		
		<form action="options.php" method="post">
			<?php 
			// http://codex.wordpress.org/Function_Reference/settings_fields
			settings_fields($settings_output['flagship_sub_option_name']); 
			// http://codex.wordpress.org/Function_Reference/do_settings_sections
			do_settings_sections(__FILE__); 
			submit_button();
			?>
			
			
		</form>
	</div><!-- wrap -->
<?php }

/**
 * Validate input
 * 
 * @return array
 */
function flagship_sub_validate_options($input) {
	
	// for enhanced security, create a new empty array
	$valid_input = array();
	
	// collect only the values we expect and fill the new $valid_input array i.e. whitelist our option IDs
	
		// get the settings sections array
		$settings_output = flagship_sub_get_settings();
		
		$options = $settings_output['flagship_sub_page_fields'];
		
		// run a foreach and switch on option type
		foreach ($options as $option) {
		
			switch ( $option['type'] ) {
				case 'text':
					//switch validation based on the class!
					switch ( $option['class'] ) {
						//for numeric 
						case 'numeric':
							//accept the input only when numeric!
							$input[$option['id']] 		= trim($input[$option['id']]); // trim whitespace
							$valid_input[$option['id']] = (is_numeric($input[$option['id']])) ? $input[$option['id']] : 'Expecting a Numeric value!';
							
							// register error
							if(is_numeric($input[$option['id']]) == FALSE) {
								add_settings_error(
									$option['id'], // setting title
									FLAGSHIP_SUB_SHORTNAME . '_txt_numeric_error', // error ID
									__('Expecting a Numeric value! Please fix.','flagship_sub_textdomain'), // error message
									'error' // type of message
								);
							}
						break;
						
						//for multi-numeric values (separated by a comma)
						case 'multinumeric':
							//accept the input only when the numeric values are comma separated
							$input[$option['id']] 		= trim($input[$option['id']]); // trim whitespace
							
							if($input[$option['id']] !=''){
								// /^-?\d+(?:,\s?-?\d+)*$/ matches: -1 | 1 | -12,-23 | 12,23 | -123, -234 | 123, 234  | etc.
								$valid_input[$option['id']] = (preg_match('/^-?\d+(?:,\s?-?\d+)*$/', $input[$option['id']]) == 1) ? $input[$option['id']] : __('Expecting comma separated numeric values','flagship_sub_textdomain');
							}else{
								$valid_input[$option['id']] = $input[$option['id']];
							}
							
							// register error
							if($input[$option['id']] !='' && preg_match('/^-?\d+(?:,\s?-?\d+)*$/', $input[$option['id']]) != 1) {
								add_settings_error(
									$option['id'], // setting title
									FLAGSHIP_SUB_SHORTNAME . '_txt_multinumeric_error', // error ID
									__('Expecting comma separated numeric values! Please fix.','flagship_sub_textdomain'), // error message
									'error' // type of message
								);
							}
						break;
						
						//for no html
						case 'nohtml':
							//accept the input only after stripping out all html, extra white space etc!
							$input[$option['id']] 		= sanitize_text_field($input[$option['id']]); // need to add slashes still before sending to the database
							$valid_input[$option['id']] = addslashes($input[$option['id']]);
						break;
						
						//for url
						case 'url':
							//accept the input only when the url has been sanited for database usage with esc_url_raw()
							$input[$option['id']] 		= trim($input[$option['id']]); // trim whitespace
							$valid_input[$option['id']] = esc_url_raw($input[$option['id']]);
						break;
						
						//for email
						case 'email':
							//accept the input only after the email has been validated
							$input[$option['id']] 		= trim($input[$option['id']]); // trim whitespace
							if($input[$option['id']] != ''){
								$valid_input[$option['id']] = (is_email($input[$option['id']])!== FALSE) ? $input[$option['id']] : __('Invalid email! Please re-enter!','flagship_sub_textdomain');
							}elseif($input[$option['id']] == ''){
								$valid_input[$option['id']] = __('This setting field cannot be empty! Please enter a valid email address.','flagship_sub_textdomain');
							}
							
							// register error
							if(is_email($input[$option['id']])== FALSE || $input[$option['id']] == '') {
								add_settings_error(
									$option['id'], // setting title
									FLAGSHIP_SUB_SHORTNAME . '_txt_email_error', // error ID
									__('Please enter a valid email address.','flagship_sub_textdomain'), // error message
									'error' // type of message
								);
							}
						break;
						
						// a "cover-all" fall-back when the class argument is not set
						default:
							// accept only a few inline html elements
							$allowed_html = array(
								'a' => array('href' => array (),'title' => array ()),
								'b' => array(),
								'em' => array (), 
								'i' => array (),
								'strong' => array(),
								'br' => array()
							);
							
							$input[$option['id']] 		= trim($input[$option['id']]); // trim whitespace
							$input[$option['id']] 		= force_balance_tags($input[$option['id']]); // find incorrectly nested or missing closing tags and fix markup
							$input[$option['id']] 		= wp_kses( $input[$option['id']], $allowed_html); // need to add slashes still before sending to the database
							$valid_input[$option['id']] = addslashes($input[$option['id']]); 
						break;
					}
				break;
				
				case "multi-text":
					// this will hold the text values as an array of 'key' => 'value'
					unset($textarray);
					
					$text_values = array();
					foreach ($option['choices'] as $k => $v ) {
						// explode the connective
						$pieces = explode("|", $v);
						
						$text_values[] = $pieces[1];
					}
					
					foreach ($text_values as $v ) {		
						
						// Check that the option isn't empty
						if (!empty($input[$option['id'] . '|' . $v])) {
							// If it's not null, make sure it's sanitized, add it to an array
							switch ($option['class']) {
								// different sanitation actions based on the class create you own cases as you need them
								
								//for numeric input
								case 'numeric':
									//accept the input only if is numberic!
									$input[$option['id'] . '|' . $v]= trim($input[$option['id'] . '|' . $v]); // trim whitespace
									$input[$option['id'] . '|' . $v]= (is_numeric($input[$option['id'] . '|' . $v])) ? $input[$option['id'] . '|' . $v] : '';
								break;
								
								// a "cover-all" fall-back when the class argument is not set
								default:
									// strip all html tags and white-space.
									$input[$option['id'] . '|' . $v]= sanitize_text_field($input[$option['id'] . '|' . $v]); // need to add slashes still before sending to the database
									$input[$option['id'] . '|' . $v]= addslashes($input[$option['id'] . '|' . $v]);
								break;
							}
							// pass the sanitized user input to our $textarray array
							$textarray[$v] = $input[$option['id'] . '|' . $v];
						
						} else {
							$textarray[$v] = '';
						}
					}
					// pass the non-empty $textarray to our $valid_input array
					if (!empty($textarray)) {
						$valid_input[$option['id']] = $textarray;
					}
				break;
				
				case 'textarea':
					//switch validation based on the class!
					switch ( $option['class'] ) {
						//for only inline html
						case 'inlinehtml':
							// accept only inline html
							$input[$option['id']] 		= trim($input[$option['id']]); // trim whitespace
							$input[$option['id']] 		= force_balance_tags($input[$option['id']]); // find incorrectly nested or missing closing tags and fix markup
							$input[$option['id']] 		= addslashes($input[$option['id']]); //wp_filter_kses expects content to be escaped!
							$valid_input[$option['id']] = wp_filter_kses($input[$option['id']]); //calls stripslashes then addslashes
						break;
						
						//for no html
						case 'nohtml':
							//accept the input only after stripping out all html, extra white space etc!
							$input[$option['id']] 		= sanitize_text_field($input[$option['id']]); // need to add slashes still before sending to the database
							$valid_input[$option['id']] = addslashes($input[$option['id']]);
						break;
						
						//for allowlinebreaks
						case 'allowlinebreaks':
							//accept the input only after stripping out all html, extra white space etc!
							$input[$option['id']] 		= wp_strip_all_tags($input[$option['id']]); // need to add slashes still before sending to the database
							$valid_input[$option['id']] = addslashes($input[$option['id']]);
						break;
						
						// a "cover-all" fall-back when the class argument is not set
						default:
							// accept only limited html
							//my allowed html
							$allowed_html = array(
								'a' 			=> array('href' => array (),'title' => array ()),
								'b' 			=> array(),
								'blockquote' 	=> array('cite' => array ()),
								'br' 			=> array(),
								'dd' 			=> array(),
								'dl' 			=> array(),
								'dt' 			=> array(),
								'em' 			=> array (), 
								'i' 			=> array (),
								'li' 			=> array(),
								'ol' 			=> array(),
								'p' 			=> array(),
								'q' 			=> array('cite' => array ()),
								'strong' 		=> array(),
								'ul' 			=> array(),
								'h1' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
								'h2' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
								'h3' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
								'h4' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
								'h5' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
								'h6' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ())
							);
							
							$input[$option['id']] 		= trim($input[$option['id']]); // trim whitespace
							$input[$option['id']] 		= force_balance_tags($input[$option['id']]); // find incorrectly nested or missing closing tags and fix markup
							//$input[$option['id']] 		= wp_kses( $input[$option['id']], $allowed_html); // need to add slashes still before sending to the database
							$valid_input[$option['id']] = addslashes($input[$option['id']]);							
						break;
					}
				break;
				
				case 'select':
					// check to see if the selected value is in our approved array of values!
					$valid_input[$option['id']] = (in_array( $input[$option['id']], $option['choices']) ? $input[$option['id']] : '' );
				break;
				
				case 'select2':
					// process $select_values
						$select_values = array();
						foreach ($option['choices'] as $k => $v) {
							// explode the connective
							$pieces = explode("|", $v);
							
							$select_values[] = $pieces[1];
						}
					// check to see if selected value is in our approved array of values!
					$valid_input[$option['id']] = (in_array( $input[$option['id']], $select_values) ? $input[$option['id']] : '' );
				break;
				
				case 'checkbox':
					// if it's not set, default to null!
					if (!isset($input[$option['id']])) {
						$input[$option['id']] = null;
					}
					// Our checkbox value is either 0 or 1
					$valid_input[$option['id']] = ( $input[$option['id']] == 1 ? 1 : 0 );
				break;
				
				case 'multi-checkbox':
					unset($checkboxarray);
					$check_values = array();
					foreach ($option['choices'] as $k => $v ) {
						// explode the connective
						$pieces = explode("|", $v);
						
						$check_values[] = $pieces[1];
					}
					
					foreach ($check_values as $v ) {		
						
						// Check that the option isn't null
						if (!empty($input[$option['id'] . '|' . $v])) {
							// If it's not null, make sure it's true, add it to an array
							$checkboxarray[$v] = 'true';
						}
						else {
							$checkboxarray[$v] = 'false';
						}
					}
					// Take all the items that were checked, and set them as the main option
					if (!empty($checkboxarray)) {
						$valid_input[$option['id']] = $checkboxarray;
					}
				break;
				
			}
		}
return $valid_input; // return validated input
}

/**
 * Helper function for creating admin messages
 * src: http://www.wprecipes.com/how-to-show-an-urgent-message-in-the-wordpress-admin-area
 *
 * @param (string) $message The message to echo
 * @param (string) $msgclass The message class
 * @return echoes the message
 */
function flagship_sub_show_msg($message, $msgclass = 'info') {
	echo "<div id='message' class='$msgclass'>$message</div>";
}

?>