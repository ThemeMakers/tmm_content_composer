<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="full-width">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Link to Audio', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

    </div><!--/ .one-half-->


	<div class="one-half">
		<?php /*
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Audio format', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'format',
			'id' => 'format',
			'options' => array(
				'other' => __('Other', TMM_CC_TEXTDOMAIN),
				'wav' => __('Wav', TMM_CC_TEXTDOMAIN),
				'ogg' => __('Ogg', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('format', 'other'),
			'description' => ''
		));*/
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

