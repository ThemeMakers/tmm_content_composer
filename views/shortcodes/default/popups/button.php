<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons Text', 'cardealer'),
			'shortcode_field' => 'content',
			'id' => 'content',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons URL', 'cardealer'),
			'shortcode_field' => 'url',
			'id' => 'url',
			'default_value' => TMM_Content_Composer::set_default_value('url', ''),
			'description' => __('http://forums.webtemplatemasters.com/', 'cardealer')
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Buttons Position', 'cardealer'),
				'shortcode_field' => 'positioning',
				'id' => 'positioning',
				'options' => array(
						'default' => __('Default', 'cardealer'),
						'left' => __('Push to Left', 'cardealer'),
						'right' => __('Push to Right', 'cardealer'),
						'center' => __('Align Center', 'cardealer'),
				),
				'default_value' => TMM_Content_Composer::set_default_value('positioning', 'default'),
				'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Buttons Color', 'cardealer'),
			'shortcode_field' => 'color',
			'id' => 'color',
			'options' => TMM_Content_Composer::get_theme_buttons(),
			'default_value' => TMM_Content_Composer::set_default_value('color', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Buttons Size', 'cardealer'),
			'shortcode_field' => 'size',
			'id' => 'size',
			'options' => TMM_Content_Composer::get_theme_buttons_sizes(),
			'default_value' => TMM_Content_Composer::set_default_value('size', 'middle'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

</div><!--/ .tmm_shortcode_template->


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>


