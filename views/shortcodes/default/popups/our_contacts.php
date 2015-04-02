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
			'title' => __('Enter Email', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'email',
			'id' => 'email',
			'default_value' => TMM_Content_Composer::set_default_value('email', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Working Days Info', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'working_days',
			'id' => 'working_days',
			'default_value' => TMM_Content_Composer::set_default_value('working_days', ''),
			'description' => __('Put your working days info here.', TMM_CC_TEXTDOMAIN)
		));
		?>

		<?php
		$days = array(
			'Monday' => __('Monday', TMM_CC_TEXTDOMAIN),
			'Tuesday' => __('Tuesday', TMM_CC_TEXTDOMAIN),
			'Wednesday' => __('Wednesday', TMM_CC_TEXTDOMAIN),
			'Thursday' => __('Thursday', TMM_CC_TEXTDOMAIN),
			'Friday' => __('Friday', TMM_CC_TEXTDOMAIN),
			'Saturday' => __('Saturday', TMM_CC_TEXTDOMAIN),
			'Sunday' => __('Sunday', TMM_CC_TEXTDOMAIN)
		);
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Closed Days', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'closed_days',
			'id' => 'closed_days',
			'options' => $days,
			'multiple' => true,
			'default_value' => TMM_Content_Composer::set_default_value('closed_days', 'sunday'),
			'description' => __('Hold the CTRL key and click the items in a list to choose them', TMM_CC_TEXTDOMAIN)
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
