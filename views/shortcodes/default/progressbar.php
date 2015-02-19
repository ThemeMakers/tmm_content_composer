<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles = explode('^', $title);
$colors = explode('^', $color);
$percentages = explode('^', $percentage);
?>
	
<?php if (!empty($colors)): ?>
	<?php foreach ($colors as $key => $color) : ?>

		<div class="progress-bar">
			<div class="progressbar-title-wrap">
				<div class="progressbar-title"><?php echo $titles[$key] ?></div>
			</div><!--/ .progressbar-title-wrap-->
			<div class="bar-outer">
				<div data-progress="<?php echo $percentages[$key] ?>" class="bar" style="background-color: <?php echo $color; ?>"></div>
			</div><!--/ .bar-outer-->
			<span class="percent">0%</span>
		</div><!--/ .progress-bar-->

	<?php endforeach; ?>
<?php endif; ?>	