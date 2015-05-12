<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Layout', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'gallery_layout',
			'id' => 'gallery_layout',
			'options' => array(
				3 => __('3 Columns', TMM_CC_TEXTDOMAIN),
				4 => __('4 Columns', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('gallery_layout', 4),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
			
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Items Per Page', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'post_per_page',
			'id' => 'post_per_page',
			'default_value' => TMM_Content_Composer::set_default_value('post_per_page', '12'),
			'description' => __('', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		$gallery_categories_terms = get_terms('gallery-categories', array('hide_empty' => true));
		$gallery_categories = array(0 => __('All', TMM_CC_TEXTDOMAIN));
		if (!empty($gallery_categories_terms)) {
			foreach ($gallery_categories_terms as $value) {
				$gallery_categories[$value->term_id] = $value->name;
			}
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Category', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'gallery_category',
			'id' => 'gallery_category',
			'options' => $gallery_categories,
			'default_value' => TMM_Content_Composer::set_default_value('gallery_category', 0),
			'description' => __('Show galleries by selected categories', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show pagination', 'almera'),
			'shortcode_field' => 'show_gallery_pagination',
			'id' => 'show_gallery_pagination',
			'is_checked' => TMM_Content_Composer::set_default_value('show_gallery_pagination', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show filter', 'almera'),
			'shortcode_field' => 'show_gallery_filter',
			'id' => 'show_gallery_filter',
			'is_checked' => TMM_Content_Composer::set_default_value('show_gallery_filter', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.album_changer(shortcode_name);
			}
		});

		tmm_ext_shortcodes.album_changer(shortcode_name);
		
		jQuery(".js_add_list_item").click(function() {
			var clone = jQuery(".list_item:last").clone(true);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			//***
			var icon_class = jQuery(".list_item:first").find('select').val();
			jQuery(".list_item:last").find('select').val(icon_class);
			tmm_ext_shortcodes.album_changer(shortcode_name);
			return false;
		});
		
		jQuery("#post_per_page").change(function() {
			tmm_ext_shortcodes.album_changer(shortcode_name);
		});

		jQuery("#gallery_layout").change(function() {
			tmm_ext_shortcodes.album_changer(shortcode_name);
		});

		jQuery("#gallery_category").change(function() {
			tmm_ext_shortcodes.album_changer(shortcode_name);
		});

		jQuery(".js_delete_list_item").click(function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.album_changer(shortcode_name);
				});
			}

			return false;
		});

	});
</script>


