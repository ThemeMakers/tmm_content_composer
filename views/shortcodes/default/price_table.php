<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div class="column<?php if ($featured == 1) echo ' featured' ?> <?php echo $effect_type; ?>">
    
	<div class="header">
		<h5 class="title"><?php echo $title ?></h5>
		<div class="price">
			<h2 class="cost"><?php echo $price ?></h2>
			<span class="description"><?php echo $period ?></span>
		</div><!--/ .price-->
	</div><!-- .header -->
	<?php $content = explode('^', $content); ?>
	<?php if (!empty($content)): ?>
		<ul class="features">
			<?php foreach ($content as $text) : ?>
				<li><?php echo $text ?></li>
			<?php endforeach; ?>
		</ul><!-- .features -->
	<?php endif; ?>

	<div class="footer">
		<a href="<?php echo $button_link ?>" class="button default-white middle"><?php echo $button_text ?></a>
	</div>

</div><!-- .column -->
