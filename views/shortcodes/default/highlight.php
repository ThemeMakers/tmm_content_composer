<?php
if (!defined('ABSPATH')) exit;

$style = '';

if (isset($color) && $color) {
	$color = trim($color, '#');
	$style .= 'color:#'.$color.';';
}
if (isset($bgcolor) && $bgcolor) {
	$bgcolor = trim($bgcolor, '#');
	$style .= 'background-color:#'.$bgcolor.';';
}

if (!empty($style)) {
	$style = ' style="' . $style . '"';
}

?>
<span class="highlight"<?php echo $style;?>><?php echo $content ?></span>