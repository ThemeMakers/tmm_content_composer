<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">
		<?php
		//username
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Twitter Widget ID', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', '345111976353091584'),
			'description' => ''
		));
		?>

    </div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Number of tweets', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'count',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('count', 2),
			'description' => ''
		));
		?>

    </div><!--/ .one-half-->
	
	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Timeout', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'timeout',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('timeout', 6000),
			'description' => ''
		));
		?>

    </div><!--/ .one-half-->
		
	<div class="one-half">
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Animation', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'animation',
			'id' => '',
			'options' => array(
				'' => 'None',
				'opacity' => 'Opacity',
				'scale' => 'Scale',
				'slideRight' => 'SlideRight',
				'slideLeft' => 'SlideLeft',
				'slideDown' => 'SlideDown',
				'slideUp' => 'SlideUp',
			),
			'default_value' => TMM_Content_Composer::set_default_value('animation', ''),
			'description' => 'Waypoints is a jQuery plugin that makes it easy to execute a function whenever you scroll to an element.'
		));
		?>	 
		
	</div>

    <div class="clear"></div>

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {

		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
		//selectwrap();

	});
</script>

