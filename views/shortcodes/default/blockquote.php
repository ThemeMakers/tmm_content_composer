<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<blockquote class="blockquote">
    <p>
        <?php echo esc_html($content); ?>
    </p>
    <?php if (isset($author)&&(!empty($author))){ ?>
    <div class="quote-meta">
        <?php echo esc_html($author); ?>
    </div>
    <?php } ?>
</blockquote>