<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$style = $content;
switch ($style) {
	case 'separator':
		?>
		<div class="clear"></div>
<<<<<<< HEAD
		<div class="separator"></div>
=======
		<div class="divider"></div>
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
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
