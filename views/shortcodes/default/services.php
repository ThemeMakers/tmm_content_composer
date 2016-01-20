<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$content = explode('^', $content);
$titles = explode('^', $titles);
$icons = explode(',', $icons);
?>

<div class="flexslider <?php if ($animation) echo $animation ?>">

    <ul class="slides">

        <?php if (!empty($content)): ?>
            <?php foreach ($content as $key => $text): ?>

                <li data-icon="<?php echo $icons[$key] ?>" data-title="<?php echo $titles[$key] ?>">
                    <p><?php echo $text ?></p>
                </li>

            <?php endforeach; ?>
        <?php endif; ?>

    </ul>
</div><!--/ .flexslider-->