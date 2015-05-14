<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles = explode('^', $title);
$from = explode('^', $from);
$to = explode('^', $to);
?>
<?php if (!empty($titles)): ?>
	<div class="counter-box">

		<?php foreach ($titles as $key => $title) : ?>
			<div data-from="<?php echo esc_attr($from[$key]) ?>" data-to="<?php echo esc_attr($to[$key]) ?>" data-speed="<?php echo esc_attr($speed) ?>" class="counter <?php if ($animation) echo esc_attr($animation) ?>">
				<span class="count"></span>
				<h4 class="details"><?php echo esc_html($title) ?></h4>
			</div><!--/ .counter-->	
		<?php endforeach; ?>
			
	</div><!--/ .counter-box-->	
<?php endif; ?>


