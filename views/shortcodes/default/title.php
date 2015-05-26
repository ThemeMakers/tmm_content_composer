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
if (!empty($bg_color)) {
	$styles.="background: " . $bg_color . "; ";
	$general_styles.="background: " . $bg_color . "; ";
}

// Bg Opacity
if (!empty($bg_opacity)) {
	$styles.="opacity: " . $bg_opacity . "; ";
	$general_styles.="opacity: " . $bg_opacity . "; ";
}

// Bg Radius
if (!empty($bg_radius)) {
	$styles.="border-radius: " . $bg_radius . "%; ";
	$general_styles.="border-radius: " . $bg_radius . "%; ";
}

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
	$styles = 'style="' . esc_attr($styles) . '"';
}

// General Styles
if (!empty($general_styles)) {
	$general_styles = 'style="' . esc_attr($general_styles) . '"';
}

// Single Styles
if (!empty($single_styles)) {
	$single_styles = 'style="' . esc_attr($single_styles) . '"';
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

if ( isset($title_type) && $title_type=='section'){
    $html.= '<div class="section-title"><' . $type . ' class="' . esc_attr($css_class) . '" ' . $styles . '>' . $content . '</' . $type . '></div>';
}else{   
    
    if (isset($word_animate) && $word_animate){
        $content = explode(' ', $content);
        $separete_content = explode('^', $separate_row);
        if (!empty($separete_content))
            $content = $separete_content;
        
        if (isset($use_general_color) && $use_general_color) {
            $css_class = 'theme-default-bg';
        } else {
            $css_class = '';
        }
        $css_content = '';
        if (isset($bg_width) && $bg_width){
            $css_class.='inner-extra';
            $css_content = 'inner-content';
        }
        
        $html.= '<div class=" extraRadius ' . esc_attr($css_class) . '" ' . $general_styles . '><div class="' . esc_attr($css_content) . '">';
        foreach ($content as $title){
            $html.= '<' . $type . ' ' .$single_styles . '>' . esc_html($title) . '</' . $type . '>';
        }
        $html.= '</div></div>';         
        
    }else{
        $html.= '<' . $type . ' class="' . esc_attr($css_class) . '" ' . $styles . '>' . $content . '</' . $type . '>';
    }
}

echo $html;