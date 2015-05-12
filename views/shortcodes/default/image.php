<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$image_url = $content;
$effect = "";
$styles = "";
$html = "";
$classAnim = "";
$classAbs = "";

	// Align 
	if (!empty($translate_x)) {
		$styles .= "left: " . (int) $translate_x . "%;";
	}

	// Delay
	if (!empty($delay)) {
		$styles .= "-webkit-transition-delay: " . $delay . "s;";
		$styles .= "transition-delay: " . $delay . "s;";
	}
	
	// Duration
	if (!empty($duration)) {
		$styles .= "-webkit-transition-duration: " . $duration . "s;";
		$styles .= "transition-duration: " . $duration . "s;";
	}
	
	// Margins
	if (!empty($margin_left))   { $styles .= 'margin-left: ' . (int) $margin_left . 'px; '; }
	if (!empty($margin_right))  { $styles .= 'margin-right: ' . (int) $margin_right . 'px; '; }
	if (!empty($margin_top))    { $styles .= 'margin-top: ' . (int) $margin_top . 'px; '; }
	if (!empty($margin_bottom)) { $styles .= 'margin-bottom: ' . (int) $margin_bottom . 'px; '; }

	// Image Position Absolute
	if (@$pos_abs) {
		$classAbs .= "absolute-image ";
	}
	
	// Styles
	if (!empty($styles)) {
		$styles = 'style="' . $styles . '"';
	}
	
	// Animation
	if ($img_animated) { 
		$classAnim .= 'animate-image ';
		if (!empty($effect_animation)) { $effect .= $effect_animation; } 
	}
	
	// Link Start
	if ($action == "link") {
		$html.= '<a title="' . $link_title . '" class="single-image link-icon active-link" href="' . $image_action_link . '" target="' . $target . '">';
	}

		$src = TMM_Helper::resize_image($image_url, $image_size_alias);
		$html.= '<img data-effect="'. $effect .'" class="custom-frame ' . $classAbs . $classAnim . $effect . $align . '" alt="' . $image_alt . '" '. $styles .' src="' . $src . '" />';
	
	// Link End
	if ($action == "link") { 
		$html .= '</a>'; 
	}

echo $html;