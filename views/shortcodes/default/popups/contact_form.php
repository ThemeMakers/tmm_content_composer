<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	<div class="one-half">
		<?php
		/**
		* ---------------- Choose Contact Form ----------------
		*/
		$contact_forms = Thememakers_Entity_Contact_Form::get_forms_names();
		$select_form_options_array = array();

		if ( !empty($contact_forms) ) {
			foreach ($contact_forms as $name) {
                $select_form_options_array[$name] = __($name, TMM_CC_TEXTDOMAIN);
			}
		}

		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Choose Contact Form', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'content',
				'id' => '',
				'options' => $select_form_options_array,
				'default_value' => TMM_Content_Composer::set_default_value('content', ''),
				'description' => ''
		));
		?>
	</div><!--/ .one-half-->
</div><!--/ .tmm_shortcode_template-->

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



