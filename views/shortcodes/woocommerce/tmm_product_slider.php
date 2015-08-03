<?php
global $woocommerce_loop;
$slides = array();
$image_size = "940*520";

$atts = array(
	'per_page' => '12',
	'columns'  => '4',
	'orderby'  => 'date',
	'order'    => 'desc'
);

if ($per_page) {
	$atts['per_page'] = $per_page;
}

$meta_query   = WC()->query->get_meta_query();
//$meta_query[] = array(
//	'key'   => '_featured',
//	'value' => 'yes'
//);

$args = array(
	'post_type'           => 'product',
	'post_status'         => 'publish',
	'ignore_sticky_posts' => 1,
	'posts_per_page'      => $atts['per_page'],
	'orderby'             => $atts['orderby'],
	'order'               => $atts['order'],
	'meta_query'          => $meta_query
);

$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );

if ( $products->have_posts() ) {

	while ( $products->have_posts() ) {
		$products->the_post();
		$uniqid = uniqid();
		global $post;
		$slides[$uniqid] = array(
			'imgurl' => esc_url(TMM_Helper::get_post_featured_image($post->ID, '')),
			'sequence_content' => '<h1 class="sequence-slogan" style="text-align: center;"><span style="color: #f8b637;">' . get_the_title() . '</span></h1>',
			//'sequence_content' => '[title type="h2" font_size="default" letter_spacing="" font_weight="400" align="center" font_family="Raleway" title_type="default" color="#ffffff" bottom_indent="" text_transform="0" bg_color="#f59611" bg_opacity="0.9" bg_radius="50" bg_padding="" bg_width="400" bg_height="400" use_general_color="0" bg_center="1" title_effect="none" word_animate="1" separate_row="Unique^Progressive^Power" sc_id="sc871398551196"]Unique Progressive Power[/title]',
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
