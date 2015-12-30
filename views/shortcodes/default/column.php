<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php

// default values
if ( !isset($type) ) {
    $type = 'one-third';
}
if ( !isset($content) ) {
    $content = '';
}
$content = do_shortcode($content);


switch ($type) {
    case 'one-third':
        ?>
        <div class="one-third column"><?php echo $content ?></div>
        <?php
        break;
    case 'one-fourth':
        ?>
        <div class="four columns"><?php echo $content ?></div>
        <?php
        break;
    case 'one-fifth':
        ?>
        <div class="five columns"><?php echo $content ?></div>
        <?php
        break;
    case 'one-half':
        ?>
        <div class="eight columns"><?php echo $content ?></div>
        <?php
        break;
    case 'two-third':
        ?>
        <div class="two-thirds column"><?php echo $content ?></div>
        <?php
        break;
    case 'three-fourth':
        ?>
        <div class="twelve columns"><?php echo $content ?></div>
        <?php
        break;

    default:
        ?>
        <div class="sixteen columns"><?php echo $content ?></div>
        <?php
        break;
}

