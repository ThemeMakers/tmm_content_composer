<?php
$effect_class = (TMM::get_option('images_loader')) ? 'translateEffect' : '';
$column_class = '';
$count=$content;
//***
switch ($template) {
	case '1/2':
		$column_class = 'eight columns';
		break;
	case '1/3':
		$column_class = 'one-third column';
		break;
	case '1/4':
		$column_class = 'four columns';
		break;
}
$args = array('numberposts' => $count, 'post_type' => TMM_Portfolio::$slug, 'suppress_filters' => false);
$posts = get_posts($args);
?>
<?php if (!empty($posts)): ?>
	<section class="projects clearfix">

		<?php foreach ($posts as $post) : ?>

			<article class="<?php echo $effect_class; ?> <?php echo $column_class ?>">
				<a class="single-image link-icon" href="<?php echo get_permalink($post->ID) ?>">
					<img src="<?php echo TMM_Helper::get_post_featured_image($post->ID, '220*157', true); ?>" alt="<?php echo $post->post_title ?>" />
				</a>
			</article>

		<?php endforeach; ?>

	</section><!--/ .projects-->
<?php endif; ?>
<div class="clear"></div>

<?php if ($show_button): ?>
	<a class="button small default" href="<?php echo get_post_type_archive_link(TMM_Portfolio::$slug) ?>"><?php esc_html_e('See all projects', 'tmm_shortcodes'); ?></a>
<?php endif; ?>

<?php wp_reset_query(); ?>
<div class="clear"></div>