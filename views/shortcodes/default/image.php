<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$image_url = $content;
$styles = "";
$html = "";
	
// Margins
if (!empty($margin_left))   { $styles .= 'margin-left: ' . (int) $margin_left . 'px; '; }
if (!empty($margin_right))  { $styles .= 'margin-right: ' . (int) $margin_right . 'px; '; }
if (!empty($margin_top))    { $styles .= 'margin-top: ' . (int) $margin_top . 'px; '; }
if (!empty($margin_bottom)) { $styles .= 'margin-bottom: ' . (int) $margin_bottom . 'px; '; }

// Styles
if (!empty($styles)) {
	$styles = 'style="' . $styles . '"';
}

// Fancybox
if ($fancybox) {
	$src = TMM_Helper::resize_image($image_url, '');
	$image_action_link = $src;
	$link_class = 'fancybox';
} else {
	$src = TMM_Helper::resize_image($image_url, $image_size_alias);
	$link_class = 'link-icon';
}

if ($action == "link") {
	$html.= '<a title="' . $link_title . '" class="single-image ' . $link_class . '" ' . $styles . '  href="' . $image_action_link . '" target="' . $target . '">';
}

$html.= '<img class="' . $align . '" alt="' . $image_alt . '" '. ($action == "link" ? '' : $styles) .' src="' . $src . '" />';

if ($action == "link") { 
	$html .= '</a>'; 
}	

echo $html;