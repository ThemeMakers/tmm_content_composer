<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="fullwidth">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Enter Text', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

    </div><!--/ .fullwidth-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'color',
			'title' => __('Text Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'color',
			'id' => 'color',
			'default_value' => TMM_Content_Composer::set_default_value('color', ''),
			'description' => '',
			'display' => 1
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'color',
			'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'bgcolor',
			'id' => 'bgcolor',
			'default_value' => TMM_Content_Composer::set_default_value('bgcolor', ''),
			'description' => '',
			'display' => 1
		));
		?>

	</div><!--/ .one-half-->

</div><!--/ .tmm_shortcode_template->
		  
<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
		});
		colorizator();

	});
</script>
