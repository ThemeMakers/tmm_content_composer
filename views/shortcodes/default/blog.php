<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
//blog layout
wp_reset_query();

$args = array(
    'orderby' => $orderby,
    'order' => $order,
    'post_status' => array('publish')
);

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
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args['paged'] = $paged;


global $wp_query;
$original_query = $wp_query;

$wp_query = new WP_Query($args);
global $post;
?>

<div class="row">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="col-sm-6 col-lg-4">

            <article class="entry">

                <div class="entry-image">
                    <div class="work-item">
                        <img src="<?php echo TMM_Helper::get_post_featured_image($post->ID, '560*390'); ?>" alt="<?php echo $post->post_title ?>" />
                        <div class="image-extra">
                            <div class="extra-content">
                                <div class="inner-extra">
                                    <a class="single-image link-icon" href="<?php the_permalink() ?>"></a>
                                    <a class="single-image plus-icon" data-fancybox-group="posts" href="<?php echo TMM_Helper::get_post_featured_image($post->ID, ''); ?>"></a>
                                </div><!--/ .inner-extra-->
                            </div><!--/ .extra-content-->
                        </div><!--/ .image-extra-->
                    </div><!--/ .work-item-->
                </div><!--/ .entry-image-->

                <?php if ($show_metadata): ?>
                    <div class="entry-meta">
                        <span class="date"><a href="<?php echo home_url() ?>/<?php echo get_the_date('Y/m') ?>"><?php echo get_the_date() ?></a></span>
                        <span class="comments"><a href="<?php the_permalink() ?>#comments"><?php echo get_comments_number(); ?></a>&nbsp;<?php _e('Comments', 'accio') ?></span>
                    </div><!--/ .entry-meta-->
                <?php endif; ?>

                <h2 class="entry-title">
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </h2><!--/ .entry-title-->

                <div class="entry-body">
                    <p><?php
                        if (TMM::get_option("excerpt_symbols_count")) {
                            if (empty($post->post_excerpt)) {
                                $txt = do_shortcode($post->post_content);
                                $txt = strip_tags($txt);
                                if (function_exists('mb_substr')) {
                                    echo do_shortcode(mb_substr($txt, 0, TMM::get_option("excerpt_symbols_count")) . " ...");
                                } else {
                                    echo do_shortcode(substr($txt, 0, TMM::get_option("excerpt_symbols_count")) . " ...");
                                }
                            } else {
                                if (function_exists('mb_substr')) {
                                    echo do_shortcode(mb_substr($post->post_excerpt, 0, TMM::get_option("excerpt_symbols_count")) . " ...");
                                } else {
                                    echo do_shortcode(substr($post->post_excerpt, 0, TMM::get_option("excerpt_symbols_count")) . " ...");
                                }
                            }
                        } else {
                            echo do_shortcode($post->post_excerpt);
                        }
                        ?></p>
                </div><!--/ .entry-body-->

            </article><!--/ .entry-->

        </div>

        <?php
    endwhile;
    endif;

    $wp_query = $original_query;
    wp_reset_postdata();

    ?>

</div><!--/ .row-->

