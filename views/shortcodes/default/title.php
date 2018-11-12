<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$html = "";
$show_border = false;//not in blessing
$font_size = isset($font_size) ? $font_size : '';
$type = isset($type) ? $type : '';

$styles = 'style="';

if (!empty($align)) {
	$styles.="text-align: " . $align . "; ";
}

if (isset($margin_bottom) && $margin_bottom != "") {
	$styles.="margin-bottom: " . $margin_bottom . "px; ";
}

if (!empty($font_family)) {
	$styles.="font-family: '" . $font_family . "'; ";
}

if ($font_size) {
	$styles.="font-size: " . $font_size . "px; ";
}

if (!empty($line_height) AND $line_height != 'auto') {
	$styles.="line-height: " . $line_height . "px; ";
} else {
	$styles.="line-height: auto;";
}

$styles.='"';

$styles_of_container = 'style="';
if (!$show_border) {
	$styles_of_container.="border-bottom: none;";
}
$styles_of_container.='"';
if ($show_border) {
	$html.= '<' . $type . ' class="section-title" ' . $styles . '>' . $content . '</' . $type . '>';
} else {
	$html.= '<' . $type . ' ' . $styles . '>' . $content . '</' . $type . '>';
}


echo $html;



