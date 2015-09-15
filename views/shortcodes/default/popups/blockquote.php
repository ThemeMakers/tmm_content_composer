<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Type', 'tmm_shortcodes'),
			'shortcode_field' => 'type',
			'id' => 'toggle_type',
			'options' => array(
				'' => __('Type 1', 'tmm_shortcodes'),
				'type-2' => __('Type 2', 'tmm_shortcodes'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('type', ''),
			'description' => ''
		));
		?>
		
	</div><!--/ .one-half-->

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Align', 'tmm_shortcodes'),
			'shortcode_field' => 'align',
			'id' => 'align',
			'options' => array(
				'' => __('None', 'tmm_shortcodes'),
				'quoteleft' => __('Left', 'tmm_shortcodes'),
				'quoteright' => __('Right', 'tmm_shortcodes'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('align', ''),
			'description' => ''
		));
		?>
		
	</div><!--/ .one-half-->
		
	<div class="fullwidth">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Enter text', 'tmm_shortcodes'),
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
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>

