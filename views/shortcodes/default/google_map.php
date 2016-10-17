<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (TMM::get_option("api_key_google")){

	$inique_id = uniqid();

	$google_maps_api_key = (TMM::get_option("api_key_google")) ? 'key=' . TMM::get_option("api_key_google") . '&' : '' ;
	$map_link = '//maps.google.com/maps/api/js?' . $google_maps_api_key . 'sensor=false';
	wp_enqueue_script("tmm_shortcode_google_api_js", $map_link);

	$js_controls = '{}';

	if (!isset($mode)) {
		$mode = 'map';
	}

	if (isset($location_mode)) {
		if ($location_mode == 'address') {
			$address = str_replace(' ', '+', $address);
			$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
			$output = json_decode($geocode);
			if ($output->status != 'OVER_QUERY_LIMIT') {
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

	if (!isset($marker_is_draggable)) {
		$marker_is_draggable = 0;
	}

	if ($mode == 'map'):

		wp_enqueue_script('tmm_composer_front');
		?>

		<div class="google_map" id="google_map_<?php echo $inique_id ?>" style="height: <?php echo $height ?>px;"></div>

		<script type="text/javascript">
			jQuery(function() {
				gmt_init_map(<?php echo $latitude ?>,<?php echo $longitude ?>, "google_map_<?php echo $inique_id ?>", <?php echo $zoom ?>, "<?php echo $maptype ?>", "<?php echo $content ?>", "<?php echo $enable_marker ?>", "<?php echo $enable_popup ?>", "<?php echo $enable_scrollwheel ?>",<?php echo $js_controls ?>, "<?php echo @$marker_is_draggable ?>");
			});
		</script>
	<?php else: ?>
		<?php
		$marker_string = '';
		if ($enable_marker) {
			$marker_string = '&amp;markers=color:red%7cCourgette%7clabel:P%7cCourgette%7c' . $latitude . ',' . $longitude;
		}

		$location_mode_string = 'center=' . $latitude . ',' . $longitude;
		?>
		<script type="text/javascript">
		jQuery(window).on('load', function(){
			jQuery('.google_image_<?php echo $inique_id ?>')
				.html('<img src="http://maps.googleapis.com/maps/api/staticmap?<?php echo $location_mode_string ?>&zoom=<?php echo (int) $zoom ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo (int)$width ?>x<?php echo (int)$height ?><?php echo $marker_string ?>&key=<?php echo TMM::get_option("api_key_google")?>&sensor=false">');
		});
		</script>
		<div class="google_image_<?php echo $inique_id ?>"></div>

	<?php endif;

}

else{
	$full_width = ($width == '' || $width == '100%') ? '1130' : $width;
	$custom_height = ($height == '') ? '400' : $height;
	$link_url = 'http://placeholdit.imgix.net/~text?txtsize=40&txt=Please+Enter+a+Valid+Google+API+key&w='. $full_width . '&h=' . $custom_height;
	echo '<img class="aligncenter" src=' . $link_url . '>';
}


