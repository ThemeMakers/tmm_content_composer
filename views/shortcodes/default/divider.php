<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$style = $content;
switch ($style) {
	case 'divider-solid':
		?>
		<div class="clear"></div>
		<div class="divider-solid"></div>
		<?php
		break;
	case 'separator';
		?>
		<div class="clear"></div>
		<div class="separator"></div>
		<?php
		break;
	default:
		?>
		<div class="clear"></div>
		<div class="divider-solid"></div>
		<?php
		break;
}
