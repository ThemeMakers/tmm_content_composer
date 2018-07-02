<?php
if (!defined('ABSPATH')) die('No direct access allowed');

$folio_categories = array();
$folio_terms = TMM_Portfolio::get_folio_tags();

if ($folio_terms) {
	foreach ( $folio_terms as $term ) {
		$folio_categories[$term->term_id] = $term->name;
	}
}
?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Layout', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'options' => array(                           
				3 => esc_html__('3 Columns', TMM_CC_TEXTDOMAIN),
				4 => esc_html__('4 Columns', TMM_CC_TEXTDOMAIN),
                5 => esc_html__('5 Columns', TMM_CC_TEXTDOMAIN),
                6 => esc_html__('6 Columns', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('content', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Display', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'display_images',
			'id' => '',
			'options' => array(
				'cover' => esc_html__('Cover Images', TMM_CC_TEXTDOMAIN),
				'inside' => esc_html__('Images From Portfolio', TMM_CC_TEXTDOMAIN)
			),
			'default_value' => TMM_Content_Composer::set_default_value('display_images', 'cover'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Posts per page', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'posts_per_page',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('posts_per_page', 6),
			'description' => esc_html__('Posts per page', TMM_CC_TEXTDOMAIN),
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Hover Appearance Effect', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'hover_effect',
			'id' => 'hover_effect',
			'options' => array(
				'colored' => esc_html__('Colored with info', TMM_CC_TEXTDOMAIN),
				'without_effect' => esc_html__('Without any effect', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('hover_effect', 'colored'),
			'description' => esc_html__('Hover appearance effect', TMM_CC_TEXTDOMAIN)
		));
		?>
	</div>
        
    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Posts per load', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'posts_per_load',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('posts_per_load', 6),
			'description' => esc_html__('Posts per load', TMM_CC_TEXTDOMAIN),
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'multiple' => true,
			'title' => esc_html__('Category', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'folio_category',
			'id' => 'folio_category',
			'options' => $folio_categories,
			'default_value' => TMM_Content_Composer::set_default_value('folio_category', ''),
			'description' => ''
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Enable Folio Filter', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'folio_filter',
			'id' => 'folio_filter',
			'is_checked' => TMM_Content_Composer::set_default_value('folio_filter', 1),
			'description' => esc_html__('Enable Folio Filter', TMM_CC_TEXTDOMAIN)
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Show categories', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_categories',
			'id' => 'show_categories',
			'is_checked' => TMM_Content_Composer::set_default_value('show_categories', 1),
			'description' => esc_html__('Show/Hide Categories', TMM_CC_TEXTDOMAIN)
		));
		?>
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
	});

</script>
