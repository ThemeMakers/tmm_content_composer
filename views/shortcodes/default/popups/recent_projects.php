<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		$content = array();
		for ($i = 1; $i <= 20; $i++) {
			$content[$i] = $i;
		}
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Projects Count', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => '',
			'options' => $content,
			'default_value' => TMM_Content_Composer::set_default_value('content', 4),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		$template = array(
			'1/2' => '1/2',
			'1/3' => '1/3',
			'1/4' => '1/4',
		);

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Template', 'tmm_content_composer'),
			'shortcode_field' => 'template',
			'id' => '',
			'options' => $template,
			'default_value' => TMM_Content_Composer::set_default_value('template', '1/3'),
			'description' => ''
		));
		?>

	</div>	

	<br />
	<br />

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Show "See all projects" button', 'tmm_content_composer'),
			'shortcode_field' => 'show_button',
			'id' => 'show_button',
			'is_checked' => TMM_Content_Composer::set_default_value('show_button', 0)
		));
		?>

	</div><!--/ .ona-half-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			if(jQuery(this).attr('type') == 'checkbox'){
				if (jQuery(this).is(':checked')) {
					jQuery(this).val(1);
				} else {
					jQuery(this).val(0);
				}
			}
			tmm_ext_shortcodes.changer(shortcode_name);
		});
	});
</script>
