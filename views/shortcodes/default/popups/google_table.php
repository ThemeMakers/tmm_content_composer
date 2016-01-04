<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Table Data', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'heading',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('heading', 'string:Name,number:Salary,number:Full Time Employee'),
			'description' => __('Example: string:Name,number:Salary,number:Full Time Employee<br />
								Documentation: https://developers.google.com/chart/interactive/docs/gallery/table', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Table Data', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', '^Mike^, {v: 10000, f: ^$10,000^}, 1~^Jim^, {v:8000, f: ^$8,000^}, 1~^Alice^, {v: 12500, f: ^$12,500^}, 0~^Bob^, {v: 7000, f: ^$7,000^},1'),
			'description' => __('Example: ^Mike^, {v: 10000, f: ^$10,000^}, 1~^Jim^, {v:8000, f: ^$8,000^}, 1~^Alice^, {v: 12500, f: ^$12,500^}, 0~^Bob^, {v: 7000, f: ^$7,000^},1<br />
								Documentation: https://developers.google.com/chart/interactive/docs/gallery/table', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		$value_type = TMM_Content_Composer::set_default_value('show_row_number', 1);

		TMM_Content_Composer::html_option(array(
			'type' => 'radio',
			'title' => __('Show Row Number', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_row_number',
			'id' => 'show_row_number',
			'name' => 'show_row_number',
			'values' => array(
				1 => array(
					'title' => __('Yes', TMM_CC_TEXTDOMAIN),
					'id' => 'show_row_number_1',
					'value' => 1,
					'checked' => ($value_type == 1 ? 1 : 0)
				),
				0 => array(
					'title' => __('No', TMM_CC_TEXTDOMAIN),
					'id' => 'show_row_number_0',
					'value' => 0,
					'checked' => ($value_type == 0 ? 1 : 0)
				)
			),
			'value' => $value_type,
			'description' => '',
			'hidden_id' => 'show_row_number'
		));
		?>

	</div><!--/ .one-half-->

</div><!--/ .thememakers_shortcode_template-->


<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">

	<?php //$frame_uri = Thememakers_Application_Shortcodes::get_application_uri() . "/preview.php"; ?>

	<script type="text/javascript">
		//var thememakers_app_shortcodes_preview_url = "<?php //echo $frame_uri ?>";
		jQuery(function() {
			var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
			tmm_ext_shortcodes.changer(shortcode_name);
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});

		});
	</script>

</div><!--/ .fullwidth-frame-->


