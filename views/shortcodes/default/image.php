<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$image_url = $content;
$margin = "";
$html = "";

	// Margins
	if (!empty($margin_left))   { $margin = 'margin-left: ' . (int) $margin_left . 'px; '; }
	if (!empty($margin_right))  { $margin .= 'margin-right: ' . (int) $margin_right . 'px; '; }
	if (!empty($margin_top))    { $margin .= 'margin-top: ' . (int) $margin_top . 'px; '; }
	if (!empty($margin_bottom)) { $margin .= 'margin-bottom: ' . (int) $margin_bottom . 'px; '; }
	
	// Link Start
	if ($action == "link") {
		$html.= '<a title="' . $link_title . '" class="single-image link-icon ' . $align . '" href="' . $image_action_link . '" target="' . $target . '">';
	}

		$src = TMM_Helper::resize_image($image_url, $image_size_alias);

		$html.= '<img alt="' . $image_alt . '"  style="' . $margin .'" src="' . $src . '" />';
	
	// Link End
	if ($action == "link") { 
		$html .= '</a>'; 
	}

echo $html;