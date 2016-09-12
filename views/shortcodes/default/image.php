<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$image_url = $content;
$html = "";

if ($action == "fancybox") {
    $html .= '<a title="' . $link_title . '" class="picture-icon single-image short-link" style="float: ' . $align . ' ; margin:' . (int) $margin_top . 'px ' . (int) $margin_right . 'px ' . (int) $margin_bottom . 'px ' . (int) $margin_left . 'px;" href="' . $image_url . '" rel="' . $fancybox_group . '">';
}

if ($action == "link") {
    $html .= '<a title="' . $link_title . '" class="single-image short-link" style="float: ' . $align . ' ; margin:' . (int) $margin_top . 'px ' . (int) $margin_right . 'px ' . (int) $margin_bottom . 'px ' . (int) $margin_left . 'px;" href="' . $image_action_link . '" target="' . $target . '">';
}


if (isset($image_size_alias)) {
    $size = explode('*', $image_size_alias);
    $width = $size[0];
    $height = $size[1];
}

$src = ThemeMakersHelper::resize_image($image_url, $width, true, $height);

if ($action == "link" or $action == "fancybox") {
    $html.= '<img alt="' . $image_alt . '" class="' . ($show_border ? "bordered" : "") . '" src="' . $image_url . '" />';
} else {
    $html.= '<img alt="' . $image_alt . '" class="' . ($show_border ? "bordered" : "") . '" style="float: ' . $align . ' ; margin:' . (int) $margin_top . 'px ' . (int) $margin_right . 'px ' . (int) $margin_bottom . 'px ' . (int) $margin_left . 'px;" src="' . $image_url . '" />';
}

if ($action) {
    $html.='</a>';
}

echo $html;

