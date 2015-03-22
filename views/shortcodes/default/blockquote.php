<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<blockquote class="blockquote">
    <p>
        <?php echo $content ?>
    </p>
    <?php if (isset($author)&&(!empty($author))){ ?>
    <div class="quote-meta">
        <?php echo $author ?>
    </div>
    <?php } ?>
</blockquote>