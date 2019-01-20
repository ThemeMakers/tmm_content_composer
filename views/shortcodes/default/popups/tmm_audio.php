<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => esc_html__('Link to Audio', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => 'content',
			'data_type' => 'audio',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

    </div><!--/ .one-half-->


	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Audio format', 'tmm_content_composer'),
			'shortcode_field' => 'format',
			'id' => 'format',
			'options' => array(
				'other' => esc_html__('Other', 'tmm_content_composer'),
				'wav' => esc_html__('Wav', 'tmm_content_composer'),
				'ogg' => esc_html__('Ogg', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('format', 'other'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

    <div class="clear"></div>

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



