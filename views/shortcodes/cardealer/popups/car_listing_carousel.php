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
			'title' => __('Enter Number of Cars', TMM_CC_TEXTDOMAIN),
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
			'title' => __('Enable Currency Converter', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_currency_converter',
			'id' => 'show_currency_converter',
			'is_checked' => TMM_Content_Composer::set_default_value('show_currency_converter', 1),
			'description' => 'Show currency converter'
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Slide Featured Cars Images on Hover', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'set_featured_autoslide',
			'id' => 'featured_autoslide',
			'is_checked' => TMM_Content_Composer::set_default_value('set_featured_autoslide', 1),
			'description' => 'Slide images on hover for featured cars'
		));
		?>

	</div>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Thumbnail Size', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'thumbnail_size',
			'id' => 'thumbnail_size',
			'options' => array(
				'small' => __('Small', TMM_CC_TEXTDOMAIN),
				'middle' => __('Middle', TMM_CC_TEXTDOMAIN),
				'large' => __('Large', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('thumbnail_size', 'large'),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Sort by Dealer', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'sort_by_dealer',
			'id' => 'sort_by_dealer',
			'options' => array(
				0 => __('All dealers', TMM_CC_TEXTDOMAIN),
				'middle' => __('Middle', TMM_CC_TEXTDOMAIN),
				'large' => __('Large', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('sort_by_dealer', 0),
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
				'recent' => __('Recent cars', TMM_CC_TEXTDOMAIN),
				'featured' => __('Featured cars', TMM_CC_TEXTDOMAIN),
				'random' => __('Random cars', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('filter', 'recent'),
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
