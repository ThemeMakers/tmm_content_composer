<?php
$inique_id = uniqid();

$google_maps_api_key = (isset($key)) ? 'key=' . $key . '&' : '' ;
$map_link = '//maps.google.com/maps/api/js?' . $google_maps_api_key . 'sensor=false';
wp_enqueue_script("tmm_shortcode_google_api_js", $map_link);

$js_controls = '{}';

if (!isset($mode)) {
	$mode = 'map';
}

if (isset($location_mode) && $location_mode == 'address') {
	$address = str_replace(' ', '+', $address);
	$geocode = @file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
	if($geocode){
		$output = json_decode($geocode);
		if (isset($output->status) && $output->status != 'OVER_QUERY_LIMIT') {
			$latitude = $output->results[0]->geometry->location->lat;
			$longitude = $output->results[0]->geometry->location->lng;
		} else {
			$maptype = 'image';
		}
	}
}

if (!isset($maptype)) {
	$maptype = 'image';
}

if (isset($latitude) && $latitude !== '' && isset($longitude) && $longitude !== '') {

	if ($mode == 'map') {
		?>
		<div class="google_map" id="google_map_<?php echo $inique_id ?>" style="height: <?php echo $height ?>px;"></div>

		<script type="text/javascript">
			jQuery(function() {
				gmt_init_map(<?php echo $latitude ?>,<?php echo $longitude ?>, "google_map_<?php echo $inique_id ?>", <?php echo $zoom ?>, "<?php echo $maptype ?>", "<?php echo $content ?>", "<?php echo $enable_marker ?>", "<?php echo $enable_popup ?>", "<?php echo $enable_scrollwheel ?>",<?php echo $js_controls ?>, "<?php echo (isset($marker_is_draggable)) ? $marker_is_draggable : ''; ?>");
			});
		</script>

	<?php
	} else {

		$marker_string = '';
		if ($enable_marker) {
			$marker_string = '&markers=color:red|label:P|' . $latitude . ',' . $longitude;
		}

		$location_mode_string = 'center=' . $latitude . ',' . $longitude;
		?>

		<img src="https://maps.googleapis.com/maps/api/staticmap?<?php echo $location_mode_string ?>&zoom=<?php echo $zoom ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo $width ?>x<?php echo $height ?><?php echo $marker_string ?>&sensor=false">

	<?php
	}

}
?>