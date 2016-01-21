<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">


	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Category', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'category',
			'id' => 'category',
			'options' => TMM_Helper::get_post_categories(),
			'default_value' => TMM_Content_Composer::set_default_value('category', ''),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Order By', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'orderby',
			'id' => 'orderby',
			'options' => TMM_Helper::get_post_sort_array(),
			'default_value' => TMM_Content_Composer::set_default_value('orderby', ''),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Meta Data', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_metadata',
			'id' => 'show_metadata',
			'is_checked' => TMM_Content_Composer::set_default_value('show_metadata', 1),
			'description' => __('Show/Hide Meta Info', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Order', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'order',
			'id' => 'order',
			'options' => array(
				'DESC' => __('DESC', TMM_CC_TEXTDOMAIN),
				'ASC' => __('ASC', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('order', 'DESC'),
			'description' => ''
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts Count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'posts_per_page',
			'id' => 'posts_per_page',
			'default_value' => TMM_Content_Composer::set_default_value('posts_per_page', 5),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'posts',
			'id' => 'posts',
			'default_value' => TMM_Content_Composer::set_default_value('posts', ''),
			'description' => __('Example: 56,73,119. It has the most hight priority!', TMM_CC_TEXTDOMAIN)
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
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		selectwrap();

	});
</script>



