<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
tmm_enqueue_script('mixitup');
tmm_enqueue_script('magnific');
tmm_enqueue_style('magnific');

$layout = $content;
if (!$posts_per_page) {
	$posts_per_page = 6;
}

$featured_image_alias = TMM_Gallery::get_gallery_image_alias();

$galleries = TMM_Gallery::get_galleries_images();
$folio_tags = TMM_Gallery::get_gallery_tags();
?>

	<div class="filter-holder clearfix">

		<?php if($folio_filter){ ?>

			<div class="filter-container">
				<ul id="portfolio-filter" class="portfolio-filter">

					<?php

					?>
					<li><a class="filter active" data-filter="all"><?php _e('All', TMM_CC_TEXTDOMAIN); ?></a></li>

					<?php if (!empty($folio_tags)): ?>
						<?php foreach ($folio_tags as $term_id => $tag) : ?>
							<li><a class="filter" data-filter=".<?php echo $tag->slug ?>"><?php echo $tag->name ?></a></li>
						<?php endforeach; ?>
					<?php endif; ?>

				</ul><!--/ .portfolio-filter-->
			</div><!--/ .filter-container-->

		<?php } ?>

		<section id="portfolio-items" class="portfolio-items popup-gallery col-<?php echo $layout ?>">

			<?php //if (!empty($posts_array)) {

				 for ($i = 0; $i < $posts_per_page; $i++) {

					if (isset($galleries[$i])){
						$gall = $galleries[$i];
						?>
						<article id="post-<?php echo $i ?>" class="mix <?php echo $gall['slug'] ?>">

							<div class="work-item">

								<a href="<?php echo TMM_Content_Composer::resize_image($gall['imgurl'], ''); ?>" class="item-overlay gallery popup-link">
									<img src="<?php echo TMM_Content_Composer::resize_image($gall['imgurl'], $featured_image_alias); ?>" alt="<?php echo $gall['title'] ?>">
								</a>

								<?php if ($show_categories){
									?>
									<h4 class="caption"><?php echo $gall['title']?></h4>
								<?php
								} ?>

							</div><!--/ .work-item-->

						</article><!--/ .project-item-->

						<?php

					}
				 }
			//}
			?>

		</section><!--/ .portfolio-items-->

	</div><!--/ .filter-holder-->

<?php

if (count($galleries) > $posts_per_page) {
	$next_posts = "";
	for ($i = $posts_per_page; $i < ($posts_per_page + $posts_per_load); $i++) {
		if (isset($galleries[$i])) {
			$str = (string) $i;
			$next_posts = $next_posts . $str . ",";
		}
	}
	?>
	<div class="portfolio-paging">
		<a  href="#" data-nextposts="<?php echo $next_posts ?>"  data-perload="<?php echo $posts_per_load ?>" data-catecory="all" data-showcategories="<?php echo $show_categories ?>" class="load-more">Load More</a>
	</div><!--/ .portfolio-paging-->
<?php }
wp_reset_query();