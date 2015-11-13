<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Select Type', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'type',
				'id' => 'type',
				'options' => array(
						'type-1' => __('Solid', TMM_CC_TEXTDOMAIN),
						'type-2' => __('Solid Short', TMM_CC_TEXTDOMAIN),
						'type-3' => __('Empty Space', TMM_CC_TEXTDOMAIN),
				),
				'default_value' => TMM_Content_Composer::set_default_value('type', 'type-1'),
				'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Space around divider', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'size',
				'id' => 'size',
				'options' => array(
						'small' => __('Small', TMM_CC_TEXTDOMAIN),
						'middle' => __('Middle', TMM_CC_TEXTDOMAIN),
						'large' => __('Large', TMM_CC_TEXTDOMAIN),
				),
				'default_value' => TMM_Content_Composer::set_default_value('size', 'middle'),
				'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Buttons Color', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'color',
				'id' => 'color',
				'options' => array(
						'transparent' => __('Transparent', TMM_CC_TEXTDOMAIN),
						'gray' => __('Gray', TMM_CC_TEXTDOMAIN),
						'dark' => __('Dark', TMM_CC_TEXTDOMAIN),
				),
				'default_value' => TMM_Content_Composer::set_default_value('color', 'gray'),
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
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>


