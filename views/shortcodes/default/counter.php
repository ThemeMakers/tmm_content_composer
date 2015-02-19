<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles = explode('^', $title);
$from = explode('^', $from);
$to = explode('^', $to);
?>
<?php if (!empty($titles)): ?>
	<div class="counter-box">

		<?php foreach ($titles as $key => $title) : ?>
			<div data-from="<?php echo $from[$key] ?>" data-to="<?php echo $to[$key] ?>" data-speed="<?php echo $speed ?>" class="counter <?php if ($animation) echo $animation ?>">
				<span class="count"></span>
				<h4 class="details"><?php echo $title ?></h4>
			</div><!--/ .counter-->	
		<?php endforeach; ?>
			
	</div><!--/ .counter-box-->	
<?php endif; ?>


