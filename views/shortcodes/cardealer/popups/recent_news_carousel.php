<?php if ( !defined('ABSPATH') ) exit(); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Title', 'cardealer'),
			'shortcode_field' => 'title',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('title', ''),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Enter Number of Posts', 'cardealer'),
			'shortcode_field' => 'count',
			'id' => '',
			'options' => array(
				3 => 3,
				6 => 6,
				9 => 9,
				12 => 12,
				15 => 15,
				18 => 18,
			),
			'default_value' => TMM_Content_Composer::set_default_value('count', 9),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Enable Auto Slide', 'cardealer'),
			'shortcode_field' => 'autoslide',
			'id' => 'autoslide',
			'is_checked' => TMM_Content_Composer::set_default_value('autoslide', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display Date', 'cardealer'),
			'shortcode_field' => 'show_date',
			'id' => 'show_date',
			'is_checked' => TMM_Content_Composer::set_default_value('show_date', 1),
			'description' => ''
		));
		?>

	</div>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Items per Set', 'cardealer'),
			'shortcode_field' => 'items_per_set',
			'id' => 'items_per_set',
			'options' => array(
				'3' => esc_html__('3 Items', 'cardealer'),
				'4' => esc_html__('4 Items', 'cardealer'),
				'5' => esc_html__('5 Items', 'cardealer'),
				'6' => esc_html__('6 Items', 'cardealer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('items_per_set', '3'),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Apply Filters', 'cardealer'),
			'shortcode_field' => 'filter',
			'id' => '',
			'options' => array(
				'recent' => esc_html__('Recent news', 'cardealer'),
				'random' => esc_html__('Random news', 'cardealer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('filter', 'recent'),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Max Symbols Number in Description', 'cardealer'),
			'shortcode_field' => 'desc_symbols',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('desc_symbols', ''),
			'description' => ''
		));
		?>

	</div>

</div><!--/ .tmm_shortcode_template->
		  
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
