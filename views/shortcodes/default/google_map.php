<?php
wp_enqueue_script("tmm_shortcode_google_api_js", 'http://maps.google.com/maps/api/js?sensor=false');
wp_enqueue_script("tmm_shortcode_google_map_js", TMM_CC_URL . '/js/shortcodes/google_map.js');

$inique_id = uniqid();
$js_controls = '{}';

if (!isset($location_mode)) { $location_mode = 'address'; }
if (!isset($enable_scrollwheel)) { $enable_scrollwheel = 0; }
if (!isset($marker_is_draggable)) { $marker_is_draggable = 0; }
if (!isset($enable_marker)) { $enable_marker = 0; }
if (!isset($enable_popup)) { $enable_popup = 0; }
if (!isset($address)) { $address = 'New York'; }
if (!isset($maptype)) { $maptype = 'image'; }
if (!isset($height)) { $height = 200; }
if (!isset($zoom)) { $zoom = 11; }
if (!isset($mode)) { $mode = 'map'; }

if ($location_mode == 'address') {
    // get coordinates from address
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
} else {
    // if coordinates are not given
    if (!isset($latitude) || empty($latitude)) { $latitude = 40.714623; }
    if (!isset($longitude) || empty($longitude)) { $longitude = -74.006605; }
}
?>

<?php if ($mode == 'map') { ?>
    <div class="google_map" id="google_map_<?php echo $inique_id ?>" style="height: <?php echo $height ?>px;"></div>

    <script type="text/javascript">
        jQuery(function() {
            gmt_init_map(<?php echo $latitude ?>,<?php echo $longitude ?>,
                "google_map_<?php echo $inique_id ?>",
                <?php echo $zoom ?>, "<?php echo $maptype ?>",
                "<?php echo $content ?>", "<?php echo $enable_marker ?>",
                "<?php echo $enable_popup ?>", "<?php echo $enable_scrollwheel ?>",
                <?php echo $js_controls ?>, "<?php echo @$marker_is_draggable ?>");
        });
    </script>

<?php } else { ?>
    <?php
        $marker_string = '';
        if ($enable_marker) {
            $marker_string = '&markers=color:red|label:P|' . $latitude . ',' . $longitude;
        }
        $location_mode_string = 'center=' . $latitude . ',' . $longitude;
    ?>
        <img src="http://maps.googleapis.com/maps/api/staticmap?<?php echo $location_mode_string ?>
            &size=<?php echo $width ?>x<?php echo $height ?><?php echo $marker_string ?>
            &maptype=<?php echo strtolower($maptype) ?>
            &zoom=<?php echo $zoom ?>
            &sensor=false">
<?php } ?>