<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles_array = explode('^', $titles);
$content_array = explode('^', $content);
?>
<ul class="accordion">
	<?php if (!empty($content_array)) { ?>
		<?php foreach ($content_array as $key => $value) { ?>
			<li class="accordion-navigation">
				<a href="#" class="acc-trigger" data-mode="<?php echo esc_attr($type); ?>"><?php echo esc_html($titles_array[$key]); ?></a>
				<div class="content">
					<?php echo do_shortcode($value) ?>
				</div>
			</li>
		<?php }
	} ?>
</ul>