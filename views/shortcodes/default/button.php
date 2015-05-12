<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php 

$styles = "";

if (!empty($top_indent)) {
	$styles .= 'margin-top: ' . (int) $top_indent . 'px';
}

// Styles
if (!empty($styles)) {
	$styles = 'style="' . $styles . '"';
}

?>

<a href="<?php echo $url ?>" <?php echo ($styles ? $styles : '') ?> class="button <?php echo $size ?> <?php echo $color ?>"><?php echo $content ?></a>