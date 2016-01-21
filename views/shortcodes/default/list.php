<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$type = "";
$actions_array = array();

if (isset($actions)) {
	$actions_array = explode('^', $actions);
}

$content = explode('^', $list_item_content);
$colors = explode('^', $colors);

switch ($list_type) {
	case 0:
		$list_type = 'ul';
		$type = 'unordered';
		break;
	case 1:
		$list_type = 'ol';
		$type = 'ordered';
		break;
	case 2:
		$list_type = 'ul';
		$type = 'circle-list';
		break;
	default:
		$list_type = 'ul';
		$type = 'unordered';
}

?>
<<?php echo $list_type ?> class="list <?php if ($type == 'circle-list'): ?>circle-list<?php endif; ?> <?php if ($animation) echo $animation ?>">
<?php if (!empty($content)): ?>
	<?php foreach ($content as $key => $text): ?>
		<li <?php if (!empty($colors[$key])): ?> style="color: <?php echo $colors[$key] ?>" <?php endif; ?>>
			<?php if ($type == 'unordered'): ?><i <?php if (!empty($colors[$key])) : ?> style="color: <?php echo $colors[$key] ?>" <?php endif; ?> class="<?php echo $actions_array[$key] ?>"></i><?php endif; ?>
			<?php echo $text ?>
		</li>
	<?php endforeach; ?>
<?php endif; ?>
</<?php echo $list_type ?>>