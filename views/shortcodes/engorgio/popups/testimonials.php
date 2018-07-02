<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	

    <div class="one-half">

		<?php
		$show = TMM_Content_Composer::set_default_value('show', 'mode1');

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Show', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show',
			'id' => 'show_testimonial_value',
			'options' => array(
				'mode1' => esc_html__('Show selected testimonial', TMM_CC_TEXTDOMAIN),
				'mode2' => esc_html__('Show random testimonial', TMM_CC_TEXTDOMAIN),
				'mode3' => esc_html__('Show latest testimonial', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => $show,
			'description' => ''
		));
		?>

		<?php
		$tt = get_posts(array('numberposts' => -1, 'post_type' => TMM_Testimonial::$slug, 'suppress_filters' => false));
		$testimonials = array();
		if (!empty($tt)) {
			foreach ($tt as $value) {
				$testimonials[$value->ID] = $value->post_title . ". " . substr(strip_tags($value->post_content), 0, 90) . " ...";
			}
		}
		?>
		<div class="content_select" style="display: <?php if ($show == 'mode2' OR $show == 'mode3'): ?>none<?php else: ?>inline-block<?php endif; ?>;">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Testimonials', TMM_CC_TEXTDOMAIN),
				'options' => $testimonials,
				'shortcode_field' => 'content',
				'id' => '',
				'default_value' => TMM_Content_Composer::set_default_value('content', ''),
				'description' => ''
			));
			?>
		</div>

    </div><!--/ .ona-half-->
    
    <div class="one-half">
       <?php
       
       $animation_types = array(
           'fade' => 'Fade',
           'fades' => 'Fades',
           'slide' => 'Slide',
           'goDown' => 'go Down',
           'scaleToFade' => 'Scale To Fade',
           'backSlide' => 'Back Slide',
           'fadeUp' => 'Fade Up',
           'verticalSlide' => 'Vertical Slide'
       );
       
       TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Slides Animation Effect', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'animation_type',
			'id' => 'animation_type',
            'options' => $animation_types,
			'default_value' => TMM_Content_Composer::set_default_value('animation_type', 'backSlide'),
			'description' => ''
		));
		?>       
      
    </div>

	
	<div class="one-half testimonial_count" style="display: <?php if ($show == 'mode2' OR $show == 'mode3'): ?>inline-block<?php else: ?>none<?php endif; ?>;">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'count',
			'id' => '',
			'options' => array(
				-1 => esc_html__('All', TMM_CC_TEXTDOMAIN),
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

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Content Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content_color',
			'id' => 'content_color',
            'options' => array(
                'dark' =>  esc_html__('Dark', TMM_CC_TEXTDOMAIN),
                'light' =>  esc_html__('Light', TMM_CC_TEXTDOMAIN),
            ),
			'default_value' => TMM_Content_Composer::set_default_value('content_color', 'dark'),
			'description' => ''
		));
		?>

	</div>
    
	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Show photo', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_photo',
			'id' => 'show_photo',
			'is_checked' => TMM_Content_Composer::set_default_value('show_photo', 1),
			'description' => esc_html__('Show/Hide Photo', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div>


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