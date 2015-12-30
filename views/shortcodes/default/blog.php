<?php
if (!defined('ABSPATH')) exit;

wp_reset_query();
$count_column = '';
$post_class = (isset($post_appearing_effect) && !empty($post_appearing_effect)) ? 'post-item '.$post_appearing_effect : 'post-item';
$post_area = 'post-area';
$blog_type = '';
$exclude_post_formats ='none';

// default values
/*if ( !isset($blog_type) ) {
    $blog_type = 'blog-classic';
}
if ( !isset($post_appearing_effect) ) {
    $post_appearing_effect = 'elementFade';
}
if ( !isset($category) ) {
    $category = '';
}
if ( !isset($tag) ) {
    $tag = '';
}
if ( !isset($columns) ) {
    $columns = '3';
}
if ( !isset($orderby) ) {
    $orderby = '';
}
if ( !isset($order) ) {
    $order = 'DESC';
}
if ( !isset($posts_per_page) ) {
    $posts_per_page = 5;
}
if ( !isset($posts_per_load) ) {
    $posts_per_load = 5;
}
if ( !isset($posts) ) {
    $posts = '';
}
if ( !isset($exclude_post_types) ) {
    $exclude_post_types = 'none';
}
if ( !isset($exclude_post_formats) ) {
    $exclude_post_formats = 'none';
}
if ( !isset($title_symbols) ) {
    $title_symbols = '25';
}
if ( !isset($show_review) ) {
    $show_review = 0;
}
if ( !isset($show_metadata) ) {
    $show_metadata = 1;
}
if ( !isset($title_symbols) ) {
    $title_symbols = 25;
}
if ( !isset($show_pagination) ) {
    $show_pagination = 1;
}
if ( !isset($infinity_pagination) ) {
    $infinity_pagination = 0;
}
if ( !isset($post_carousel) ) {
    $post_carousel = 0;
}
if ( !isset($load_by_scrolling) ) {
    $load_by_scrolling = true;
}*/

$path = 'content/' . $blog_type . '/content';

$args = array(
	'orderby' => $orderby,
	'order' => $order,
    'ignore_sticky_posts' => true,
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

if ((int) $category > 0 &&($blog_type!='blog-masonry')) {
	$args['cat'] = (int) $category;
}

if (!empty($posts)&&($blog_type!='blog-masonry')) {
	$posts = explode(',', $posts);
	$args['post__in'] = $posts;
}

if(($exclude_post_types!='none') && ($blog_type!='blog-masonry')){

    switch ($exclude_post_types){

        case 'post-with-image':
            $args['meta_query'] = array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'NOT EXISTS'
                ));
            break;

        case 'post-without-image':
            $args['meta_query'] = array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ));
            break;

    }

}

if (($blog_type!='blog-masonry')&&($exclude_post_formats!='none')) {
    $exclude_post_formats = explode(',', $exclude_post_formats);
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => $exclude_post_formats,
            'operator' => 'NOT IN',
        )
    );
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
//var_dump($posts_array);
switch($blog_type) {
	case 'blog-classic':
		$count_column = 'post-col-1';
	break;
	case 'blog-medium':
		$post_area = 'post-list';
		$post_class .= ' post-entry';
	break;
	case 'blog-masonry':
        $blog_type = 'masonry';
        $post_class = 'animate post-item';
        $count_column = 'post-col-' .$columns;
        break;
	case 'blog-grid':
	case 'blog-grid-overlay':
	case 'blog-grid-layout':
		$count_column = 'post-col-' .$columns;
	break;
}
$data_columns = '';
if (isset($post_carousel) && $post_carousel){
    $blog_type = 'post-carousel';
    $count_column = '';
    $data_columns = 'data-columns="' . $columns . '"';
}

$data_infinity = '';
$infinity_class = '';
$data_next_posts = '';
$data_effect = '';

if (isset($infinity_pagination) && $infinity_pagination ){

    $data_infinity  = 'data-infinity="true"';
    $infinity_class = 'infinity';

    $args['posts_per_page'] = '-1';
    $all_wp_query = new WP_Query($args);

    $all_posts_array = $all_wp_query->posts;

    if (!empty($all_posts_array)){
        $count = count($all_posts_array);
        $next_posts = '';
        for ($i = $posts_per_load; $i < $count; $i++) {
            if (isset($all_posts_array[$i])) {
                $str = $all_posts_array[$i]->ID;
                $next_posts = (!empty($next_posts)) ? $next_posts . "," . $str : $next_posts.$str;
            }
        }
        $data_next_posts = 'data-nextposts="' . $next_posts . '"';
    }

    if (!empty($post_appearing_effect)){
        $data_effect = 'data-effect="' . $post_appearing_effect . '"';
    }

}

$_REQUEST['title_symbols'] = $title_symbols;
?>

	<div id="post-area" class="<?php echo esc_attr($post_area) ?>
	    <?php echo esc_attr($count_column) ?> <?php echo esc_attr($blog_type) ?>
	    <?php echo esc_attr($infinity_class) ?>" <?php if (!empty($data_columns)) echo $data_columns; ?>
        <?php if(!empty($data_infinity)) echo $data_infinity; ?>
        <?php if(!empty($data_next_posts)) echo $data_next_posts; ?>
        <?php if(!empty($data_effect)) echo $data_effect; ?>>

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
                    $data['title_symbols'] = $title_symbols;
                    echo TMM_Shortcode::draw_html('post/masonry_piece', $data);
                }
            }
        } ?>

	</div><!--/ .post-area-->

	<?php if ($blog_type == 'masonry'){

    /*tmm_enqueue_script('owlcarousel');
    tmm_enqueue_style('owlcarousel');
    tmm_enqueue_style('owltheme');
    tmm_enqueue_style('owltransitions');*/

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
			<a class='load-more button secondary middle' data-loadbyscroll="<?php echo esc_attr($load_by_scrolling) ?>" data-page-load="2" data-posts-per-load="<?php echo esc_attr($posts_per_load) ?>" data-posts="<?php echo esc_attr($next_posts) ?>" href='#load-more'><?php _e('Load More', TMM_CC_TEXTDOMAIN) ?></a>
		</div><!--/ .post-load-more-->

    <?php
}

if ($show_pagination && class_exists('TMM') && $blog_type != 'masonry' && (!isset($infinity_pagination) || !$infinity_pagination)) {
	get_template_part('content', 'pagenavi');
}

$wp_query = $original_query;
wp_reset_postdata();

if (!empty($posts_array) && ($blog_type == 'masonry')){
    $load_with_animation = 1;

    wp_enqueue_script('tmm_masonry', TMM_CC_URL . 'js/plugins/min/jquery.masonry.min.js');
    ?>
    <script type="text/javascript">
        jQuery(function() {
            jQuery(".masonry").init_masonry(<?php echo esc_js($columns) ?>, <?php echo esc_js($load_with_animation) ?>);
        });
    </script>
<?php
}
