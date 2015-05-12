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
	case 'empty';
		?>
		<div class="clear"></div>
		<div class="white-space"></div>
		<?php
		break;
	default:
		?>
		<div class="clear"></div>
		<div class="separator"></div>
		<?php
		break;
}
