<?php
if (!defined('ABSPATH')) exit();

/* banner classes */
$classes = 'animated_banner';

if ($size == 1) {
	$classes .= ' small';
} else if ($size == 2) {
	$classes .= ' middle';
}

$classes .= ' ' . $animation_type;
$classes = trim($classes);

/* caption styles */
$caption_styles = '';

if (!empty($caption_bg_color)) {
	$caption_styles = 'background-color: rgba(' . TMM_Content_Composer::hex2RGB( $caption_bg_color, 1 ) . ',0.9);';
	$caption_styles = ' style="' . trim($caption_styles) . '"';
}

/* button classes */
$button_classes = 'more';

if (!empty($button_color)) {
	$button_classes .= ' ' . $button_color;
}
?>
<div class="<?php echo esc_attr($classes) ?>">

	<?php if (!empty($bg_image)) { ?>
	<img class="banner_bg" src="<?php echo esc_url($bg_image) ?>" alt="">
	<?php } ?>

	<div class="caption"<?php echo $caption_styles ?>>

		<?php if (!empty($logo)) { ?>
		<div class="banner_logo">
			<img src="<?php echo esc_url($logo) ?>" alt="">
		</div><!-- /.banner_logo -->
		<?php } ?>

		<?php if (!empty($title_1)) { ?>
		<h3 class="banner-title"><?php echo esc_html($title_1) ?></h3>
		<?php } ?>

		<?php if (!empty($title_2)) { ?>
		<h4 class="banner-title"><?php echo esc_html($title_2) ?></h4>
		<?php } ?>

		<?php if (!empty($button_text)) { ?>
		<a href="<?php echo esc_url($button_url) ?>" class="<?php echo esc_attr($button_classes) ?>" title="<?php echo esc_attr($button_text) ?>"><?php echo esc_html($button_text) ?></a>
		<?php } ?>

	</div><!-- /.caption -->

</div><!-- /.animated_banner -->