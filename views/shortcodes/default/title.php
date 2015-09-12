<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

// Html

$html = "";
$styles = "";
<<<<<<< HEAD
=======
$css_class = "";
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa

if (!isset($letter_spacing)) {
	$letter_spacing = '';
}

if (!isset($align)) {
	$align = '';
}

// Font Weight
if (!empty($font_weight)) {
<<<<<<< HEAD
	$styles.="font-weight: " . $font_weight . ";";
=======
	$styles.="font-weight: ". $font_weight .";";
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
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
<<<<<<< HEAD
	$styles = 'style="' . $styles . '"';
}

//Output Html
$content = str_replace("`", "'", $content);
$html.= '<' . $type . ' ' . $styles . '>' . $content . '</' . $type . '>';
echo $html;
=======
	$styles = ' style="' . $styles . '"';
}

if ($section_title) {
	$css_class .= 'class="section-title"';
}

//Output Html

$html.= '<' . $type . ' ' . $css_class . $styles . '>' . $content . '</' . $type . '>';
echo $html;
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
