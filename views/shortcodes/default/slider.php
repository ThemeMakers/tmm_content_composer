<?php

$alias = "950*545";
switch ($type) {
	case 'layerslider':
		echo do_shortcode('[layerslider id="' . $layerslider_group . '"]');
		break;
	default:
		echo TMM_Ext_Sliders::draw_shortcode_slider($type, $slider_group, $alias);
		break;
}