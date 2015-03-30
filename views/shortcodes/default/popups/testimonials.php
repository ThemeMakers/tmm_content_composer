<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">

		<?php
		$show = TMM_Content_Composer::set_default_value('show', 'mode1');

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Show', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show',
			'id' => 'show_testimonial_value',
			'options' => array(
				'mode1' => __('Show selected testimonial', TMM_CC_TEXTDOMAIN),
				'mode2' => __('Show all testimonials', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => $show,
			'description' => ''
		));
		?>

		<?php
		$tt = get_posts(array('numberposts' => -1, 'post_type' => TMM_Testimonial::$slug));
		$testimonials = array();
		if (!empty($tt)) {
			foreach ($tt as $value) {
				$testimonials[$value->ID] = $value->post_title . ". " . substr(strip_tags($value->post_content), 0, 90) . " ...";
			}
		}
		?>
	</div><!--/ .one-half-->

	<div class="one-half option-selected">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Testimonials', TMM_CC_TEXTDOMAIN),
				'options' => $testimonials,
				'shortcode_field' => 'content',
				'id' => '',
				'default_value' => TMM_Content_Composer::set_default_value('content', ''),
				'description' => ''
			));
			?>
	</div>

	<div class="one-half option-count">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'count',
			'id' => '',
			'options' => array(
				-1 => __('All', TMM_CC_TEXTDOMAIN),
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				5 => 5
			),
			'default_value' => TMM_Content_Composer::set_default_value('count', -1),
			'description' => ''
		));
		?>

	</div>

	<div class="one-half option-count">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Order', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'order',
			'id' => '',
			'options' => array(
				'ASC' => __('ASC', TMM_CC_TEXTDOMAIN),
				'DESC' => __('DESC', TMM_CC_TEXTDOMAIN)
			),
			'default_value' => TMM_Content_Composer::set_default_value('order', 'ASC'),
			'description' => ''
		));
		?>
	</div>

	<div class="one-half option-count">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Order by', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'orderby',
			'id' => '',
			'options' => array(
				'none' => __('None', TMM_CC_TEXTDOMAIN),
				'ID' => __('ID', TMM_CC_TEXTDOMAIN),
				'author' => __('Author', TMM_CC_TEXTDOMAIN),
				'title' => __('Title', TMM_CC_TEXTDOMAIN),
				'name' => __('Name', TMM_CC_TEXTDOMAIN),
				'date' => __('Date', TMM_CC_TEXTDOMAIN),
				'modified' => __('Modified', TMM_CC_TEXTDOMAIN),
				'rand' => __('Rand', TMM_CC_TEXTDOMAIN)

			),
			'default_value' => TMM_Content_Composer::set_default_value('orderby', 'date'),
			'description' => ''
		));
		?>
	</div>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show photo', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_photo',
			'id' => '',
			'is_checked' => TMM_Content_Composer::set_default_value('show_photo', 1),
			'description' => __('Show / Hide Photo', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div>

</div><!--/ .tmm_shortcode_template->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('change click', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		var tMode = jQuery('#show_testimonial_value').val(),
			optionSelected = jQuery('.option-selected'),
			optionCount = jQuery('.option-count');

		changeTMode(tMode);

		jQuery('#show_testimonial_value').on('change', function(){
			var $this = jQuery(this),
				val = $this.val();
			changeTMode(val);
		});

		function changeTMode(val){
			switch (val){
				case 'mode1':
					optionSelected.slideDown();
					optionCount.slideUp();
					break;
				case 'mode2':
					optionSelected.slideUp();
					optionCount.slideDown();
					break;

			}
		}
	});
</script>