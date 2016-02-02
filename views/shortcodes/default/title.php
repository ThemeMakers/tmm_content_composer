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
if (!empty($font_weight) && $font_weight != 'default') {
	$styles.="font-weight: " . $font_weight . ";";
        $single_styles.="font-weight: " . $font_weight . ";";
}

// Letter spacing
if (!empty($letter_spacing)) {
	$styles.="letter-spacing:{$letter_spacing}px;";
	$single_styles.="letter-spacing:{$letter_spacing}px;";
}
// Align
if (!empty($align) && $align!='left') {
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
	$styles = 'style="' . $styles . '"';
}

// General Styles
if (!empty($general_styles)) {
	$general_styles = 'style="' . $general_styles . '"';
}

// Single Styles
if (!empty($single_styles)) {
	$single_styles = 'style="' . $single_styles . '"';
}

//Output Html
$content = str_replace("`", "'", $content);

if ( isset($title_type) && $title_type=='section'){
    $html.= '<div class="section-title"><' . $type . ' class="htitle " ' . $styles . '>' . $content . '</' . $type . '>';
	if (isset($title_description) && !empty($title_description)){
		$html.= '<h4 class="hdesc">'.$title_description.'</h4>';
	}
	$html.= '</div>';
}else{

	$class = (!empty($css_class)) ? 'class="' . $css_class . '"' : '';

    $html.= '<' . $type .' '. $class . ' '. $styles . '>' . $content . '</' . $type . '>';

}

echo $html;