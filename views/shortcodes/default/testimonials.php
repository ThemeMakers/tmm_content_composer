<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div class="testimonials">

	<?php
	$args = array();

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

	// Align
	if (!empty($align)) {
		$css_class  = $align;
	}

	wp_reset_query();
	$query = new WP_Query($args);
	?>
	
	<?php if (!isset($timeout)) $timeout = 3000; ?>
	<?php if (!isset($speed)) $speed = 600; ?>
		
	<ul class="quotes shortcode" data-timeout="<?php echo $timeout; ?>" data-speed="<?php echo $speed ?>">
		
		<?php
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				?>
				<li class="<?php echo $css_class; ?>">
					<blockquote class="quote-text"><?php the_content(); ?></blockquote><!--/ .quote-text-->
					<div class="quote-author"><?php the_title(); ?>, <?php echo get_post_meta(get_the_ID(), 'position', true) ?></div>
				</li>
				<?php
			endwhile;
		endif;
		wp_reset_query();
		?>
				
	</ul><!--/ .quotes-->

</div><!--/ .widget-container-->

<?php wp_reset_query() ?>

