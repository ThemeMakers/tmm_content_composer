<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Select Type', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => '',
			'options' => array(
				'separator' => __('Line', 'tmm_content_composer'),
				'divider' => __('Dashed', 'tmm_content_composer'),
				'double-divider' => __('Double Divider', 'tmm_shortcodes'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('content', 'separator'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

</div>


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


