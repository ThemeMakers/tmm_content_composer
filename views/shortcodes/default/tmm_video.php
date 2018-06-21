<?php if (!defined('ABSPATH')) die('No direct access allowed');

switch ($type) {
	case 'youtube':
		$source_code = explode("?v=", $content);
		$source_code = explode("&", $source_code[1]);
		if (is_array($source_code)) {
			$source_code = $source_code[0];
		}
		?>
		<iframe allowtransparency="true" width="<?php echo esc_attr($width) ?>" height="<?php echo esc_attr($height) ?>" src="//www.youtube.com/embed/<?php echo esc_attr($source_code) ?>?wmode=transparent" allowfullscreen></iframe>
		<?php
		return "";
		break;
	case 'vimeo':
		$source_code = explode("/", $content);
		if (is_array($source_code)) {
			$source_code = $source_code[count($source_code) - 1];
		}
		?>
		<iframe width="<?php echo esc_attr($width) ?>" height="<?php echo esc_attr($height) ?>" src="//player.vimeo.com/video/<?php echo esc_attr($source_code) ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f6e200"></iframe>
		<?php
		break;

	default:
		esc_html_e('Unsupported video format', 'tmm_shortcodes');
		break;
}