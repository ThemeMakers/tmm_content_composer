<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		$all_posts = get_posts(array('numberposts' => -1));
		$post_select_array = array();
		foreach ($all_posts as $post) {
			$post_select_array[$post->ID] = $post->post_title;
		}
		//***
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Select Type', 'tmm_shortcodes'),
			'shortcode_field' => 'content',
			'id' => 'content',
			'options' => $post_select_array,
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

	</div><!--/ .on-half-->

	<div class="one-half">
		<?php
		$value_type = TMM_Content_Composer::set_default_value('show_content', 1);


		TMM_Content_Composer::html_option(array(
			'type' => 'radio',
			'title' => __('Content', 'tmm_shortcodes'),
			'shortcode_field' => 'show_content',
			'id' => 'show_content',
			'name' => 'show_content',
			'values' => array(
				0 => array(
					'title' => __('Excerpt', 'tmm_shortcodes'),
					'id' => 'content_radio_0',
					'value' => 0,
					'checked' => ($value_type == 0 ? 1 : 0)
				),
				1 => array(
					'title' => __('Content', 'tmm_shortcodes'),
					'id' => 'content_radio_1',
					'value' => 1,
					'checked' => ($value_type == 1 ? 1 : 0)
				)
			),
			'value' => $value_type,
			'description' => '',
			'hidden_id' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Content Char Count', 'tmm_shortcodes'),
			'shortcode_field' => 'char_count',
			'id' => 'char_count',
			'default_value' => TMM_Content_Composer::set_default_value('char_count', 140),
			'description' => ''
		));
		?>

	</div><!--/ .on-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Show post type media', 'tmm_shortcodes'),
			'shortcode_field' => 'show_post_type_media',
			'id' => 'show_post_type_media',
			'options' => array(
				1 => __('Yes', 'tmm_shortcodes'),
				0 => __('No', 'tmm_shortcodes'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('show_post_type_media', 1),
			'description' => ''
		));
		?>

	</div><!--/ .on-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Show post metadata', 'tmm_shortcodes'),
			'shortcode_field' => 'show_post_metadata',
			'id' => 'show_post_metadata',
			'options' => array(
				1 => __('Yes', 'tmm_shortcodes'),
				0 => __('No', 'tmm_shortcodes'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('show_post_metadata', 1),
			'description' => ''
		));
		?>

	</div><!--/ .on-half-->


	<div class="one-half">
		<?php
		$value_type = TMM_Content_Composer::set_default_value('show_readmore_button', 0);

		TMM_Content_Composer::html_option(array(
			'type' => 'radio',
			'title' => __('Read More Button', 'tmm_shortcodes'),
			'shortcode_field' => 'show_readmore_button',
			'id' => 'show_readmore_button',
			'name' => 'show_readmore_button',
			'values' => array(
				0 => array(
					'title' => __('No readmore button', 'tmm_shortcodes'),
					'id' => 'show_button_0',
					'value' => 0,
					'checked' => ($value_type == 0 ? 1 : 0)
				),
				1 => array(
					'title' => __('Show readmore button', 'tmm_shortcodes'),
					'id' => 'show_button_1',
					'value' => 1,
					'checked' => ($value_type == 1 ? 1 : 0)
				)
			),
			'value' => $value_type,
			'description' => '',
			'hidden_id' => ''
		));
		?>

	</div><!--/ .on-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Button Color', 'tmm_shortcodes'),
			'shortcode_field' => 'button_color',
			'id' => 'button_color',
			'options' => TMM_OptionsHelper::get_theme_buttons(),
			'default_value' => TMM_Content_Composer::set_default_value('button_color', ''),
			'description' => ''
		));
		?>

	</div><!--/ .on-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Button Size', 'tmm_shortcodes'),
			'shortcode_field' => 'button_size',
			'id' => 'button_size',
			'options' => TMM_OptionsHelper::get_theme_buttons_sizes(),
			'default_value' => TMM_Content_Composer::set_default_value('button_size', ''),
			'description' => ''
		));
		?>

	</div><!--/ .on-half-->


</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>


