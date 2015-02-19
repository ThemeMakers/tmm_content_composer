<?php
$alias = "940*520";
switch ($type) {
	case 'layerslider':
		echo do_shortcode('[layerslider id="' . $layerslider_group . '"]');
		break;
    case 'grid_slider':
         echo do_shortcode('[grid_slider form_id="' . $grid_slider_group . '"][/grid_slider]');
        break;
	default:
		echo TMM_Slider::draw_shortcode_slider($type, $slider_group, $alias);
		break;
}