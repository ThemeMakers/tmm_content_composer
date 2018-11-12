<?php if (!defined('ABSPATH')) die('No direct access allowed');

$title_styles = 'style="';
if (!empty($title_align)) {
	$title_styles.="text-align: " . $title_align . ";";
}
$title_styles.='"';

$text_styles = 'style="';
if (!empty($text_align)) {
	$text_styles.="text-align: " . $text_align . ";";
}
$text_styles.='"';

$post_id = isset($post_id) ? $post_id : '';
$char_count = isset($char_count) ? $char_count : '';
$show_featured_image = isset($show_featured_image) ? $show_featured_image : '';
$show_readmore_button = isset($show_readmore_button) ? $show_readmore_button : '';

$post = get_post($post_id);
$post_link = get_permalink($post_id);
$text = "";


if ($char_count > 0) {
	if ($content) {
		$text = ThemeMakersHelper::cut_text($post->post_content, $char_count);
	} else {
		$text = ThemeMakersHelper::cut_text($post->post_excerpt, $char_count);
	}
}

$image_url = "";
if ($show_featured_image) {
	if ($show_featured_image == 1) {
		if ($thumb_height) {
			$image_url = ThemeMakersHelper::get_post_featured_image($post_id, $thumb_width, true, $thumb_height);
		} else {
			$image_url = ThemeMakersHelper::get_post_featured_image($post_id, $thumb_width);
		}
	} else if ($show_featured_image == 2) {
		if (!empty($custom_image_link)) {
			if ($thumb_height) {
				$image_url = ThemeMakersHelper::resize_image($custom_image_link, $thumb_width, true, $thumb_height);
			} else {
				$image_url = ThemeMakersHelper::resize_image($custom_image_link, $thumb_width);
			}
		}
	} else if ($show_featured_image == 3) {
		if ($thumb_height) {
			$image_url = ThemeMakersHelper::get_post_featured_image($post_id, $thumb_width, true, $thumb_height);
		} else {
			$image_url = ThemeMakersHelper::get_post_featured_image($post_id, $thumb_width);
		}
	}
}
?>



<div class="detailimg">

	<?php if ($show_featured_image) : ?>

		<div class="bordered">

			<figure class="add-border">
				<a class="<?php echo ($show_featured_image == 3 ? "single-image" : "") ?> picture-icon" title="<?php echo @$post_title ?>"  href="<?php echo ($show_featured_image == 3 ? $image_url : $post_link) ?>">
					<img src="<?php echo $image_url ?>" alt="<?php echo $post->post_title ?>" />
				</a>
			</figure><!--/ .add-border-->

		</div><!--/ .bordered-->

	<?php endif; ?>

    <h5 <?php echo $title_styles ?>><?php echo $post->post_title ?></h5>

    <p <?php echo $text_styles ?>><?php echo do_shortcode($text) ?> ...</p>

	<?php if ($show_readmore_button) : ?>   

		<p <?php echo $text_styles ?>>
			<?php echo do_shortcode('[button url="' . $post_link . '" color="' . $button_color . '" size="' . $button_size . '"]' . __('Read more', TMM_CC_TEXTDOMAIN) . '[/button]') ?>
		</p>

	<?php endif; ?>	

</div><!--/ .detailimg-->

