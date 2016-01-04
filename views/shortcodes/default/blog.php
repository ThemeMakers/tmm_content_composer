<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
//blog layout
wp_reset_query();

$args = array(
    'orderby' => $orderby,
    'order' => $order,
    'post_status' => array('publish')
);

$offset = 0;
if (isset($_GET['offset'])) {
    $offset = (int) $_GET['offset'];
    $args['offset'] = $offset;
}

if (!empty($posts_per_page)) {
    $args['posts_per_page'] = $posts_per_page;
}

if ((int) $category > 0) {
    $args['cat'] = $category;
}

if (!empty($posts)) {
    $posts = explode(',', $posts);
    $args['post__in'] = $posts;
}

$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$args['paged'] = $paged;


global $wp_query;
$original_query = $wp_query;
$wp_query = null;
$wp_query = new WP_Query($args);
global $post;
?>

<?php if (!empty($title)): ?>
    <h3 class="widget-title"><?php echo $title; ?></h3>
<?php endif; ?>

<?php if ($blog_view == "default"): ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class("entry"); ?>>

            <?php
            $post_pod_type = get_post_meta($post->ID, 'post_pod_type', true);
            $post_type_values = get_post_meta($post->ID, 'post_type_values', true);
            ?>


            <?php
            switch ($post_pod_type) {
                case 'audio':
                    echo do_shortcode('[audio]' . $post_type_values[$post_pod_type] . '[/audio]');
                    break;
                case 'video':
                    $video_width = 570;
                    $video_height = 326;

                    $source_url = $post_type_values[$post_pod_type];
                    if (!empty($source_url)) {

                        $video_type = 'youtube.com';
                        $allows_array = array('youtube.com', 'player.vimeo.com', '.mp4');

                        foreach ($allows_array as $key => $needle) {
                            $count = strpos($source_url, $needle);
                            if ($count !== FALSE) {
                                $video_type = $allows_array[$key];
                            }
                        }


                        switch ($video_type) {
                            case $allows_array[0]:
                                $source_url = explode("?v=", $source_url);
                                $source_url = explode("&", $source_url[1]);
                                if (is_array($source_url)) {
                                    $source_url = $source_url[0];
                                }
                                echo do_shortcode('[video type="youtube" html5_poster="" html5_video_url="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]');
                                break;
                            case $allows_array[1]:
                                $source_url = explode("/", $source_url);
                                if (is_array($source_url)) {
                                    $source_url = $source_url[count($source_url) - 1];
                                }
                                echo do_shortcode('[video type="vimeo" html5_poster="" html5_video_url="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]');
                                break;
                            case $allows_array[2]:
                                $html5_poster = TMM_THEME_URI . "/images/video_poster.jpg";
                                if (has_post_thumbnail($post->ID)) {
                                    $html5_poster = ThemeMakersHelper::get_post_featured_image($post->ID, $video_width, true, $video_height);
                                }
                                echo do_shortcode('[video type="html5" html5_poster="' . $html5_poster . '" html5_video_url="' . $source_url . '" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"][/video]');
                                break;

                            default:
                                break;
                        }
                    }
                    ?>

                    <?php
                    break;

                case 'quote':
                    echo do_shortcode('[quotes]' . $post_type_values[$post_pod_type] . '[/quotes]');
                    break;

                case 'gallery':
                    $gall = $post_type_values[$post_pod_type];
                    ?>


                    <?php if (!empty($gall)) : ?>

                    <?php
                    $gallery_layout_selected = get_option(TMM_THEME_PREFIX . "gallery_slider_width");

                    if (!$gallery_layout_selected) {
                        $gallery_layout_selected = 400;
                    }

                    switch ($gallery_layout_selected) {
                        case 340:
                            $gallery_layout_class = "six columns";
                            $gallery_layout_height = 244;
                            break;
                        case 400:
                            $gallery_layout_class = "seven columns";
                            $gallery_layout_height = 283;
                            break;
                        case 460:
                            $gallery_layout_class = "eight columns";
                            $gallery_layout_height = 322;
                            break;
                        case 520:
                            $gallery_layout_class = "nine columns";
                            $gallery_layout_height = 360;
                            break;
                        default:
                            $gallery_layout_class = "seven columns";
                            $gallery_layout_height = 283;
                            break;
                    }
                    ?>

                    <div style="width: 100%" class="image-gallery-slider alpha">

                        <div class="sudo-slider">

                            <ul>

                                <?php
                                $video_width = 570;
                                $video_height = 326;

                                foreach ($gall as $source_url) {

                                if (!empty($source_url)) {

                                $video_type = 'youtube.com';
                                $allows_array = array('youtube.com', 'player.vimeo.com', '.mp4', '.jpg', '.png', '.gif', '.bmp');

                                foreach ($allows_array as $key => $needle) {
                                    $count = strpos($source_url, $needle);
                                    if ($count !== FALSE) {
                                        $video_type = $allows_array[$key];
                                    }
                                }

                                switch ($video_type) {
                                case $allows_array[0]:
                                    $source_url = explode("?v=", $source_url);
                                    $source_url = explode("&", $source_url[1]);
                                    if (is_array($source_url)) {
                                        $source_url = $source_url[0];
                                    }
                                    echo "<li>" . do_shortcode('[video type="youtube" html5_poster="" html5_video_url="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]') . "</li>";
                                    break;
                                case $allows_array[1]:
                                    $source_url = explode("/", $source_url);
                                    if (is_array($source_url)) {
                                        $source_url = $source_url[count($source_url) - 1];
                                    }
                                    echo "<li>" . do_shortcode('[video type="vimeo" html5_poster="" html5_video_url="" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/video]') . "</li>";
                                    break;
                                case $allows_array[2]:
                                    $html5_poster = TMM_THEME_URI . "/images/video_poster.jpg";
                                    if (has_post_thumbnail($post->ID)) {
                                        $html5_poster = ThemeMakersHelper::get_post_featured_image($post->ID, $video_width, true, $video_height);
                                    }
                                    echo "<li>" . do_shortcode('[video type="html5" html5_poster="' . $html5_poster . '" html5_video_url="' . $source_url . '" src_webm="" src_ogg="" width="' . $video_width . '" height="' . $video_height . '"][/video]') . "</li>";
                                    break;

                                default:
                                $cut_blog_images_without_height = get_option(TMM_THEME_PREFIX . "cut_blog_images_without_height");
                                ?>
                                <li>
                                    <div class="bordered">
                                        <figure class="add-border">
                                            <img src="<?php echo ThemeMakersHelper::resize_image($source_url, 570, true, 360) ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                        </figure>
                                    </div><!--/ .bordered-->
                                    <?php
                                    break;
                                    }
                                    }
                                    }
                                    ?>

                            </ul>

                        </div><!--/ .sudo-slider-->

                    </div><!--/ .image-gallery-slider-->

                <?php endif; ?>

                    <?php
                    break;

                default:
                    $cut_blog_images_without_height = get_option(TMM_THEME_PREFIX . "cut_blog_images_without_height");
                    ?>
                    <?php if (has_post_thumbnail()): ?>

                    <div class="bordered">
                        <figure class="add-border">
                            <?php
                            $img_width = ($_REQUEST['sidebar_position'] == 'no_sidebar' ? 950 : 570);
                            ?>
                            <a class="single-image" href="<?php the_permalink(); ?>"><img src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, $img_width, true, 380); ?>" alt="<?php the_title(); ?>" /></a>
                        </figure>
                    </div><!--/ .bordered-->

                <?php endif; ?>
                    <?php
                    break;
            }
            ?>

            <div class="clear"></div>

            <div class="entry-meta">
                <span class="date"><?php echo get_the_date('d') ?></span>
                <span class="month"><?php echo get_the_date('M Y') ?></span>
            </div><!--/ .entry-meta-->

            <div class="entry-body">

                <div class="entry-title">

                    <?php $post_pod_type ?>

                    <?php if ($post_pod_type == 'link'): ?>
                        <h2 class="title"><a href="<?php echo $post_type_values[$post_pod_type] ?>" target="_blank"><?php the_title(); ?></a></h2>
                    <?php else: ?>
                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php endif; ?>

                    <?php if (!$_REQUEST['disable_author']) : ?>
                        <span class="author"><?php _e('Posted by', TMM_THEME_FOLDER_NAME); ?> <?php the_author() ?></span>,
                    <?php endif; ?>

                    <?php if (!$_REQUEST['disable_blog_comments']) : ?>
                        <span class="comments"><?php _e('With', TMM_THEME_FOLDER_NAME); ?> <a href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%'); ?> <?php _e('Comments', TMM_THEME_FOLDER_NAME); ?></a></span>,
                    <?php endif; ?>

                    <?php if (!$_REQUEST['disable_categories']) : ?>
                        <span class="category">
								<?php _e('Category:', TMM_THEME_FOLDER_NAME) ?>
                            <?php foreach ((get_the_category()) as $category) : ?>
                                <a href="<?php echo get_category_link($category->term_id); ?>" title="<?php echo $category->name ?>"><?php echo $category->name . ', ' ?></a>
                            <?php endforeach; ?>
							</span>
                    <?php endif; ?>

                    <?php if (!$_REQUEST['disable_tags']) : ?>
                        <span class="tags">
								<?php the_tags() ?>
							</span>
                    <?php endif; ?>

                </div><!--/ .entry-title-->

                <?php if ($show_full_content) : ?>
                    <?php the_content(); ?>
                <?php else: ?>

                    <?php
                    if ($_REQUEST['excerpt_symbols_count']) {
                        if (empty($post->post_excerpt)) {
                            echo do_shortcode(substr($post->post_content, 0, $_REQUEST['excerpt_symbols_count']) . " ...");
                        } else {
                            echo do_shortcode(substr($post->post_excerpt, 0, $_REQUEST['excerpt_symbols_count']) . " ...");
                        }
                    } else {
                        echo do_shortcode($post->post_excerpt);
                    }
                    ?>


                <?php endif; ?>

                <div class="clearfix"></div>
                <br />
                <a href="<?php the_permalink(); ?>" class="button default small"><?php _e('Read more', TMM_THEME_FOLDER_NAME); ?></a>
            </div><!--/ .entry-body -->

            </div><!--/ .entry-body -->

        </article><!--/ .entry-->
        <?php
    endwhile;
    else:
        get_template_part('content', 'nothingfound');
    endif;
    ?>



