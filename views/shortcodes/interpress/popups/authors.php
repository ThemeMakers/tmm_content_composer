<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<?php
		$args = array( 'fields' => array('ID', 'user_nicename'), 'who' => 'author');
		$users = get_users($args);
		$users_array = array('all' => __('Show all Authors', 'tmm_content_composer'));
		foreach ($users as $user) {
			$user = get_userdata($user->ID);
			$users_array[$user->ID] = $user->display_name;
		}
	?>
	<div class="one-half">
	<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Author', 'tmm_content_composer'),
			'shortcode_field' => 'userid',
			'id' => 'user_id',
			'options' => $users_array,
			'default_value' => TMM_Content_Composer::set_default_value('userid', ''),
			'description' => __('', 'tmm_content_composer')
		));
	?>
	</div>

	<div class="one-half option-author">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __("Display author's posts", 'tmm_content_composer'),
			'shortcode_field' => 'display_posts',
			'id' => 'display_posts',
			'is_checked' => TMM_Content_Composer::set_default_value('display_posts', 1),
			'description' => __("Display author's posts", 'tmm_content_composer')
		));
		?>

	</div>

	<div class="one-half option-posts">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Sort By', 'tmm_content_composer'),
			'shortcode_field' => 'orderby',
			'id' => 'orderby',
			'options' => array(
				'ID' => __('ID', 'tmm_content_composer'),
				'author' => __('Author', 'tmm_content_composer'),
				'title' => __('Title', 'tmm_content_composer'),
				'date' => __('Date', 'tmm_content_composer'),
				'modified' => __('Modified', 'tmm_content_composer'),
				'type' => __('Post Type', 'tmm_content_composer'),
				'comment_count' => __('Comment Count', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('orderby', ''),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-posts">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Sort', 'tmm_content_composer'),
			'shortcode_field' => 'order',
			'id' => 'order',
			'options' => array(
				'DESC' => __('DESC', 'tmm_content_composer'),
				'ASC' => __('ASC', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('order', 'DESC'),
			'description' => ''
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half option-posts">
	<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts Per Page', 'tmm_content_composer'),
			'shortcode_field' => 'posts_per_page',
			'id' => 'posts_per_page',
			'default_value' => TMM_Content_Composer::set_default_value('posts_per_page', '4'),
			'description' => __('Leave field empty for displaying all posts', 'tmm_content_composer')
		));
	?>
	</div>

	<div class="one-half option-posts">
	<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Pagination', 'tmm_content_composer'),
			'shortcode_field' => 'pagination',
			'id' => '',
			'options' => array(
				'no' => __('No', 'tmm_content_composer'),
				'yes' => __('Yes', 'tmm_content_composer')
			),
			'default_value' => TMM_Content_Composer::set_default_value('pagination', 'no'),
			'description' => __('Enable Pagination', 'tmm_content_composer')
		));
	?>
	</div>

</div>
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function($) {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		var option_author = jQuery('.option-author'),
			option_posts = jQuery('.option-posts'),
			type = jQuery('#user_id'),
			display_posts = jQuery('#display_posts'),
			dpVal = display_posts.val(),
			typeVal = type.val();

		switchPosts(dpVal);
		switchAuthorType(typeVal);

		display_posts.on('change', function(){
			var val = jQuery(this).val();
			switchPosts(val);
		});

		type.on('change', function(){
			var val = jQuery(this).val();
			switchAuthorType(val);
		});

		function switchPosts(val){
			if (val=='1'){
				option_posts.slideDown();
			}else{
				option_posts.slideUp();
			}
		}

		function switchAuthorType(val){
			switch(val){
				case 'all':
					option_author.slideUp();
					option_posts.slideUp();
					break;
				default:
					option_author.slideDown();
					if (jQuery('#display_posts').val() == '1'){
						option_posts.slideDown();
					}
					break;
			}
		}
	});
</script>