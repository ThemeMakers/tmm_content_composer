<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">

		<div class="one-half">
			<h4 class="label"><?php esc_html_e('Category', 'tmm_content_composer'); ?></h4>
			<?php
			wp_dropdown_categories(array(
				'hide_empty' => 0,
				'hierarchical' => true,
				'id' => 'posts_category',
				'selected' => TMM_Content_Composer::set_default_value('posts_category', ''),
			))
			?>
		</div><!--/ .on-half-->

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Posts count', 'tmm_content_composer'),
				'shortcode_field' => 'count',
				'id' => 'count',
				'options' => array(
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
				),
				'default_value' => TMM_Content_Composer::set_default_value('count', 4),
				'description' => ''
			));
			?>

		</div><!--/ .on-half-->

		<div class="one-half">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => esc_html__('Show "Read more" button', 'tmm_content_composer'),
				'shortcode_field' => 'show_readmore_button',
				'id' => 'show_readmore_button',
				'is_checked' => TMM_Content_Composer::set_default_value('show_readmore_button', 1),
				'description' => esc_html__('Show "Read more" button', 'tmm_content_composer')
			));
			?>

		</div><!--/ .ona-half-->

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => esc_html__('Show post metadata', 'tmm_content_composer'),
				'shortcode_field' => 'show_post_metadata',
				'id' => 'show_post_metadata',
				'is_checked' => TMM_Content_Composer::set_default_value('show_post_metadata', 1),
				'description' => esc_html__('Show post metadata', 'tmm_content_composer')
			));
			?>

		</div><!--/ .ona-half-->

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Content Char Count', 'tmm_content_composer'),
				'shortcode_field' => 'char_count',
				'id' => 'char_count',
				'default_value' => TMM_Content_Composer::set_default_value('char_count', 140),
				'description' => '',
			));
			?>

		</div><!--/ .on-half-->

	</div>

</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		jQuery("#posts_category").attr('data-shortcode-field', 'category');
		jQuery("#posts_category").addClass('js_shortcode_template_changer');
		//***

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
		//***
		jQuery("#posts_category").prepend('<option value="0" class="level--1"><?php esc_html_e('All categories', 'tmm_content_composer'); ?></option>');
		jQuery("#posts_category option:eq(0)").attr('selected', 'selected');
		tmm_ext_shortcodes.changer(shortcode_name);
	});
</script>
