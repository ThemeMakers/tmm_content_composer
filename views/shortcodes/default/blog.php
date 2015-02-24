<?php
if (!defined('ABSPATH')) exit;

wp_reset_query();

$count_column = '';
$post_class = (isset($post_appearing_effect) && !empty($post_appearing_effect)) ? 'post-item '.$post_appearing_effect : 'post-item';
$post_area = 'post-area';

$path = 'content/' . $blog_type . '/content';

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

if (!empty($posts_per_page)&&($blog_type!='blog-masonry')) {
	$args['posts_per_page'] = $posts_per_page;
}

if ((int) $category > 0 &&($blog_type!='blog-masonry')) {
	$args['cat'] = (int) $category;
}

if (!empty($posts)&&($blog_type!='blog-masonry')) {
	$posts = explode(',', $posts);
	$args['post__in'] = $posts;
}

if ($show_review){
    $args['meta_key'] = 'tmm_review_total';
    $args['meta_query'] = array(
        array(
            'key' => 'tmm_review_total',
            'value' => array( 0.1, 100000),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ));
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args['paged'] = $paged;

global $wp_query;
$original_query = $wp_query;
$wp_query = new WP_Query($args);
$posts_array = $wp_query->posts;

$data_columns = '';

switch($blog_type) {
	case 'blog-classic':
		$count_column = 'post-col-1';
	break;
	case 'blog-medium':
		$post_area = 'post-list';
		$post_class = 'post-entry';
	break;		
	case 'blog-masonry':
        $blog_type = 'masonry';
        $data_columns = 'data-columns="' . $columns . '"';
        break;	
	case 'blog-grid':
	case 'blog-grid-overlay':
	case 'blog-grid-layout':
		$count_column = 'post-col-' .$columns;
	break;
}

if (isset($post_carousel) && $post_carousel){
    $blog_type = 'post-carousel';
    $count_column = '';
    $data_columns = 'data-columns="' . $columns . '"';
    tmm_enqueue_script('owlcarousel');
    tmm_enqueue_style('owlcarousel');
    tmm_enqueue_style('owltheme');
    tmm_enqueue_style('owltransitions');
}

 ?>

	<div id="post-area" class="<?php echo $post_area ?> <?php echo $count_column ?> <?php echo $blog_type ?>" <?php if (!empty($data_columns)) echo $data_columns; ?>>
        
        <?php 
        if ($blog_type!='masonry'){           

            if ( have_posts() ){

                $_REQUEST['shortcode_show_metadata'] = $show_metadata;

                while ( have_posts() ) { 

                the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
                    <?php get_template_part( $path, 'content' ); ?>
                </article>
                    
            <?php }
            }
        
        } else{
            if (!empty($posts_array)){

                wp_enqueue_style('tmm_mediaelement');
                wp_enqueue_script('mediaelement');

                for ($i = 0; $i < $posts_per_load; $i++) { 
                    $post = $posts_array[$i];
                    $data = array();			
                    $data['post_key'] = $i;
                    $data['columns'] = $columns;
                    echo TMM::draw_html('post/masonry_piece', $data);
                }
            } 
        } ?>       
            
	</div><!--/ .post-area-->

	<?php if ($blog_type == 'masonry'){

    tmm_enqueue_script('owlcarousel');
    tmm_enqueue_style('owlcarousel');
    tmm_enqueue_style('owltheme');
    tmm_enqueue_style('owltransitions');

        $next_posts = "";

        for ($i = $posts_per_load; $i < ($posts_per_load * 2); $i++) {
            if (isset($posts_array[$i])) {
                $str = (string) $i;
                $next_posts = $next_posts . $str . ",";
            }
        }
        ?>

        <div class="masonry-loader spinner">
            <div id="fadingBarsG_1" class="fadingBarsG">
            </div>
            <div id="fadingBarsG_2" class="fadingBarsG">
            </div>
            <div id="fadingBarsG_3" class="fadingBarsG">
            </div>
            <div id="fadingBarsG_4" class="fadingBarsG">
            </div>
            <div id="fadingBarsG_5" class="fadingBarsG">
            </div>
            <div id="fadingBarsG_6" class="fadingBarsG">
            </div>
            <div id="fadingBarsG_7" class="fadingBarsG">
            </div>
            <div id="fadingBarsG_8" class="fadingBarsG">
            </div>
        </div>
        
		<div class='post-load-more'>
			<a class='load-more button secondary middle' data-loadbyscroll="<?php echo $load_by_scrolling ?>" data-page-load="2" data-posts-per-load="<?php echo $posts_per_load ?>" data-posts="<?php echo $next_posts ?>" href='#load-more'><?php _e('Load More', TMM_CC_TEXTDOMAIN) ?></a>
		</div><!--/ .post-load-more-->

    <?php
}

if ($show_pagination && class_exists('TMM') && $blog_type != 'masonry') {
	get_template_part('content', 'pagenavi');
}

$wp_query = $original_query;
wp_reset_postdata();

 if (!empty($posts_array) && ($blog_type == 'masonry')){     
     $load_with_animation = 1;
     wp_enqueue_script('tmm_masonry', TMM_CC_URL . 'js/shortcodes/jquery.masonry.min.js');
    ?>
	<script type="text/javascript">
		jQuery(function() {

				jQuery(".masonry").init_masonry(<?php echo $columns ?>, <?php echo $load_with_animation ?>);

		});
	</script>

<?php } 
