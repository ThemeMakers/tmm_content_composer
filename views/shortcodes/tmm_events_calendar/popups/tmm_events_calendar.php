<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display event featured image in the tooltip', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_tooltip_image',
			'id' => 'show_tooltip_image',
			'is_checked' => TMM_Content_Composer::set_default_value('show_tooltip_image', 1),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display event time in the tooltip', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_tooltip_time',
			'id' => 'show_tooltip_time',
			'is_checked' => TMM_Content_Composer::set_default_value('show_tooltip_time', 1),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display event place in the tooltip', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_tooltip_place',
			'id' => 'show_tooltip_place',
			'is_checked' => TMM_Content_Composer::set_default_value('show_tooltip_place', 1),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display event description in the tooltip', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_tooltip_desc',
			'id' => 'show_tooltip_desc',
			'is_checked' => TMM_Content_Composer::set_default_value('show_tooltip_desc', 1),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Excerpt symbols count in the tooltip description', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'tooltip_desc_symbols_count',
			'id' => 'tooltip_desc_symbols_count',
			'default_value' => TMM_Content_Composer::set_default_value('tooltip_desc_symbols_count', '30'),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

</div><!--/ .thememakers_shortcode_template-->

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
