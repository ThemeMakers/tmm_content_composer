<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'title',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('title', ''),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Body Type Name', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_name',
			'id' => 'show_name',
			'is_checked' => TMM_Content_Composer::set_default_value('show_name', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Count of Cars Related to Body Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_count',
			'id' => 'show_count',
			'is_checked' => TMM_Content_Composer::set_default_value('show_count', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable Link to Car Listing', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'enable_link',
			'id' => 'enable_link',
			'is_checked' => TMM_Content_Composer::set_default_value('enable_link', 1),
			'description' => ''
		));
		?>

	</div>

</div><!--/ .tmm_shortcode_template->
		  
<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
		});
		colorizator();

	});

</script>