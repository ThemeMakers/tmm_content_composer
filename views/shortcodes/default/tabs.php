<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles_array = explode('^', $titles);
$content_array = explode('^', $content);
?>

<?php if (!empty($content_array)): ?>
	<div class="lc-tabs-holder">

		<ul class="lc-tabs-nav">
			<?php foreach ($titles_array as $key => $value) : ?>
				<li><h3><?php echo esc_html($value) ?></h3></li>
			<?php endforeach; ?>		
		</ul>

		<div class="lc-tabs-container">
			<?php foreach ($content_array as $key => $value) : ?>
				<div class="lc-tab-content">
					<p><?php echo do_shortcode($value) ?></p>
				</div><!--/ .tab-content-->
			<?php endforeach; ?>

		</div><!--/ .tabs-container-->		

	</div><!--/ .tabs-holder-->
	
<?php endif;


