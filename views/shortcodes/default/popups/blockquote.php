<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">
		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Quote Position', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'positioning',
				'id' => 'positioning',
				'options' => array(
						'fullwidth' => __('Full Width', TMM_CC_TEXTDOMAIN),
						'left' => __('Align Left', TMM_CC_TEXTDOMAIN),
						'right' => __('Align Right', TMM_CC_TEXTDOMAIN),
				),
				'default_value' => TMM_Content_Composer::set_default_value('positioning', 'fullwidth'),
				'description' => ''
		));
		?>
	</div><!--/ .fullwidth-->

    <div class="fullwidth">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Enter text', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => 'content',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
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
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>
