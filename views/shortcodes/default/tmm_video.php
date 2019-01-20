<?php if (!defined('ABSPATH')) die('No direct access allowed');

$allows_array = array('youtube.com', 'vimeo.com', '.mp4', '.ogv', '.webm');
$video_type = '';
foreach ($allows_array as $key => $needle) {
	$count = strpos($content, $needle);
	if ($count !== FALSE) {
		$video_type = $allows_array[$key];
	}
}

switch ($video_type) {
	case $allows_array[0]:
		$source_code = explode("?v=", $content);
		$source_code = explode("&", $source_code[1]);
		if (is_array($source_code)) {
			$source_code = $source_code[0];
		}
		?>
		<div class="video-wrapper"><iframe allowtransparency="true" src="//www.youtube.com/embed/<?php echo esc_attr($source_code) ?>?wmode=transparent" allowfullscreen></iframe></div>
		<?php
		return "";
		break;
	case $allows_array[1]:
		$source_code = explode("/", $content);
		if (is_array($source_code)) {
			$source_code = $source_code[count($source_code) - 1];
		}
		?>
		<div class="video-wrapper"><iframe src="//player.vimeo.com/video/<?php echo esc_attr($source_code) ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f6e200"></iframe></div>
		<?php
		break;

	default:
		esc_html_e('Unsupported video format', 'tmm_content_composer');
		break;
}