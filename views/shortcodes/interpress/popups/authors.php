<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<?php
		$args = array( 'fields' => array('ID', 'user_nicename'), 'who' => 'author');
		$users = get_users($args);
		$users_array = array('all' => __('Show all Authors', TMM_CC_TEXTDOMAIN));
		foreach ($users as $user) {
			$user = get_userdata($user->ID);
			$users_array[$user->ID] = $user->display_name;
		}
	?>
	<div class="one-half">
	<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Author', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'userid',
			'id' => 'user_id',
			'options' => $users_array,
			'default_value' => TMM_Content_Composer::set_default_value('userid', ''),
			'description' => __('', TMM_CC_TEXTDOMAIN)
		));
	?>
	</div>

	<div class="one-half option-author">
	<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts Per Page', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'posts_per_page',
			'id' => 'posts_per_page',
			'default_value' => TMM_Content_Composer::set_default_value('posts_per_page', '4'),
			'description' => __('Leave field empty for displaying all posts', TMM_CC_TEXTDOMAIN)
		));
	?>
	</div>

	<div class="one-half option-author">
	<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Pagination', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'pagination',
			'id' => '',
			'options' => array(
				'no' => __('No', TMM_CC_TEXTDOMAIN),
				'yes' => __('Yes', TMM_CC_TEXTDOMAIN)
			),
			'default_value' => TMM_Content_Composer::set_default_value('pagination', 'no'),
			'description' => __('Enable Pagination', TMM_CC_TEXTDOMAIN)
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
			type = jQuery('#user_id'),
			typeVal = type.val();

		switchAuthorType(typeVal);

		type.on('change', function(){
			var val = jQuery(this).val();
			switchAuthorType(val);
		});

		function switchAuthorType(val){
			switch(val){
				case 'all':
					option_author.slideUp();
					break;
				default:
					option_author.slideDown();
					break;
			}
		}
	});
</script>