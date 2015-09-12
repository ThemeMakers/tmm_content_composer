<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	
	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Hierarchy level', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'location_level',
			'id' => 'location_level',
			'options' => array(
				1 => __('Countries', TMM_CC_TEXTDOMAIN),
				2 => __('States', TMM_CC_TEXTDOMAIN),
				3 => __('Cities', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('location_level', 2),
			'description' => __('Show locations by level', TMM_CC_TEXTDOMAIN)
		));
		?>
	</div>
	
	<div class="one-half">
		<h4 class="label" for="location_level"><?php _e('Hide empty locations', TMM_CC_TEXTDOMAIN); ?></h4>
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Hide locations whithout related cars', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'hide_empty',
			'id' => 'hide_empty_locations',
			'is_checked' => TMM_Content_Composer::set_default_value('hide_empty', 1),
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
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
		//***
	});

</script>

