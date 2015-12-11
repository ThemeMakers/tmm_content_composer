<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Type', 'tmm_shortcodes'),
			'shortcode_field' => 'type',
			'id' => '',
			'options' => array(
				'default' => __('Default', 'tmm_content_composer'),
				'secondary' => __('Secondary', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('type', 'default'),
			'description' => __('Select type of you dropcap', 'tmm_content_composer')
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Symbol', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
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
