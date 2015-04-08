<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

// Html

$html = "";
$styles = "";

$general_styles = "";
$single_styles = "";

if (!isset($letter_spacing)) {
	$letter_spacing = '';
}

if (!isset($align)) {
	$align = '';
}

// Font Weight
if (isset($font_weight) && $font_size != 'default') {
	$styles.="font-weight: " . $font_weight . ";";
    $single_styles.="font-weight: " . $font_weight . ";";
}

// Letter spacing
if (!empty($letter_spacing)) {
	$styles.="letter-spacing:{$letter_spacing}px;";
	$single_styles.="letter-spacing:{$letter_spacing}px;";
}
// Align
if (isset($align) && $font_size != 'default') {
	$styles.="text-align: " . $align . "; ";
	$general_styles.="text-align: " . $align . "; ";
}

// Bottom Indent
if (isset($bottom_indent) && $bottom_indent!='') {
	$styles.="margin-bottom: " . $bottom_indent . "px; ";
	$single_styles.="margin-bottom: " . $bottom_indent . "px; ";
}

// Font Family
if (!empty($font_family)) {
	$font_family = str_replace('_', ' ', $font_family);
	$styles.="font-family: '" . $font_family . "'; ";
	$single_styles.="font-family: '" . $font_family . "'; ";
}

// Font Size
if (isset($font_size) && $font_size != 'default') {
	$styles.="font-size: " . $font_size . "px; ";
	$single_styles.="font-size: " . $font_size . "px; ";
}

// Line Height
if (isset($line_height) && $line_height != '1.35') {
	$styles.="line-height: " . $line_height . "em; ";
	$single_styles.="line-height: " . $line_height . "em; ";
}

// Color
if (!empty($color)) {
	$styles.="color: " . $color . "; ";
	$single_styles.="color: " . $color . "; ";
}

// Text Transform
if (isset($text_transform) && $text_transform) {
	$styles.="text-transform: uppercase; ";
	$single_styles.="text-transform: uppercase; ";
}

// Styles
if (!empty($styles)) {
	$styles = 'style="' . esc_attr($styles) . '"';
}

// General Styles
if (!empty($general_styles)) {
	$general_styles = 'style="' . $general_styles . '"';
}

// Single Styles
if (!empty($single_styles)) {
	$single_styles = 'style="' . $single_styles . '"';
}


if (isset($use_general_color) && $use_general_color) {
	$css_class = 'theme-default-bg';
} else {
	$css_class = '';
}

if (!empty($title_effect)&&($title_effect!='none')){
    $css_class = $css_class . ' ' . $title_effect;  
}

//Output Html
$content = str_replace("`", "'", $content);

if ( isset($title_type) && $title_type=='section') {
    $html.= '<' . $type . ' class="section-title ' . esc_attr($css_class) . '" ' . $styles . '>' . esc_html($content) . '</' . $type . '>';

} else if ( isset($title_type) && $title_type=='section-alternate') {

	$html.= '<' . $type . ' class="section-title-alternate ' . esc_attr($css_class) . '" ' . $styles . '>' . esc_html($content) . '</' . $type . '>';

} else {

	$html.= '<' . $type . ' class="' . esc_attr($css_class) . '" ' . $styles . '>' . esc_html($content) . '</' . $type . '>';

}

echo $html;