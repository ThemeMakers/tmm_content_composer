<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Title Text', 'tmm_content_composer'),
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
				'title' => esc_html__('Title Heading', 'tmm_content_composer'),
				'shortcode_field' => 'type',
				'id' => 'type',
				'options' => array(
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				),
				'default_value' => TMM_Content_Composer::set_default_value('type', 'H1'),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->

		<div class="one-half">
			<?php
			$font_size = array('default' => esc_html__('Default', 'tmm_content_composer'));
			for ($i = 8; $i <= 72; $i++) {
				$font_size[$i] = $i;
			}
			//***
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Font Size', 'tmm_content_composer'),
				'shortcode_field' => 'font_size',
				'id' => 'font_size',
				'options' => $font_size,
				'default_value' => TMM_Content_Composer::set_default_value('font_size', 'default'),
				'description' => ''
			));
			?>

		</div>

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Font weight', 'tmm_content_composer'),
				'shortcode_field' => 'font_weight',
				'id' => 'font_weight',
				'options' => array(
					'normal' => esc_html__('Normal', 'tmm_content_composer'),
					'200' => 200,
					'400' => 400,
					'600' => 600,
					'800' => 800,
					'bold' => esc_html__('Bold', 'tmm_content_composer'),
				),
				'default_value' => TMM_Content_Composer::set_default_value('font_weight', 'normal'),
				'description' => ''
			));
			?>
		</div><!--/ .ona-half-->

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Align', 'tmm_content_composer'),
				'shortcode_field' => 'align',
				'id' => 'align',
				'options' => array(
					'left' => 'Left',
					'right' => 'Right',
					'center' => 'Center',
				),
				'default_value' => TMM_Content_Composer::set_default_value('align', 'left'),
				'description' => ''
			));
			?>

		</div>

		<div class="one-half">
			<?php
			$font_families = TMM_HelperFonts::get_google_fonts();
			$google_fonts_array = array("" => "");
			foreach ($font_families as $key => $value) {
				$index = explode(":", $value);
				$index = str_replace(' ', '_', $index[0]);
				$google_fonts_array[$index] = $value;
			}

			//***

			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Font Family', 'tmm_content_composer'),
				'shortcode_field' => 'font_family',
				'id' => 'font_family',
				'options' => $google_fonts_array,
				'default_value' => TMM_Content_Composer::set_default_value('font_family', ''),
				'description' => ''
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'title' => esc_html__('Color', 'tmm_content_composer'),
				'shortcode_field' => 'color',
				'type' => 'color',
				'description' => '',
				'default_value' => TMM_Content_Composer::set_default_value('color', ''),
				'id' => ''
			));
			?>
		</div>

		<div class="one-half">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Bottom Indent (px)', 'tmm_content_composer'),
				'shortcode_field' => 'bottom_indent',
				'id' => 'bottom_indent',
				'default_value' => TMM_Content_Composer::set_default_value('bottom_indent', ''),
				'description' => ''
			));
			?>

		</div><!--/ .one-half-->

	</div>

</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
		});
		colorizator();
	});
</script>