<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$titles_array = explode('^', $titles);
$content_array = explode('^', $content);
?>

<?php if (!empty($content_array)): ?>

<div class="content-tabs">

	<ul class="tabs-nav clearfix">
		<?php foreach ($titles_array as $key => $value) : ?>
			<li><a href="#<?php echo 'tab-' . $key ?>"><?php echo $value ?></a></li>
		<?php endforeach; ?>		
	</ul>

	<div class="tabs-container">
		<?php foreach ($content_array as $key => $value) : ?>
			<div id="<?php echo 'tab-' . $key ?>" class="tab-content">
				<p><?php echo $value ?></p>
			</div><!--/ .tab-content-->
		<?php endforeach; ?>

	</div><!--/ .tabs-container-->	
	
</div><!--/ .content-tabs-->

<?php endif; ?>
