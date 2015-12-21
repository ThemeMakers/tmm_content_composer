<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$position_id = $content;
$tax_query_array = array();
//***
if ($position_id != 0) {
	$tax_query_array[] = array(
		'taxonomy' => 'position',
		'field' => 'term_id',
		'terms' => array($position_id),
	);
}
//***
global $post;
$current_page_id = $post->ID;
$w_query = new WP_Query();
$page_number = 1;

if (isset($_GET['page_number'])) {
	$page_number = intval($_GET['page_number']);
}
if (!isset($per_page)) {
	$per_page = '10';
}
if (!isset($sort_order)) {
	$sort_order = 'ASC';
}
if (!isset($order)) {
	$order = 'title';
}

$query = $w_query->query(array(
	'tax_query' => $tax_query_array,
	'post_type' => 'staff-page',
	'posts_per_page' => $per_page,
	'paged' => $page_number,
	'order' => $sort_order,
	'orderby' => $order,
    )
);
?>


<ul class="team">

	<?php foreach ($query as $post) : ?>

		<li>

			<div class="four columns">

				<div class="bordered">
					<figure class="add-border">
						<img src="<?php echo ThemeMakersHelper::get_post_featured_image($post->ID, 204, false, 174); ?>" alt="<?php echo get_the_title($post->ID); ?>" />
					</figure>
				</div><!--/ .bordered-->

			</div><!--/ .four .columns-->

			<div class="twelve columns">

				<?php $positions = wp_get_post_terms($post->ID, 'position'); ?>
				<h4 class="with-desc" data-desc="( <?php
				foreach ($positions as $item)
					echo $item->name . ' ';
				?>)">

					<?php echo get_the_title($post->ID); ?></h4>

				<?php echo apply_filters('the_content', $post->post_content);  ?>

				<div class="clearfix"></div>

				<?php $email = get_post_meta($post->ID, 'staff_email', true); ?>
				<?php if (!empty($email)): ?>
					<br />
					<a href="mailto:<?php echo $email ?>" class="button default small"><?php _e('E-mail', TMM_THEME_FOLDER_NAME); ?> <?php echo get_the_title($post->ID); ?></a>
				<?php endif; ?>

			</div><!--/ .twelve .columns-->

		</li>

	<?php endforeach; ?>	

</ul>



<div class="clear"></div>
<?php if ($w_query->max_num_pages > 1): ?>
	<div class="wp-pagenavi">

		<?php if ($page_number - 1 > 0): ?>
			<a href="<?php echo get_permalink($current_page_id) ?>?page_number=<?php echo($page_number - 1) ?>" class="prev page-numbers"></a>
		<?php endif; ?>

		<?php for ($i = 0; $i < $w_query->max_num_pages; $i++): ?>

			<?php if ($page_number == ($i + 1)): ?>
				<span class="page-numbers current"><?php echo($i + 1) ?></span>
			<?php else: ?>
				<a href="<?php echo get_permalink($current_page_id) ?>?page_number=<?php echo($i + 1) ?>" class="page-numbers"><?php echo ($i + 1) ?></a>
			<?php endif; ?>

		<?php endfor; ?>

		<?php if ($page_number < $w_query->max_num_pages): ?>
			<a href="<?php echo get_permalink($current_page_id) ?>?page_number=<?php echo($page_number + 1) ?>" class="next page-numbers"></a>
		<?php endif; ?>

	</div>
<?php endif; ?>
