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

$query = new WP_Query( $args );

$request_result = $query->posts;

$uniqid = uniqid();

wp_enqueue_script('tmm_sudoSlider');
?>

<?php if ( !empty($title) ) { ?>

	<div class="page-subheader">

		<h2 class="section-title"><?php _e( $title, TMM_CC_TEXTDOMAIN ) ?></h2>

		<span id="car_listing_controls_<?php echo $uniqid ?>">
			<a href="#" data-target="prev" class="prevBtn"> previous </a>
			<a href="#" data-target="next" class="nextBtn"> next </a>
		</span>

	</div><!--/ .page-header-->

<?php } ?>

<div id="car_listing_carousel_<?php echo $uniqid ?>" class="row tmm-view-mode item-grid">
	<?php
	if ( !empty($request_result) ) {
		foreach ( $request_result as $post ) {
			$GLOBALS['post_id']                             = $post->ID;
			$GLOBALS['featured_cars_autoslide']             = ! isset( $set_featured_autoslide ) || $set_featured_autoslide;
			$GLOBALS['recent_cars_show_currency_converter'] = ! isset( $show_currency_converter ) || $show_currency_converter;
			$GLOBALS['recent_cars_show_details_button']     = false;
			$GLOBALS['hide_cars_options']     = true;
			$GLOBALS['hide_cars_compare']     = true;
			$GLOBALS['thumbnail_size']     = isset( $thumbnail_size ) ? $thumbnail_size : 'large';
			get_template_part( 'article', 'car' );
		}
	}

	wp_reset_postdata();
	?>

</div>

<script type="text/javascript">
	jQuery(function ($) {

		$("#car_listing_carousel_<?php echo $uniqid ?>").sudoSlider({
			auto: <?php echo (int) $autoslide ?>,
			ease: 'swing',
			speed: 800,
			pause: 2000,
			resumePause: 2000,
			touch: true,
			prevNext: false,
			slideCount: 3,
			moveCount: 1,
			startSlide: false,
			continuous: true,
			controlsFade: false,
			customLink: "#car_listing_controls_<?php echo $uniqid ?> a"
		});

	});
</script>
