<?php
if (!defined('ABSPATH')) exit;

wp_reset_query();

$count_column = '';
$post_class = (isset($post_appearing_effect) && !empty($post_appearing_effect)) ? 'post '.$post_appearing_effect : 'post';
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

if (!empty($category) && ($category!='null') && ($blog_type!='blog-masonry')) {
        $args['category__in'] = $category;
}

if (!empty($tag) && ($tag!='null') &&($blog_type!='blog-masonry')) {
	$args['tag__in'] = explode(',', $tag) ;
}

if (!empty($posts)&&($blog_type!='blog-masonry')) {
	$posts = explode(',', $posts);
	$args['post__in'] = $posts;
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args['paged'] = $paged;

global $wp_query;
$original_query = $wp_query;
$wp_query = new WP_Query($args);
$posts_array = $wp_query->posts;

$posts_list = 'post-list';
$data_columns = '';

switch($blog_type){
    case 'blog-classic':
        $post_class .= ($show_border_bottom) ? ' border-solid  post-classic' : ' post-classic';
        break;
    case 'blog-first':
        $post_class .= ($show_border_bottom) ? ' post-news border-solid' :' post-news';
        break;
    case 'blog-second':
        $post_class .= ($show_border_bottom) ? ' post-extra border-dashed' : ' post-extra';
        break;
    case 'blog-third':
        $post_class .= ' post-image';
        break;
    case 'blog-fourth':
        $post_class .= ($show_border_bottom) ? ' small border-dashed' : ' small';
        break;
    case 'blog-masonry':
        $blog_type = 'masonry';
        $posts_list .= ' masonry';
        $columns = ($columns!='fullwidth') ? $columns : 2;
        $data_columns = "data-columns='".$columns."'";
        break;
}

$columns_class = '';
switch ($columns){
    case 'fullwidth':
        $columns_class .= 'medium-12 large-12 columns';
        break;
    case '2':
        $columns_class .= 'medium-6 large-6 columns';
        $posts_list .= ' post-list-extra';
        break;
    case '3':
        $columns_class .= 'medium-4 large-4 columns';
        break;
    case '4':
        $columns_class .= 'medium-3 large-3 columns';
        break;
}

 ?>

	<div class="row <?php echo (!empty($posts_list)) ? $posts_list : ''; ?>" <?php echo (!empty($data_columns)) ? $data_columns : ''; ?>>
        
        <?php 
        if ($blog_type!='masonry'){

            if ( have_posts() ){

                while ( have_posts() ) { 

                the_post(); ?>

                    <article class="<?php echo $columns_class ?>">

                        <div id="post-<?php the_ID(); ?>" <?php post_class($post_class);?>>

                            <?php get_template_part( $path, 'content' ); ?>

                        </div><!--/ .post-extra-->

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
            <div id="spinningSquaresG">
                <div id="spinningSquaresG_1" class="spinningSquaresG">
                </div>
                <div id="spinningSquaresG_2" class="spinningSquaresG">
                </div>
                <div id="spinningSquaresG_3" class="spinningSquaresG">
                </div>
                <div id="spinningSquaresG_4" class="spinningSquaresG">
                </div>
                <div id="spinningSquaresG_5" class="spinningSquaresG">
                </div>
                <div id="spinningSquaresG_6" class="spinningSquaresG">
                </div>
                <div id="spinningSquaresG_7" class="spinningSquaresG">
                </div>
                <div id="spinningSquaresG_8" class="spinningSquaresG">
                </div>
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

				jQuery(".masonry").init_masonry(<?php echo ($columns!='fullwidth') ? $columns : '2' ?>, <?php echo $load_with_animation ?>);

		});
	</script>

<?php } 
