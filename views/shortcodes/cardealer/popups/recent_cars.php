<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Title', 'tmm_content_composer'),
			'shortcode_field' => 'title',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('title', ''),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Show details button', 'tmm_content_composer'),
			'shortcode_field' => 'show_details_button',
			'id' => 'show_details_button',
			'is_checked' => TMM_Content_Composer::set_default_value('show_details_button', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Show link to all cars', 'tmm_content_composer'),
			'shortcode_field' => 'show_view_all_cars_link',
			'id' => 'view_all_cars',
			'is_checked' => TMM_Content_Composer::set_default_value('show_view_all_cars_link', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Enable Currency Converter', 'tmm_content_composer'),
			'shortcode_field' => 'show_recent_cars_currency_converter',
			'id' => 'show_recent_cars_currency_converter',
			'is_checked' => TMM_Content_Composer::set_default_value('show_recent_cars_currency_converter', 1),
			'description' => esc_html__('Show currency converter', 'tmm_content_composer')
		));
		?>

		<?php
		$categories = get_terms( 'carproducer' );
		$options          = array();
		$options['']      = 'All';

		foreach ( $categories as $cate ) {
			$options[ $cate->term_id ] = __( $cate->name, 'tmm_content_composer' );
		}

		TMM_Content_Composer::html_option(array(
			'type'            => 'select',
			'title'           => __( 'Filter by make', 'tmm_content_composer' ),
			'shortcode_field' => 'cate',
			'id'              => '',
			'options'         => $options,
			'default_value'   => TMM_Content_Composer::set_default_value( 'cate', '' ),
			'description'     => '',
		));
		?>

	</div>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Enter number of cars', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', 9),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Show layout switcher', 'tmm_content_composer'),
			'shortcode_field' => 'show_layout_switcher',
			'id' => 'layout_switcher',
			'is_checked' => TMM_Content_Composer::set_default_value('show_layout_switcher', 1),
			'description' => ''
		));
		?>

		<div class="recent_cars_view_mode_wrapper" style="display: <?php echo TMM_Content_Composer::set_default_value('show_layout_switcher', 1) == 1 ? 'none' : 'block'; ?>">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('View Mode', 'tmm_content_composer'),
			'shortcode_field' => 'layout_mode',
			'id' => 'layout_mode',
			'options' => array(
				'grid' => esc_html__('Grid View', 'tmm_content_composer'),
				'list' => esc_html__('List View', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('layout_mode', 'grid'),
			'description' => ''
		));
		?>
		</div>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Slide featured cars images on hover', 'tmm_content_composer'),
			'shortcode_field' => 'set_featured_autoslide',
			'id' => 'featured_autoslide',
			'is_checked' => TMM_Content_Composer::set_default_value('set_featured_autoslide', 1),
			'description' => 'Slide images on hover for featured cars'
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Thumbnail size', 'tmm_content_composer'),
			'shortcode_field' => 'thumbnail_size',
			'id' => 'thumbnail_size',
			'options' => array(
				'small' => esc_html__('Small', 'tmm_content_composer'),
				'middle' => esc_html__('Middle', 'tmm_content_composer'),
				'large' => esc_html__('Large', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('thumbnail_size', 'large'),
			'description' => ''
		));
		?>

	</div>

</div><!--/ .tmm_shortcode_template -->

<script>
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery('#layout_switcher').on('click', function() {
			if (jQuery(this).is(':checked')) {
				jQuery('.recent_cars_view_mode_wrapper').hide();
			} else {
				jQuery('.recent_cars_view_mode_wrapper').show();
			}
		});

	});
</script>
