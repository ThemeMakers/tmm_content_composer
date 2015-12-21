<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="thememakers_shortcode_template clearfix">

	<div class="one-half">
		<?php
		/**
		* ---------------- Show ----------------
		*/
		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Show', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'show',
				'id' => 'show_testimonial_value',
				'options' => array(
						'1' => __('Show selected testimonial', TMM_CC_TEXTDOMAIN),
						'2' => __('Show random testimonial', TMM_CC_TEXTDOMAIN),
						'3' => __('Show latest testimonial', TMM_CC_TEXTDOMAIN),
				),
				'default_value' => TMM_Content_Composer::set_default_value('show', ''),
				'description' => ''
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		/**
		* ---------------- Content ----------------
		*/
		$tt = get_posts(array('numberposts' => -1, 'post_type' => 'testimonials'));
		$testimonials_options_array = array();
		$testimonials = array();

		if (!empty($tt)) {
			foreach ($tt as $value) {
				$testimonials[$value->ID] = $value->post_title . ". " . substr(strip_tags($value->post_content), 0, 75) . " ...";
			}
		}

		if ( !empty($testimonials) ) {
			foreach ( $testimonials as $term_id => $name ) {
				$testimonials_options_array[$term_id] = __($name, TMM_CC_TEXTDOMAIN);
			}
		}

		TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => __('Content', TMM_CC_TEXTDOMAIN),
		'shortcode_field' => 'content',
		'id' => '',
		'options' => $testimonials_options_array,
		'default_value' => TMM_Content_Composer::set_default_value('content', ''),
		'description' => ''
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half  testimonial_count">
		<?php
		/**
		* ---------------- Count ----------------
		*/
		TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => __('Count', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'count',
				'id' => '',
				'default_value' => TMM_Content_Composer::set_default_value('count', '1'),
				'description' => ''
		));
		?>
	</div><!--/ .ona-half-->

</div><!--/ .tmm_shortcode_template->

<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});

		//***

		jQuery("#show_testimonial_value").change(function() {
			var val = jQuery(this).val();
			tmm_ext_shortcodes.changer(shortcode_name);

			switch (val) {
				case 'mode1':
					jQuery(".testimonial_count").hide(200);
					jQuery(".content_select").show(200);
					break;
				case 'mode2':
				case 'mode3':
					jQuery(".testimonial_count").show(200);
					jQuery(".content_select").hide(200);
					break;
			}


			return true;
		});

	});
</script>
