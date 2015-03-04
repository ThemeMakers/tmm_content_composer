<?php
if (!defined('ABSPATH')) exit;

if(class_exists('TMM_EventsPlugin')){
	$atts = array(
		'count' => 3,
		'sorting' => 'DESC',
		'category' => 0,
	);

	if (isset($events_count)) {
		$atts['count'] = $events_count;
	}

	if (isset($sorting)) {
		$atts['sorting'] = $sorting;
	}

	if (isset($category)) {
		$atts['category'] = $category;
	}

	TMM_EventsPlugin::get_shortcode_template('events_list', $atts);
}
