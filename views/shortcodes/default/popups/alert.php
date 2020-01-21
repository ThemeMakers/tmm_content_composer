<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="fullwidth">


		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Enter Text', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => 'content',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>


		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Select Type', 'tmm_content_composer'),
			'shortcode_field' => 'type',
			'id' => 'type',
			'options' => array(
				'error' => __('Error', 'tmm_content_composer'),
				'success' => __('Success', 'tmm_content_composer'),
				'info' => __('Info', 'tmm_content_composer'),
				'notice' => __('Notice', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('type', 'notice'),
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
