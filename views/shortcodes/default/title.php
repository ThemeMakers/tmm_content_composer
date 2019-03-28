<?php if (!defined('ABSPATH')) die('No direct access allowed');

// Html

$html = "";
$styles = "";

$general_styles = "";
$single_styles = "";

// Generate unique id for class name generation
$uuid = uniqid();

if (!isset($letter_spacing)) {
	$letter_spacing = '';
}

if (!isset($align)) {
	$align = '';
}

// Font Weight
if (!empty($font_weight)) {
	$styles.="font-weight: " . $font_weight . ";";
        $single_styles.="font-weight: " . $font_weight . ";";
}

// Letter spacing
if (!empty($letter_spacing)) {
	$styles.="letter-spacing:{$letter_spacing}px;";
	$single_styles.="letter-spacing:{$letter_spacing}px;";
}
// Align
if (!empty($align)) {
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

// Bg Color
$bg_color = (!empty($bg_color)) ? 'background-color: ' . $bg_color . '; ' : '';

// Bg Opacity
$bg_opacity = (!empty($bg_opacity)) ? 'opacity: ' . $bg_opacity . '; ' : '';

// Bg Radius
$bg_radius = (!empty($bg_radius)) ? 'border-radius:' . $bg_radius . '%;' : '';

// Bg Padding
if (!empty($bg_padding)) {
	$styles.="padding: " . $bg_padding . "px; ";
	$general_styles.="padding: " . $bg_padding . "px; ";
}

// Bg Width
if (!empty($bg_width)) {
	$styles.="width: " . $bg_width . "px; ";
	$general_styles.="width: " . $bg_width . "px; ";
}

// Bg Height
if (!empty($bg_height)) {
	$styles.="height: " . $bg_height . "px; ";
	$general_styles.="height: " . $bg_height . "px; ";
}

// Bg Center
if ( isset($bg_center) && $bg_center) {
	$styles.="margin: 0 auto; ";
	$general_styles.="margin: 0 auto; ";
}

// Styles
if (!empty($styles)) {
	$styles = 'style="' . $styles . '"';
}

// General Styles
if (isset($general_styles)) {
	$general_styles = 'style="' . $general_styles . '"';
}

// Single Styles
if (!empty($single_styles)) {
	$single_styles = 'style="' . $single_styles . '"';
}


if (isset($use_general_color) && $use_general_color) {
	$css_class = 'theme-default-bg ';
} else {
	$css_class = '';
}

if (!empty($title_effect)&&($title_effect!='none')){
    $css_class = $css_class . ' ' . $title_effect;  
}

$type = isset($type) ? $type : '';

$css_content = '';
if (isset($bg_width) && $bg_width){
	$css_class .= 'inner-extra';
	$css_content = 'inner-content id_' . $uuid;
}

$separate_row = isset($separate_row) ? $separate_row : '';

//Output Html
$content = str_replace("`", "'", $content);

$allowed_html = array(
	'a' => array(
		'class' => array(),
		'href'  => array(),
		'rel'   => array(),
		'title' => array(),
	),
	'abbr' => array(
		'title' => array(),
	),
	'b' => array(),
	'blockquote' => array(
		'cite'  => array(),
	),
	'cite' => array(
		'title' => array(),
	),
	'code' => array(),
	'del' => array(
		'datetime' => array(),
		'title' => array(),
	),
	'dd' => array(),
	'div' => array(
		'class' => array(),
		'title' => array(),
		'style' => array(),
	),
	'dl' => array(),
	'dt' => array(),
	'em' => array(),
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
	),
	'i' => array(),
	'img' => array(
		'alt'    => array(),
		'class'  => array(),
		'height' => array(),
		'src'    => array(),
		'width'  => array(),
	),
	'li' => array(
		'class' => array(),
	),
	'ol' => array(
		'class' => array(),
	),
	'p' => array(
		'class' => array(),
	),
	'q' => array(
		'cite' => array(),
		'title' => array(),
	),
	'span' => array(
		'class' => array(),
		'title' => array(),
		'style' => array(),
	),
	'strike' => array(),
	'strong' => array(),
	'ul' => array(
		'class' => array(),
	),
	'style' => array(
		'type' => array()
	)
);

if ( isset($title_type) && $title_type=='section'){
    $html .= '<div class="section-title"><' . $type . ' class="' . $css_class . '" ' . $styles . '>' . $content . '</' . $type . '></div>';
} else {
    
    if (isset($word_animate) && $word_animate){

	    $content = explode(' ', $content);
	    $separete_content = explode('^', $separate_row);
	    if (!empty($separete_content)) {
		    $content = $separete_content;
	    }

        $html .= '<style type="text/css">.id_' . $uuid . ':before {content:"";position: absolute;left:0;top:0;right:0;bottom:0;' . $bg_radius . $bg_color . $bg_opacity . '}</style>';
	    $html .= '<div class="extraRadius ' . $css_class . '" ' . wp_kses($general_styles, $allowed_html) . '><div class="' . $css_content . '">';
        foreach ($content as $title){
            $html .= '<' . $type . ' ' . wp_kses($single_styles, $allowed_html) . '>' . esc_html($title) . '</' . $type . '>';
        }
        $html .= '</div></div>';
        
    } else {
        $html .= '<' . $type . ' class="' . $css_class . '" ' . $styles . '>' . $content . '</' . $type . '>';
    }
}

echo wp_kses( $html, $allowed_html );