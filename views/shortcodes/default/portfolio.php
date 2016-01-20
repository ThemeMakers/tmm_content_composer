<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
TMM_Functions::enqueue_script('mixitup');

if (!$posts_per_page) { $posts_per_page = 10; }

$cats_query_array = array();

if (!empty($cat_id)) {
	$cats_query_array[] = array(
		'taxonomy' => 'folio_category',
		'field' => 'term_taxonomy_id',
		'terms' => array($cat_id),
	);
}

$folio_page = 1;
if (isset($_GET['folio_page'])) {
	$folio_page = $_GET['folio_page'];
}

global $post;
$current_page_id = $post->ID;

$args = array(
	'tax_query' => $cats_query_array,
	'post_type' => TMM_Portfolio::$slug,
	'posts_per_page' => $posts_per_page,
	'paged' => $folio_page		
);

$w_query = new WP_Query();
$query = $w_query->query($args);

$folio_cat = array();
$posts_cat = array();

foreach ($query as $p) {
	
	$terms = wp_get_post_terms( $p->ID, 'folio_category' ); 

	foreach ($terms as $cat_object) {
		$folio_cat[$cat_object->term_id] = $cat_object;
		$posts_cat[$p->ID][] = $cat_object;
	}
}

?>

<?php if (empty($cat_id)): ?>

	<div class="col-xs-12">

		<ul id="portfolio-filter" class="portfolio-filter opacity">
			<li class="filter active" data-filter="all"><?php _e('All', 'tmm_shortcodes'); ?></li>
			<?php if (!empty($folio_cat)):?>
				<?php foreach ($folio_cat as $term_id => $cat) : ?>
					<li class="filter" data-filter="<?php echo $cat->slug ?>"><?php echo $cat->name ?></li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul><!--/ #portfolio-filter -->

	</div>

<?php endif; ?>

<section class="section padding-off">

	<ul id="portfolio-items" class="portfolio-items">

		<?php foreach ($query as $post): ?>

			<?php
			$categories_css_class = "";

			if (isset($posts_cat[$post->ID])) {

				$cats = $posts_cat[$post->ID];

				if (!empty($cats)) {
					foreach ($cats as $key => $tag) {
						if ($key > 0) {
							$categories_css_class .= " ";
						}
						$categories_css_class .= $tag->slug;
					}
				}
			}

			?>

			<li class="<?php echo $categories_css_class ?> mix mix_all opacity2x">

				<div class="work-item">

					<img src="<?php echo TMM_Helper::get_post_featured_image($post->ID, '511*375'); ?>" alt="" />

					<div class="image-extra">

						<div class="extra-content">

							<div class="inner-extra">

								<h2 class="extra-title"><?php the_title(); ?></h2>

								<h6 class="extra-category">
									<?php
									$cats = wp_get_post_terms($post->ID, 'folio_category');
									foreach ($cats as $key => $value) {
										if ($key > 0) {
											echo ' / ';
										}
										echo $value->name;
									}
									?>
								</h6>

								<a class="single-image link-icon" href="<?php the_permalink(); ?>">Permalink</a>
								<a class="single-image plus-icon" data-fancybox-group="folio" href="<?php echo TMM_Helper::get_post_featured_image($post->ID, ''); ?>">Image</a>							

							</div><!--/ .inner-extra-->

						</div><!--/ .extra-content-->

					</div><!--/ .image-extra-->

				</div><!--/ .work-item-->

			</li><!--/ .mix-->
			
		<?php endforeach; ?>

	</ul><!--/ #portfolio-items-->	

</section><!--/ .section-->

<?php if ($w_query->max_num_pages > 1): ?>

	<div class="pagenavi align-center">      
            
            <?php $folio_onepage = TMM_Helper::get_folio_onepage(); 
                    $str = explode('#', $folio_onepage);
                    $str = $str['1'];  
                    
                    $permalink = get_permalink($current_page_id);
                    $pos = strpos($permalink, '?');
                    $permalink  = ($pos === false) ? $permalink.'?' : $permalink.'&';
            ?>

		<?php if ($folio_page - 1 > 0): ?>
                        <a href="<?php echo $permalink ?>folio_page=<?php echo($folio_page - 1); if (!empty($str)){ ?>#<?php echo $str; } ?>" class="prev page-numbers"></a>
		<?php endif; ?>                    

		<?php for ($i = 0; $i < $w_query->max_num_pages; $i++): ?>

			<?php if ($folio_page == ($i + 1)): ?>
				<span class="page-numbers current"><?php echo($i + 1) ?></span>
			<?php else: ?>
                        <a href="<?php echo $permalink ?>folio_page=<?php echo($i + 1); if (!empty($str)){ ?>#<?php echo $str; }?>" class="page-numbers"><?php echo ($i + 1) ?></a>
			<?php endif; ?>

		<?php endfor; ?>

		<?php if ($folio_page < $w_query->max_num_pages): ?>
                        <a href="<?php echo $permalink ?>folio_page=<?php echo($folio_page + 1); if (!empty($str)){ ?>#<?php echo $str; } ?>" class="next page-numbers"></a>
		<?php endif; ?>

	</div><!--/ .pagenavi-->

<?php endif; ?>