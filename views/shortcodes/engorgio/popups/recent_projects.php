<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		$content = array();
		for ($i = 1; $i <= 20; $i++) {
			$content[$i] = $i;
		}
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Projects Per Page', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'count',
			'id' => '',
			'options' => $content,
			'default_value' => TMM_Content_Composer::set_default_value('count', 4),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		$template = array(
                        3 => __('3 Columns', TMM_CC_TEXTDOMAIN),
			4 => __('4 Columns', TMM_CC_TEXTDOMAIN),
                        5 => __('5 Columns', TMM_CC_TEXTDOMAIN),
                        6 => __('6 Columns', TMM_CC_TEXTDOMAIN),
		);

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Template', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'template',
			'id' => 'template',
			'options' => $template,
			'default_value' => TMM_Content_Composer::set_default_value('template', '1/3'),
			'description' => ''
		));
		?>

	</div>	

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
