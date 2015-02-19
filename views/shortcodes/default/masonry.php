<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
wp_enqueue_script('tmm_masonry', TMM_CC_URL . 'js/shortcodes/jquery.masonry.min.js');
wp_enqueue_style('tmm_mediaelement');
wp_enqueue_script('mediaelement');

tmm_enqueue_script('owlcarousel');
tmm_enqueue_style('owlcarousel');
tmm_enqueue_style('owltheme');                                                            
tmm_enqueue_style('owltransitions'); 

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (is_plugin_active('tmm_grid_slider/index.php')){
    wp_enqueue_style('tmm_grid_accordion_css', TMM_Grid_Slider::get_application_uri() . 'css/accordion.css');
    wp_enqueue_style('tmm_grid_slider_custom_css', TMM_Grid_Slider::get_application_uri() . 'css/slider_custom.css');
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
};
if ($show_facebook){
    $buttons[] = 'facebook';
};
if ($show_google){
    $buttons[] = 'google+';
};
if ($show_pinterest){
    $buttons[] = 'pinterest';
}; 

?>
      
<div class="">

    <div id="post-area" class="masonry <?php echo $columns ?>" style="opacity: 0;">
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
                    ?> 	

			<article class="post-item">

				<div class="entry-body">
                                    
                    <div class="entry-media">
                        <?php

                        $post_type_values = get_post_meta($post->ID, 'post_type_values', true);

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
                                ?>
                                <?php
                                break;

                            case 'quote':
                                    ?>
                                <div class="quote-inner">
                                    <a class="whole-link" href="<?php echo $post_link ?>"></a>
                                    <?php
                                    echo do_shortcode('[blockquote]' . $post_type_values[$post_pod_type] . '[/blockquote]');
                                    ?>
                                    <div class="quote-meta">
                                        <div class="quote-author"><?php the_author_link() ?></div>
                                    </div>
                                </div>
                                <?php
                                break;

                            case 'gallery':

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
                                            <li class="<?php echo $item['image_type'] ?>">
                                                    <a href="<?php echo $post_link ?>" class="slide-image link-icon">
                                                            <img src="<?php echo TMM_Content_Composer::resize_image($item['url'], '520*310'); ?>" alt="" />
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
                                                                    <a class="slide-image link-icon" href="<?php echo $post_link ?>">
                                                                        <?php if (isset($_REQUEST['sidebar_position']) && $_REQUEST['sidebar_position'] != 'no_sidebar'): ?>
                                                                                <img src="<?php echo TMM_Content_Composer::resize_image($source_url, '1035*550'); ?>" alt="<?php echo $post->post_title; ?>" />
                                                                        <?php else: ?>
                                                                                <img src="<?php echo TMM_Content_Composer::resize_image($source_url, '1035*550'); ?>" alt="<?php echo $post->post_title; ?>" />
                                                                        <?php endif; ?>
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
                                <?php if (has_post_thumbnail($post->ID)){ ?>

                                    <a href="<?php echo $post_link ?>" class="slide-image link-icon">
                                        <?php if ($_REQUEST['sidebar_position'] != 'no_sidebar'): ?>
                                                <img src="<?php echo TMM_Content_Composer::get_post_featured_image($post->ID, '1035*550'); ?>" alt="<?php echo $post->post_title; ?>" />
                                        <?php else: ?>
                                                <img src="<?php echo TMM_Content_Composer::get_post_featured_image($post->ID, '1035*550'); ?>" alt="<?php echo $post->post_title; ?>" />
                                        <?php endif; ?>
                                    </a>

                                <?php } ?>
                                <?php
                                break;
                        }
                        ?>                                                

                    </div><!--/ .entry-media-->

                    <?php if ($post_pod_type!='quote'){ ?>

                    <h4 class="entry-title">                                            
                            <a href="<?php echo $post_link ?>"><?php echo $post->post_title ?></a>
                    </h4><!--/ .entry-title-->

                    <div class="post-meta clearfix">
                            <a class="post-format-type" href="<?php echo $post_link ?>"><span class="post-format <?php echo $icon_class ?>"></span></a>                                               
                            <span class="entry-date"><a href="<?php echo home_url() ?>/<?php echo get_the_date('Y/m') ?>"><?php echo get_the_date('M d, Y') ?></a></span>                                                                                             
                            <span><a href="<?php echo $post_link ?>#comments"><?php echo get_comments_number(); _e(' Comments', TMM_CC_TEXTDOMAIN); ?></a></span>
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

                        <a href="<?php echo $post_link ?>" class="button">Read More</a>

                        <div class="share-entry">

                            <?php $vote_count = get_post_meta($post->ID, "votes_count", true); ?>
                            <?php
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

                            <a data-post_id="<?php echo $post->ID ?>" class="social-like <?php echo $vote_class ?>" href="#"><span class="count"><?php echo $vote_count; ?></span></a>

                            <div class="side-share">

                                    <?php TMM_Content_Composer::display_share_buttons('square', $post->ID, $buttons); ?>

                            </div><!--/ .side-share-->
                        </div><!--/ .share-entry-->

                    </footer><!--/ .post-footer-->

                </div><!--/ .work-item-->

			</article><!--/ .box-->

                    <?php }
                }
                ?>		
                        
                <?php                
                    if (count($posts_array) > $posts_per_load) {
                        $next_posts = "";
                        for ($i = $posts_per_load; $i < ($posts_per_load * 2); $i++) {
                            if (isset($posts_array[$i])) {
                                $str = (string) $i;
                                $next_posts = $next_posts . $str . ",";
                            }
                        }
                        ?>                        
            <div id="masonryjaxloader" data-buttons="<?php echo implode(",", $buttons) ?>" data-category="<?php echo $category ?>" data-page-load="2" data-posts-per-load="<?php echo $posts_per_load ?>" data-posts="<?php echo $next_posts ?>"></div>
                    <?php }; ?>

        <?php } ?>

    </div><!--/ #masonry-->		
</div><!--/ .col-xs-12-->

<div id="infscr-loading">
    <div id="circleG">
        <div id="circleG_1" class="circleG">
        </div>
        <div id="circleG_2" class="circleG">
        </div>
        <div id="circleG_3" class="circleG">
        </div>
    </div> 
    
</div>

<div class="clear"></div>
<?php  if (count($posts_array) > $posts_per_load) { ?>
<div class="masonry-paging">
    <a href="#" data-loadbyscroll="<?php echo $load_by_scrolling; ?>" class="masonry_view_more_button"><?php _e('More', TMM_CC_TEXTDOMAIN); ?></a>
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
			jQuery("#post-area.masonry").imagesLoaded(function() {
				jQuery("#post-area.masonry").init_masonry(<?php echo $columns ?>, <?php echo $load_with_animation ?>);
			});
		});
	</script>

<?php } ?>