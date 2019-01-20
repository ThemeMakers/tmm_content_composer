<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => esc_html__('Enter Text', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => 'content',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

    </div><!--/ .one-half-->

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Select Type', 'tmm_content_composer'),
			'shortcode_field' => 'type',
			'id' => 'type',
			'options' => array(
				'error' => esc_html__('Error', 'tmm_content_composer'),
				'success' => esc_html__('Success', 'tmm_content_composer'),
				'info' => esc_html__('Info', 'tmm_content_composer'),
				'notice' => esc_html__('Notice', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('type', 'notice'),
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
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
		
	});
</script>

