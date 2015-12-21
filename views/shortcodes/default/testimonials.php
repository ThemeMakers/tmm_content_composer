<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div class="widget widget_testimonials">

	<?php
	$args = array();
	$unique_id = uniqid();

	if ($show == 1) {
		$args = array(
			'post_type' => 'testimonials',
			'p' => $content,
		);
	} elseif ($show == 2) {
		$args = array(
			'post_type' => 'testimonials',
			'orderby' => 'rand',
			'posts_per_page' => $count,
		);
	} else {
		$args = array(
			'post_type' => 'testimonials',
			'posts_per_page' => $count,
		);
	}


	wp_reset_query();
	$query = new WP_Query($args);
	?>


	<div class="quoteBox">
		<?php
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				?>
				<div class="quote-text">
					<?php the_content(); ?>
				</div>
				<span class="quote-author"><span><?php the_title(); ?></span>&nbsp;<?php echo get_post_meta(get_the_ID(), 'position', true) ?></span><br />
				<br />
				<?php
			endwhile;
		endif;
		wp_reset_query();
		?>

	</div>

</div><!--/ .widget-container-->
<?php wp_reset_query() ?>

