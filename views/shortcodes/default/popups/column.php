<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div id="tmm_shortcode_column_template" class="tmm_shortcode_template clearfix">
	<div class="fullwidth">
		<a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" href="javascript:add_shortcode_column_list_item();void(0);"><?php _e('Add Column', TMM_CC_DIR); ?></a>
	</div>
</div><!--/ .thememakers_shortcode_column_template-->

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	<div class="fullwidth">
		<ul id="shortcode_column_list">
			<li>

			<?php
			/**
			* ---------------- Select Type ----------------
			*/
			TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Select Type', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'type',
					'id' => 'type',
					'options' => array(
							'one-third' => __('One Third', TMM_CC_TEXTDOMAIN),
							'one-fourth' => __('One Fourth', TMM_CC_TEXTDOMAIN),
							'one-fifth' => __('One Fifth', TMM_CC_TEXTDOMAIN),
							'one-half' => __('One Half', TMM_CC_TEXTDOMAIN),
							'two-third' => __('Two Third', TMM_CC_TEXTDOMAIN),
							'three-fourth' => __('Three Fourth', TMM_CC_TEXTDOMAIN),
							'full-width' => __('Full Width', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('type', 'one-third'),
					'description' => ''
			));
			?>

			<?php
			/**
			* ---------------- Content ----------------
			*/
			TMM_Content_Composer::html_option(array(
					'type' => 'textarea',
					'title' => __('Content', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'content',
					'id' => '',
					'default_value' => TMM_Content_Composer::set_default_value('content', ''),
					'description' => ''
			));
			?>

			</li>
		</ul>
	</div><!--/ .fullwidth -->
</div><!--/ #tmm_shortcode_template -->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">

	<script type="text/javascript">
		var shortcode_column_list = null;
		var shortcode_column_list_template = null;
		var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

		jQuery(function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});

			//***
			shortcode_column_list = jQuery("#shortcode_column_list");
			shortcode_column_list_template = jQuery("#shortcode_column_list li:first-child").html();

		});

	//*****

		function add_shortcode_column_list_item() {
			jQuery(shortcode_column_list).append("<li>" + shortcode_column_list_template + "</li>");
			tmm_ext_shortcodes.changer(shortcode_name);
			jQuery(".js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});
		}

	</script>
	
</div><!--/ .fullwidth-frame-->


