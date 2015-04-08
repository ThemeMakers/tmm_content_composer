<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php 

$styles = "";
$hover_styles = "";
$mouseout_styles = "";
$roll_styles = "";

//Text Color
if (!empty($text_color)) {
	$styles .= 'color: ' . $text_color . '; ';
        $mouseout_styles.='this.style.color=\'' . $text_color . '\'; ';
}

//Hover Text Color
if (!empty($mouseover_text_color)) {	
        $hover_styles .= 'this.style.color=\'' . $mouseover_text_color . '\'; '; 
}

//Background Color
if (isset($bg_transparent)&&($bg_transparent=='1')){
    $bg_color = 'transparent';
}
if (!empty($bg_color)) {
	$styles .= 'background-color: ' . $bg_color . '; ';
        $mouseout_styles.='this.style.backgroundColor=\'' . $bg_color . '\'; ';
}

//Hover Background Color
if (isset($mouseover_bg_transparent)&&($mouseover_bg_transparent=='1')){
    $mouseover_bg_color = 'transparent';
}
if (!empty($mouseover_bg_color)) {
	$hover_styles .= 'this.style.backgroundColor=\'' . $mouseover_bg_color . '\'; ';
}

//Border Color
if (isset($border_color_transparent)&&($border_color_transparent=='1')){
    $border_color = 'transparent';
}
if (!empty($border_color)) {
	$styles .= 'border-color: ' . $border_color . '; ';
        $mouseout_styles.='this.style.borderColor=\'' . $border_color . '\'; ';
}

//Hover Border Color
if (isset($mouseover_border_color_transparent)&&($mouseover_border_color_transparent=='1')){
    $mouseover_border_color = 'transparent';
}
if (!empty($mouseover_border_color)) {	
    $hover_styles .= 'this.style.borderColor=\'' . $mouseover_border_color . '\'; ';       
}

// Styles
if (!empty($styles)) {
	$styles = 'style="' . $styles . '"';
        if (!empty($hover_styles)){
            $hover_styles = 'onmouseover="' . $hover_styles . '" onmouseout="' . $mouseout_styles . '"';
            
            $styles .= ' '. $hover_styles;
        }
}
$type = (isset($type)) ? $type : 'default';

?>

<a href="<?php echo esc_url($url); ?>" <?php echo (($styles && $type!='default') ? $styles : '') ?> class="button <?php echo esc_attr($size); ?> <?php echo esc_attr($type); ?>"><?php echo esc_html($text); ?></a>
