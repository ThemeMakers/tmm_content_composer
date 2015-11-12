<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title Text', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Title Heading', TMM_CC_TEXTDOMAIN),
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
			'default_value' => TMM_Content_Composer::set_default_value('type', 'h1'),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		$font_size = array('' => __('Default', TMM_CC_TEXTDOMAIN));

		for ($i = 8; $i <= 72; $i++) {
			$font_size[$i] = $i;
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Font Size', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'font_size',
			'id' => 'font_size',
			'options' => $font_size,
			'default_value' => TMM_Content_Composer::set_default_value('font_size', ''),
			'description' => ''
		));
		?>

	</div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Letter spacing (px)', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'letter_spacing',
			'id' => 'letter_spacing',
			'default_value' => TMM_Content_Composer::set_default_value('letter_spacing', '0'),
			'description' => ''
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Font weight', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'font_weight',
			'id' => 'font_weight',
			'options' => array(
				'' => __('Default', TMM_CC_TEXTDOMAIN),
				'normal' => __('Normal', TMM_CC_TEXTDOMAIN),
				'200' => 200,
				'400' => 400,
				'600' => 600,
				'800' => 800,
				'bold' => __('Bold', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('font_weight', ''),
			'description' => ''
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Align', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'align',
			'id' => 'align',
			'options' => array(
				'left' => __('Left', TMM_CC_TEXTDOMAIN),
				'right' => __('Right', TMM_CC_TEXTDOMAIN),
				'center' => __('Center', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('align', 'left'),
			'description' => ''
		));
		?>
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show border under the title', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'section_title',
			'id' => 'section_title',
			'is_checked' => TMM_Content_Composer::set_default_value('section_title', 0),
			'description' => ''
		));
		?>

	</div>

	<div class="one-half">
		<?php
		$font_families = TMM_HelperFonts::get_google_fonts();
		$google_fonts_array = array('0' => __('Default', TMM_CC_TEXTDOMAIN));
		foreach ($font_families as $key => $value) {
			$index = explode(":", $value);
			$index = str_replace(' ', '_', $index[0]);
			$google_fonts_array[$index] = $value;
		}

		//***

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Font Family', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'font_family',
			'id' => 'font_family',
			'options' => $google_fonts_array,
			'default_value' => TMM_Content_Composer::set_default_value('font_family', '0'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'title' => __('Color', TMM_CC_TEXTDOMAIN),
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
			'title' => __('Bottom Indent (px)', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'bottom_indent',
			'id' => 'bottom_indent',
			'default_value' => TMM_Content_Composer::set_default_value('bottom_indent', ''),
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
			colorizator();
		});
		colorizator();
	});
</script>

