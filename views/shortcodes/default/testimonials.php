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
		);
		break;
}

$query = new WP_Query($args);
?>

	<?php
	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			?>

			<blockquote class="testimonial">
			<?php if ($show_photo){ ?>
				<div class="author-thumb">
					<img src="<?php echo TMM_Helper::get_post_featured_image(get_the_ID(), '85*85'); ?>" alt="<?php the_title(); ?>">
				</div>
			<?php } ?>
				<div class="author-message">
					<p>
						<?php the_content() ?>
					</p>

					<div class="quote-meta clearfix">
						<div class="quote-author">
							<?php the_title(); ?>
						</div>
					</div>
				</div><!--/ .author-message-->
			</blockquote><!--/ .testimonial-->

			<?php
		endwhile;
	endif;
	?>

<?php wp_reset_query();
