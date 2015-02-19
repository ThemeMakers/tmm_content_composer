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
			
	// Styles
	if (!empty($styles)) {
		$styles = 'style="' . $styles . '"';
	}       
        if ($parallax && $action == "none"){
            $html.='<section class="section padding-off parallax parallax-bg-2 bg-black-color">';
            $html.='<div class="full-bg-image" style="background-image:url('.$image_url.')"></div>';
            $html.='<div id="fullscreen" class="full-screen"></div>';
        }       
        
        if($overlay  && $action == "none"){
            $html.='<div class="parallax-overlay"></div>';
        }
        
        if ($action != "none" || ($action == "none" && !$parallax)){
            // Link Start
            if ($action == "link") {
                    $html.= '<a title="' . $link_title . '" class="link-icon slide-image active-link '.$align.'" href="' . $image_action_link . '" target="' . $target . '">';
            }
            
            if ($action=='lightbox'){
                tmm_enqueue_script('magnific');
                tmm_enqueue_style('magnific');
                $html.= '<a title="' . $image_alt . '" class="slide-image image-link active-link plus-icon '.$align.'" href="' . $image_url . '">';
               
            }

                    $src = TMM_Content_Composer::resize_image($image_url, $image_size_alias);
                    $html.= '<img class="' . $classAbs . $classAnim . $effect . $align . '" alt="' . $image_alt . '" '. $styles .' src="' . $src . '" />';

            // Link End
            if ($action == "link" || $action == "lightbox") { 
                    $html .= '</a>'; 
            }
        }
        
        if ($parallax && $action == "none"){
            $html.='</section>';
        }

echo $html;