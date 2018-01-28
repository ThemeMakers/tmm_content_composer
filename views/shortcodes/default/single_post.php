<?php if (!defined('ABSPATH')) die('No direct access allowed');

$post_id = (int) $content;
$post = get_post($post_id);
$post_link = post_permalink($post_id);
?>

<article class="entry clearfix">
    <div class="ten columns">

    <?php
    $post_pod_type = get_post_meta($post->ID, 'post_pod_type', true);
    $post_type_values = get_post_meta($post->ID, 'post_type_values', true);
    //***
    switch ($post_pod_type) {
        case 'audio':
            echo do_shortcode('[tmm_audio]' . $post_type_values[$post_pod_type] . '[/tmm_audio]');
            break;
        case 'video':
            ?>

            <?php
            $video_width = 580;
            $video_height = 360;

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
                        echo do_shortcode('[tmm_video type="youtube" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/tmm_video]');
                        break;
                    case $allows_array[1]:
                        echo do_shortcode('[tmm_video type="vimeo" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/tmm_video]');
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
            TMM_OptionsHelper::enqueue_script('cycle');
            $gall = $post_type_values[$post_pod_type];
            ?>

            <?php if (!empty($gall)) : ?>

                <div class="image-post-slider">
                    <ul>
                        <?php foreach ($gall as $key => $source_url): ?>
                            <li><a data-fancybox-group="lightbox" href="<?php echo $post_link ?>" class="single-image link-icon"><img src="<?php echo TMM_Helper::resize_image($source_url, '580*360') ?>" width="580" height="360" alt="<?php echo $post->post_title ?>" /></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div><!--/ .image-post-slider-->

            <?php endif; ?>
            <?php
            break;

        default:
            ?>
            <?php if (has_post_thumbnail($post->ID)) : ?>
                <a class="single-image link-icon" href="<?php echo get_permalink($post->ID) ?>">
                    <img src="<?php echo TMM_Helper::get_post_featured_image($post->ID, '580*360'); ?>" width="580" height="360" alt="<?php echo get_the_title($post->ID); ?>" />
                </a>
            <?php endif; ?>
            <?php
            break;
    }
    ?>

    <?php if ($show_post_metadata == 1): ?>
        <div class="entry-date">
            <a href="<?php echo home_url() ?>/?m=<?php echo mysql2date('Ym', get_post_field('post_date', $post->ID)) ?>">
                <span class="entry-day"><?php echo get_the_date('d') ?></span>
                <span class="entry-month"><?php echo get_the_date('M') ?></span>
            </a>
            <span class="entry-year"><?php echo get_the_date('Y') ?></span>
        </div><!--/ .entry-date-->
    <?php endif; ?>
				
    <div class="entry-meta">
		
		<h5 class="title"><a href="<?php echo $post_link ?>"><?php echo $post->post_title ?></a></h5>
		
		<?php if ($show_post_metadata == 1): ?>
		
			<span class="comments"><a href="<?php echo $post_link ?>#comments"><?php echo get_comments_number($post->ID); ?> <?php _e('Comments', 'tmm_shortcodes'); ?></a></span>
	
		<?php endif; ?>
		
	</div><!--/ .entry-meta-->

    <div class="entry-body">

        <p>
            <?php
            if (TMM::get_option("excerpt_symbols_count")) {
                if (empty($post->post_excerpt)) {
                    $txt = do_shortcode($post->post_content);
                    $txt = strip_tags($txt);
                    echo substr($txt, 0, $char_count) . " ...";
                } else {
                    if (function_exists('mb_substr')) {
                        echo do_shortcode(mb_substr($post->post_excerpt, 0, $char_count) . " ...");
                    } else {
                        echo do_shortcode(substr($post->post_excerpt, 0, $char_count) . " ...");
                    }
                }
            } else {
                echo do_shortcode($post->post_excerpt);
            }
            ?>
        </p>
		
		 <?php if ($show_readmore_button == 1): ?>
			<a href="<?php echo $post_link ?>" class="button <?php if (!empty($button_color)) echo $button_color; ?>">Read More</a>
		<?php endif; ?>

    </div><!--/ .entry-body-->

</div><!--/ .item-->
</article>