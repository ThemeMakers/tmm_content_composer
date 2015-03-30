<?php
if (!defined('ABSPATH')) die('No direct access allowed');

tmm_enqueue_script('magnific');
tmm_enqueue_style('magnific');

if ($gallery_type === 'albums') {
	tmm_enqueue_script('stapel');
} else {
	tmm_enqueue_script('mixitup');
}

$gal_images = TMM_Gallery::get_galleries_images(); // all images array
$gal_terms = TMM_Gallery::get_gallery_tags();
$image_size = TMM_Gallery::get_gallery_image_alias($gallery_type);
$gal_category = (!empty($gal_category) && $gal_category !== 'null') ? explode(',', $gal_category) : array();
$loaded_images = array();
$gal_category_slugs = array();

if ($gal_terms && $gal_category) {
	foreach ( $gal_terms as $term ) {
		if (in_array($term->term_id, $gal_category)) {
			$gal_category_slugs[$term->slug] = 1;
		}
	}

	$gal_category_slugs = array_keys($gal_category_slugs);
}

$count_images_by_cat = 0;
foreach ($gal_images as $image) {
	$cats = explode(' ', $image['slug']);
	foreach ($cats as $cat) {
		if (in_array($cat, $gal_category_slugs)) {
			$count_images_by_cat++;
		}
	}
}

if ($gallery_type === 'albums') {

	$data_group = 0;
	$post_slug = '';
	?>

	<span id="gallery-close" class="gallery-back">&larr;</span>
	<ul id="tp-grid" class="tp-grid">

		<?php if (!empty($gal_images)) {
			foreach ($gal_images as $image) {

				if ($post_slug !== $image['post_slug']) {
					$data_group++;
				}
				?>

				<li data-pile="<?php echo $image['post_slug'] ?>">
					<a href="<?php echo TMM_Content_Composer::resize_image($image['imgurl'], ''); ?>" data-group="<?php echo $data_group ?>" class="item-overlay gallery popup-link-<?php echo $data_group; ?>">
						<img src="<?php echo TMM_Content_Composer::resize_image($image['imgurl'], $image_size); ?>" />
					</a>
				</li>

				<?php
				$post_slug = $image['post_slug'];
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
	$uniqid = uniqid();
	?>

	<div class="portfolio-holder">

	<div class="filter-holder clearfix">

		<?php if($folio_filter){ ?>

			<div class="filter-container">
				<ul id="portfolio_filter_<?php echo $uniqid; ?>" class="portfolio-filter">

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

		<section id="portfolio_items_<?php echo $uniqid; ?>" class="portfolio-items popup-gallery col-<?php echo $layout ?>">

			<?php
			foreach ($gal_images as $key => $image) {

				if (count($loaded_images) >= $posts_per_page) {
					break;
				}

				$display = true;

				if (!empty($gal_category_slugs)) {
					$display = false;
					$cat_slugs = explode(' ', $image['slug']);

					foreach ($gal_category_slugs as $cat) {
						if ( in_array($cat, $cat_slugs) ) {
							$display = true;
						}
					}
				}

				if ($display) {
					$loaded_images[$key] = $image;
					$data = array();
					$data['post_key'] = $key;
					$data['galleries'] = $gal_images;
					$data['show_categories'] = $show_categories;
					echo TMM::draw_html('gallery/shortcodes/gallery_article', $data);
				}

			}
			?>

		</section><!--/ .portfolio-items-->

	</div><!--/ .filter-holder-->

	<?php if ($count_images_by_cat > $posts_per_page) {	?>

		<div class="portfolio-paging">
			<a  href="#" data-loaded="<?php echo implode(',', array_keys($loaded_images)); ?>" data-perload="<?php echo $posts_per_load ?>" data-category="<?php echo !empty($gal_category_slugs) ? implode(',', $gal_category_slugs) : 'all'; ?>" data-showcategories="<?php echo $show_categories ?>" class="load-more">Load More</a>
		</div><!--/ .portfolio-paging-->

	<?php } ?>

	</div>

	<?php
}
