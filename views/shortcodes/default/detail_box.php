<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<h3 class="simple-title align-center">
       <?php if (!empty($content)) echo esc_html($content) ?> <br/>
        <?php if (!empty($phone)){ ?>Call: <a href="#"><?php echo esc_html($phone) ?></a><?php } ?><?php if (!empty($email)){?> E-mail: <a href="#"><?php echo esc_html($email) ?></a><?php } ?>
</h3>
