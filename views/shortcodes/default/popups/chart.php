<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">
		<div class="one-half">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Chart Type', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'type',
				'id' => 'type',
				'options' => array(
					'pie' => __('Pie Chart', TMM_CC_TEXTDOMAIN),
					'bar' => __('Bar Chart', TMM_CC_TEXTDOMAIN),
					'column' => __('Column Chart', TMM_CC_TEXTDOMAIN),
					'geochart' => __('Geochart', TMM_CC_TEXTDOMAIN),
					'line' => __('Line Chart', TMM_CC_TEXTDOMAIN),
					'area' => __('Area Chart', TMM_CC_TEXTDOMAIN),
					'combo' => __('Combo Chart', TMM_CC_TEXTDOMAIN),
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
				'title' => __('Title', TMM_CC_TEXTDOMAIN),
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
				'title' => __('Chart Width', TMM_CC_TEXTDOMAIN),
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
				'title' => __('Chart Height', TMM_CC_TEXTDOMAIN),
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
				'title' => __('Font Family', TMM_CC_TEXTDOMAIN),
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
				'title' => __('Font Size', TMM_CC_TEXTDOMAIN),
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
				'title' => __('Chart Titles', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'chart_titles',
				'id' => 'chart_titles',
				'default_value' => TMM_Content_Composer::set_default_value('chart_titles', ''),
				'description' => __('Example:', TMM_CC_TEXTDOMAIN) . '<br />Pie => Task,Hours per Day<br />
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
				'title' => __('Chart Data', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'content',
				'id' => '',
				'default_value' => TMM_Content_Composer::set_default_value('content', ''),
				'description' => __('Example:', TMM_CC_TEXTDOMAIN) . '<br />Pie => sleep:2,eat:2,work:2<br />
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
				'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'bgcolor',
				'id' => 'bgcolor',
				'default_value' => TMM_Content_Composer::set_default_value('bgcolor', ''),
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
		});
		
	});
</script>


