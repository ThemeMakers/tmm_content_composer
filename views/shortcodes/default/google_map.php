<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (TMM::get_option("api_key_google")){

	$inique_id = uniqid();

	$google_maps_api_key = (TMM::get_option("api_key_google")) ? 'key=' . TMM::get_option("api_key_google") : '' ;
	$map_link = 'https://maps.google.com/maps/api/js?' . $google_maps_api_key;
	$mapscale = isset($mapscale) ? $mapscale : '1';

	$js_controls = '{}';

	if (!isset($mode)) {
		$mode = 'map';
	}

    $location_mode = isset($location_mode) ? $location_mode : '';

    if ($location_mode === 'address') {
        $address = str_replace(' ', '+', $address);
        $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&' . $google_maps_api_key);
        $output = json_decode($geocode, true);

        $latitude = 0;
        $longitude = 0;

        // if latitude & longitude does not defined by user
        if ($output) {
            if( $output['status'] == 'OK' ) {
                $latitude = $output['results'][0]['geometry']['location']['lat'];
                $longitude = $output['results'][0]['geometry']['location']['lng'];
            } else {
                printf( '<p class="info w-50">' . $output['error_message'] . '</p>' );
            }
        } else {
            printf( 'GPS coordinates were not available because connection failed or malformed request' );
        }
    }

	if (!isset($maptype)) {
		$maptype = 'ROADMAP';
	}

	if (!isset($marker_is_draggable)) {
		$marker_is_draggable = 0;
	}

	if ($mode === 'map') {

		wp_enqueue_script("tmm_shortcode_google_api_js", $map_link);
		wp_enqueue_script('tmm_composer_front');
		?>

		<div class="google_map" id="google_map_<?php echo esc_attr( $inique_id ) ?>" style="height: <?php echo esc_attr( $height ) ?>px;"></div>

		<script>
			jQuery(function () {
				gmt_init_map( <?php echo wp_kses_post($latitude.',
					'.$longitude.',
					"google_map_'.$inique_id.'",
					'.$zoom.',
					"'.$maptype.'",
					"'.$content.'",
					"'.$enable_marker.'",
					"'.$enable_popup.'",
					"'.$enable_scrollwheel.'",
					"'.$js_controls.'",
					"'.$marker_is_draggable.'"') ?> )
			});
		</script>
        <?php
	} else {
		$marker_string = '';
		if ($enable_marker) {
			$marker_string = '&markers=color:red%7clabel:%7c' . $latitude . ',' . $longitude;
		}

		$location_mode_string = 'center=' . $latitude . ',' . $longitude;
		?>

        <img src="https://maps.googleapis.com/maps/api/staticmap?<?php echo esc_attr($location_mode_string) ?>&zoom=<?php echo esc_attr($zoom) ?>&maptype=<?php echo strtolower($maptype) ?>&size=<?php echo esc_attr($width) ?>x<?php echo esc_attr($height) ?><?php echo esc_attr($marker_string) ?>&scale=<?php echo esc_attr( $mapscale ) ?>&<?php echo esc_attr( $google_maps_api_key ) ?>" width="<?php echo esc_attr($width) ?>" height="<?php echo esc_attr($height) ?>" alt="<?php echo esc_attr(str_replace('+', ' ', $address)) ?>">

	<?php
	}

} else { ?>
	<p class="notice"><?php esc_html_e('missing Google API key', 'cardealer'); ?></p>
	<?php
}