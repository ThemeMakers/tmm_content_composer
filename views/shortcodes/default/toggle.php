<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$title_array = array();

if (isset($titles)) {
    $title_array = explode("^", $titles);
}elseif (isset($title)) {
    $title_array = explode("^", $title);
}

$content_array = array();
$content_array = explode("^", $content);
?>
<?php if(count($title_array)>1){ ?>
    <?php foreach ($title_array as $key => $value){ ?>
    <div class="box-toggle">
        
            <span class="trigger"><?php echo $value ?></span>        
            <div class="toggle-container"><?php echo do_shortcode($content_array[$key]) ?></div>
        
    </div>  
    <?php } ?>
<?php } 
else{  ?>
    <div class="box-toggle">
    <?php foreach ($title_array as $key => $value){ ?>
        <span class="trigger"><?php echo $value ?></span>
    <?php } ?>
    <?php foreach ($content_array as $key => $value){ ?>
        <div class="toggle-container"><?php echo do_shortcode($value) ?></div>
    <?php } ?>
</div>
<?php } ?>