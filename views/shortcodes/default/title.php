<?php if (!defined('ABSPATH')) die('No direct access allowed');

// Html

$html = "";
$styles = "";

if (!isset($letter_spacing)) {
	$letter_spacing = '';
}

if (!isset($align)) {
	$align = '';
}

// Font Weight
if (!empty($font_weight)) {
	$styles.="font-weight: ". $font_weight .";";
}

// Letter spacing
if (!empty($letter_spacing)) {
	$styles.="letter-spacing:{$letter_spacing}px;";
}
// Align
if (!empty($align)) {
	$styles.="text-align: " . $align . "; ";
}

// Bottom Indent
if (!empty($bottom_indent)) {
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
	$styles = 'style="' . $styles . '"';
}

//Output Html
$html.= '<' . $type . ' ' . $styles . '>' . $content . '</' . $type . '>';

//echo $html;

echo wp_kses( $html, array(
	'h1' => array(
		'style' => array()
	),
	'h2' => array(
		'style' => array()
	),
	'h3' => array(
		'style' => array()
	),
	'h4' => array(
		'style' => array()
	),
	'h5' => array(
		'style' => array()
	),
	'h6' => array(
		'style' => array()
	)
) );