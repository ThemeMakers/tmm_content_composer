<?php if ( !defined('ABSPATH') ) exit();

global $wp_query, $wpdb;

$args = array(
	'posts_per_page' => (int) $count,
	'post_type' => TMM_Ext_PostType_Car::$slug,
	'post_status' => 'publish',
	'orderby' => 'post_date',
	'order' => 'DESC',
);

if ( !defined('ICL_LANGUAGE_CODE') ) {
	$args['meta_query'][] = array(
		'key'     => '_icl_lang_duplicate_of',
		'value'   => '',
		'compare' => 'NOT EXISTS'
	);
}

if ($filter === 'featured') {
	$args['meta_query'][] = array(
		'key' => 'car_is_featured',
		'value' => 1,
		'type' => 'numeric',
		'compare' => '=',
	);
} else if ($filter === 'random') {
	$args['orderby'] = 'rand';
}

if ($items_per_set == '3') {
	$thumbnail_size = 'large';
} elseif ($items_per_set == '4') {
	$thumbnail_size = 'middle';
} else {
	$thumbnail_size = 'small';
}

if (!empty($sort_by_dealer)) {
	$args['author'] = $sort_by_dealer;
}

$query = new WP_Query( $args );

$uniqid = uniqid();

if ( !empty($query->posts) ) {
	wp_enqueue_script('tmm_sudoSlider');
?>

<div class="car_listing_carousel_wrapper">

<?php if ( !empty($title) ) { ?>

	<div class="page-subheader">

		<h3 class="section-title"><?php esc_html_e( $title, 'cardealer' ) ?></h3>

		<span class="clc_controls" id="clc_controls_<?php echo esc_attr( $uniqid ) ?>">
			<a href="#" data-target="prev" class="prevBtn icon-angle-left" title="<?php esc_html_e('Previous', 'cardealer'); ?>"></a>
			<a href="#" data-target="next" class="nextBtn icon-angle-right" title="<?php esc_html_e('Next', 'cardealer'); ?>"></a>
		</span>

	</div><!--/ .page-header-->

<?php } ?>
	<!--	clc - Car Listing Carousel -->
	<div id="clc_<?php echo esc_attr( $uniqid ) ?>" class="clc_content content-grid">
		<?php
		if ( !empty($query->posts) ) {
			foreach ( $query->posts as $post ) {
				$GLOBALS['post_id']                             = $post->ID;
				$GLOBALS['featured_cars_autoslide']             = ! isset( $set_featured_autoslide ) || $set_featured_autoslide;
				$GLOBALS['recent_cars_show_currency_converter'] = ! isset( $show_currency_converter ) || $show_currency_converter;
				$GLOBALS['recent_cars_show_details_button']     = false;
				$GLOBALS['hide_cars_options']                   = true;
				$GLOBALS['compare_watchlist']                   = false;
				$GLOBALS['thumbnail_size']                      = isset( $thumbnail_size ) ? $thumbnail_size : 'large';
				get_template_part( 'article', 'car' );
			}
		}

		wp_reset_postdata();
		?>
	</div>
</div>

<script type="text/javascript">
	jQuery(function ($) {

		var isMobile = window.matchMedia("only screen and (max-width: 768px)").matches;

		$("#clc_<?php echo esc_attr( $uniqid ) ?>").sudoSlider({
			auto: <?php echo esc_attr( $autoslide ) ?>,
			ease: 'swing',
			speed: 800,
			pause: 2000,
			resumePause: 2000,
			touch: true,
			prevNext: false,
			slideCount: isMobile ? 2 : <?php  echo esc_attr( $items_per_set ) ?>,
			moveCount: 1,
			startSlide: false,
			continuous: true,
			controlsFade: false,
			customLink: "#clc_controls_<?php echo esc_attr( $uniqid ) ?> a",
			responsive: true
		});

	});
</script>

<?php } ?>