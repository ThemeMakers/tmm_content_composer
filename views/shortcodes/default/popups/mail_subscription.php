<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'title',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('title', 'Keep in touch with us'),
			'description' => ''
		));
		?>
	</div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Description', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'description',
			'default_value' => TMM_Content_Composer::set_default_value('description', 'Information about current events related to our company'),
			'description' => ''
		));
		?>
	</div>
	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Email Placeholder', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'placeholder',
			'default_value' => TMM_Content_Composer::set_default_value('placeholder', 'Enter your email'),
			'description' => __('Type your email placeholder here.', TMM_CC_TEXTDOMAIN)
		));
		?>

    </div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show zip code field', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'zipcode',
			'is_checked' => TMM_Content_Composer::set_default_value('zipcode', true),
			'description' => __('Check this to display zip code field.', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div>


</div><!--/ .tmm_shortcode_template->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>
