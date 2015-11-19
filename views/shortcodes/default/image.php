<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$image_url = $content;
$css_class = "";
$css_caption_class = "";
$styles = "";
$html = "";
$figcaption = "";

// Styles
if (!empty($styles)) {
	$styles = ' style="' . $styles . '"';
}

// Align
if (!empty($align))         { $css_class .= ' ' . $align; }

// Inner offset
if (!empty($inner_offset))  { $css_class .= ' ' . $inner_offset; }

// Outer offsets
if (!empty($margin_top))    { $css_class .= ' ' . $margin_top; }
if (!empty($margin_right))  { $css_class .= ' ' . $margin_right; }
if (!empty($margin_bottom)) { $css_class .= ' ' . $margin_bottom; }
if (!empty($margin_left))   { $css_class .= ' ' . $margin_left; }

// Border style
if (!empty($brd_style))     { $css_class .= ' ' . $brd_style; }

// Border width
if (!empty($brd_width))     { $css_class .= ' ' . $brd_width; }

// Border color
if (!empty($brd_color))     { $css_class .= ' ' . $brd_color; }

// Hover effects
if (!empty($hover_effect))  { $css_class .= ' ' . $hover_effect; }

// Caption Type
if (!empty($caption_type))  { $css_caption_class .= $caption_type; }

// Caption Style
if (!empty($caption_style))  { $css_caption_class .= ' ' . $caption_style; }

// Caption Classes
if (!empty($css_caption_class)) {
	$css_caption_class = ' class="' . $css_caption_class . '"';
}

// Caption
if (!empty($img_caption)) {
	$figcaption .= '<figcaption' . $css_caption_class . '>' . $img_caption . '</figcaption>';
}

// Fancybox
if ($fancybox) {
	$src = TMM_Helper::resize_image($image_url, '');
	$target_url = $src;
	$link_class = 'fancybox';
} else {
	$src = TMM_Helper::resize_image($image_url, $image_size_alias);
	$link_class = 'link-icon';
}

if ($action == "link") {
	$html.= '<a title="' . $img_caption . '" class="single-image ' . $link_class . '" href="' . $target_url . '" target="' . $target . '">';
}

$html.= '<figure class="lc-image' . $css_class . '"><img alt="' . $image_alt . '" src="' . $src . '" />' . $figcaption . '</figure>';

if ($action == "link") { 
	$html .= '</a>'; 
}	

echo $html;