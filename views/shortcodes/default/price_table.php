<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div class="column<?php if ($featured == 1) echo ' featured' ?> <?php echo $effect_type; ?>">
    
	<div class="header">
		<h5 class="title"><?php echo esc_html($title) ?></h5>
		<div class="price">
			<h2 class="cost"><?php echo esc_html($price) ?></h2>
			<span class="description"><?php echo esc_html($period) ?></span>
		</div><!--/ .price-->
	</div><!-- .header -->
	<?php $content = explode('^', $content); ?>
	<?php if (!empty($content)): ?>
		<ul class="features">
			<?php foreach ($content as $text) : ?>
				<li><?php echo esc_html($text) ?></li>
			<?php endforeach; ?>
		</ul><!-- .features -->
	<?php endif; ?>

	<div class="footer">
		<a href="<?php echo esc_url($button_link) ?>" class="button default-white middle"><?php echo esc_html($button_text) ?></a>
	</div>

</div><!-- .column -->
