<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="fullwidth">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Address', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Phone', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'phone',
			'id' => 'phone',
			'default_value' => TMM_Content_Composer::set_default_value('phone', ''),
			'description' => ''
		));
		?>
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Fax', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'fax',
			'id' => 'fax',
			'default_value' => TMM_Content_Composer::set_default_value('fax', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Email', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'email',
			'id' => 'email',
			'default_value' => TMM_Content_Composer::set_default_value('email', ''),
			'description' => ''
		));
		?>
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Skype', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'skype',
			'id' => 'skype',
			'default_value' => TMM_Content_Composer::set_default_value('skype', ''),
			'description' => ''
		));
		?>


    </div><!--/ .fullwidth-->

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
