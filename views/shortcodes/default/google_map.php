<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$inique_id = uniqid();
wp_enqueue_script('tmm_theme_map_api_js', 'https://maps.googleapis.com/maps/api/js?sensor=false');
wp_enqueue_script('tmm_composer_front');

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
?>

<?php if ($mode == 'map'): ?>

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

	<img src="http://maps.googleapis.com/maps/api/staticmap?<?php echo $location_mode_string ?>&amp;zoom=<?php echo $zoom ?>&amp;maptype=<?php echo strtolower($maptype) ?>&amp;size=<?php echo $width ?>x<?php echo $height ?><?php echo $marker_string ?>&amp;sensor=false" alt="">

<?php endif;


