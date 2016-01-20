<?php

$alias = "2045*950";

switch ($type) {
	case 'layerslider':
		echo '<div id="layerslider-container">';
		echo do_shortcode('[layerslider id="' . $layerslider_group . '"]');
		echo '</div>';
		break;
	default:
		echo TMM_Ext_Sliders::draw_shortcode_slider($type, $slider_group, $alias);
		break;
}
?>

<?php if ($show_keys): ?>

	<ul class="keydown">
		<li class="up"></li>
		<li class="left"></li>
		<li class="down"></li>
		<li class="right"></li>
	</ul><!--/ .keydown-->	

<?php endif; ?>