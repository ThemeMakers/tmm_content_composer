<?php

$args = array();

if ($category > 0) {
	$args = array('numberposts' => $count, 'category' => $category, 'suppress_filters' => false);
} else {
	$args = array('numberposts' => $count, 'suppress_filters' => false);
}

$posts = get_posts($args);

?>

<div class="row">

	<?php foreach ($posts as $post): ?>
	
		<div class="col-sm-6 col-lg-4 <?php if ($animation) echo $animation ?>">
			
			<div class="entry">		
				<?php echo do_shortcode('[single_post show_content="1" char_count="' . $char_count . '" show_post_type_media="1" show_post_metadata="' . $show_post_metadata . '"]' . $post->ID . '[/single_post]'); ?>
			</div><!--/ .entry-->

		</div>

	<?php endforeach; ?>

</div><!--/ .row-->	

<?php wp_reset_query(); ?>

<?php if ($show_all_posts_button): ?>
<?php 
	$permalink = '';
	
	if (TMM::get_option('blogpage')) {
                $page_id = TMM::get_option('blogpage');
                if (function_exists('icl_object_id')){
                    $page_id = icl_object_id($page_id, 'page', false, ICL_LANGUAGE_CODE); 
                }
		$permalink = get_permalink($page_id);
	} else {
		$permalink = home_url();
	}
?>

<div class="align-center <?php if ($animation) echo $animation ?>">
	<a class="button large default" href="<?php echo $permalink ?>"><?php echo __('View All Posts', 'accio') ?></a>
</div>

<?php endif; ?>
