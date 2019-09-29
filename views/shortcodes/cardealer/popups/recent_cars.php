<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title', 'cardealer'),
			'shortcode_field' => 'title',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('title', ''),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show details button', 'cardealer'),
			'shortcode_field' => 'show_details_button',
			'id' => 'show_details_button',
			'is_checked' => TMM_Content_Composer::set_default_value('show_details_button', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show link to all cars', 'cardealer'),
			'shortcode_field' => 'show_view_all_cars_link',
			'id' => 'view_all_cars',
			'is_checked' => TMM_Content_Composer::set_default_value('show_view_all_cars_link', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable Currency Converter', 'cardealer'),
			'shortcode_field' => 'show_recent_cars_currency_converter',
			'id' => 'show_recent_cars_currency_converter',
			'is_checked' => TMM_Content_Composer::set_default_value('show_recent_cars_currency_converter', 1),
			'description' => __('Show currency converter', 'cardealer')
		));
		?>

		<?php
		$categories = get_terms( 'carproducer' );
		$options          = array();
		$options['']      = 'All';

		foreach ( $categories as $cate ) {
			$options[ $cate->term_id ] = __( $cate->name, 'cardealer' );
		}

		TMM_Content_Composer::html_option(array(
			'type'            => 'select',
			'title'           => __( 'Filter by make', 'cardealer' ),
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
			'title' => __('Enter number of cars', 'cardealer'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', 9),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show layout switcher', 'cardealer'),
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
			'title' => __('View Mode', 'cardealer'),
			'shortcode_field' => 'layout_mode',
			'id' => 'layout_mode',
			'options' => array(
				'grid' => __('Grid View', 'cardealer'),
				'list' => __('List View', 'cardealer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('layout_mode', 'grid'),
			'description' => ''
		));
		?>
		</div>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Slide featured cars images on hover', 'cardealer'),
			'shortcode_field' => 'set_featured_autoslide',
			'id' => 'featured_autoslide',
			'is_checked' => TMM_Content_Composer::set_default_value('set_featured_autoslide', 1),
			'description' => 'Slide images on hover for featured cars'
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Thumbnail size', 'cardealer'),
			'shortcode_field' => 'thumbnail_size',
			'id' => 'thumbnail_size',
			'options' => array(
				'small' => __('Small', 'cardealer'),
				'middle' => __('Middle', 'cardealer'),
				'large' => __('Large', 'cardealer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('thumbnail_size', 'large'),
			'description' => ''
		));
		?>

	</div>

</div><!--/ .tmm_shortcode_template->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
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
