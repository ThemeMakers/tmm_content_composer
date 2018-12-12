<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (TMM::get_option("api_key_google")){

$inique_id = uniqid();
$google_maps_api_key = (TMM::get_option("api_key_google")) ? 'key=' . TMM::get_option("api_key_google") . '&' : '' ;
$map_link = 'https://maps.google.com/maps/api/js?' . $google_maps_api_key . '&';

wp_enqueue_script("tmm_cc_front");?>
<script type='text/javascript' src='https://maps.google.com/maps/api/js?<?php echo esc_attr($google_maps_api_key) ?>&callback=initMap&ver=4.6.1' defer></script>

<?php

if (!isset($mode)) {
	$mode = 'map';
}


$controls = ""; //not need
$js_controls = '{';
if (!empty($controls)) {
	$controls = explode(',', $controls);
	if (!empty($controls)) {
		foreach ($controls as $key => $value) {
			if ($key > 0) {
				$js_controls.=',';
			}
			$js_controls.=$value . ': true';
		}
	}
}
$js_controls.='}';
?>

<?php
if ($location_mode == 'address') {
	// if location does not defined by user
	if('' === $address & '' === $latitude & '' === $longitude) {
		$address = 'New York';
	}

	$address = str_replace(' ', '+', $address);
	$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $address . '&' . $google_maps_api_key);
	$output = json_decode($geocode);

	// if latitude & longitude does not defined by user
	if ('' === $latitude & '' === $longitude) {
		$latitude = $output->results[0]->geometry->location->lat;
		$longitude = $output->results[0]->geometry->location->lng;
	}
}
?>

<?php if ($mode == 'map'): ?>

	<div class="google_map"
		 id="google_map_<?php echo esc_attr($inique_id) ?>"
		 style="height: <?php echo esc_attr( $height ) ?> px;" data-latitude="<?php echo esc_attr($latitude) ?>"
         data-longitude="<?php echo esc_attr($longitude) ?>"
         data-inique_id="<?php echo esc_attr($inique_id) ?>"
         data-zoom="<?php echo esc_attr($zoom) ?>" data-maptype="<?php echo esc_attr($maptype) ?>"
         data-content="<?php echo esc_attr($content) ?>"
         data-enable_marker="<?php echo esc_attr($enable_marker) ?>"
         data-enable_popup="<?php echo esc_attr($enable_popup) ?>"
         data-enable_scrollwheel="<?php echo esc_attr($enable_scrollwheel) ?>"
         data-js_controls="<?php echo esc_attr($js_controls) ?>"
         data-marker_is_draggable="<?php echo esc_attr($marker_is_draggable) ?>"></div>

	<script type="text/javascript">
		var map;
		function initMap() {
			gmt_init_map(<?php echo esc_attr($latitude) ?>,
				<?php echo esc_attr($longitude) ?>,
				"google_map_<?php echo esc_attr($inique_id) ?>",
				<?php echo esc_attr($zoom) ?>,
				"<?php echo esc_attr($maptype) ?>",
				"<?php echo esc_attr($content) ?>",
				"<?php echo esc_attr($enable_marker) ?>",
				"<?php echo esc_attr($enable_popup) ?>",
				"<?php echo esc_attr($enable_scrollwheel) ?>",
				<?php echo esc_attr($js_controls) ?>,
				"<?php echo esc_attr($marker_is_draggable) ?>"
			);
		}
	</script>
<?php else: ?>
	<?php
	$marker_string = '';
	if ($enable_marker) {
		$marker_string = '&markers=color:red|label:P|' . $latitude . ',' . $longitude;
	}

	$location_mode_string = 'center=' . $latitude . ',' . $longitude;
	?>

	<img src="https://maps.googleapis.com/maps/api/staticmap?<?php echo esc_attr($location_mode_string) ?>&zoom=<?php echo esc_attr($zoom) ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo esc_attr($width) ?>x<?php echo esc_attr($height) ?><?php echo esc_attr($marker_string) ?>&sensor=false&key=<?php echo TMM::get_option("api_key_google")?>">

<?php endif;

}
else{
	echo "<h4>"; 
	echo esc_html_e('Enter your Google Maps API key on Theme Options Page.', 'tmm_shortcodes');
	echo "</h4>";
}

?>