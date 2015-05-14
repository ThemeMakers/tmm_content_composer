<?php
$column_class = '';
switch ($count) {
	case 2:
		$column_class = 'col-sm-6';
		break;
	case 3:
		$column_class = 'col-sm-4';
		break;
	case 4:
		$column_class = 'col-sm-3';
		break;
}

$args = array();
if ($posts_category > 0) {
	$args = array('numberposts' => $count, 'category' => $posts_category, 'suppress_filters' => false);
} else {
	$args = array('numberposts' => $count, 'suppress_filters' => false);
}

$posts = get_posts($args);

echo '<div class="row"><div class="entry">';

foreach ($posts as $post) {
	echo '<div class="' . $column_class . '">';
	echo do_shortcode('[single_post show_content="1" char_count="' . $char_count . '" show_post_type_media="1" show_post_metadata="' . $show_post_metadata . '" show_readmore_button="' . $show_readmore_button . '" button_color="default" button_size="small"]' . $post->ID . '[/single_post]');
	echo '</div>';
}

echo '</div></div>';

?>
<div class="clear"></div>
