<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$style = $content;
switch ($style) {
	case 'separator':
		?>
		<div class="clear"></div>
		<div class="separator"></div>
		<?php
		break;
	case 'divider':
		?>
		<div class="clear"></div>
		<div class="divider"></div>
		<?php
		break;
	case 'double-divider';
		?>
		<div class="clear"></div>
		<div class="double-divider"></div>
		<?php
		break;
	default:
		?>
		<div class="clear"></div>
		<div class="divider"></div>
		<?php
		break;
}
