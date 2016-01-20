<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		
		<h4 class="label"><?php _e('Category', TMM_CC_TEXTDOMAIN); ?></h4>
		<?php
		wp_dropdown_categories(array(
			'hide_empty' => 0,
			'hierarchical' => true,
			'id' => 'posts_category',
			'class' => 'data-select',
			'selected' => TMM_Content_Composer::set_default_value('posts_category', ''),
		))
		?>
		
	</div><!--/ .on-half-->

	<div class="one-half">
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Posts count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'count',
			'id' => 'count',
			'options' => array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				5 => 5,
				6 => 6,
				7 => 7,
				8 => 8,
				9 => 9
			),
			'default_value' => TMM_Content_Composer::set_default_value('count', 3),
			'description' => ''
		));
		?>

	</div><!--/ .on-half-->

	<div class="one-half">
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show post metadata', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_post_metadata',
			'id' => 'show_post_metadata',
			'is_checked' => TMM_Content_Composer::set_default_value('show_post_metadata', 1),
			'description' => __('Show post metadata', TMM_CC_TEXTDOMAIN)
		));
		?>
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Animation', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'animation',
			'id' => '',
			'options' => TMM_Content_Composer::css_animation_array(),
			'default_value' => TMM_Content_Composer::set_default_value('animation', ''),
			'description' => 'Waypoints is a jQuery plugin that makes it easy to execute a function whenever you scroll to an element.'
		));
		?>	 
		

	</div><!--/ .ona-half-->

	<div class="one-half">
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Content Char Count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'char_count',
			'id' => 'char_count',
			'default_value' => TMM_Content_Composer::set_default_value('char_count', 140),
			'description' => '',
		));
		?>
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show "View All Posts" button', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_all_posts_button',
			'id' => 'show_all_posts_button',
			'is_checked' => TMM_Content_Composer::set_default_value('show_all_posts_button', 1),
			'description' => __('Option enables "View All Posts" button', TMM_CC_TEXTDOMAIN)
		));
		?>	

	</div><!--/ .on-half-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->


<script type="text/javascript">
	
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	
	jQuery(function () {
		jQuery("#posts_category").attr('data-shortcode-field', 'category');
		jQuery("#posts_category").addClass('js_shortcode_template_changer');

		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery("#posts_category").prepend('<option value="0" class="level--1"><?php _e('All categories', TMM_CC_TEXTDOMAIN); ?></option>');
		jQuery("#posts_category option:eq(0)").attr('selected', 'selected');
		tmm_ext_shortcodes.changer(shortcode_name);

	});
	
</script>
