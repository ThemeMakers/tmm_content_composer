<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
if (!isset($color)) { $color = 'default'; }
if (!isset($size))  { $size = 'small'; }
if (!isset($text))  { $text = ''; }
if (!isset($url))   { $url = '#'; }
?>

<a href="<?php echo $url ?>" class="button <?php echo $color ?> <?php echo $size ?>">
    <?php echo $text ?>
</a>
