<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Choose slider', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'slider_type',
			'id' => 'tmm_cc_slider_type',
			'options' => array(0 => __('Car Posts', TMM_CC_TEXTDOMAIN)) + TMM_Ext_Sliders::get_list_of_groups(),
			'default_value' => TMM_Content_Composer::set_default_value('slider_type', 0),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Images count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'images_count',
			'id' => 'tmm_cc_images_count',
			'default_value' => TMM_Content_Composer::set_default_value('images_count', 5),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display sidebar (widgets defined in Cars Slider Sidebar)', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_sidebar',
			'id' => 'tmm_cc_show_sidebar',
			'is_checked' => TMM_Content_Composer::set_default_value('show_sidebar', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Slider sidebar position', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'sidebar_position',
			'id' => 'tmm_cc_sidebar_position',
			'options' => array(
				'right' => __('Right', TMM_CC_TEXTDOMAIN),
				'left' => __('Left', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('sidebar_position', 'right'),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display caption', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_caption',
			'id' => 'show_caption',
			'is_checked' => TMM_Content_Composer::set_default_value('show_caption', 1),
			'description' => ''
		));
		?>

	</div>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Animation type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'animation',
			'id' => 'animation',
			'options' => array(
				'fade' => __('Fade', TMM_CC_TEXTDOMAIN),
				'slide' => __('Slide', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('animation', 'fade'),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable animation loop', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'animation_loop',
			'id' => 'animation_loop',
			'is_checked' => TMM_Content_Composer::set_default_value('animation_loop', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable slideshow', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'slideshow',
			'id' => 'slideshow',
			'is_checked' => TMM_Content_Composer::set_default_value('slideshow', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Reverse the animation direction', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'reverse',
			'id' => 'reverse',
			'is_checked' => TMM_Content_Composer::set_default_value('reverse', 0),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Randomize slide order', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'randomize',
			'id' => 'randomize',
			'is_checked' => TMM_Content_Composer::set_default_value('randomize', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Slideshow speed', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'slideshow_speed',
			'id' => 'slideshow_speed',
			'default_value' => TMM_Content_Composer::set_default_value('slideshow_speed', 4000),
			'description' => __('Set the speed of the slideshow cycling, in milliseconds', TMM_CC_TEXTDOMAIN),
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Animation speed', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'animation_speed',
			'id' => 'animation_speed',
			'default_value' => TMM_Content_Composer::set_default_value('animation_speed', 800),
			'description' => __('Set the speed of animations, in milliseconds', TMM_CC_TEXTDOMAIN),
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Init delay', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'init_delay',
			'id' => 'init_delay',
			'default_value' => TMM_Content_Composer::set_default_value('init_delay', 0),
			'description' => __('Set an initialization delay, in milliseconds', TMM_CC_TEXTDOMAIN),
		));
		?>

	</div>

</div><!--/ .tmm_shortcode_template->

<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
	});
</script>

