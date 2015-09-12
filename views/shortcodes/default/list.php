<?php
<<<<<<< HEAD
if (!defined('ABSPATH')) exit;

$content = explode('^', $content);

if ($list_style === 'unordered') {
	$list_style = 'ul';
} else {
	$list_style = 'ol';
}

$list_html = '<'.$list_style.' class="list '.$list_type.'">';

if (!empty($content)) {

	foreach ($content as $key => $text) {

		$list_html .= '<li>'.$text.'</li>';

	}
}

$list_html .= '</'.$list_style.'>';

echo $list_html;
=======
$styles_array = explode('^', $styles);
$content = explode('^', $content);
?>
<<?php echo $list_type ?> class="list">
<?php if (!empty($content)): ?>
	<?php foreach ($content as $key => $text) : ?>
		<li class="<?php echo $styles_array[$key] ?>"><b><?php echo $text ?></b></li>
	<?php endforeach; ?>
<?php endif; ?>
</<?php echo $list_type ?>>
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
