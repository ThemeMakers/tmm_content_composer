<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<blockquote class="quote-text <?php echo (isset($type)) ? $type : '' ?>"> <p><?php echo $content ?></p>
    <?php if (isset($author)&&(!empty($author))){ ?>
        <span class="post-quote-author"><?php echo $author ?></span>
    <?php } ?>
</blockquote>