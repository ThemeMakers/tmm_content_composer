<?php
TMM_Functions::enqueue_script('cycle');
TMM_Functions::enqueue_script('isotope');

if (!isset($post_per_page)) {
	$post_per_page = 12;
}

if (!isset($gallery_category) || $gallery_category == 0) {
	$selected_gallery_categories = array();
}else{
	$selected_gallery_categories = explode(',', $gallery_category);
}

$page = 1;
if (isset($_GET['gal_page'])) {
	$page = $_GET['gal_page'];
}
global $post;
$current_page_id = $post->ID;

$args = array(
	'post_type' => TMM_Gallery::$slug,
	'posts_per_page' => $post_per_page,
	'paged' => $page
);
$w_query = new WP_Query();
$query = $w_query->query($args);

$article_css_class = "four columns";
if($gallery_layout == 3){
	$article_css_class = "one-third column";
}
$image_size = "460*350";

$gallery_categories_terms = get_terms('gallery-categories', array('hide_empty' => true));
$gallery_categories = array();
if (!empty($gallery_categories_terms)) {
	foreach ($gallery_categories_terms as $value) {
		if(empty($selected_gallery_categories) || in_array($value->term_id, $selected_gallery_categories)){
			$gallery_categories[$value->term_id] = $value->name;
		}
	}
}
?>

<?php
if($show_gallery_filter == 1){
	?>

	<div class="filter-holder clearfix">

		<?php if (!empty($gallery_categories)){ ?>

			<ul id="gallery-filter" class="gallery-filter clearfix">

				<li><a data-categories="*" class=""><?php _e('All', TMM_CC_TEXTDOMAIN); ?></a></li>

				<?php
				foreach ($gallery_categories as $id => $value) {
					?>

					<li><a data-categories="<?php echo $id; ?>"><?php echo $value; ?></a></li>

					<?php
				}
				?>

			</ul><!--/ .gallery-filter-->

		<?php } ?>

	</div><!--/ .filter-holder-->

	<?php
}
?>

<section id="gallery-items" class="gallery-items clearfix row_container">

	<?php
	foreach ($query as $post) {
		
		$post_categories = '';
		$post_categories_terms = get_the_terms($post->ID, 'gallery-categories');
		$show_current_post = false;

		if(empty($selected_gallery_categories)){
			$show_current_post = true;
		}

		if (!empty($post_categories_terms)) {
			
			foreach ($post_categories_terms as $key => $term) {
				if(empty($selected_gallery_categories) || in_array($term->term_id, $selected_gallery_categories)){
					$post_categories .= $term->term_id . ' ';
					$show_current_post = true;
				}
			}
			$post_categories = trim($post_categories);
		}

		if($show_current_post){
			$tmm_gallery = get_post_meta($post->ID, 'thememakers_gallery', true);

			if(is_array($tmm_gallery)){
				foreach ($tmm_gallery as $pic) {
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class($article_css_class . ' '); ?> data-categories="<?php echo $post_categories ?>">

					<div class="work-item">

						<a data-fancybox-group="gallery" href="<?php echo $pic['imgurl']; ?>" class="single-image">

							<figure>

								<img src="<?php echo TMM_Helper::resize_image($pic['imgurl'], $image_size); ?>" alt="<?php echo $pic['title']; ?>" />

							</figure>

						</a>

						<?php if(!empty($pic['title']) || !empty($pic['description'])){ ?>

						<h6 class="extra-title">

							<?php
							if(!empty($pic['title'])){
								if(TMM::get_option("gallery_single_show")){
									?>

									<a href="<?php the_permalink(); ?>"><?php echo $pic['title']; ?></a>

									<?php
								}else{
									?>

									<span><?php echo $pic['title']; ?></span>

									<?php
								}
							}
							?>

							<?php if(!empty($pic['description'])){ ?>
							<div class="gallery-item-desc"><?php echo $pic['description']; ?></div>
							<?php } ?>

						</h6>

						<?php } ?>

					</div><!--/ .work-item-->

				</article>

				<?php
				}
			}

		}
	}
	?>

</section><!--/ .gallery-items-->


<?php
if ($show_gallery_pagination && $w_query->max_num_pages > 1) {
	?>

	<div class="container">
		
		<div class="eleven columns">

			<div class="wp-pagenavi">

				<?php
				if ($page - 1 > 0) {
					?>
				
					<a href="<?php echo get_permalink($current_page_id); ?>?gal_page=<?php echo($page - 1); ?>" class="prev page-numbers"> <?php _e('Previous', TMM_THEME_TEXTDOMAIN); ?></a>
					
					<?php
				}
				?>

				<?php
				for ($i = 0; $i < $w_query->max_num_pages; $i++) {
					
					if ($page == ($i + 1)) {
						?>
					
						<span class="page-numbers current"><?php echo($i + 1); ?></span>
					
						<?php
					} else {
						?>
						
						<a href="<?php echo get_permalink($current_page_id); ?>?gal_page=<?php echo($i + 1); ?>" class="page-numbers"><?php echo ($i + 1); ?></a>
					
						<?php
					}
					
				}
				
				if ($page < $w_query->max_num_pages) {
					?>
						
					<a href="<?php echo get_permalink($current_page_id) ?>?gal_page=<?php echo($page + 1) ?>" class="next page-numbers"><?php _e('Next', TMM_THEME_TEXTDOMAIN); ?> </a>
				
					<?php
				}
				?>

			</div><!--/ .wp-pagenavi-->

		</div><!--/ .eleven columns-->
		
	</div><!--/ .container-->

<?php
}
?>
