<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div class="column opacity<?php if ($featured == 1) echo ' featured' ?>">

	<header class="header">
		<h5 class="title"><?php echo esc_html($title) ?></h5>
	</header><!-- .header -->

	<div class="price">
		<h2 class="cost"><?php echo esc_html($price) ?></h2>
		<span class="description"><?php echo esc_html($period) ?></span>
	</div><!--/ .price-->

	<?php $content = explode('^', $content); ?>

	<?php if (!empty($content)): ?>

		<ul class="features">
			<?php foreach ($content as $text): ?>
				<li><?php echo esc_html($text) ?></li>
			<?php endforeach; ?>
		</ul><!-- .features -->

	<?php endif; ?>

	<footer class="footer">
		<a class="button default" href="<?php echo esc_url($button_link) ?>"><?php echo esc_html($button_text) ?></a>
	</footer><!-- .footer -->

</div><!-- .column -->