<?php else: ?>

    <div class="alternate">

    <ul>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <li id="post-<?php the_ID(); ?>">

            <h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

            <?php if ($show_image): ?>
                <?php if (has_post_thumbnail()): ?>

                    <div class="bordered alignleft">
                        <figure class="add-border">
                            <a class="single-image" href="<?php the_permalink(); ?>">
                                <img src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, 74, true, 64); ?>" alt="<?php the_title(); ?>" />
                            </a>
                        </figure>
                    </div><!--/ .bordered-->

                <?php endif; ?>
            <?php endif; ?>

            <?php
            if (!isset($show_full_content)) {
                $show_full_content = 0;
            }
            ?>
            <?php if ($show_full_content) : ?>
                <?php the_content(); ?>
            <?php else: ?>

                <?php
                if ($_REQUEST['excerpt_symbols_count']) {
                    if (empty($post->post_excerpt)) {
                        echo do_shortcode(substr(strip_tags($post->post_content), 0, $_REQUEST['excerpt_symbols_count'])) . " ...";
                    } else {
                        echo do_shortcode(substr($post->post_excerpt, 0, $_REQUEST['excerpt_symbols_count'])) . " ...";
                    }
                } else {
                    echo do_shortcode($post->post_excerpt);
                }
                ?>

            <?php endif; ?>

        </li>

        <?php
    endwhile;

    else:
        get_template_part('content', 'nothingfound');
    endif;
    ?>

<?php endif; ?>

    </ul>

    </div><!--/ .alternate-->

<?php
if ($show_pagination) {
    get_template_part('content', 'pagenavi');
}
//*****
$wp_query = null;
$wp_query = $original_query;
wp_reset_postdata();
