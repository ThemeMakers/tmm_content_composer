<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
tmm_enqueue_script('mixitup');
tmm_enqueue_script('magnific');
tmm_enqueue_style('magnific');

$layout = $content;
if (!$posts_per_page) {
	$posts_per_page = 6;
}

$query = new WP_Query(array(
	'post_type' => TMM_Gallery::$slug,
	'showposts' => '-1'
));
$posts_array = $query->posts;

$featured_image_alias = "547*430";

$galleries = array();
$id = 0;
foreach($posts_array as $post){
	$post_gall = get_post_meta($post->ID,'thememakers_gallery', true);
	$tags = wp_get_post_terms($post->ID, 'gallery-category');
	$slug = '';
	foreach ($tags as $key => $tag) {
		if ($key > 0) {
			$slug .= " ";
		}
		$slug .= $tag->slug;
	}

	foreach ($post_gall as $gall){
		$galleries[$id]['imgurl'] = $gall['imgurl'];
		$galleries[$id]['title'] = $post->post_title;
		$galleries[$id]['slug'] = $slug;
		$id++;
	}
}

?>

	<div class="filter-holder clearfix">

		<?php if($folio_filter){ ?>

			<div class="filter-container">
				<ul id="portfolio-filter" class="portfolio-filter">

					<?php
					$folio_tags = array();

					foreach ($posts_array as $p) {
						$tmp = wp_get_post_terms($p->ID, 'gallery-category');
						foreach ($tmp as $tag_object) {
							$folio_tags[$tag_object->term_id] = $tag_object;

						}
					}
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

			<?php if (!empty($posts_array)) {

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
			}
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