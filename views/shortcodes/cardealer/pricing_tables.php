<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<section class="pricing-table col<?php echo $count ?> clearfix">
	<?php
	$content = str_replace('__PRICE_TABLE__', '[price_table', $content);
	$content = str_replace('__PRICE_TABLE_CLOSE__', ']', $content);
	$content = str_replace('__PRICE_TABLE_END__', '[/price_table]', $content);
	$content = str_replace('<br />', '', $content);
	$content = str_replace('&#8221;', '"', $content);
	$content = str_replace('&#8243;', '"', $content);
	echo do_shortcode($content);
	?>
</section>