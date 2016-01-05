<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$title_array = array();
$title_array = explode("+TITLE+", $title);
$content_array = array();
$content_array = explode("+CONTENT+", $content);
$unique_id = uniqid();
$tmp_id = $unique_id;
?>

<div class="content-tabs <?php echo $type ?>">

    <?php if (!empty($title_array)): ?>
        <ul class="tabs-nav clearfix">
            <?php foreach ($title_array as $key => $value) : ?>
                <li <?php if ($key == 0): ?>class="active"<?php endif; ?>><a href="#tab_<?php echo $tmp_id; ?>"><?php echo $value ?></a></li>
                <?php $tmp_id = $tmp_id . $key; ?>
            <?php endforeach; ?>
        </ul><!--/ .tabs-nav -->
    <?php endif; ?>
		
    <div class="tabs-container">
        <?php $tmp_id = $unique_id; ?>
        <?php if (!empty($title_array)): ?>
            <?php foreach ($content_array as $key => $value) : ?>
                <div id="tab_<?php echo $tmp_id; ?>" class="tab-content" style="display: <?php if ($key == 0): ?>block<?php else: ?>none<?php endif; ?>;">
                    <p><?php echo do_shortcode($value) ?></p>
                </div><!--/ .tab-content -->
                <?php $tmp_id = $tmp_id . $key; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div><!-- .tabs-container -->

</div>


