<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Hide empty producers', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'hide_empty',
			'id' => 'hide_empty_carproducers',
			'is_checked' => TMM_Content_Composer::set_default_value('hide_empty', 0),
			'description' => ''
		));
		?>

    </div><!--/ .fullwidth-->

	<div class="fullwidth">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display car make logos along with their names', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_logo',
			'id' => 'show_logo',
			'is_checked' => TMM_Content_Composer::set_default_value('show_logo', 1),
			'description' => ''
		));
		?>

	</div><!--/ .fullwidth-->

	<div class="fullwidth">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display only cars, that have their logo', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_only_with_logo',
			'id' => 'show_only_with_logo',
			'is_checked' => TMM_Content_Composer::set_default_value('show_only_with_logo', 1),
			'description' => ''
		));
		?>

	</div><!--/ .fullwidth-->

</div>


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

