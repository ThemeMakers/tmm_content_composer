<?php

$column_class = '';

switch ($template) {
	case '1/3':
		$column_class = 'col-md-4';
		break;
	case '1/4':
		$column_class = 'col-md-3';
		break;
}

$args = array('numberposts' => $count, 'post_type' => TMM_Portfolio::$slug, 'suppress_filters' => false);
$posts = get_posts($args);
?>

<section class="projects clearfix">
	
	<div class="row">
		
		<?php foreach ($posts as $post): ?>

			<article class="<?php echo $column_class ?>">

				<div class="work-item">

					<img src="<?php echo TMM_Helper::get_post_featured_image($post->ID, '460*350'); ?>" alt="<?php echo $post->post_title ?>" />

					<div class="image-extra">

						<div class="extra-content">

							<div class="inner-extra">

								<a class="single-image link-icon" href="<?php  echo get_permalink($post->ID); ?>">Permalink</a>
								<a class="single-image plus-icon" data-fancybox-group="gallery" href="<?php echo TMM_Helper::get_post_featured_image($post->ID, ''); ?>">Image</a>

								<h4 class="extra-title"><?php echo $post->post_title ?></h4>
								<span class="extra-category">
									<?php
										$tags = wp_get_post_tags($post->ID);
										foreach ($tags as $key => $value) {
											if ($key > 0) {
												echo ' / ';
											}
											echo $value->name;
										}
									?>
								</span><!--/ .extra-category-->	

							</div><!--/ .inner-extra-->

						</div><!--/ .extra-content-->	

					</div><!--/ .image-extra-->		

				</div><!--/ .work-item-->

			</article>

		<?php endforeach; ?>
		
	</div><!--/ .row-->

</section><!--/ .projects-->
