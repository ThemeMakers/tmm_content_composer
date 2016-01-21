<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$image_url = $content;
$styles = "";
$html = "";
$css_class = '';

// Margins
if (!empty($margin_left))   { $styles .= 'margin-left: ' . (int) $margin_left . 'px; '; }
if (!empty($margin_right))  { $styles .= 'margin-right: ' . (int) $margin_right . 'px; '; }
if (!empty($margin_top))    { $styles .= 'margin-top: ' . (int) $margin_top . 'px; '; }
if (!empty($margin_bottom)) { $styles .= 'margin-bottom: ' . (int) $margin_bottom . 'px; '; }

// Styles
if (!empty($styles)) { $styles = 'style="' . $styles . '"'; }


$html.= ($action == "link") ? '<div class="work-item">' : '<div>';
if (!empty($align))     { $css_class .= $align . ' '; }
if (!empty($animation)) { $css_class .= $animation;   }
if (!empty($css_class)) { $css_class = 'class="' . $css_class . '"'; }

$src = TMM_Helper::resize_image($image_url, $image_size_alias);
$html.= '<img '. $css_class .' alt="' . $image_alt . '" '. $styles .' src="' . $src . '" />';

if ($action == "link") {

    $html.= '<div class="image-extra">

                    <div class="extra-content">

                        <div class="inner-extra">
                            <a class="single-image link-icon" href="' . $image_action_link . '" target="'.$target.'"></a>
                        </div><!--/ .inner-extra-->

                    </div><!--/ .extra-content-->

                </div><!--/ .image-extra-->';
}

$html.='</div><!--/ .work-item-->';


echo $html;