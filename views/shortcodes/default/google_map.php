<?php
wp_enqueue_script("tmm_shortcode_google_api_js", 'http://maps.google.com/maps/api/js?sensor=false');
wp_enqueue_script("tmm_shortcode_google_map_js", TMM_CC_URL . '/js/shortcodes/google_map.js');

$inique_id = uniqid();
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

$slide_up = (isset($slide_up) && $slide_up) ? true : false;

if (isset($latitude) && $latitude !== '' && isset($longitude) && $longitude !== '') {

	if ($mode == 'map') {
        if ($slide_up){
            $height = $height + 260;
		?>
            <div class="google_map_expand">
                <div id="map_extended" class="google_map_toggle" data-height="<?php echo $height-260; ?>" style="height: <?php echo $height-260 ?>px;">
        <?php } ?>             
                    <div class="google_map" id="google_map_<?php echo esc_attr($inique_id) ?>" style="height: <?php echo $height ?>px;"></div>
        <?php if ($slide_up){ ?>           
                </div>
				<span class="google_map_close"></span>
			</div>		
        <?php } ?>
		<script type="text/javascript">
			jQuery(function() {
				gmt_init_map(<?php echo esc_js($latitude) ?>,<?php echo esc_js($longitude) ?>, "google_map_<?php echo esc_js($inique_id) ?>", <?php echo esc_js($zoom) ?>, "<?php echo esc_js($maptype) ?>", "<?php echo esc_js($content) ?>", "<?php echo esc_js($enable_marker) ?>", "<?php echo esc_js($enable_popup) ?>", "<?php echo esc_js($enable_scrollwheel) ?>",<?php echo esc_js($js_controls) ?>, "<?php echo esc_js(@$marker_is_draggable) ?>");
			});
		</script>

	<?php
	} else {

		$marker_string = '';
		if ($enable_marker) {
			$marker_string = '&markers=color:red|label:P|' . $latitude . ',' . $longitude;
		}

		$location_mode_string = 'center=' . $latitude . ',' . $longitude;
		
         if ($slide_up){
            $height = $height + 260;
		?>
            <div class="google_map_expand">
                <div id="map_extended" class="google_map_toggle" data-height="<?php echo $height-260; ?>" style="height: <?php echo $height-260 ?>px;">
        <?php } ?> 

                <img src="http://maps.googleapis.com/maps/api/staticmap?<?php echo $location_mode_string ?>&zoom=<?php echo $zoom ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo $width ?>x<?php echo $height ?><?php echo $marker_string ?>&sensor=false">
        
        <?php if ($slide_up){ ?>           
                </div>
				<span class="google_map_close"></span>
			</div>		
        <?php } ?>
	<?php
	}

}
?>