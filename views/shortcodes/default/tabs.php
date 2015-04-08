<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles_array = explode('^', $titles);
$content_array = explode('^', $content);
?>

<?php if (!empty($content_array)): ?>
	<div class="tabs-holder <?php echo esc_attr($type_style); ?>">

		<ul class="tabs-nav clearfix">
			<?php foreach ($titles_array as $key => $value) : ?>
				<li><h3><?php echo esc_html($value) ?></h3></li>
			<?php endforeach; ?>		
		</ul>

		<div class="tabs-container clearfix">
			<?php foreach ($content_array as $key => $value) : ?>
				<div class="tab-content">
					<?php echo do_shortcode($value) ?>
				</div><!--/ .tab-content-->
			<?php endforeach; ?>

		</div><!--/ .tabs-container-->		

	</div><!--/ .tabs-holder-->
	
<?php endif;