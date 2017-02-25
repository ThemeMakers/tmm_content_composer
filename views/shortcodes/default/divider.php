<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (!isset($type)) {
	$type = 'type-1';
}

if (!isset($size)) {
	$size = 'middle';
}

if (!isset($color)) {
	$color = 'gray';
} ?>

<div class="lc-divider <?php echo $type . ' ' . $size . ' ' . $color ?>"></div><!-- /.lc-divider -->