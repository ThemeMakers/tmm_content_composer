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

	if (isset($show_period_selector)) {
		$atts['show_period_selector'] = $show_period_selector;
	}

	if (isset($period_selector_amount)) {
		$atts['period_selector_amount'] = $period_selector_amount;
	}

	TMM_EventsPlugin::get_shortcode_template('events_list', $atts);
}
