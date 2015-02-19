<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<h3 class="simple-title align-center">
       <?php if (!empty($content)) echo $content ?> <br/>
        <?php if (!empty($phone)){ ?>Call: <a href="#"><?php echo $phone ?></a><?php } ?><?php if (!empty($email)){?> E-mail: <a href="#"><?php echo $email ?></a><?php } ?>
</h3>
