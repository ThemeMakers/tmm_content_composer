<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload_video',
			'title' => __('Youtube or Vimeo link', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => __('Examples: https://www.youtube.com/watch?v=_EBYf3lYSEg  http://vimeo.com/22439234 or upload self hosted video', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .one-half-->

	<div class="fullwidth">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Cover Image for Self Hosted Video', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'cover_image',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('cover_image', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show Cover Image Only on Mobiles', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'cover_image_on_mobiles',
			'id' => 'cover_image_on_mobiles',
			'is_checked' => TMM_Content_Composer::set_default_value('cover_image_on_mobiles', 1),
			'description' => __('Show Cover Image Only on Mobiles', TMM_CC_TEXTDOMAIN)
		));
		?>
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


	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});


</script>

