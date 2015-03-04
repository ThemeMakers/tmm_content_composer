<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Count of events', TMM_CC_TEXTDOMAIN),
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
