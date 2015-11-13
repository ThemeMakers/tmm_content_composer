<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons Text', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => 'content',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons URL', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'url',
			'id' => 'url',
			'default_value' => TMM_Content_Composer::set_default_value('url', ''),
			'description' => __('http://forums.webtemplatemasters.com/', TMM_CC_TEXTDOMAIN)
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Buttons Position', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'positioning',
				'id' => 'positioning',
				'options' => array(
						'default' => __('Default', TMM_CC_TEXTDOMAIN),
						'left' => __('Push to Left', TMM_CC_TEXTDOMAIN),
						'right' => __('Push to Right', TMM_CC_TEXTDOMAIN),
						'center' => __('Align Center', TMM_CC_TEXTDOMAIN),
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
			'title' => __('Buttons Color', TMM_CC_TEXTDOMAIN),
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
			'title' => __('Buttons Size', TMM_CC_TEXTDOMAIN),
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


