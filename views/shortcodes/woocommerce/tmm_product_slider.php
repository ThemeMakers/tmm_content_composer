<?php
global $woocommerce_loop;
$slides = array();
$image_size = "940*520";

$args = array(
	'post_type'           => 'product',
	'post_status'         => 'publish',
	'posts_per_page'      => '12',
);

$atts = array(
	'per_page' => '12',
	'columns'  => '4',
);

if ($per_page) {
	$args['posts_per_page'] = $per_page;
	$atts['per_page'] = $per_page;
}

$meta_query   = WC()->query->get_meta_query();

if ($product_type === 'recent_products') {

	$args['ignore_sticky_posts'] = 1;
	$args['orderby'] = 'date';
	$args['order'] = 'desc';

} else if ($product_type === 'featured_products') {

	$args['ignore_sticky_posts'] = 1;
	$args['orderby'] = 'date';
	$args['order'] = 'desc';

	$meta_query[] = array(
		'key'   => '_featured',
		'value' => 'yes'
	);

} else if ($product_type === 'top_rated') {

	$args['ignore_sticky_posts'] = 1;
	$args['orderby'] = 'title';
	$args['order'] = 'asc';

} else if ($product_type === 'best_selling') {

	$args['ignore_sticky_posts'] = 1;
	$args['meta_key'] = 'total_sales';
	$args['orderby'] = 'meta_value_num';

} else if ($product_type === 'sale_products') {

	$product_ids_on_sale = wc_get_product_ids_on_sale();

	$args['no_found_rows'] = 1;
	$args['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
	$args['orderby'] = 'title';
	$args['order'] = 'asc';

}

$args['meta_query'] = $meta_query;

if ($product_type === 'top_rated') {
	add_filter( 'posts_clauses', array( 'WC_Shortcodes', 'order_by_rating_post_clauses' ) );
}

$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );

if ($product_type === 'top_rated') {
	remove_filter( 'posts_clauses', array( 'WC_Shortcodes', 'order_by_rating_post_clauses' ) );
}

if ( $products->have_posts() ) {

	while ( $products->have_posts() ) {
		$products->the_post();
		$uniqid = uniqid();
		global $post;
		global $product;
		$slides[$uniqid] = array(
			'imgurl' => esc_url(TMM_Helper::get_post_featured_image($post->ID, '')),
			'sequence_content' => '<h1 class="sequence-slogan" style="text-align: center;">
										<a href="' . get_the_permalink($post->ID) . '">
											<span style="color: #f8b637;">' . get_the_title() . '</span>
											<p class="price">' . $product->get_price_html() . '</p>
										</a>
									</h1>',
		);
	}
}

wp_reset_postdata();

$data = array(
	'alias' => $image_size,
	'slides' => $slides,
	'data' => array(
		'slider_options' => array(
			'fullscreen' => 0,
			'pagination' => $pagination,
			'autoplay' => $autoplay,
			'delay' => $autoplay_delay,
			'speed' => 500,
			'height' => 600,
		)
	),
);

echo TMM::draw_free_page(TMM_EXT_PATH . '/sliders/items/sequence/views/page_output.php', $data);
