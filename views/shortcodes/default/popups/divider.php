<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Select Type', 'tmm_content_composer'),
				'shortcode_field' => 'type',
				'id' => 'type',
				'options' => array(
						'type-1' => __('Solid', 'tmm_content_composer'),
						'type-2' => __('Solid Short', 'tmm_content_composer'),
						'type-3' => __('Empty Space', 'tmm_content_composer'),
				),
				'default_value' => TMM_Content_Composer::set_default_value('type', 'type-1'),
				'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Space around divider', 'tmm_content_composer'),
				'shortcode_field' => 'size',
				'id' => 'size',
				'options' => array(
						'small' => __('Small', 'tmm_content_composer'),
						'middle' => __('Middle', 'tmm_content_composer'),
						'large' => __('Large', 'tmm_content_composer'),
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
				'title' => __('Buttons Color', 'tmm_content_composer'),
				'shortcode_field' => 'color',
				'id' => 'color',
				'options' => array(
						'transparent' => __('Transparent', 'tmm_content_composer'),
						'gray' => __('Gray', 'tmm_content_composer'),
						'secondary-button' => __('Dark', 'tmm_content_composer'),
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


