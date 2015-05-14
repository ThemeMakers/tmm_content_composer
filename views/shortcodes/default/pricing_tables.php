<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<section class="simple-pricing-table col-<?php echo $count ?> clearfix">    
	<?php
	$content = str_replace('__PRICE_TABLE__', '[price_table effect_type='.$effect_type, $content);
	$content = str_replace('__PRICE_TABLE_CLOSE__', ']', $content);
	$content = str_replace('__PRICE_TABLE_END__', '[/price_table]', $content);
	echo do_shortcode(str_replace('<br />', '', $content));    
	?>
</section>