<?php
$column_class = '';
$args = array();
if ($category > 0) {
	$args = array('numberposts' => $count, 'category' => $category, 'suppress_filters' => false);
} else {
	$args = array('numberposts' => $count, 'suppress_filters' => false);
}

$posts = get_posts($args);

echo '<div class="recent-posts clearfix">';

if (!empty($posts)) {
	foreach ($posts as $post) {
		echo '<div class="four columns">';
		
		echo do_shortcode('[single_post show_content="1" char_count="' . $char_count . '" show_post_type_media="1" show_post_metadata="' . $show_post_metadata . '" show_readmore_button="' . $show_readmore_button . '" button_color="default" button_size="small"]' . $post->ID . '[/single_post]');
		
		echo '</div>';
	}
}

echo '</div>';

wp_reset_query();
?>
