<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$post_id = (int) $content;
$post = get_post($post_id);
$post_link = post_permalink($post_id);
$image_size = '1035*550';
?>

<article class="entry-item">        

    <?php if ($show_post_type_media == 1){ ?>

        <div class="entry-media">

            <?php
            $post_pod_type = get_post_meta($post_id, 'post_pod_type', true);
            $post_type_values = get_post_meta($post_id, 'post_type_values', true);

            switch ($post_pod_type) {
                case 'audio':
                    echo do_shortcode('[tmm_audio]' . $post_type_values[$post_pod_type] . '[/tmm_audio]');
                    break;
                case 'video':

                    $video_width = '';
                    $video_height = '';

                    $source_url = $post_type_values[$post_pod_type];
                    if (!empty($source_url)) {

                        $video_type = 'youtube.com';
                        $allows_array = array('youtube.com', 'vimeo.com', '.mp4', '.ogv', '.webm');

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
                            case $allows_array[2]:
                            case $allows_array[3]:
                            case $allows_array[4]:
                                echo do_shortcode('[tmm_video type="selfhosted" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/tmm_video]');
                                break;
                            default:
                                break;
                        }
                    }

                    break;

                case 'quote':
                    ?>
                        <div class="quote-inner">
                            <a class="whole-link" href="<?php echo esc_url($post_link); ?>"></a>
                            <?php
                            echo do_shortcode('[blockquote]' . $post_type_values[$post_pod_type] . '[/blockquote]');
                            ?>
                            <div class="quote-meta">
                                <div class="quote-author"><?php the_author_link(); ?></div>
                            </div>
                        </div>
                    <?php
                        break;

                case 'gallery':
                    tmm_enqueue_script('owlcarousel');
                    tmm_enqueue_style('owlcarousel');
                    tmm_enqueue_style('owltheme');
                    tmm_enqueue_style('owltransitions');

                    $gallery_type = get_post_meta($post->ID, 'gallery_type', true);
                    if ($gallery_type!='accordion_grid_gallery'){
                        $gall = $post_type_values[$post_pod_type];
                    }

                    switch($gallery_type){
                        case 'grid_gallery':
                            if (!empty($gall)){
                            ?>
                             <ul class="grid-post">

                                <?php foreach ($gall as $key => $item){ ?>
                                <li class="<?php echo esc_attr($item['image_type']) ?>">
                                    <a href="<?php echo esc_url($post_link); ?>" class="slide-image link-icon">
                                        <img src="<?php echo esc_url(TMM_Content_Composer::resize_image($item['url'], '520*310')); ?>" alt="" />
                                    </a>
                                </li>
                                <?php } ?>

                            </ul><!--/ .grid-post-->
                            <?php
                            }
                            break;
                        case 'accordion_grid_gallery':
                                $post_gallery_accordion = get_post_meta($post->ID, 'post_gallery_accordion', true);
                                do_shortcode('[grid_slider form_id=' . $post_gallery_accordion . '][/grid_slider]');
                            break;
                        default:
                             if (!empty($gall)){ ?>

                                <div class="image-slider">

                                    <?php foreach ($gall as $key => $source_url){ ?>

                                        <div class="item">
                                            <a class="slide-image link-icon" href="<?php echo esc_url($post_link); ?>">
                                                <?php if ($_REQUEST['sidebar_position'] != 'no_sidebar'){ ?>
                                                    <img src="<?php echo esc_url(TMM_Content_Composer::resize_image($source_url, $image_size)); ?>" alt="<?php echo esc_attr($post->post_title); ?>" />
                                                <?php }else{ ?>
                                                    <img src="<?php echo esc_url(TMM_Content_Composer::resize_image($source_url, $image_size)); ?>" alt="<?php echo esc_attr($post->post_title); ?>" />
                                                <?php } ?>
                                            </a>
                                        </div><!--/ .item-->

                                    <?php }; ?>

                                </div><!--/ .image-slider-->

                            <?php
                            }
                            break;
                    }

                    break;

                default:
                    ?>
                    <?php if (has_post_thumbnail($post_id)){ ?>

                        <a href="<?php echo esc_attr($post_link) ?>" class="slide-image link-icon">
                            <img src="<?php echo esc_url(TMM_Content_Composer::get_post_featured_image($post_id, $image_size)); ?>" alt="<?php echo esc_attr($post->post_title) ?>" />
                        </a>

                    <?php }

                    break;
            }
            ?>

        </div><!--/ .entry-media-->

    <?php } ?>

    <h4 class="entry-title">
        <a href="<?php echo esc_url($post_link) ?>"><?php echo esc_html($post->post_title) ?></a>
    </h4><!--/ .entry-title-->

    <?php
    $txt = "";
    if ($show_content == 1) {
        $txt = strip_tags(do_shortcode($post->post_content));
    } else {
        $txt = strip_tags(do_shortcode($post->post_excerpt));
    }

    if (function_exists('mb_substr')) {
        $txt = do_shortcode(mb_substr($txt, 0, $char_count) . " ...");
    } else {
        $txt = do_shortcode(substr($txt, 0, $char_count) . " ...");
    }
    ?>

    <?php if (!empty($txt)){ ?>

        <p><?php echo $txt ?></p>

    <?php } ?>

    <?php if ($show_post_metadata == 1){ ?>
        <div class="post-meta">

            <?php if (!class_exists('TMM') || TMM::get_option("blog_listing_show_date")){ ?>

                <span class="date"><a href="<?php echo home_url() ?>/<?php echo mysql2date('Y/m', $post->post_date, false) ?>"><?php echo mysql2date(get_option('date_format'), $post->post_date, false) ?></a></span>

            <?php } ?>

            <?php if (!class_exists('TMM') || !TMM::get_option("blog_listing_show_comments")){ ?>
                <span class="comments"><a href="<?php echo esc_url($post_link) ?>#comments"><?php echo get_comments_number($post->ID); ?></a>&nbsp;<?php _e('Comments', TMM_CC_TEXTDOMAIN); ?></span>
            <?php } ?>
        </div>
    <?php } ?>    

    <?php if ($show_readmore_button == 1){ ?>
            <?php echo do_shortcode('[button text="'.__('Read more', TMM_CC_TEXTDOMAIN) .'" url="' . $post_link . '" color="' . $button_color . '" size="' . $button_size . '"]') ?>
    <?php } ?>

</article><!--/ .entry-item-->
