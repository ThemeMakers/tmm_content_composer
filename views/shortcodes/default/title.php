<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

// Html
$html = "";
$styles = "";
$css_class = 'theme-title ';

if (!isset($align)) { $align = ''; }

// Font Weight
if (!empty($font_weight)) {
    $styles.="font-weight: " . $font_weight . ";";
}

// Align
if (!empty($align)) { $styles .= " text-align: " . $align . "; "; }

// Bottom Indent
if (!empty($bottom_indent)) { $styles .= "margin-bottom: " . $bottom_indent . "px; "; }

// Font Size
if ($font_size != 'default') { $styles .= "font-size: " . $font_size . "px; "; }

// Color
if (!empty($color)) { $styles .= "color: " . $color . "; ";  }

// Styles
if (!empty($styles)) { $styles = ' style="' . $styles . '"'; }

// Add Css Class
if ($use_general_color) { $css_class .= 'website-general-color '; }
if ($use_border)		{ $css_class .= 'border-title '; }
if ($animation)			{ $css_class .= $animation; }

if (!empty($css_class)) { $css_class = ' class="' . $css_class . '"'; }

//Output Html
$content = str_replace("`", "'", $content);
$html.= '<' . $type . $css_class . $styles . '>' . $content . '</' . $type . '>';
echo $html;