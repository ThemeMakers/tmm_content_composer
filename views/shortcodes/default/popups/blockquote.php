<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Type', 'tmm_content_composer'),
			'shortcode_field' => 'type',
			'id' => 'toggle_type',
			'options' => array(
				'' => esc_html__('Type 1', 'tmm_content_composer'),
				'type-2' => esc_html__('Type 2', 'tmm_content_composer'),
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
			'title' => esc_html__('Align', 'tmm_content_composer'),
			'shortcode_field' => 'align',
			'id' => 'align',
			'options' => array(
				'' => esc_html__('None', 'tmm_content_composer'),
				'quoteleft' => esc_html__('Left', 'tmm_content_composer'),
				'quoteright' => esc_html__('Right', 'tmm_content_composer'),
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
			'title' => esc_html__('Enter text', 'tmm_content_composer'),
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

