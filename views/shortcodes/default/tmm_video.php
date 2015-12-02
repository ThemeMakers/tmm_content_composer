<?php
if (!defined('ABSPATH')) exit();

global $is_iphone;
$is_mobiles = wp_is_mobile() || $is_iphone || stripos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false;
$image_size = "840*500";

$video_types = array(
	'youtube.com',
	'youtu.be',
	'vimeo.com',
	'.mp4',
	'.ogv',
	'.webm'
);

/* define type of video */
$video_type = '';

foreach ($video_types as $key => $needle) {
	if (strpos($content, $needle) !== false) {
		$video_type = $video_types[$key];
	}
}

/* define video cover image */
if (isset($cover_id)) {

	if ($is_mobiles) {
		$cover_id = (int) $cover_id;
	} else {
		$cover_id = '';
	}

} else {
	$cover_id = '';
}

if (isset($cover_image_on_mobiles) && $cover_image_on_mobiles === '1') {
	if (isset($cover_image) && !$is_mobiles) {
		$cover_image = '';
	}
}

switch ($video_type) {
	case $video_types[0]:
	case $video_types[1]:

		$source_code = explode("?v=", $content);
		$source_code = explode("&", $source_code[1]);
		if (is_array($source_code)) {
			$source_code = $source_code[0];
		}
		?>
		<iframe <?php echo (isset($width) && !empty($width)) ? 'width="'.$width.'"' : ''; ?> <?php echo (!isset($width) || empty($width) || !isset($height)) ? '' : 'height="'.$height.'"';  ?> src="http://www.youtube.com/v/<?php echo $source_code ?>?wmode=transparent&amp;rel=0&amp;showinfo=0" allowFullScreen></iframe>
		<?php

		break;

	case $video_types[2]:

		$source_code = explode("/", $content);
		if (is_array($source_code)) {
			$source_code = $source_code[count($source_code) - 1];
		}
		?>
		<iframe width="<?php echo $width ?>" height="<?php echo (!isset($width) || empty($width)) ? '' : $height ?>" src="http://player.vimeo.com/video/<?php echo $source_code ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f6e200" allowFullScreen></iframe>
		<?php
		break;

	case $video_types[3]:
	case $video_types[4]:
	case $video_types[5]:

		$source_code = $content;

		if (!isset($cover_image)) {
			$cover_image = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, $image_size) : '';
		}
		?>

		<video poster="<?php echo esc_url($cover_image) ?>" controls="controls" <?php echo (isset($width) && !empty($width)) ? 'width="'.$width.'"' : ''; ?> <?php echo (isset($height) && !empty($height)) ? 'height="'.$height.'"' : ''; ?>>
			<source type="video/<?php echo trim($video_type, '.') ?>" src="<?php echo esc_url($source_code) ?>" />
		</video>

		<?php
		wp_enqueue_script('mediaelement');
		break;

	default:
		$cover_image = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, '') : '';
		if (!empty($cover_image)) {
			?>
			<img src="<?php echo esc_url(TMM_Content_Composer::resize_image_cover($cover_image, $image_size)); ?>" alt="<?php esc_attr_e('Unsupported video format', TMM_CC_TEXTDOMAIN) ?>" />
		<?php
		}else{
			esc_html_e('Unsupported video format', TMM_CC_TEXTDOMAIN);
		}
		break;
}
?>
