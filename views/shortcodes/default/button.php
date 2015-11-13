<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php

// Html

$css_class = "";

if (!isset($positioning)) {
	$positioning = 'default';
}

if ($positioning == "left") {
	$css_class .= 'alignleft';
} elseif ($positioning == "right") {
	$css_class .= 'alignright';
} elseif ($positioning == "center") {
	$css_class .= 'aligncenter';
} else {
	$css_class .= '';
}

?>

<a href="<?php echo $url ?>" class="lc-button <?php echo $size . ' ' . $color . ' ' . $css_class ?>"><?php echo $content ?></a>