<?php if ( !defined('ABSPATH') ) exit();

global $wp_query, $wpdb;

$args = array(
	'posts_per_page' => (int) $count,
	'post_type' => 'post',
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

if ($filter === 'random') {
	$args['orderby'] = 'rand';
}

global $wp_query;
$old_wp_query = $wp_query;
$wp_query = new WP_Query( $args );

$uniqid = uniqid();

if ( !empty($wp_query->posts) ) {

	wp_enqueue_script('tmm_sudoSlider');
?>

<div class="recent_news_wrapper">

<?php if ( !empty($title) ) { ?>

	<div class="page-subheader">

		<h3 class="section-title"><?php _e( $title, TMM_CC_TEXTDOMAIN ) ?></h3>

		<span class="rnc_controls" id="rnc_controls_<?php echo $uniqid ?>">
			<a href="#" data-target="prev" class="prevBtn icon-angle-left" title="<?php _e('Previous', 'cardealer'); ?>"></a>
			<a href="#" data-target="next" class="nextBtn icon-angle-right" title="<?php _e('Next', 'cardealer'); ?>"></a>
		</span>

	</div><!--/ .page-header-->

<?php } ?>

	<!--	rnc - Recent News Carousel -->
	<div id="rnc_<?php echo $uniqid ?>" class="rnc_content">
		<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				global $post;
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class("entry clearfix secondary"); ?>>

					<div class="row">

						<div class="col-md-3">

							<?php
							$post_types = array(
								'audio',
								'video',
								'quote',
								'gallery',
							);

							$post_pod_type = get_post_meta($post->ID, 'post_pod_type', true);
							$post_type_values = get_post_meta($post->ID, 'post_type_values', true);

							if (!in_array($post_pod_type, $post_types)) {
								$post_pod_type = 'default';
							}

							get_template_part('article', $post_pod_type);
							?>

						</div>

						<div class="col-md-9">

							<div class="entry-body">

								<h4 class="title">
									<a href="<?php the_permalink() ?>">
										<?php the_title() ?>
									</a>
								</h4>

								<?php if ($show_date) { ?>
									<span class="date"><a href="<?php echo esc_url( get_month_link(get_the_date('Y'), get_the_date('m')) ) ?>"><?php echo get_the_date() ?></a></span>
								<?php } ?>

								<p>

									<?php
									if( strpos( $post->post_content, '<!--more-->' ) ){
										the_content();
									}else{
										if ($desc_symbols === '') {
											$desc_symbols = 220;
										}

										if (empty($post->post_excerpt)) {
											$txt = do_shortcode($post->post_content);
											$txt = strip_tags($txt);
										} else {
											$txt = $post->post_excerpt;
										}

										echo mb_substr($txt, 0, $desc_symbols);

										if ($desc_symbols > 0 && strlen($txt) > $desc_symbols) {
											echo ' ...';
										}

									}
									?>

								</p>

							</div><!--/ .entry-body-->

						</div>

					</div>

				</article>
				<?php
			}
		}

		$wp_query = $old_wp_query;
		wp_reset_postdata();
		?>
	</div>
</div>

<script type="text/javascript">
	jQuery(function ($) {

		$("#rnc_<?php echo $uniqid ?>").sudoSlider({
			auto: <?php echo (int) $autoslide ?>,
			ease: 'swing',
			speed: 800,
			pause: 2000,
			vertical: true,
			resumePause: 2000,
			continuous: true,
			touch: true,
			prevNext: false,
			slideCount: <?php echo (int) $items_per_set ?>,
			moveCount: 1,
			startSlide: false,
			controlsFade: false,
			customLink: "#rnc_controls_<?php echo $uniqid ?> a"
		});

	});
</script>

<?php } ?>