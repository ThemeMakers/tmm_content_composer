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

?>

<div style="height: 100%">

	<?php
	switch ($video_type) {
		case $allows_array[0]:

			$source_code = explode("?v=", $content);
			$source_code = explode("&", $source_code[1]);
			if (is_array($source_code)) {
				$source_code = $source_code[0];
			}
			?>
			<iframe  class="<?php echo (!isset($width) || empty($width)) ? 'fitwidth' : '' ?>" type="text/html" width="<?php echo $width ?>" height="<?php echo (!isset($width) || empty($width)) ? '' : $height ?>" src="http://www.youtube.com/embed/<?php echo $source_code ?>?wmode=transparent"></iframe>
			<?php

			break;

		case $allows_array[1]:

			$source_code = explode("/", $content);
			if (is_array($source_code)) {
				$source_code = $source_code[count($source_code) - 1];
			}
			?>
			<iframe class="<?php echo (!isset($width) || empty($width)) ? 'fitwidth' : '' ?>" width="<?php echo $width ?>" height="<?php echo (!isset($width) || empty($width)) ? '' : $height ?>" src="http://player.vimeo.com/video/<?php echo $source_code ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f6e200"></iframe>
			<?php
			break;

		case $allows_array[2]:

			$source_code = $content;

			$cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, $image_size) : '';
			$cover = isset($cover_image) ? $cover_image : $cover;
			?>

			<video  poster="<?php echo $cover ?>" controls="controls" width="<?php echo (isset($width) && !empty($width)) ? $width : '100%'; ?>" height="<?php echo (!empty($height)) ? $height : '100%' ?>">
				<source type="video/mp4" src="<?php echo esc_url($source_code) ?>" />
			</video>

			<?php

			wp_enqueue_style('tmm_mediaelement');
			wp_enqueue_script('mediaelement');
			break;

		case $allows_array[3]:

			$source_code = $content;

			$cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, $image_size) : '';
			$cover = isset($cover_image) ? $cover_image : $cover;
			?>

			<video poster="<?php echo $cover ?>" controls="controls" width="<?php echo (isset($width) && !empty($width)) ? $width : '100%'; ?>" height="<?php echo (!empty($height)) ? $height : '100%' ?>">
				<source type="video/ogg" src="<?php echo esc_url($source_code) ?>" />
			</video>

			<?php
			wp_enqueue_style('tmm_mediaelement');
			wp_enqueue_script('mediaelement');
			break;

		case $allows_array[4]:

			$source_code = $content;
			$cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, $image_size) : '';
			$cover = isset($cover_image) ? $cover_image : $cover;
			?>

			<video poster="<?php echo $cover ?>" controls="controls" width="<?php echo (isset($width) && !empty($width)) ? $width : '100%'; ?>" height="<?php echo (!empty($height)) ? $height : '100%' ?>">
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
				<img src="<?php echo TMM_Content_Composer::resize_image_cover($cover, $image_size); ?>" alt="<?php _e('Unsupported video format', TMM_CC_TEXTDOMAIN) ?>" />
			<?php
			}else{
				_e('Unsupported video format', TMM_CC_TEXTDOMAIN);
			}
			break;
	}

	?>
</div>