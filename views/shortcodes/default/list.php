<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$list_type = 0;
$styles_array = array();
if (!isset($styles)) {
	$list_type = 1;
} else {
	$styles_array = explode('^', $styles);
}
$content = explode('^', $content);
if ($list_type == 0) {
	$list_type = 'ul';
} else {
	$list_type = 'ol';
}
$colors = explode('^', $colors);

?>
<<?php echo $list_type ?> class="list">
<?php if (!empty($content)): ?>
	<?php foreach ($content as $key => $text) : ?>
		<li class="<?php echo esc_attr($styles_array[$key]); ?>" <?php if (!empty($colors[$key])) : ?> style="color: <?php echo $colors[$key] ?>" <?php endif; ?>><?php echo esc_html($text); ?></li>
	<?php endforeach; ?>
<?php endif; ?>
</<?php echo $list_type ?>>