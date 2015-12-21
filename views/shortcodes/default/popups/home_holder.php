<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	
	<!--<div class="one-half">
		
		<h4 class="label"><?php /*_e('Y-offset', TMM_THEME_FOLDER_NAME); */?></h4>
                <input type="text" value="<?php /*echo  TMM_Content_Composer::set_default_value('offset', '0'); */?>" class="js_shortcode_template_changer data-input" data-shortcode-field="offset" />
		
		<span class="preset_description">
			<?php /*_e('Need for home page', TMM_THEME_FOLDER_NAME); */?>
		</span>	
	</div>--><!--/ .one-half-->

	<div class="one-half">
		<?php
		/**
		 * --------------------- Y-offset ---------------------
		 */

		TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => __('Y-offset', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'offset',
				'id' => '',
				'default_value' => TMM_Content_Composer::set_default_value('offset', '0'),
				'description' => _e('Need for home page', TMM_THEME_FOLDER_NAME),
		));
		?>
	</div><!--/ .one-half-->

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



