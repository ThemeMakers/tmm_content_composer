<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php $post_id = $content; ?>
<?php
$gallery_thumbnail_width = 284;
$gallery_thumbnail_height = 224;
?>

<?php
$gallery_data_height = get_option(TMM_THEME_PREFIX . "gallery_slider_width");

switch ($gallery_data_height) {
	case 340:
		$data_height = 244;
		break;
	case 400:
		$data_height = 283;
		break;
	case 460:
		$data_height = 322;
		break;
	case 520:
		$data_height = 360;
		break;
	default:
		$data_height = 283;
		break;
}
$images = get_post_meta($post_id, 'thememakers_gallery', true);
?>

<?php if (!empty($images)): ?>
	<section>
		<?php foreach ($images as $key => $source_url) : ?>
		<article style="width: auto; float: left; margin: 0 9px 9px 0;">

				<div class="project-thumb">

					<?php
					$video_type = '';
					$allows_array = array('youtube.com', 'vimeo.com');

					foreach ($allows_array as $key => $needle) {
						$count = strpos($source_url, $needle);
						if ($count !== FALSE) {
							$video_type = $allows_array[$key];
						}
					}

					if ($video_type==''): ?>
					<div class="bordered" style="width: <?php echo ($gallery_thumbnail_width+16) ?>px; height: auto;">
							<figure class="add-border">
								<a href="<?php echo $source_url ?>" rel="gallery" class="single-image picture-icon">
									<img alt="" src="<?php echo ThemeMakersHelper::resize_image($source_url, $gallery_thumbnail_width, true, $gallery_thumbnail_height) ?>"><span class="curtain">&nbsp;</span>
								</a>
							</figure>
						</div><!--/ .bordered-->

					<?php else: ?>

						<div class="bordered">
							<figure class="add-border">
								<?php

								switch ($video_type) {
									case $allows_array[0]:
										$source_url = explode("?v=", $source_url);
										$source_url = explode("&", $source_url[1]);
										if (is_array($source_url)) {
											$source_url = $source_url[0];
										}
										?>
										<a href="http://www.youtube.com/v/<?php echo $source_url ?>?version=3&feature=player_detailpage" rel="gallery" class="single-image video-icon video">
											<img alt="" src="<?php echo TMM_THEME_URI . '/images/video_poster2.jpg' ?>"><span class="curtain">&nbsp;</span>
										</a>
										<?php
										break;
									case $allows_array[1]:
										$source_url = explode("/", $source_url);
										if (is_array($source_url)) {
											$source_url = $source_url[3];
										}
										?>
										<a href="http://player.vimeo.com/video/<?php echo $source_url ?>?byline=0&portrait=0" rel="gallery" class="single-image video-icon video">
											<img alt="" src="<?php echo TMM_THEME_URI . '/images/video_poster2.jpg' ?>"><span class="curtain">&nbsp;</span>
										</a>
										<?php
										break;
								}
								?>

							</figure>
						</div>

					<?php endif; ?>

				</div><!--/ .project-thumb-->

			</article><!--/ .eight-->
		<?php endforeach; ?>
	</section>
<?php endif; ?>

