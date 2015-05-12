<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
wp_enqueue_script('tmm_masonry', TMM_CC_URL . 'js/shortcodes/jquery.masonry.min.js');


$query = new WP_Query(array(
    'post_type' => 'post',
    'showposts' => '-1',
    'cat' => $category
        ));
$posts_array = $query->posts;

$type = $content;

//***
if ($columns == 3) {
    $col_algorithms = array(
        'random' => 'random',
        1 => 'col2,col3,col2,col1,col2,col2,col2,col3,col2,col2,col1,col2,col2,col3,col2,col3,col2,col1,col2',
        2 => 'col3,col1,col2,col1,col3,col2,col2,col3,col2',
    );
}

if ($columns == 4) {
    $col_algorithms = array(
        'random' => 'random',
        1 => 'col1,col2,col3,col2,col2,col2,col2,col2,col2,col3,col2,col1,col2,col1,col2,col3,col2,col2,col1',
        2 => 'col3,col1,col2,col1,col3,col2,col2,col1,col2',
    );
}
//***
$current_col_algoritm = $col_algorithms[$col_alg];
$current_col_algoritm_arr = array();
if ($current_col_algoritm == 'random') {
    unset($col_algorithms['random']);
    shuffle($col_algorithms);
    reset($col_algorithms);
    $first_key = key($col_algorithms);
    $current_col_algoritm_arr = explode(',', $col_algorithms[$first_key]);
} else {
    $current_col_algoritm_arr = explode(',', $current_col_algoritm);
}

$sidebar_exists = $_REQUEST['sidebar_position'] == 'no_sidebar' ? 0 : 1;

if ($columns == 3) {
	$col_width = $sidebar_exists ? 190 : 296;
    $columns_img_sizes = array('col1' => $col_width.'*190', 'col2' => $col_width.'*250', 'col3' => $col_width.'*310');
}

if ($columns == 4) {
	$col_width = $sidebar_exists ? 137 : 217;
    $columns_img_sizes = array('col1' => $col_width.'*170', 'col2' => $col_width.'*250', 'col3' => $col_width.'*340');
}
//***
$counter = 0;
?>
<?php if (!empty($posts_array)): ?>

    <script type="text/javascript">	var IE8 = false;</script>
    <!--[if IE 8]><script type="text/javascript">IE8 = true;</script><![endif]-->

    <script type="text/javascript">
        jQuery(function() {
            jQuery("#masonry").imagesLoaded(function() {
                init_masonry(<?php echo $col_width; ?>);
            });
        });
    </script>

<?php endif; ?>

<?php
if ($columns == 3) {
    $massonry_width = 'masonry_three';
} else if ($columns == 4) {
    $massonry_width = 'masonry_four';
}
?>

<div class="masonry_wrap">

