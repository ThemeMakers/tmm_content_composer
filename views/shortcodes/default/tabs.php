<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles_array = explode('^', $titles);
$content_array = explode('^', $content);
?>

<?php if (!empty($content_array)): ?>
<<<<<<< HEAD
	<div class="tabs-holder">
=======
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa

	<div class="content-tabs">

		<ul class="tabs-nav">
			<?php foreach ($titles_array as $key => $value) : ?>
				<li><a href="#"><?php echo $value ?></a></li>
			<?php endforeach; ?>		
		</ul>

		<div class="tabs-container">
			
			<?php foreach ($content_array as $key => $value) : ?>
			
				<div class="tab-content clearfix">
					<p><?php echo do_shortcode($value) ?></p>
				</div><!--/ .tab-content-->
				
			<?php endforeach; ?>

		</div><!--/ .tabs-container-->		

	</div><!--/ .content-tabs-->
	
<?php endif; ?>
