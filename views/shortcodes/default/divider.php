<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$style = $content;
switch ($style) {
	case 'separator':
		?>
		<div class="border-divider" ></div>
		<?php
		break;
	case 'divider':
		?>
		<div class="border-divider" style="border-top: 2px dotted #d7d5cf; background-color: transparent;"></div>
		<?php
		break;
	case 'double-divider';
		?>
		<div class="border-divider" style="border-top: 3px double #d7d5cf; background-color: transparent;"></div>
		<?php
		break;
	default:
		?>
		<div class="border-divider"></div>
		<?php
		break;
}
