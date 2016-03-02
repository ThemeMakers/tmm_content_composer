<?php
if (!defined('ABSPATH')) exit;

wp_reset_query();

if (!isset($orderby)) {
    $orderby = '';
}
if (!isset($order)) {
    $order = 'DESC';
}
if (!isset($category)) {
    $category = '';
}
if (!isset($posts)) {
    $posts = '';
}
if (!isset($show_metadata)) {
    $show_metadata = 1;
}
if (!isset($show_pagination)) {
    $show_pagination = 1;
}
if (!isset($posts_per_page)) {
    $posts_per_page = 5;
}

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
	$args['cat'] = (int) $category;
}

if (!empty($posts)) {
	$posts = explode(',', $posts);
	$args['post__in'] = $posts;
}

global $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if( is_front_page() ){
	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
}
$args['paged'] = $paged;

$original_query = $wp_query;
$wp_query = new WP_Query($args);


if (class_exists('TMM')) {
	$_REQUEST['shortcode_show_metadata'] = $show_metadata;
	get_template_part('content', 'default');
	unset($_REQUEST['shortcode_show_metadata']);
} else {
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			get_template_part('content');
		}
	}
}

if ($show_pagination && class_exists('TMM')) {
	get_template_part('content', 'pagenavi');
}

$wp_query = $original_query;
wp_reset_postdata();
