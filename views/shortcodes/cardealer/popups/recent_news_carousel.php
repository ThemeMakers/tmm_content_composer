<?php if ( !defined('ABSPATH') ) exit(); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'title',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('title', ''),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Enter Number of Posts', TMM_CC_TEXTDOMAIN),
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
			'title' => __('Enable Auto Slide', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'autoslide',
			'id' => 'autoslide',
			'is_checked' => TMM_Content_Composer::set_default_value('autoslide', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Date', TMM_CC_TEXTDOMAIN),
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
			'title' => __('Items per Set', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'items_per_set',
			'id' => 'items_per_set',
			'options' => array(
				'3' => __('3 Items', TMM_CC_TEXTDOMAIN),
				'4' => __('4 Items', TMM_CC_TEXTDOMAIN),
				'5' => __('5 Items', TMM_CC_TEXTDOMAIN),
				'6' => __('6 Items', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('items_per_set', '3'),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Apply Filters', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'filter',
			'id' => '',
			'options' => array(
				'recent' => __('Recent news', TMM_CC_TEXTDOMAIN),
				'random' => __('Random news', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('filter', 'recent'),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Max Symbols Number in Description', TMM_CC_TEXTDOMAIN),
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
