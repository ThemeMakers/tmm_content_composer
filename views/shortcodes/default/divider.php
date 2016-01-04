<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$style = $content;
switch ($style) {
	case 'solid':
		?>
		<div class="border-divider"></div>
		<?php
		break;
	case 'linked':
		?>
		<div class="divider-top"><a href="#"><?php _e('Back to Top', TMM_CC_TEXTDOMAIN) ?></a></div>
		<?php
		break;
	case 'white-space':
		?>
		<div class="white-space clear">&nbsp;</div>
		<?php
		break;
	default:
		break;
}
