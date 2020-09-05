<?php

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'gt_';
 
$meta_box_portfolio = array(
	'id' => 'gt-meta-box-portfolio',
	'title' =>  __('Portfolio Detail Settings', 'reboot'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
    	array(
			'name' =>  __('Portfolio Type', 'reboot'),
			'desc' => __('Choose the type of portfolio you wish to display.', 'reboot'),
			'id' => $prefix . 'portfolio_type',
			"type" => "select",
			'std' => 'Image',
			'options' => array('Image', 'Slideshow', 'Video')
		),
		array(
    	   'name' => __('Client Name', 'reboot'),
    	   'desc' => __('Client who this project was completed for', 'reboot'),
    	   'id' => $prefix . 'client_name',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
    	   'name' => __('Project Date', 'reboot'),
    	   'desc' => __('What was the date of the completed project', 'reboot'),
    	   'id' => $prefix . 'project_date',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
    	   'name' => __('Project Role', 'reboot'),
    	   'desc' => __('Your role on this project (eg; designer/developer)', 'reboot'),
    	   'id' => $prefix . 'project_role',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
    	   'name' => __('Project URL', 'reboot'),
    	   'desc' => __('What is the URL for this project', 'reboot'),
    	   'id' => $prefix . 'project_url',
    	   'type' => 'text',
    	   'std' => ''
    	)
	)
);

$meta_box_portfolio_portfolio_image = array(
	'id' => 'gt-meta-box-portfolio-image',
	'title' => __('Image Settings', 'reboot'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => '',
				"desc" => '',
				"id" => $prefix . "portfolio_upload_images",
				"type" => 'button',
				'std' => 'Upload Images'
			)
    )
);

$meta_box_portfolio_portfolio_video = array(
	'id' => 'gt-meta-box-portfolio-video',
	'title' => __('Video Settings', 'reboot'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Video Embed Code', 'reboot'),
			'desc' => __('If you are using video from somewhere like YouTube, Vimeo etc... Please paste the embed code here. Width should be at least 780px with any height.<br><br>', 'reboot'),
			'id' => $prefix . 'portfolio_embed_code',
			'type' => 'textarea',
			'std' => ''
		)
	),
	
);

add_action('admin_menu', 'gt_add_box_portfolio');


/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function gt_add_box_portfolio() {
	global $meta_box_portfolio, $meta_box_portfolio_portfolio_image, $meta_box_portfolio_portfolio_video;
	
	add_meta_box($meta_box_portfolio['id'], $meta_box_portfolio['title'], 'gt_show_box_portfolio', $meta_box_portfolio['page'], $meta_box_portfolio['context'], $meta_box_portfolio['priority']);

	add_meta_box($meta_box_portfolio_portfolio_image['id'], $meta_box_portfolio_portfolio_image['title'], 'gt_show_box_portfolio_image', $meta_box_portfolio_portfolio_image['page'], $meta_box_portfolio_portfolio_image['context'], $meta_box_portfolio_portfolio_image['priority']);

	add_meta_box($meta_box_portfolio_portfolio_video['id'], $meta_box_portfolio_portfolio_video['title'], 'gt_show_box_portfolio_video', $meta_box_portfolio_portfolio_video['page'], $meta_box_portfolio_portfolio_video['context'], $meta_box_portfolio_portfolio_video['priority']);

}


/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function gt_show_box_portfolio() {
	global $meta_box_portfolio, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Select your preferred Portfolio Type and fill out the additional information fields.', 'reboot').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="gt_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select id="' . $field['id'] . '" name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
		}

	}
 
	echo '</table>';
}

function gt_show_box_portfolio_image() {
	global $meta_box_portfolio_portfolio_image, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Upload images to be used for this portfolio item (images should be at least 780px wide).<br />Set a Featured Image (to the box on the right) that will be displayed on the main portfolio page, and homepage. Then upload the main images to be used in your showcase using the Upload button below.', 'reboot').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="gt_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio_portfolio_image['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			//If Button	
			case 'button':
					echo '<tr><td><input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
		}

	}
 
	echo '</table>';
}

function gt_show_box_portfolio_video() {
	global $meta_box_portfolio_portfolio_video, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('This setting enables you to embed videos into your portfolio pages.', 'reboot').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="gt_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_portfolio_portfolio_video['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If textarea		
			case 'textarea':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea>';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
		}

	}
 
	echo '</table>';
}
 
add_action('save_post', 'gt_save_data_portfolio');


/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function gt_save_data_portfolio($post_id) {
	global $meta_box_portfolio, $meta_box_portfolio_portfolio_video, $meta_box_portfolio_portfolio_image;
 
	// verify nonce
	if (!wp_verify_nonce($_POST['gt_meta_box_nonce'], basename(__FILE__))) {
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
 
	foreach ($meta_box_portfolio['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

	foreach ($meta_box_portfolio_portfolio_image['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($meta_box_portfolio_portfolio_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

}

/*-----------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------*/
 
function gt_admin_scripts_portfolio() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('gt-upload', get_template_directory_uri() . '/functions/js/upload-button.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('gt-upload');
}
function gt_admin_styles_portfolio() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'gt_admin_scripts_portfolio');
add_action('admin_print_styles', 'gt_admin_styles_portfolio');