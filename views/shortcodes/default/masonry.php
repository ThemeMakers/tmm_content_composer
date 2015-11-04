<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
wp_enqueue_script('tmm_masonry');
wp_enqueue_script('mediaelement');

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (class_exists('TMM_Grid_Slider')){
    wp_enqueue_script('tmm_grid_slider_easing_js', TMM_Grid_Slider::get_application_uri() . 'js/jquery.animation.easing.js', array('jquery'));
    wp_enqueue_script('tmm_grid_slider_front_js', TMM_Grid_Slider::get_application_uri() . 'js/jquery.accordion.js', array('jquery'));
}

if ($category==0){
    $query = new WP_Query(array(
    'post_type' => 'post',
    'showposts' => '-1',
    'suppress_filters' => false
        ));
}else{
    $query = new WP_Query(array(
    'post_type' => 'post',
    'showposts' => '-1',
    'cat' => $category,
    'suppress_filters' => false
        ));
}

$posts_array = $query->posts;

$columns_img_sizes = array('col1' => '228*170', 'col2' => '228*250', 'col3' => '228*340');

$buttons = array();

if ($show_twitter){
    $buttons[] = 'twitter';
}
if ($show_facebook){
    $buttons[] = 'facebook';
}
if ($show_google){
    $buttons[] = 'google+';
}
if ($show_pinterest){
    $buttons[] = 'pinterest';
}
?>
      
<div class="">

    <div id="post-area" class="masonry <?php echo esc_attr($columns) ?>" style="opacity: 0;">
	<?php if (!empty($posts_array)){ ?>
        <?php
        for ($i = 0; $i < $posts_per_load; $i++) {

            if (isset($posts_array[$i])){

                $post = $posts_array[$i];
                $post_link = post_permalink($post->ID);

                $post_pod_type = get_post_format($post->ID);

                switch($post_pod_type){
                    case 'audio':
                    case 'video':
                    case 'quote':
                    case 'gallery':
                        $icon_class = $post_pod_type . '-icon';
                         break;
                    default:
                        $icon_class = 'picture-icon';
                        $thumb = get_the_post_thumbnail($post->ID);
                        if (empty($thumb)){
                            $icon_class = 'noimage-icon';
                        }
                        break;
                }

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

                <article class="post-item">

                    <div class="entry-body">

                        <div class="entry-media">

                            <?php include(locate_template('article-'.$post_pod_type.'.php')); ?>

                        </div><!--/ .entry-media-->

                        <?php if ($post_pod_type!='quote'){ ?>

                            <h4 class="entry-title">
                                    <a href="<?php echo esc_url($post_link) ?>"><?php echo esc_html($post->post_title) ?></a>
                            </h4><!--/ .entry-title-->

                            <div class="post-meta clearfix">
                                <a class="post-format-type" href="<?php echo esc_url($post_link); ?>"><span class="post-format <?php echo esc_attr($icon_class) ?>"></span></a>
                                <span class="entry-date"><a href="<?php echo esc_attr(home_url()) ?>/<?php echo get_the_date('Y/m') ?>"><?php echo get_the_date('M d, Y', $post->ID) ?></a></span>
                                <span><a href="<?php echo esc_attr($post_link) ?>#comments"><?php echo get_comments_number(); _e(' Comments', TMM_CC_TEXTDOMAIN); ?></a></span>
                            </div><!--/ .entry-meta-->

                            <p>
                                <?php
                                if (class_exists('TMM') && TMM::get_option("excerpt_symbols_count")) {
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
                                ?>
                            </p>
                        <?php } ?>

                        <footer class="post-footer clearfix">

                            <a href="<?php echo esc_url($post_link) ?>" class="button"><?php esc_html_e('Read More', TMM_CC_TEXTDOMAIN) ?></a>

                            <div class="share-entry">

                                <?php
                                $vote_count = get_post_meta($post->ID, "votes_count", true);
                                $meta_IP = get_post_meta($post->ID, "voted_IP");
                                $vote_class = 'no_vote';
                                if (!empty($meta_IP[0])) {
                                    $voted_IP = $meta_IP[0];
                                    if (!is_array($voted_IP))
                                        $voted_IP = array();
                                    $ip = $_SERVER['REMOTE_ADDR'];
                                    if (in_array($ip, array_keys($voted_IP))) {
                                        $vote_class = 'voted';
                                    }
                                }
                                ?>
                                <a data-post_id="<?php echo esc_attr($post->ID) ?>" class="social-like <?php echo esc_attr($vote_class) ?>" href="#"><span class="count"><?php echo esc_html($vote_count); ?></span></a>

                                <div class="side-share">
                                    <?php TMM_Content_Composer::display_share_buttons('square', $post->ID, $buttons); ?>
                                </div><!--/ .side-share-->

                            </div><!--/ .share-entry-->

                        </footer><!--/ .post-footer-->

                    </div><!--/ .work-item-->

                </article><!--/ .box-->

            <?php }
            }

        if (count($posts_array) > $posts_per_load) {
            $next_posts = "";
            for ($i = $posts_per_load; $i < ($posts_per_load * 2); $i++) {
                if (isset($posts_array[$i])) {
                    $str = (string) $i;
                    $next_posts = $next_posts . $str . ",";
                }
            }
            ?>
            <div id="masonryjaxloader" data-buttons="<?php echo esc_attr(implode(",", $buttons)) ?>" data-category="<?php echo esc_attr($category) ?>" data-page-load="2" data-posts-per-load="<?php echo esc_attr($posts_per_load) ?>" data-posts="<?php echo esc_attr($next_posts) ?>"></div>
        <?php }

         } ?>

    </div><!--/ #masonry-->

</div><!--/ .col-xs-12-->

<div class="infscr-loading">
    <div class="tmm_loading">
        <div class="circleG circleG_1"></div>
        <div class="circleG circleG_2"></div>
        <div class="circleG circleG_3"></div>
    </div>
</div>

<div class="clear"></div>

<?php  if (count($posts_array) > $posts_per_load) { ?>
    <div class="masonry-paging">
        <a href="#" data-loadbyscroll="<?php echo esc_attr($load_by_scrolling); ?>" class="masonry_view_more_button"><?php esc_html_e('More', TMM_CC_TEXTDOMAIN); ?></a>
    </div>
<?php } ?>

<?php wp_reset_query(); ?>

<?php if (!empty($posts_array)){ 
    $columns = explode('-', $columns);
    $columns = $columns['1'];
    ?>

	<script type="text/javascript">	var IE8 = false;</script>
	<!--[if IE 8]><script type="text/javascript">IE8 = true;</script><![endif]-->

	<script type="text/javascript">
		jQuery(function() {
			jQuery("#post-area").imagesLoaded(function() {				
				jQuery("#post-area").init_masonry(<?php echo esc_js($columns) ?>, <?php echo esc_js($load_with_animation) ?>);
			});
		});
	</script>

<?php } ?>