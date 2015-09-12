<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'type',
			'id' => 'type',
			'options' => array(
				'youtube' => 'Youtube',
				'vimeo' => 'Vimeo',
			),
			'default_value' => TMM_Content_Composer::set_default_value('type', 'youtube'),
			'description' => ''
		));
		?>

	</div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Youtube or Vimeo link', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => 'content',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => __('Examples:https://www.youtube.com/watch?v=_EBYf3lYSEg or http://vimeo.com/22439234', TMM_CC_TEXTDOMAIN)
		));
		?>

<<<<<<< HEAD
	</div><!--/ .one-half-->

	<div class="fullwidth">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Cover Image', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'cover_image',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('cover_image', ''),
			'description' => ''
		));
		?>

=======
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Width', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'width',
			'id' => 'width',
			'default_value' => TMM_Content_Composer::set_default_value('width', ''),
			'description' => ''
		));
		?>

	</div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Height', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'height',
			'id' => 'height',
			'default_value' => TMM_Content_Composer::set_default_value('height', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
<<<<<<< HEAD


=======
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
<<<<<<< HEAD

	});


=======
	});
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
</script>

