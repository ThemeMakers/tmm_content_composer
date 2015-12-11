<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Chart Type', 'tmm_content_composer'),
			'shortcode_field' => 'type',
			'id' => 'type',
			'options' => array(
				'pie' => __('Pie Chart', 'tmm_content_composer'),
				'bar' => __('Bar Chart', 'tmm_content_composer'),
				'column' => __('Column Chart', 'tmm_content_composer'),
				'geochart' => __('Geochart', 'tmm_content_composer'),
				'line' => __('Line Chart', 'tmm_content_composer'),
				'area' => __('Area Chart', 'tmm_content_composer'),
				'combo' => __('Combo Chart', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('type', 'pie'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title', 'tmm_content_composer'),
			'shortcode_field' => 'title',
			'id' => 'title',
			'default_value' => TMM_Content_Composer::set_default_value('title', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Chart Width', 'tmm_content_composer'),
			'shortcode_field' => 'width',
			'id' => 'width',
			'default_value' => TMM_Content_Composer::set_default_value('width', 500),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Chart Height', 'tmm_content_composer'),
			'shortcode_field' => 'height',
			'id' => 'height',
			'default_value' => TMM_Content_Composer::set_default_value('height', 500),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Font Family', 'tmm_content_composer'),
			'shortcode_field' => 'font_family',
			'id' => 'font_family',
			'options' => tmm_get_fonts_array(),
			'default_value' => TMM_Content_Composer::set_default_value('font_family', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		$font_size_array = array();
		for ($i = 8; $i <= 72; $i++) {
			$font_size_array[$i] = $i;
		}
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Font Size', 'tmm_content_composer'),
			'shortcode_field' => 'font_size',
			'id' => 'font_size',
			'options' => $font_size_array,
			'default_value' => TMM_Content_Composer::set_default_value('font_size', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Chart Titles', 'tmm_content_composer'),
			'shortcode_field' => 'chart_titles',
			'id' => 'chart_titles',
			'default_value' => TMM_Content_Composer::set_default_value('chart_titles', ''),
			'description' => __('Example:', 'tmm_content_composer') . '<br />Pie => Task,Hours per Day<br />
			Bar, Column, Line, Area => Year, Sales, Expenses<br />
			Combo => Month,Bolivia,Ecuador,Madagascar,Papua New Guinea,Rwanda,Average<br />
			Geochart => Country,Popularity<br />'
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Chart Data', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => __('Example:', 'tmm_content_composer') . '<br />Pie => sleep:2,eat:2,work:2<br />
			Bar, Column => 2004:1000:400,2005:980:570,2006:800:300<br />
			Line, Area => 2004:1000:400,2005:1170:460,2006:660:1120,2007:1030:540<br />
			Combo => 2004/05:165:938:522:998:450:614.6,2005/06:135:1120:599:1268:288:682,2006/07:157:1167:587:807:397:623,2007/08:139:1110:615:968:215:609.4,2008/09:136:691:629:1026:366:569.6<br />
			Geochart => Germany:200,France:300,United States:400<br />'
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Background Color', 'tmm_content_composer'),
			'shortcode_field' => 'bgcolor',
			'id' => 'bgcolor',
			'default_value' => TMM_Content_Composer::set_default_value('bgcolor', ''),
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
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
		
	});
</script>


