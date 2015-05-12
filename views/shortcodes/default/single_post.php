<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$post_id = (int) $content;
$post = get_post($post_id);
$post_link = post_permalink($post_id);
?>

<?php if ($show_post_type_media == 1): ?>
	<?php
	$post_pod_type = get_post_meta($post_id, 'post_pod_type', true);
	$post_type_values = get_post_meta($post_id, 'post_type_values', true);
	$image_size = ($_REQUEST['sidebar_position'] == 'no_sidebar') ? '950*545' : '610*350';

	switch ($post_pod_type) {
		case 'audio':
			echo do_shortcode('[tmm_audio]' . $post_type_values[$post_pod_type] . '[/tmm_audio]');
			break;
		case 'video':
			$video_size = explode('*', $image_size);
			$video_width = $video_size[0]+10;
			$video_height = $video_size[1];

			$source_url = $post_type_values[$post_pod_type];
			if (!empty($source_url)) {

				$video_type = 'youtube.com';
				$allows_array = array('youtube.com', 'vimeo.com');

				foreach ($allows_array as $key => $needle) {
					$count = strpos($source_url, $needle);
					if ($count !== FALSE) {
						$video_type = $allows_array[$key];
					}
				}

				switch ($video_type) {
					case $allows_array[0]:
						$video_type_name = 'youtube';
						break;
					case $allows_array[1]:
						$video_type_name = 'vimeo';
						break;
					default:
						break;
				}
				echo do_shortcode('[tmm_video type="'.$video_type_name.'" full_width="0" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/tmm_video]');
			}
			
			break;

		case 'quote':
			echo do_shortcode('[blockquote]' . $post_type_values[$post_pod_type] . '[/blockquote]');
			break;

		case 'gallery':
			TMM_Functions::enqueue_script('cycle');
			$gall = $post_type_values[$post_pod_type];
			?>

			<?php if (!empty($gall)) : ?>

				<div class="image-post-slider">
					<ul>
						<?php foreach ($gall as $key => $source_url): ?>
								<li>
									
									<div class="work-item">
											
										<a class="single-image" href="<?php echo TMM_Helper::resize_image($source_url, ''); ?>">
											<figure>
												<img src="<?php echo TMM_Helper::resize_image($source_url, $image_size); ?>" alt="<?php echo $post->post_title; ?>" />
											</figure>
										</a>

									</div><!--/ .work-item-->	
								
								</li>
						<?php endforeach; ?>
					</ul>
				</div><!--/ .image-post-slider-->

			<?php endif; ?>

			<?php
			break;

		default:
			?>
			<?php if (has_post_thumbnail($post_id)) : ?>
				
			<div class="work-item">
                                                    
				<a class="single-image" href="<?php echo TMM_Helper::get_post_featured_image($post_id, ''); ?>">
					<figure>
						<img src="<?php echo TMM_Helper::get_post_featured_image($post_id, $image_size); ?>" alt="<?php echo $post->post_title; ?>" />
					</figure>
				</a>										

			</div><!--/ .work-item-->
			
			<?php endif; ?>
			<?php
			break;
	}
	?>
<?php endif; ?>

<h5 class="title"><a href="<?php echo $post_link ?>"><?php echo $post->post_title ?></a></h5>

<?php if ($show_post_metadata == 1): ?>
	<div class="post-meta">

		<?php if (TMM::get_option("blog_listing_show_date")) : ?>
			<span class="post-date"><?php echo mysql2date(get_option('date_format'), $post->post_date, false) ?></span>
		<?php endif; ?>		

		<?php if (!TMM::get_option("blog_listing_show_comments")) : ?>
			<span class="post-comments"><?php _e('With', TMM_CC_TEXTDOMAIN); ?>&nbsp;<a href="<?php echo $post_link ?>#comments"><?php echo get_comments_number($post->ID); ?></a>&nbsp;<?php _e('Comments', TMM_CC_TEXTDOMAIN); ?></span>
		<?php endif; ?>
	</div>
<?php endif; ?>	
	
<?php

$txt = strip_tags(do_shortcode($post->post_excerpt));

if (function_exists('mb_substr')) {
	$txt = do_shortcode(mb_substr($txt, 0, $char_count) . " ...");
} else {
	$txt = do_shortcode(substr($txt, 0, $char_count) . " ...");
}
?>

<?php if (!empty($txt)): ?>

	<p><?php echo $txt ?></p>
	
<?php endif; ?>

<?php if ($show_readmore_button == 1): ?>
	<?php echo do_shortcode('[button url="' . $post_link . '" color="' . $button_color . '" size="' . $button_size . '"]' . __('Read more', TMM_CC_TEXTDOMAIN) . '[/button]') ?>
<?php endif; ?>