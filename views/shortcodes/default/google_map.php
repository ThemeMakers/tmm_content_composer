<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (TMM::get_option("api_key_google")){

	$inique_id = uniqid();

	$google_maps_api_key = (TMM::get_option("api_key_google")) ? 'key=' . TMM::get_option("api_key_google") . '&' : '' ;
	$map_link = 'https://maps.google.com/maps/api/js?' . $google_maps_api_key;

	$js_controls = '{}';

	if (!isset($mode)) {
		$mode = 'map';
	}

	if (isset($location_mode)) {
		if ($location_mode == 'address') {
			$address = str_replace(' ', '+', $address);
			$geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $address);
			$output = json_decode($geocode);
			if ($output->status == 'OK') {
				$latitude = $output->results[0]->geometry->location->lat;
				$longitude = $output->results[0]->geometry->location->lng;
			} else {
				$maptype = 'image';
			}
		}
	}

	if (!isset($maptype)) {
		$maptype = 'ROADMAP';
	}

	if (!isset($marker_is_draggable)) {
		$marker_is_draggable = 0;
	}

	if ($mode == 'map') {

		wp_enqueue_script("tmm_shortcode_google_api_js", $map_link);
		wp_enqueue_script('tmm_composer_front');
		?>

		<div class="google_map" id="google_map_<?php echo esc_attr($inique_id) ?>" style="height: <?php echo esc_attr($height) ?>px;"></div>

		<script type="text/javascript">
			jQuery(function() {
				gmt_init_map(<?php echo esc_attr($latitude) ?>,<?php echo esc_attr($longitude) ?>, "google_map_<?php echo esc_attr($inique_id) ?>", <?php echo esc_attr($zoom) ?>, "<?php echo esc_attr($maptype) ?>", "<?php echo esc_attr($content) ?>", "<?php echo esc_attr($enable_marker) ?>", "<?php echo esc_attr($enable_popup) ?>", "<?php echo esc_attr($enable_scrollwheel) ?>",<?php echo esc_attr($js_controls) ?>, "<?php echo esc_attr($marker_is_draggable) ?>");
			});
		</script>
	<?php } else { ?>
		<?php
		$marker_string = '';
		if ($enable_marker) {
			$marker_string = '&markers=color:red%7clabel:%7c' . $latitude . ',' . $longitude;
		}

		$location_mode_string = 'center=' . $latitude . ',' . $longitude;

		$staticmap = 'https://maps.googleapis.com/maps/api/staticmap?' . $location_mode_string . '&zoom=' . (int) $zoom . '&maptype=' . strtolower($maptype) . '&size=' . (int)$width . 'x' . (int)$height . $marker_string . '&' . $google_maps_api_key;

		?>
		<script type="text/javascript">
		jQuery(window).on('load', function(){
			var address = '<?php echo esc_attr($address) ?>';
			jQuery('.google_image_<?php echo esc_attr($inique_id) ?>')
				.html('<img src="' + encodeURI('<?php echo esc_attr($staticmap); ?>') + '" width="<?php echo esc_attr((int)$width); ?>" height="<?php echo esc_attr((int)$height); ?>" alt="' + address.split('+').join(' ') + '">');
		});
		</script>
		<div class="google_image_<?php echo esc_attr($inique_id) ?>"></div>

	<?php }

} else {
	$full_width = ($width == '' || $width == '100%') ? '1130' : $width;
	$custom_height = ($height == '') ? '400' : $height;
	$link_url = 'https://placeholdit.imgix.net/~text?txtsize=40&txt=Please+Enter+a+Valid+Google+API+key&w='. $full_width . '&h=' . $custom_height;
	echo '<img class="aligncenter" src=' . $link_url . '>';
}