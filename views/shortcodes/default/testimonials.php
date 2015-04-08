<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
switch ($show){
	case 'mode1':
		$args = array(
			'post_type' => TMM_Testimonial::$slug,
			'p' => $content,
		);
		break;
	case 'mode2':
		$args = array(
			'post_type' => TMM_Testimonial::$slug,
			'posts_per_page' => $count,
			'order' => $order,
			'orderby' => $orderby
		);
		break;
}

$query = new WP_Query($args);
?>

	<?php
	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			?>

			<div class="testimonial">

			<?php if ($show_photo){ ?>
				<div class="author-thumb">
					<img src="<?php echo esc_url(TMM_Helper::get_post_featured_image(get_the_ID(), '85*85')); ?>" alt="<?php the_title(); ?>">
				</div>
			<?php } ?>

				<blockquote>
					<p><?php the_content() ?></p>
				</blockquote>

				<div class="quote-meta">
					<?php the_title(); ?>
				</div>

			</div>

			<?php
		endwhile;
	endif;
	?>

<?php wp_reset_query();
