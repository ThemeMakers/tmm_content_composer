<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	
	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Hierarchy level', 'cardealer'),
			'shortcode_field' => 'location_level',
			'id' => 'location_level',
			'options' => array(
				1 => __('Countries', 'cardealer'),
				2 => __('States', 'cardealer'),
				3 => __('Cities', 'cardealer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('location_level', 2),
			'description' => __('Show locations by level', 'cardealer')
		));
		?>
	</div>
	
	<div class="one-half">
		<h4 class="label" for="location_level"><?php esc_html_e('Hide empty locations', 'cardealer'); ?></h4>
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Hide locations whithout related cars', 'cardealer'),
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

