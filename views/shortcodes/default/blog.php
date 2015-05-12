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

if (is_front_page()) {
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;    
} else {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}

$args['paged'] = $paged;


global $wp_query;
$original_query = $wp_query;
$wp_query = null;
$wp_query = new WP_Query($args);
global $post;
?>

<?php
$_REQUEST['shortcode_show_metadata'] = $show_metadata;
get_template_part('content', $blog_view);
unset($_REQUEST['shortcode_show_metadata']);
?>

<?php
if ($show_pagination) {
	get_template_part('content', 'pagenavi');
}
//*****
$wp_query = null;
$wp_query = $original_query;
wp_reset_postdata();
