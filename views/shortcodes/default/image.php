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
	
	// Margins
	if (!empty($margin_left))   { $styles .= 'margin-left: ' . (int) $margin_left . 'px; '; }
	if (!empty($margin_right))  { $styles .= 'margin-right: ' . (int) $margin_right . 'px; '; }
	if (!empty($margin_top))    { $styles .= 'margin-top: ' . (int) $margin_top . 'px; '; }
	if (!empty($margin_bottom)) { $styles .= 'margin-bottom: ' . (int) $margin_bottom . 'px; '; }
			
	// Styles
	if (!empty($styles)) {
		$styles = 'style="' . esc_attr($styles) . '"';
	}       

        //if ($action != "none"){
            // Link Start
            if ($action == "link") {
                    $html.= '<a title="' . esc_attr($link_title) . '" class="'. esc_attr($align) .'" href="' . esc_url($image_action_link) . '" target="' . esc_attr($target) . '">';
            }
            
            if ($action=='lightbox'){
                //tmm_enqueue_script('magnific');
                tmm_enqueue_style('magnific');
                $html.= '<a title="' . esc_attr($image_alt) . '" class="single-image-link '. esc_attr($align) .'" href="' . esc_url($image_url) . '">';
            }

            $src = TMM_Content_Composer::resize_image($image_url, $image_size_alias);
            $html.= '<img class="' . $classAbs . $classAnim . $effect . $align . '" alt="' . esc_attr($image_alt) . '" '. $styles .' src="' . esc_url($src) . '" />';

            // Link End
            if ($action == "link" || $action == "lightbox") { 
                    $html .= '</a>'; 
            }
        //}

echo $html;