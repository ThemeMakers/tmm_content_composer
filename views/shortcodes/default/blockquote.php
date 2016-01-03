<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<blockquote class="lc-quote <?php echo (isset($type)) ?  esc_attr($type) : '' ?>"> <p><?php echo esc_html($content) ?></p>
    <?php if (isset($author)&&(!empty($author))){ ?>
        <span class="author"><?php echo esc_html($author) ?></span>
    <?php } ?>
</blockquote>