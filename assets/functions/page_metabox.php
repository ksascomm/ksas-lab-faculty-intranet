<?php

$page_sidebar_metabox = array( 
	'id' => 'page_sidebar_meta',
	'title' => 'Sidebar',
	'page' => array('page'),
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(

				array(
					'name' 			=> 'Sidebar Content',
					'desc' 			=> '<br> Choose which sidebar widget # you want to display (must be using Page with Sidebar template)',
					'id' 			=> 'ecpt_page_sidebar',
					'class' 		=> 'ecpt_page_sidebar',
					'type' 			=> 'select',
					'options' => array(	"",
										"homepage-sb",
										"sidebar-1",
										"sidebar-2",
										"sidebar-3",
										"sidebar-4",
										"sidebar-5",
										"sidebar-6",
										"sidebar-7",
										),
					'max' 			=> 0,
					'std'			=> ''				
				),
				

				
));			
			
add_action('admin_menu', 'ecpt_add_page_sidebar_meta_box');
function ecpt_add_page_sidebar_meta_box() {

	global $page_sidebar_metabox;		

	foreach($page_sidebar_metabox['page'] as $page) {
		add_meta_box($page_sidebar_metabox['id'], $page_sidebar_metabox['title'], 'ecpt_show_page_sidebar_box', $page, 'side', 'default', $page_sidebar_metabox);
	}
}

// function to show meta boxes
function ecpt_show_page_sidebar_box()	{
	global $post;
	global $page_sidebar_metabox;
	global $ecpt_prefix;
	global $wp_version;
	
	// Use nonce for verification
	echo '<input type="hidden" name="ecpt_page_sidebar_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<table class="form-table">';

	foreach ($page_sidebar_metabox['fields'] as $field) {
		// get current post meta data

		$meta = get_post_meta($post->ID, $field['id'], true);
		
		echo '<tr>',
				'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td class="ecpt_field_type_' . str_replace(' ', '_', $field['type']) . '">';
		switch ($field['type']) {
			case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option value="' . $option . '"', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				echo '</select>', '', stripslashes($field['desc']);
				break;
		}
		echo     '<td>',
			'</tr>';
	}
	
	echo '</table>';
}	

add_action('save_post', 'ecpt_page_sidebar_save');

// Save data from meta box
function ecpt_page_sidebar_save($post_id) {
	global $post;
	global $page_sidebar_metabox;
	
	// verify nonce
	if (!isset($_POST['ecpt_page_sidebar_meta_box_nonce']) || !wp_verify_nonce($_POST['ecpt_page_sidebar_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($page_sidebar_metabox['fields'] as $field) {
	
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			if($field['type'] == 'date') {
				$new = ecpt_format_date($new);
				update_post_meta($post_id, $field['id'], $new);
			} else {
				update_post_meta($post_id, $field['id'], $new);
				
				
			}
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
?>
