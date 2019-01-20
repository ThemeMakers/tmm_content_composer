<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Select Type', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => 'content',
			'options' => array(
				'divider-solid' => esc_html__('Solid', 'tmm_content_composer'),
				'separator' => esc_html__('Separator', 'tmm_content_composer')
			),
			'default_value' => TMM_Content_Composer::set_default_value('content', 'divider-solid'),
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



