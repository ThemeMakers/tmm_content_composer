<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	<div class="one-half">
	<?php
	$archives_array = array(
		'latest_posts' =>__('Latest Posts', TMM_CC_TEXTDOMAIN),
		'archives_month' =>__('Archives by Month', TMM_CC_TEXTDOMAIN),
		'archives_year' =>__('Archives by Year', TMM_CC_TEXTDOMAIN),
		'archives_day' =>__('Archives by Day', TMM_CC_TEXTDOMAIN),
		'archives_subject' =>__('Archives by Category', TMM_CC_TEXTDOMAIN),
	);
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Archives', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'archives_type',
			'id' => 'archives_type',
			'options' => $archives_array,
			'default_value' => TMM_Content_Composer::set_default_value('archives_type', 'latest_posts'),
			'description' => __('Shows archives according to selected option.', TMM_CC_TEXTDOMAIN)
		));
	?>
	</div>

	<div class="one-half option-author">
	<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Count of Items', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'count',
			'id' => 'count',
			'default_value' => TMM_Content_Composer::set_default_value('count', '10'),
			'description' => __('Leave field empty for displaying all items', TMM_CC_TEXTDOMAIN)
		));
	?>
	</div>


</div>
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function($) {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
	});
</script>