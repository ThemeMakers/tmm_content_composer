<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$style = $divider;
switch ($style) {
	case 'divider':
		?>
		<div class="clear"></div>
		<div class="divider"></div>
		<?php
		break;
	case 'space';
		?>
		<div class="clear"></div>
		<div class="white-space"></div>
		<?php
		break;
	default:
		?>
		<div class="clear"></div>
		<div class="divider"></div>
		<?php
		break;
}
