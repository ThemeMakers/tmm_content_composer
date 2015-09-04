<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		$contact_forms = TMM_Contact_Form::get_forms_names();
		unset($contact_forms['__FORM_NAME__']);
		
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Choose Contact Form', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'form_content',
			'id' => 'form_content',
			'options' => $contact_forms,
			'default_value' => TMM_Content_Composer::set_default_value('form_content', ''),
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
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>

