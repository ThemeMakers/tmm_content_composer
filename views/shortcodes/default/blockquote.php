<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<blockquote class="blockquote">
    <p class="message">
        <?php echo $content ?>
    </p>
    <?php if (isset($author)&&(!empty($author))){ ?>
    <div class="quote-meta">
        <div class="quote-author">
            <?php echo $author ?>
        </div>
    </div>
    <?php } ?>
</blockquote>