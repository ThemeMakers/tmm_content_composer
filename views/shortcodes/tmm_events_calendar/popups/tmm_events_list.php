<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Count of events per page', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'events_count',
			'id' => 'events_count',
			'default_value' => TMM_Content_Composer::set_default_value('events_count', '3'),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->
	
	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Sorting', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'sorting',
			'id' => 'sorting',
			'options' => array('DESC' => 'DESC', 'ASC' => 'ASC'),
			'default_value' => TMM_Content_Composer::set_default_value('sorting', 'DESC'),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Months amount in events period selector', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'period_selector_amount',
			'id' => 'period_selector_amount',
			'options' => array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				5 => 5,
				6 => 6,
				7 => 7,
				8 => 8,
				9 => 9,
				10 => 10,
				11 => 11,
				12 => 12,
			),
			'default_value' => TMM_Content_Composer::set_default_value('period_selector_amount', 3),
			'description' => __('Months amount, that will be displayed in events period selector', TMM_CC_TEXTDOMAIN),
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display events period selector', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_period_selector',
			'id' => 'show_period_selector',
			'is_checked' => TMM_Content_Composer::set_default_value('show_period_selector', 1),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->


	<?php
	$terms = get_terms('events-categories');
	$event_categories = array(
		0 => 'All'
	);
	foreach ($terms as $term){
		$event_categories[$term->term_taxonomy_id] = $term->name;
	}
	if(count($event_categories) > 1){ ?>
		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'multiple' => true,
				'title' => __('Category', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'category',
				'id' => 'category',
				'options' => $event_categories,
				'default_value' => TMM_Content_Composer::set_default_value('category', 0),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->
	<?php } ?>

</div><!--/ .thememakers_shortcode_template-->

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
