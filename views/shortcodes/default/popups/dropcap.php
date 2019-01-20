<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Enter Symbol', 'tmm_content_composer'),
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
				'dropcapcircle' => esc_html__('Circle Small', 'tmm_content_composer'),
				'dropcap circle' => esc_html__('Circle Big', 'tmm_content_composer'),
				'dropcap gray' => esc_html__('Gray', 'tmm_content_composer')
			),
			'default_value' => TMM_Content_Composer::set_default_value('type', 'dropcapcircle'),
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
