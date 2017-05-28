<?php if (!defined('ABSPATH')) die('No direct access allowed');

$styles_array = explode('^', $styles);
$content = explode('^', $content);
?>
<<?php echo $list_type ?> class="list">
<?php if (!empty($content)): ?>
	<?php foreach ($content as $key => $text) : ?>
		<li class="<?php echo $styles_array[$key] ?>"><b><?php echo esc_html($text) ?></b></li>
	<?php endforeach; ?>
<?php endif; ?>
</<?php echo $list_type ?>>