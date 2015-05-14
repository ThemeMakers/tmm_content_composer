<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$post_id = (int) $content;
$post = get_post($post_id);
$post_link = post_permalink($post_id);
$image_size = '1035*580';
$post_pod_type = get_post_format($post_id);
$post_type_values = get_post_meta($post_id, 'post_type_values', true);

$post_types = array(
    'audio',
    'video',
    'quote',
    'gallery',
);

if (!in_array($post_pod_type, $post_types)) {
    $post_pod_type = 'default';
}
?>

<article class="entry-item">        

    <?php if ($show_post_type_media == 1){ ?>

        <div class="entry-media">

            <?php include(locate_template('article-'.$post_pod_type.'.php')); ?>

        </div><!--/ .entry-media-->

    <?php } ?>

    <h4 class="entry-title">
        <a href="<?php echo esc_url($post_link) ?>"><?php echo esc_html($post->post_title); ?></a>
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
                <span class="date"><a href="<?php echo esc_url(home_url()) ?>/<?php echo mysql2date('Y/m', $post->post_date, false) ?>"><?php echo mysql2date(get_option('date_format'), $post->post_date, false) ?></a></span>
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