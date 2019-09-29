<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Select Type', 'cardealer'),
				'shortcode_field' => 'type',
				'id' => 'type',
				'options' => array(
						'type-1' => __('Solid', 'cardealer'),
						'type-2' => __('Solid Short', 'cardealer'),
						'type-3' => __('Empty Space', 'cardealer'),
				),
				'default_value' => TMM_Content_Composer::set_default_value('type', 'type-1'),
				'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Space around divider', 'cardealer'),
				'shortcode_field' => 'size',
				'id' => 'size',
				'options' => array(
						'small' => __('Small', 'cardealer'),
						'middle' => __('Middle', 'cardealer'),
						'large' => __('Large', 'cardealer'),
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
				'title' => __('Buttons Color', 'cardealer'),
				'shortcode_field' => 'color',
				'id' => 'color',
				'options' => array(
						'transparent' => __('Transparent', 'cardealer'),
						'gray' => __('Gray', 'cardealer'),
						'dark' => __('Dark', 'cardealer'),
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


