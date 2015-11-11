<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

// Html

$html = "";
$styles = "";
$css_class = "";



if (!isset($font_weight)) {
	$font_weight = 'default';
}

if (!isset($letter_spacing)) {
	$letter_spacing = '0';
}

if (!isset($align)) {
	$align = 'left';
}

if (!isset($bottom_indent)) {
	$bottom_indent = 'inherit';
}

if (!isset($font_size)) {
	$font_size = 'default';
}

// Font Weight
if ($font_weight != 'default') {
	$styles.="font-weight: ". $font_weight .";";
}

// Letter spacing
if ($letter_spacing != '0') {
	$styles.="letter-spacing:{$letter_spacing}px;";
}
// Align
if ($align != 'left') {
	$styles.="text-align: " . $align . "; ";
}

// Bottom Indent
if ($bottom_indent != 'inherit') {
	$styles.="margin-bottom: " . $bottom_indent . "px; ";
}

// Font Family
if (!empty($font_family)) {
	$font_family = str_replace('_', ' ', $font_family);
	$styles.="font-family: '" . $font_family . "'; ";
}

// Font Size
if ($font_size != 'default') {
	$styles.="font-size: " . $font_size . "px; ";
}

// Color
if (!empty($color)) {
	$styles.="color: " . $color . "; ";
}

// Styles
if (!empty($styles)) {
	$styles = ' style="' . $styles . '"';
}

if ($section_title) {
	$css_class .= 'class="section-title"';
}

//Output Html

$html.= '<' . $type . ' ' . $css_class . $styles . '>' . $content . '</' . $type . '>';
echo $html;
