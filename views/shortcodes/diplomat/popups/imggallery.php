<?php
if (!defined('ABSPATH')) die('No direct access allowed');

$gal_categories = array();
$gal_terms = TMM_Gallery::get_gallery_tags();

if ($gal_terms) {
	foreach ( $gal_terms as $term ) {
		$gal_categories[$term->term_id] = $term->name;
	}
}
?>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">
		<div class="one-half">

			<?php

			$type_options = array(
				'default' => __('Default', TMM_CC_TEXTDOMAIN),
			);

			if (strpos($_SERVER['HTTP_REFERER'], 'nav-menus.php') === false) {
				$type_options['albums'] = __('Albums', TMM_CC_TEXTDOMAIN);
			}

			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Gallery Type', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'gallery_type',
				'id' => 'gallery_type',
				'options' => $type_options,
				'default_value' => TMM_Content_Composer::set_default_value('gallery_type', 'default'),
				'description' => ''
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-half">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Display', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'display_images',
				'id' => '',
				'options' => array(
					'cover' => __('Cover Images', TMM_CC_TEXTDOMAIN),
					'inside' => __('Images From Gallery', TMM_CC_TEXTDOMAIN)
				),
				'default_value' => TMM_Content_Composer::set_default_value('display_images', 'cover'),
				'description' => ''
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-half option-default">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Layout', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'content',
				'id' => '',
				'options' => array(
					2 => __('2 Columns', TMM_CC_TEXTDOMAIN),
					3 => __('3 Columns', TMM_CC_TEXTDOMAIN),
					4 => __('4 Columns', TMM_CC_TEXTDOMAIN),

				),
				'default_value' => TMM_Content_Composer::set_default_value('content', 3),
				'description' => ''
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-half option-default">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => __('Posts per page', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'posts_per_page',
				'id' => '',
				'default_value' => TMM_Content_Composer::set_default_value('posts_per_page', 6),
				'description' => __('Posts per page', TMM_CC_TEXTDOMAIN),
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-half option-default">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => __('Posts per load', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'posts_per_load',
				'id' => '',
				'default_value' => TMM_Content_Composer::set_default_value('posts_per_load', 6),
				'description' => __('Posts per load', TMM_CC_TEXTDOMAIN),
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-half option-default">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'multiple' => true,
				'title' => __('Category', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'gal_category',
				'id' => 'gal_category',
				'options' => $gal_categories,
				'default_value' => TMM_Content_Composer::set_default_value('gal_category', ''),
				'description' => ''
			));
			?>

		</div><!--/ .ona-half-->

		<div class="one-half option-default">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => __('Enable Gallery Filter', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'folio_filter',
				'id' => 'folio_filter',
				'is_checked' => TMM_Content_Composer::set_default_value('folio_filter', 1),
				'description' => __('Enable Folio Filter', TMM_CC_TEXTDOMAIN)
			));
			?>

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => __('Show categories', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'show_categories',
				'id' => 'show_categories',
				'is_checked' => TMM_Content_Composer::set_default_value('show_categories', 1),
				'description' => __('Show/Hide Categories', TMM_CC_TEXTDOMAIN)
			));
			?>

		</div>
	</div>

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
		var galleryType = jQuery('#gallery_type'),
			optionDefault = jQuery('.option-default'),
			galleryTypeVal = galleryType.val();

		changeGalleryType(galleryTypeVal);

		galleryType.on('change', function(){
			var $this = jQuery(this),
				val = $this.val();
			changeGalleryType(val);

		});

		function changeGalleryType(val){
			if (val=='albums'){
				optionDefault.slideUp(100);
			}else{
				optionDefault.slideDown(300);
			}
		}

	});

</script>
