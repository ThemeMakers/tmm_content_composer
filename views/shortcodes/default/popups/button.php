<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons Text', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => 'content',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons URL', 'tmm_content_composer'),
			'shortcode_field' => 'url',
			'id' => 'url',
			'default_value' => TMM_Content_Composer::set_default_value('url', ''),
			'description' => __('http://forums.webtemplatemasters.com/', 'tmm_content_composer')
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Buttons Position', 'tmm_content_composer'),
				'shortcode_field' => 'positioning',
				'id' => 'positioning',
				'options' => array(
						'default' => __('Default', 'tmm_content_composer'),
						'left' => __('Push to Left', 'tmm_content_composer'),
						'right' => __('Push to Right', 'tmm_content_composer'),
						'center' => __('Align Center', 'tmm_content_composer'),
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
			'title' => __('Buttons Color', 'tmm_content_composer'),
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
			'title' => __('Buttons Size', 'tmm_content_composer'),
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


