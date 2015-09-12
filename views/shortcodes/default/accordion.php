<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles_array = explode('^', $titles);
$content_array = explode('^', $content);
?>
<div class="acc-box">
<<<<<<< HEAD
=======
	
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
	<?php if (!empty($content_array)): ?>
		<?php foreach ($content_array as $key => $value) : ?>
	
		<div class="acc-entry">
			
			<span data-mode="<?php echo $type ?>" class="acc-trigger"><a href="#"><?php echo $titles_array[$key] ?></a></span>
			
			<div class="acc-container">
				<p><?php echo do_shortcode($value) ?></p>
			</div><!--/ .acc-container-->
			
		</div><!--/ .acc-entry-->
			
		<?php endforeach; ?>
	<?php endif; ?>
			
</div><!--/ .acc-box-->