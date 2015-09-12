<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons Text', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
<<<<<<< HEAD
			'id' => '',
=======
			'id' => 'content',
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('URL', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'url',
			'id' => 'url',
			'default_value' => TMM_Content_Composer::set_default_value('url', ''),
			'description' => __('http://forums.webtemplatemasters.com/', TMM_CC_TEXTDOMAIN)
		));
		?>
	</div><!--/ .one-half-->
<<<<<<< HEAD

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'color',
			'id' => 'color',
			'options' => TMM_OptionsHelper::get_theme_buttons(),
			'default_value' => TMM_Content_Composer::set_default_value('color', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Size', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'size',
			'id' => 'size',
			'options' => TMM_OptionsHelper::get_theme_buttons_sizes(),
			'default_value' => TMM_Content_Composer::set_default_value('size', ''),
			'description' => ''
		));
		?>	

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Top Indent', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'top_indent',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('top_indent', ''),
=======

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'color',
			'id' => 'color',
			'options' => TMM_OptionsHelper::get_theme_buttons(),
			'default_value' => TMM_Content_Composer::set_default_value('color', ''),
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
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
<<<<<<< HEAD
		
=======

>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
	});
</script>


