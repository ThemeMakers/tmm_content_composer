<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles = explode('^', $title);
$colors = explode('^', $color);
$percentages = explode('^', $percentage);
?>

<ul class="progress-list-shortcode">
	<?php if (!empty($colors)){ ?>
		<?php foreach ($colors as $key => $color) { ?>
			<li>
				<div class="progress-bar">
					<div class="progress-title">
						<div class="progressbar-title"><?php echo esc_html($titles[$key]) ?></div>
					</div><!--/ .progressbar-title-wrap-->
					<div class="progress-bar-outer">
						<div data-progress="<?php echo esc_attr($percentages[$key]/10) ?>" class="bar" style="background-color: <?php echo $color; ?>"></div>
					</div><!--/ .bar-outer-->
					<span class="progress-percent"><?php echo $percentages[$key]; ?>%</span>
				</div><!--/ .progress-bar-->
			</li>
			<?php } ?>
	<?php } ?>
</ul>
