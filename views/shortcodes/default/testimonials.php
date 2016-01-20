<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
if ($show == 'mode1') {
	$args = array(
		'post_type' => TMM_Testimonials::$slug,
		'p' => $content,
	);
} elseif ($show == 'mode2') {
	$args = array(
		'post_type' => TMM_Testimonials::$slug,
		'orderby' => 'rand',
		'posts_per_page' => $count,
	);
} else {
	$args = array(
		'post_type' => TMM_Testimonials::$slug,
		'posts_per_page' => $count,
	);
}
$query = new WP_Query($args);
?>

<ul class="quotes <?php if (!empty($animation)) echo $animation ?>" data-timeout="<?php echo $timeout ?>">
	<?php
	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			?>
			<li class="align-center">
				<blockquote class="quote-text">
					<p><?php the_content() ?></p>
				</blockquote>
				<?php if ($show_photo): ?>
					<div class="quote-image"><img alt="<?php the_title(); ?>" src="<?php echo TMM_Helper::get_post_featured_image(get_the_ID(), '70*70'); ?>"></div>
				<?php endif; ?>
				<div class="quote-author"><span><?php the_title(); ?>, <?php echo get_post_meta(get_the_ID(), 'position', true); ?></span></div>
			</li>	
			<?php
		endwhile;
	endif;
	?>
</ul><!--/ .quotes-->
<?php wp_reset_query();
