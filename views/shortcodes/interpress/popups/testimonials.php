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
				'mode2' => __('Show random testimonial', TMM_CC_TEXTDOMAIN),
				'mode3' => __('Show latest testimonial', TMM_CC_TEXTDOMAIN),
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
				'title' => __('Testimonials', TMM_CC_TEXTDOMAIN),
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

			'blindX' => 'blindX',
			'blindY' => 'blindY',
		   	'blindZ' => 'blindZ',
		   	'cover' => 'cover',
			'curtainX' => 'curtainX',
		   	'curtainY' => 'curtainY',
			'fade' => 'fade',
			'fadeZoom' => 'fadeZoom',
			'growX' => 'growX',
			'growY' => 'growY',
			'scrollUp' => 'scrollUp',
			'scrollDown' => 'scrollDown',
			'scrollLeft' => 'scrollLeft',
			'scrollRight' => 'scrollRight',
			'scrollHorz' => 'scrollHorz',
			'scrollVert' => 'scrollVert',
    		'shuffle' => 'shuffle',
			'slideX' => 'slideX',
			'slideY' => 'slideY',
			'toss' => 'toss',
			'turnUp' => 'turnUp',
			'turnDown' => 'turnDown',
			'turnLeft' => 'turnLeft',
			'turnRight' => 'turnRight',
			'uncover' => 'uncover',
			'wipe' => 'wipe',
			'zoom' => 'zoom'
       );
       
       TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Slides Animation Effect', TMM_CC_TEXTDOMAIN),
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

	<div class="one-half testimonial_timeout" style="display: <?php if ($show == 'mode2' OR $show == 'mode3'): ?>inline-block<?php else: ?>none<?php endif; ?>;">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Timeout', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'timeout',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('timeout', '5000'),
			'description' => ''
		));
		?>

	</div>

	<div class="one-half testimonial_slidespeed" style="display: <?php if ($show == 'mode2' OR $show == 'mode3'): ?>inline-block<?php else: ?>none<?php endif; ?>;">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Slide Speed', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'slidespeed',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('slidespeed', '300'),
			'description' => ''
		));
		?>

	</div>

	<div class="one-half testimonial_nav" style="display: <?php if ($show == 'mode2' OR $show == 'mode3'): ?>inline-block<?php else: ?>none<?php endif; ?>;">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show Pagination', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'nav',
			'id' => 'nav',
			'is_checked' => TMM_Content_Composer::set_default_value('nav', 1),
			'description' => __('Show/Hide Pagination', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div>


	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show name', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_name',
			'id' => 'show_name',
			'is_checked' => TMM_Content_Composer::set_default_value('show_name', 1),
			'description' => __('Show/Hide Name', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show photo', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_photo',
			'id' => 'show_photo',
			'is_checked' => TMM_Content_Composer::set_default_value('show_photo', 1),
			'description' => __('Show/Hide Photo', TMM_CC_TEXTDOMAIN)
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
					jQuery(".testimonial_timeout").hide(200);
					jQuery(".testimonial_slidespeed").hide(200);
					jQuery(".testimonial_nav").hide(200);
					jQuery(".content_select").show(200);
					break;
				case 'mode2':
				case 'mode3':
					jQuery(".testimonial_count").show(200);
					jQuery(".testimonial_timeout").show(200);
					jQuery(".testimonial_slidespeed").show(200);
					jQuery(".testimonial_nav").show(200);
					jQuery(".content_select").hide(200);
					break;
			}


			return true;
		});
		
	});
</script>