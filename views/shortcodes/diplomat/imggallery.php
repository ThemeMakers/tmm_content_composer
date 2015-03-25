<?php
if (!defined('ABSPATH')) die('No direct access allowed');

tmm_enqueue_script('magnific');
tmm_enqueue_style('magnific');

if ($gallery_type === 'albums') {
	tmm_enqueue_script('stapel');
	tmm_enqueue_style('stapel');
} else {
	tmm_enqueue_script('mixitup');
}

$gal_images = TMM_Gallery::get_galleries_images(); // all images array
$image_size = TMM_Gallery::get_gallery_image_alias($gallery_type);
$gal_category = $gal_category !== 'null' ? explode(',', $gal_category) : 0;
$loaded_images = array();
$gal_category_images = array(); // gallery categories slugs array with related images ids

for ($i = 0; $i < $posts_per_page; $i++) {
	$loaded_images[$i] = $gal_images[$i];
}

//foreach ($gal_images as $key => $value) {
//	$cat_slugs = explode(' ', $value['slug']);
//
//	foreach ($cat_slugs as $cat_slug) {
//		if ( !isset($gal_category_images[$cat_slug]) ) {
//			$gal_category_images[$cat_slug] = array();
//		}
//		$gal_category_images[$cat_slug][] = $key;
//	}
//
//}

if ($gallery_type === 'albums') {

	$data_group = 0;
	$category = '';
	?>
	<span id="gallery-close" class="gallery-back">&larr;</span>
	<ul id="tp-grid" class="tp-grid">
		<?php if (!empty($gal_images)){
			foreach($gal_images as $gall){
				if($category!=$gall['slug']){
					$data_group++;
				}
				?>
				<li data-pile="<?php echo $gall['slug'] ?>">
					<a href="<?php echo TMM_Content_Composer::resize_image($gall['imgurl'], ''); ?>" data-group="<?php echo $data_group ?>" class="item-overlay gallery popup-link-<?php echo $data_group; ?>">
						<h6 class="extra-title"><?php echo $gall['title'] ?></h6>
						<img src="<?php echo TMM_Content_Composer::resize_image($gall['imgurl'], $image_size); ?>" />
					</a>
				</li>
				<?php
				$category = $gall['slug'];
			}
		} ?>
		<input type="hidden" class="tp_groups" value="<?php echo $data_group ?>">
	</ul><!--/ .tp-grid-->

	<?php
} else {

	$layout = $content;
	if (!$posts_per_page) {
		$posts_per_page = 6;
	}

	$folio_tags = TMM_Gallery::get_gallery_tags();
	?>

	<div class="filter-holder clearfix">

		<?php if($folio_filter){ ?>

			<div class="filter-container">
				<ul id="portfolio-filter" class="portfolio-filter">

					<li><a class="filter active" data-filter="all"><?php _e('All', TMM_CC_TEXTDOMAIN); ?></a></li>

					<?php if (!empty($folio_tags)): ?>
						<?php foreach ($folio_tags as $term_id => $tag) : ?>
							<?php if (empty($gal_category) || in_array($term_id, $gal_category)): ?>
								<li><a class="filter" data-filter=".<?php echo $tag->slug ?>"><?php echo $tag->name ?></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>

				</ul><!--/ .portfolio-filter-->
			</div><!--/ .filter-container-->

		<?php } ?>

		<section id="portfolio-items" class="portfolio-items popup-gallery col-<?php echo $layout ?>">

			<?php
			foreach ($loaded_images as $key => $image) {

				$data = array();
				$data['post_key'] = $key;
				$data['galleries'] = $gal_images;
				$data['category'] = 'all';
				$data['show_categories'] = $show_categories;
				echo TMM::draw_html('gallery/shortcodes/gallery_article', $data);

			}
			?>

		</section><!--/ .portfolio-items-->

	</div><!--/ .filter-holder-->

	<?php if (count($gal_images) > $posts_per_page) {	?>

		<div class="portfolio-paging">
			<a  href="#" data-loaded="<?php echo implode(',', array_keys($loaded_images)); ?>" data-perload="<?php echo $posts_per_load ?>" data-catecory="all" data-showcategories="<?php echo $show_categories ?>" class="load-more">Load More</a>
		</div><!--/ .portfolio-paging-->

	<?php }

}
