<?php
$column_class = '';
switch ($count) {
	case 2:
		$column_class = 'eight columns';
		break;
	case 3:
		$column_class = 'one-third column';
		break;
	case 4:
		$column_class = 'four columns';
		break;
}

$args = array();
if ($posts_category > 0) {
	$args = array('numberposts' => $count, 'category' => $posts_category);
} else {
	$args = array('numberposts' => $count);
}

$posts = get_posts($args);

echo '<div class="entry row_margin">';

foreach ($posts as $post) {
	echo '<div class="' . $column_class . '">';
	echo do_shortcode('[single_post show_content="1" char_count="' . $char_count . '" show_post_type_media="1" show_post_metadata="' . $show_post_metadata . '" show_readmore_button="' . $show_readmore_button . '" button_color="default" button_size="small"]' . $post->ID . '[/single_post]');
	echo '</div>';
}

echo '</div>';

?>
<div class="clear"></div>
