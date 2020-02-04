<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">
		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Width', 'tmm_content_composer'),
				'shortcode_field' => 'width',
				'id' => 'width',
				'default_value' => TMM_Content_Composer::set_default_value('width', '100%'),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Height', 'tmm_content_composer'),
				'shortcode_field' => 'height',
				'id' => 'height',
				'default_value' => TMM_Content_Composer::set_default_value('height', 200),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->

		<div class="one-half location_mode_coordinates location_mode_container">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Marker Latitude', 'tmm_content_composer'),
				'shortcode_field' => 'latitude',
				'id' => 'latitude',
				'default_value' => TMM_Content_Composer::set_default_value('latitude', 40.714623),
				'description' => esc_html__('Point on which the viewport will be centered. If not given and no markers are defined the viewport defaults to world view. In address Location mode it is calculated automatically!', 'tmm_content_composer')
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-half location_mode_coordinates location_mode_container">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Marker Longitude', 'tmm_content_composer'),
				'shortcode_field' => 'longitude',
				'id' => 'longitude',
				'default_value' => TMM_Content_Composer::set_default_value('longitude', -74.006605),
				'description' => esc_html__('Point on which the viewport will be centered. If not given and no markers are defined the viewport defaults to world view. In address Location mode it is calculated automatically!', 'tmm_content_composer')
			));
			?>
		</div><!--/ .one-half-->

		<div class="fullwidth location_mode_address location_mode_container">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Address', 'tmm_content_composer'),
				'shortcode_field' => 'address',
				'id' => 'address',
				'default_value' => TMM_Content_Composer::set_default_value('address', 'New York'),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->

		<div class="fullwidth map_mode_only">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => esc_html__('Enable Popup', 'tmm_content_composer'),
				'shortcode_field' => 'enable_popup',
				'id' => 'enable_popup',
				'is_checked' => TMM_Content_Composer::set_default_value('enable_popup', 0),
				'description' => esc_html__('If true the info window for this marker will be shown when the map finished loading. If html is empty this option will be ignored.', 'tmm_content_composer')
			));
			?>
		</div><!--/ .one-half-->

		<div class="fullwidth map_mode_only">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'textarea',
				'title' => esc_html__('Html Content', 'tmm_content_composer'),
				'shortcode_field' => 'content',
				'id' => 'content',
				'default_value' => TMM_Content_Composer::set_default_value('content', ''),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->


	</div>
	<div class="column">
		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Map Mode', 'tmm_content_composer'),
				'shortcode_field' => 'mode',
				'id' => 'mode',
				'options' => array(
					'map' => esc_html__('Map', 'tmm_content_composer'),
					'image' => esc_html__('Image', 'tmm_content_composer'),
				),
				'default_value' => TMM_Content_Composer::set_default_value('mode', 'map'),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Location mode', 'tmm_content_composer'),
				'shortcode_field' => 'location_mode',
				'id' => 'location_mode',
				'options' => array(
					'address' => esc_html__('Address', 'tmm_content_composer'),
					'coordinates' => esc_html__('Coordinates', 'tmm_content_composer'),
				),
				'default_value' => TMM_Content_Composer::set_default_value('location_mode', 'address'),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->

		<div class="one-half">
			<?php
			$zoom_array = array();
			for ($i = 1; $i <= 19; $i++) {
				$zoom_array[$i] = $i;
			}
			?>

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Zoom', 'tmm_content_composer'),
				'shortcode_field' => 'zoom',
				'id' => 'zoom',
				'options' => $zoom_array,
				'default_value' => TMM_Content_Composer::set_default_value('zoom', 11),
				'description' => esc_html__('Zoom value from 1 to 19 where 19 is the greatest and 1 the smallest.', 'tmm_content_composer')
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Maptype', 'tmm_content_composer'),
				'shortcode_field' => 'maptype',
				'id' => 'maptype',
				'options' => array(
					'ROADMAP' => 'ROADMAP',
					'SATELLITE' => 'SATELLITE',
					'HYBRID' => 'HYBRID',
					'TERRAIN' => 'TERRAIN',
				),
				'default_value' => TMM_Content_Composer::set_default_value('maptype', 'ROADMAP'),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->

		<div class="one-half image_mode_only">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Map Scale', 'tmm_content_composer'),
				'shortcode_field' => 'mapscale',
				'id' => 'mapscale',
				'options' => array(
					'1' => '1',
					'2' => '2',
				),
				'default_value' => TMM_Content_Composer::set_default_value('mapscale', '1'),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->

		<div class="one-half map_mode_only">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => esc_html__('Enable Scrollwheel', 'tmm_content_composer'),
				'shortcode_field' => 'enable_scrollwheel',
				'id' => 'enable_scrollwheel',
				'is_checked' => TMM_Content_Composer::set_default_value('enable_scrollwheel', 0),
				'description' => esc_html__('Set to false to disable zooming with your mouses scrollwheel.', 'tmm_content_composer')
			));
			?>
		</div><!--/ .one-half-->

		<div class="one-half map_mode_only">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => esc_html__('Enable Marker', 'tmm_content_composer'),
				'shortcode_field' => 'enable_marker',
				'id' => 'enable_marker',
				'is_checked' => TMM_Content_Composer::set_default_value('enable_marker', 0),
				'description' => esc_html__('Set to false to disable display a marker in the viewport.', 'tmm_content_composer')
			));
			?>
		</div><!--/ .one-half-->

		<div class="one-half map_mode_only">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => esc_html__('Marker is draggable', 'tmm_content_composer'),
				'shortcode_field' => 'marker_is_draggable',
				'id' => 'marker_is_draggable',
				'is_checked' => TMM_Content_Composer::set_default_value('marker_is_draggable', 0),
				'description' => esc_html__('Set marker draggable', 'tmm_content_composer')
			));
			?>
		</div><!--/ .one-half-->
	</div>

</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {

		var $mode = jQuery('select#mode'),
			$input = jQuery('input[type=text]#width'),
			$locationMode = jQuery('select#location_mode'),
			$coords = jQuery('.location_mode_coordinates'),
			$address = jQuery('.location_mode_address'),
			$imageModeOnly = jQuery('.image_mode_only'),
			$mapModeOnly = jQuery('.map_mode_only');

		var checkMode = function(mode) {
			if (mode.children(':selected').val() === 'map') {
				$input.prop({
					"disabled": true
				}).css('background-color', '#eee');
				$imageModeOnly.fadeOut();
				$mapModeOnly.fadeIn();
			} else {
				$input.prop({
					"disabled": false
				}).css('background-color', '#fff');
				$imageModeOnly.fadeIn();
				$mapModeOnly.fadeOut();
			}
		};

		var checkLocationMode = function(mode) {
			if (mode.children(':selected').val() === 'address') {
				$coords.fadeOut();
				$address.fadeIn();
			} else {
				$coords.fadeIn();
				$address.fadeOut();
			}
		};

		checkMode($mode);

		$mode.on('change', function() {
			checkMode(jQuery(this));
		});

		checkLocationMode($locationMode);

		$locationMode.on('change', function() {
			checkLocationMode(jQuery(this));
		});

		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>