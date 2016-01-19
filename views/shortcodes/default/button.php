<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php

$styles = "";
// Styles
if (!empty($styles)) {
    $styles = 'style="' . $styles . '"';
}
?>

<?php if (isset($align)): ?>

    <div class="<?php echo $align ?> <?php if ($animation) echo $animation ?>">
        <a href="<?php echo $url ?>" <?php echo ($styles ? $styles : '') ?> class="button <?php echo $size ?> <?php echo $color ?>"><?php echo $content ?></a>
    </div>

<?php else: ?>

    <a href="<?php echo $url ?>" <?php echo ($styles ? $styles : '') ?> class="button <?php echo $size ?> <?php echo $color ?> <?php if ($animation) echo $animation ?>"><?php echo $content ?></a>

<?php endif; ?>
