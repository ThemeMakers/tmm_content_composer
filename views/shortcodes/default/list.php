<?php if (!defined('ABSPATH')) die('No direct access allowed');

$styles_array = explode('^', $styles);
$content = explode('^', $content);
?>
<<?php echo wp_kses_post($list_type) ?> class="list">
<?php if (!empty($content)): ?>
	<?php foreach ($content as $key => $text) : ?>
		<li class="<?php echo esc_attr($styles_array[$key]) ?>"><b><?php echo wp_kses_post($text) ?></b></li>
	<?php endforeach; ?>
<?php endif; ?>
</<?php echo wp_kses_post($list_type) ?>>