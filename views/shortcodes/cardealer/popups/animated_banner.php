<?php if (!defined('ABSPATH')) exit(); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Banner Size', 'cardealer'),
			'shortcode_field' => 'size',
			'id' => 'size',
			'options' => array(
				1 => '250*250',
				2 => '300*250',
			),
			'default_value' => TMM_Content_Composer::set_default_value('size', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title Text 1', 'cardealer'),
			'shortcode_field' => 'title_1',
			'id' => 'title_1',
			'default_value' => TMM_Content_Composer::set_default_value('title_1', __('Title 1', 'cardealer')),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title Text 2', 'cardealer'),
			'shortcode_field' => 'title_2',
			'id' => 'title_2',
			'default_value' => TMM_Content_Composer::set_default_value('title_2', __('Title 2', 'cardealer')),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title Text 3', 'cardealer'),
			'shortcode_field' => 'title_3',
			'id' => 'title_3',
			'default_value' => TMM_Content_Composer::set_default_value('title_3', __('Title 3', 'cardealer')),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Banner animation type', 'cardealer'),
			'shortcode_field' => 'animation_type',
			'id' => 'animation_type',
			'options' => array(
				'static' => __('Static Banner', 'cardealer'),
				'animated' => __('Animated Banner', 'cardealer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('animation_type', 'static'),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'color',
			'title' => __('Caption Background Color', 'cardealer'),
			'shortcode_field' => 'caption_bg_color',
			'id' => 'caption_bg_color',
			'default_value' => TMM_Content_Composer::set_default_value('caption_bg_color', ''),
			'description' => ''
		));
		?>

    </div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Background Image', 'cardealer'),
			'shortcode_field' => 'bg_image',
			'id' => 'bg_image',
			'default_value' => TMM_Content_Composer::set_default_value('bg_image', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Logo', 'cardealer'),
			'shortcode_field' => 'logo',
			'id' => 'logo',
			'default_value' => TMM_Content_Composer::set_default_value('logo', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Button Text', 'cardealer'),
			'shortcode_field' => 'button_text',
			'id' => 'button_text',
			'default_value' => TMM_Content_Composer::set_default_value('button_text', __('Know More', 'cardealer')),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Button Url', 'cardealer'),
			'shortcode_field' => 'button_url',
			'id' => 'button_url',
			'default_value' => TMM_Content_Composer::set_default_value('button_url', '#'),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Button Color', 'cardealer'),
			'shortcode_field' => 'button_color',
			'id' => 'button_color',
			'options' => array(
				'red' => __('Red', 'cardealer'),
				'yellow' => __('Yellow', 'cardealer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('button_color', 'yellow'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">

	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			colorizator();
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		colorizator();
	});

</script>

