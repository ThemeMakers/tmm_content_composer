<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div id="tmm_shortcode_template" class="thememakers_shortcode_template clearfix">
	<div class="one-half">
		<?php
		/**
		 * ---------------- Link to Audio ----------------
		 */
		TMM_Content_Composer::html_option(array(
				'type' => 'upload_video',
				'title' => __('Link to Audio', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'content',
				'id' => '',
				'default_value' => TMM_Content_Composer::set_default_value('content', ''),
				'description' => ''
		));
		?>
	</div><!--/ .one-half-->
	
	<div class="clear"></div>
</div><!--/ .thememakers_shortcode_template-->


<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">

	<script type="text/javascript">
		var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

		jQuery(function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});

		});
	</script>
	
</div><!--/ .fullwidth-frame-->




