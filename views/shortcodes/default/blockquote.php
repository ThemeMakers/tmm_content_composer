<?php if (!defined('ABSPATH')) die('No direct access allowed');

// Html

$css_class = "";

if (!isset($positioning)) {
	$positioning = 'fullwidth';
}

if ($positioning == "left") {
	$css_class .= 'class="quote-left"';
} elseif ($positioning == "right") {
	$css_class .= 'class="quote-right"';
} else {
	$css_class .= '';
}

?>

<blockquote <?php echo esc_attr( $css_class ) ?>>
	<p><?php echo esc_html( $content ) ?></p>
</blockquote>