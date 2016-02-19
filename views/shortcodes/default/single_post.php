<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$post_id = (int) $content;
$post = get_post($post_id);
$post_link = get_permalink($post_id);
?>

<?php if ($show_post_type_media == 1): ?>
	<?php
	$post_pod_type = get_post_meta($post_id, 'post_pod_type', true);
	$post_type_values = get_post_meta($post_id, 'post_type_values', true);

	switch ($post_pod_type) {
		case 'audio':
			echo do_shortcode('[tmm_audio]' . $post_type_values[$post_pod_type] . '[/tmm_audio]');
			break;
		case 'video':
			?>

			<?php
			$video_width = '560';
			$video_height = '360';

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
						echo '<div class="entry-image">';
						echo do_shortcode('[tmm_video type="youtube" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/tmm_video]');
						echo '</div>';
						break;
					case $allows_array[1]:
						echo '<div class="entry-image">';
						echo do_shortcode('[tmm_video type="vimeo" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/tmm_video]');
						echo '</div>';
						break;
					default:
						break;
				}
				
			}
			?>
			<?php
			break;

		case 'quote':
			echo do_shortcode('[blockquote]' . $post_type_values[$post_pod_type] . '[/blockquote]');
			break;

		case 'gallery':
			TMM_Functions::enqueue_script('cycle');
			$gall = $post_type_values[$post_pod_type];
			?>

			<?php if (!empty($gall)) : ?>

			<div class="entry-image">
				
				<div class="image-slider">
					
					<ul>
						<?php foreach ($gall as $key => $source_url): ?>
							<li>
								
								<div class="work-item">
									
									<img src="<?php echo TMM_Helper::resize_image($source_url, '560*390') ?>" alt="<?php echo $post->post_title ?>" />
									
									<div class="image-extra">
										
										<div class="extra-content">
											
											<div class="inner-extra">
												<a class="single-image link-icon" href="<?php echo $post_link ?>"></a>
												<a class="single-image plus-icon" data-fancybox-group="blog" href="<?php echo TMM_Helper::resize_image($source_url, '') ?>"></a>	
											</div><!--/ .inner-extra-->	
										
										</div><!--/ .extra-content-->
										
									</div><!--/ .image-extra-->	
									
								</div><!--/ .work-item-->
								
							</li>
						<?php endforeach; ?>
					</ul>
					
				</div><!--/ .image-slider-->
				
			</div><!--/ .entry-image-->	
				
			<?php endif; ?>

			<?php
			break;

		default:
			?>
			<?php if (has_post_thumbnail($post_id)): ?>
				
				<div class="entry-image">
					<div class="work-item">
						<img src="<?php echo TMM_Helper::get_post_featured_image($post_id, '560*390'); ?>" alt="<?php echo $post->post_title ?>" />
						<div class="image-extra">
							<div class="extra-content">
								<div class="inner-extra">
									<a class="single-image link-icon" href="<?php echo $post_link ?>"></a>
									<a class="single-image plus-icon" data-fancybox-group="blog" href="<?php echo TMM_Helper::get_post_featured_image($post_id, ''); ?>"></a>	
								</div><!--/ .inner-extra-->	
							</div><!--/ .extra-content-->
						</div><!--/ .image-extra-->	
					</div><!--/ .work-item-->
				</div><!--/ .entry-image-->		
				
			<?php endif; ?>
			<?php
			break;
	}
	?>
<?php endif; ?>

<?php if ($show_post_metadata == 1): ?>
				
	<div class="entry-meta">
		
		<?php if (TMM::get_option("blog_listing_show_date")) : ?>
			<?php $dateArr = date_parse($post->post_date);  ?>
			<span class="date"><a href="<?php echo get_day_link($dateArr['year'], $dateArr['month'], $dateArr['day']) ?>"><?php echo mysql2date(get_option('date_format'), $post->post_date, false) ?></a></span>
		<?php endif; ?>	
			
		<?php if (!TMM::get_option("blog_listing_show_comments")) : ?>	
			<span class="comments"><a href="<?php echo $post_link ?>#comments"><?php echo get_comments_number($post->ID); ?></a>&nbsp;<?php _e('Comments', TMM_CC_TEXTDOMAIN); ?></span>
		<?php endif; ?>
		
	</div><!--/ .entry-meta-->			

<?php endif; ?>	

	<h2 class="entry-title">
		<a href="<?php echo $post_link ?>"><?php echo $post->post_title ?></a>
	</h2><!--/ .entry-title-->
	
	<?php
	$txt = "";

    if (!empty($post->post_excerpt)) {
        $txt = strip_tags(do_shortcode($post->post_excerpt));
    } else {
        if ('1' == $show_content) {
            $txt = strip_tags(do_shortcode($post->post_content));
        }
    }

    if ('' != $char_count) {
        if (function_exists('mb_substr')) {
            $txt = mb_substr($txt, 0, $char_count) . " ...";
        } else {
            $txt = substr($txt, 0, $char_count) . " ...";
        }
    }

	?>

	<?php if (!empty($txt)): ?>

		<div class="entry-body">
			<p><?php echo $txt ?></p>	
		</div><!--/ .entry-body-->	

	<?php endif; ?>
