<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$allows_array = array('youtube.com', 'vimeo.com', '.mp4', '.ogv', '.webm');
$video_type = '';
foreach ($allows_array as $key => $needle) {
	$count = strpos($content, $needle);
	if ($count !== FALSE) {
		$video_type = $allows_array[$key];
	}
}

$image_size = "1036*576";

global $is_iphone;
$is_mobiles = wp_is_mobile() || $is_iphone || stripos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false;

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

if ($video_type != $allows_array[0] ){
	if (!empty($width)) {
		$width = strrpos($width, '%') === false ? (int) $width : (int) $width . '%';
	} else {
		$width = '100%';
	}

	if (!empty($height)) {
		$height = strrpos($height, '%') === false ? (int) $height : (int) $height . '%';
	} else {
		$height = '100%';
	}
}

?>

<div class="image-post">

	<?php
	switch ($video_type) {
		case $allows_array[0]:

			$source_code = explode("?v=", $content);
			$source_code = explode("&", $source_code[1]);
			if (is_array($source_code)) {
				$source_code = $source_code[0];
			}
			?>

			<iframe  class="<?php echo (!isset($width) || empty($width)) ? 'fitwidth' : '' ?>" width="<?php echo $width ?>" height="<?php echo ($width === '100%' ? '' : $height); ?>" src="//www.youtube.com/embed/<?php echo $source_code ?>?wmode=transparent&amp;rel=0&amp;controls=0&amp;showinfo=0"></iframe>
			<?php

			break;

		case $allows_array[1]:

			$source_code = explode("/", $content);
			if (is_array($source_code)) {
				$source_code = $source_code[count($source_code) - 1];
			}
			?>
			<iframe class="<?php echo (!isset($width) || empty($width)) ? 'fitwidth' : '' ?>" width="<?php echo $width ?>" height="<?php echo ($width === '100%' ? '' : $height); ?>" src="//player.vimeo.com/video/<?php echo $source_code ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f6e200"></iframe>
			<?php
			break;

		case $allows_array[2]:

			$source_code = $content;

			$cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, '') : '';
			$cover = isset($cover_image) ? $cover_image : $cover;
			?>

			<video  poster="<?php echo esc_url($cover) ?>" controls="controls" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
				<source type="video/mp4" src="<?php echo esc_url($source_code) ?>" />
			</video>

			<?php

			wp_enqueue_style('tmm_mediaelement');
			wp_enqueue_script('mediaelement');
			break;

		case $allows_array[3]:

			$source_code = $content;

			$cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, '') : '';
			$cover = isset($cover_image) ? $cover_image : $cover;
			?>

			<video poster="<?php echo esc_url($cover) ?>" controls="controls" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
				<source type="video/ogg" src="<?php echo esc_url($source_code) ?>" />
			</video>

			<?php
			wp_enqueue_style('tmm_mediaelement');
			wp_enqueue_script('mediaelement');
			break;

		case $allows_array[4]:

			$source_code = $content;
			$cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, '') : '';
			$cover = isset($cover_image) ? $cover_image : $cover;
			?>

			<video poster="<?php echo esc_url($cover) ?>" controls="controls" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
				<source type="video/webm" src="<?php echo esc_url($source_code) ?>" />
			</video>

			<?php
			wp_enqueue_style('tmm_mediaelement');
			wp_enqueue_script('mediaelement');
			break;

		default:
			$cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, '') : '';
			if (!empty($cover)) {
				?>
				<img src="<?php echo esc_url(TMM_Content_Composer::resize_image($cover, $image_size)); ?>" alt="<?php _e('Unsupported video format', TMM_CC_TEXTDOMAIN) ?>" />
			<?php
			}else{
				_e('Unsupported video format', TMM_CC_TEXTDOMAIN);
			}
			break;
	}

	?>

</div>