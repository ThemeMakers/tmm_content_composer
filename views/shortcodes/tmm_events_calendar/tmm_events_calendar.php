<?php
if (!defined('ABSPATH')) exit;

if(class_exists('TMM_EventsPlugin')){

	$atts = array(
		'show_tooltip_image' => $show_tooltip_image,
		'show_tooltip_time' => $show_tooltip_time,
		'show_tooltip_place' => $show_tooltip_place,
		'show_tooltip_desc' => $show_tooltip_desc,
		'tooltip_desc_symbols_count' => $tooltip_desc_symbols_count,
	);

	TMM_EventsPlugin::get_shortcode_template('events_calendar', $atts);
}