<div id="masonry" class="masonry" style="opacity: 0;">
    <?php if (!empty($posts_array)) { ?>
        <?php
		$posts_count = count($posts_array) > $posts_per_load ? $posts_per_load : count($posts_array);
        for ($i = 0; $i < $posts_per_load; $i++) {

            $col = $current_col_algoritm_arr[$counter];
            $counter++;

            if ($counter >= count($current_col_algoritm_arr))
                $counter = 0;

            if (isset($posts_array[$i])){
	            $post = $posts_array[$i];

	            $post_pod_type = get_post_meta($post->ID, 'post_pod_type', true);
	            $post_type_values = get_post_meta($post->ID, 'post_type_values', true);

	            if($post_pod_type == 'video'){

		            $video_size = explode('*', $columns_img_sizes[$col]);
		            $video_width = $video_size[0] + 10;
		            $video_height = $video_width;

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

			            if($video_type_name && $video_width && $video_height && $source_url){
			                $video_shortcode = '[tmm_video type="'.$video_type_name.'" full_width="0" width="' . $video_width . '" height="' . $video_height . '"]' . $source_url . '[/tmm_video]';
			            }

	                }

	            } else if($post_pod_type == 'gallery'){
		            TMM_Functions::enqueue_script('cycle');
		            $gall = $post_type_values[$post_pod_type];
	            } else {
		            $cur_img = TMM_Helper::get_post_featured_image($post->ID, '');
	            }
            ?>

            <article class="box <?php echo $col ?>">

                <div class="work-item">

	                <?php
	                if ($post_pod_type == 'video') {
		                ?>

		                <div style="max-width: <?php echo $video_width ?>px">

		                <?php
		                echo do_shortcode($video_shortcode);
		                ?>

		                </div>

		                <?php
	                } else if ($post_pod_type == 'gallery') {
	                ?>

		                <div class="image-post-slider">
			                <ul>
				                <?php foreach ($gall as $key => $source_url): ?>
					                <li>

						                <div class="work-item">
							                <a class="single-image" href="<?php echo $source_url; ?>">
								                <figure>
									                <img src="<?php echo TMM_Helper::resize_image($source_url, $columns_img_sizes[$col]); ?>" />
								                </figure>
							                </a>

						                </div><!--/ .work-item-->

					                </li>
				                <?php endforeach; ?>
			                </ul>
		                </div><!--/ .image-post-slider-->

                    <?php
	                } else if ($cur_img) {
		                ?>

		                <a class="single-image plus-icon" data-fancybox-group="masonry" href="<?php echo $cur_img ?>">
			                <figure>
				                <img src="<?php echo TMM_Helper::resize_image($cur_img, $columns_img_sizes[$col]) ?>" alt="" />
			                </figure>
		                </a>

	                <?php
	                }
	                ?>

                    <div class="entry-meta <?php echo $massonry_width; ?>">
                        <?php //if ($type == 2){  ?>
                        <h6 class="extra-title"><a href="<?php echo $post->guid ?>"><?php echo $post->post_title ?></a></h6>

                        <span class="post-date"><?php _e('On', 'tmm_shortcodes'); ?> <?php echo get_the_time('d M Y', $post->ID) ?>,</span>

                        <span class="author">
                            <?php _e('Posted by', 'tmm_shortcodes'); ?>&nbsp;<?php $user_info = get_userdata($post->post_author);
                    echo $user_info->user_login;
                            ?>,
                        </span>

                        <?php
                        $terms = wp_get_post_terms($post->ID, 'category');
                        if (!empty($terms)) {
                            ?>
                            <span class="extra-category categories">
                                <?php _e('In', 'tmm_shortcodes'); ?>
                                <?php
                                foreach ($terms as $kk => $value) {
                                    if ($kk > 0) {
                                        echo ' / ';
                                    }
                                     $term_link = get_term_link( $value->slug, 'category' );
                                     ?>
                                <a href="<?php echo $term_link; ?>"><?php echo $value->name; ?></a>
                                <?php } ?>
                            </span><!--/ .extra-category-->
                            <?php
                        }
                        ?>
                        <?php
                        $tags = wp_get_post_tags($post->ID);
                        if (!empty($tags)) {
                            ?>
                            <span class="extra-category tag-links">
                                <?php _e('By', 'tmm_shortcodes'); ?>
                                <?php
                                foreach ($tags as $kk => $value) {
                                    if ($kk > 0) {
                                        echo ' / ';
                                    }
                                    ?>
                                <a href="<?php echo get_tag_link($value->term_id) ?>"><?php echo $value->name; ?></a>
                                <?php
                                }
                                ?>
                            </span><!--/ .extra-category-->
                            <?php
                        }
                        ?>
                        <span class="comments">
                            <?php _e('With', 'tmm_shortcodes'); ?>
                            <a href="<?php echo $post->guid ?>#comments"><?php echo $post->comment_count; ?></a>
                        <?php _e('Comments', 'tmm_shortcodes'); ?>
                        </span>
        <?php //};   ?>
                    </div>

                </div><!--/ .work-item-->

            </article><!--/ .box-->

        <?php
            }
          }; ?>

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
            <div id="masonryjaxloader" data-sidebar="<?php echo $sidebar_exists; ?>" data-page-load="2" data-posts-per-load="<?php echo $posts_per_load ?>" data-posts="<?php echo $next_posts ?>" data-col-algoritm="<?php echo $current_col_algoritm ?>"></div>
        <?php }; ?>

<?php } ?>

</div><!--/ #masonry-->

<div class="infscr-loading_wrap">
	<div id="infscr-loading">
		<div id="facebookG">
			<div id="blockG_1" class="facebook_blockG">
			</div>
			<div id="blockG_2" class="facebook_blockG">
			</div>
			<div id="blockG_3" class="facebook_blockG">
			</div>
		</div>
	</div>
</div>

</div><!--/ .masonry_wrap-->

<?php
if(count($posts_array) > $posts_per_load){
	?>
	<a href="javascript:masonry_reload(<?php echo $columns ?>, <?php echo $category ?>);void(0);" class="masonry_view_more_button"><?php _e('More', 'tmm_shortcodes'); ?></a>
	<?php
}
?>

<div class="clear"></div>
