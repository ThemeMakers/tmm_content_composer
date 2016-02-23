<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Height', 'tmm_content_composer'),
			'shortcode_field' => 'height',
			'id' => 'height',
			'default_value' => TMM_Content_Composer::set_default_value('height', 200),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->


	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Width', 'tmm_content_composer'),
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
			'type' => 'select',
			'title' => __('Mode', 'tmm_content_composer'),
			'shortcode_field' => 'mode',
			'id' => 'mode',
			'options' => array(
				'map' => __('Map', 'tmm_content_composer'),
				'image' => __('Image', 'tmm_content_composer'),
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
			'title' => __('Location mode', 'tmm_content_composer'),
			'shortcode_field' => 'location_mode',
			'id' => 'location_mode',
			'options' => array(
				'address' => __('Address', 'tmm_content_composer'),
				'coordinates' => __('Coordinates', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('location_mode', 'address'),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->



	<div class="one-half location_mode_coordinates location_mode_container">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Marker Latitude', 'tmm_content_composer'),
			'shortcode_field' => 'latitude',
			'id' => 'latitude',
			'default_value' => TMM_Content_Composer::set_default_value('latitude', 40.714623),
			'description' => __('Point on which the viewport will be centered. If not given and no markers are defined the viewport defaults to world view. In address Location mode it is calculated automatically!', 'tmm_content_composer')
		));
		?>		

	</div><!--/ .one-half-->


	<div class="one-half location_mode_coordinates location_mode_container">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Marker Longitude', 'tmm_content_composer'),
			'shortcode_field' => 'longitude',
			'id' => 'longitude',
			'default_value' => TMM_Content_Composer::set_default_value('longitude', -74.006605),
			'description' => __('Point on which the viewport will be centered. If not given and no markers are defined the viewport defaults to world view. In address Location mode it is calculated automatically!', 'tmm_content_composer')
		));
		?>
	</div><!--/ .one-half-->


	<div class="one-half location_mode_address location_mode_container">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Address', 'tmm_content_composer'),
			'shortcode_field' => 'address',
			'id' => 'address',
			'default_value' => TMM_Content_Composer::set_default_value('address', 'New York'),
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
			'title' => __('Zoom', 'tmm_content_composer'),
			'shortcode_field' => 'zoom',
			'id' => 'zoom',
			'options' => $zoom_array,
			'default_value' => TMM_Content_Composer::set_default_value('zoom', 11),
			'description' => __('Zoom value from 1 to 19 where 19 is the greatest and 1 the smallest.', 'tmm_content_composer')
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable Scrollwheel', 'tmm_content_composer'),
			'shortcode_field' => 'enable_scrollwheel',
			'id' => 'enable_scrollwheel',
			'is_checked' => TMM_Content_Composer::set_default_value('enable_scrollwheel', 0),
			'description' => __('Set to false to disable zooming with your mouses scrollwheel.', 'tmm_content_composer')
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Maptype', 'tmm_content_composer'),
			'shortcode_field' => 'maptype',
			'id' => 'maptype',
			'options' => array(
				'ROADMAP' => __('ROADMAP', 'tmm_content_composer'),
				'SATELLITE' => __('SATELLITE', 'tmm_content_composer'),
				'HYBRID' => __('HYBRID', 'tmm_content_composer'),
				'TERRAIN' => __('TERRAIN', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('maptype', 'ROADMAP'),
			'description' => ''
		));
		?>	
	</div><!--/ .one-half-->



	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable Marker', 'tmm_content_composer'),
			'shortcode_field' => 'enable_marker',
			'id' => 'enable_marker',
			'is_checked' => TMM_Content_Composer::set_default_value('enable_marker', 0),
			'description' => __('Set to false to disable display a marker in the viewport.', 'tmm_content_composer')
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable Popup', 'tmm_content_composer'),
			'shortcode_field' => 'enable_popup',
			'id' => 'enable_popup',
			'is_checked' => TMM_Content_Composer::set_default_value('enable_popup', 0),
			'description' => __('If true the info window for this marker will be shown when the map finished loading. If html is empty this option will be ignored.', 'tmm_content_composer')
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Marker is draggable', 'tmm_content_composer'),
			'shortcode_field' => 'marker_is_draggable',
			'id' => 'marker_is_draggable',
			'is_checked' => TMM_Content_Composer::set_default_value('marker_is_draggable', 0),
			'description' => __('Set marker draggable', 'tmm_content_composer')
		));
		?>		
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Html Content', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>
	</div><!--/ .one-half--> 

</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {

		var $mode = jQuery('select#mode'),
				$input = jQuery('input[type=text]#width');

		var checkMode = function(mode) {
			if (mode.children(':selected').val() == 'map') {
				$input.prop({
					"disabled": true
				}).css('background-color', '#eee');
			} else {
				$input.prop({
					"disabled": false
				}).css('background-color', '#fff');
			}
		};

		checkMode($mode);

		$mode.on('change', function() {
			checkMode(jQuery(this));
		});

		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>