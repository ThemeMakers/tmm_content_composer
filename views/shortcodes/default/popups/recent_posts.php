<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<h4 class="label"><?php _e('Category', TMM_CC_TEXTDOMAIN); ?></h4>

		<label class="sel">
		<?php
		wp_dropdown_categories(array(
			'show_option_all' => __('All categories', TMM_CC_TEXTDOMAIN),
			'hide_empty' => 0,
			'hierarchical' => true,
			'id' => 'posts_category',
			'class' => 'data-select',
			'selected' => TMM_Content_Composer::set_default_value('posts_category', 0),
		))
		?>
		</label>

	</div><!--/ .on-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Posts count', TMM_CC_TEXTDOMAIN),
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
			'title' => __('Show "Read more" button', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_readmore_button',
			'id' => 'show_readmore_button',
			'is_checked' => TMM_Content_Composer::set_default_value('show_readmore_button', 1),
			'description' => __('Show "Read more" button', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show post metadata', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_post_metadata',
			'id' => 'show_post_metadata',
			'is_checked' => TMM_Content_Composer::set_default_value('show_post_metadata', 1),
			'description' => __('Show post metadata', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Content Char Count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'char_count',
			'id' => 'char_count',
			'default_value' => TMM_Content_Composer::set_default_value('char_count', 140),
			'description' => '',
		));
		?>

	</div><!--/ .on-half-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		jQuery("#posts_category").attr('data-shortcode-field', 'posts_category')
			                    .addClass('js_shortcode_template_changer');

		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>
