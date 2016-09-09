<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$inique_id = uniqid();
$google_maps_api_key = (TMM::get_option("api_key_google")) ? 'key=' . TMM::get_option("api_key_google") . '&' : '' ;
$map_link = '//maps.google.com/maps/api/js?' . $google_maps_api_key . 'sensor=false&';

wp_enqueue_script("tmm_cc_front");?>
<script type='text/javascript' src='//maps.google.com/maps/api/js?<?php echo $google_maps_api_key; ?>&sensor=false&callback=initMap&ver=4.6.1' async defer></script>

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
	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
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
		 id="google_map_<?php echo $inique_id ?>"
		 style="height: <?php echo $height ?> px;" data-latitude="<?php echo $latitude ?>"
         data-longitude="<?php echo $longitude ?>"
         data-inique_id="<?php echo $inique_id ?>"
         data-zoom="<?php echo $zoom ?>" data-maptype="<?php echo $maptype ?>"
         data-content="<?php echo $content ?>"
         data-enable_marker="<?php echo $enable_marker ?>"
         data-enable_popup="<?php echo $enable_popup ?>"
         data-enable_scrollwheel="<?php echo $enable_scrollwheel ?>"
         data-js_controls="<?php echo $js_controls ?>"
         data-marker_is_draggable="<?php echo $marker_is_draggable ?>"></div>

	<script type="text/javascript">


			var map;
function initMap() {
			gmt_init_map(<?php echo $latitude ?>,
                         <?php echo $longitude ?>,
                         "google_map_<?php echo $inique_id ?>",
                         <?php echo $zoom ?>,
                         "<?php echo $maptype ?>",
                         "<?php echo $content ?>",
                         "<?php echo $enable_marker ?>",
                         "<?php echo $enable_popup ?>",
                         "<?php echo $enable_scrollwheel ?>",
                         <?php echo $js_controls ?>,
                         "<?php echo @$marker_is_draggable ?>"
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

	<img src="http://maps.googleapis.com/maps/api/staticmap?<?php echo $location_mode_string ?>&zoom=<?php echo $zoom ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo $width ?>x<?php echo $height ?><?php echo $marker_string ?>&sensor=false&key=<?php echo TMM::get_option("api_key_google")?>">

<?php endif; ?>
