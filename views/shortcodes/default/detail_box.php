<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<h3 class="simple-title align-center">
   <?php if (!empty($content)) echo esc_html($content) ?> <br/>
   <?php if (!empty($phone)){ esc_html_e('Call: ', TMM_CC_TEXTDOMAIN) ?><a href="#"><?php echo esc_html($phone) ?></a><?php } ?><?php if (!empty($email)){ esc_html_e(' E-mail: ', TMM_CC_TEXTDOMAIN)?><a href="#"><?php echo esc_html($email) ?></a><?php } ?>
</h3>
