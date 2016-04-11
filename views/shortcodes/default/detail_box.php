<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
if(!isset($content)) { $content = ''; }
if(!isset($title))   { $title = ''; }
if(!isset($phone))   { $phone = ''; }
if(!isset($email))   { $email = ''; }
if(!isset($fax))     { $fax = ''; }
?>

<h3 class="info-title">
    <?php if (!empty($title)) { ?>
        <?php echo $title ?><br/>
    <?php } ?>
</h3>
<p>
    <?php if (!empty($content)) { ?>
        Address: <?php echo $content ?><br/>
    <?php } ?>

    <?php if (!empty($phone)) { ?>
        Phone: <a href="#"><?php echo $phone ?></a><br/>
    <?php } ?>

    <?php if (!empty($fax)) { ?>
        FAX: <a href="#"><?php echo $fax ?></a><br/>
    <?php } ?>

    <?php if (!empty($email)) { ?>
        E-mail: <a href="#" onclick="window.location.href = 'mailto:<?php echo $email ?>';"><?php echo $email ?></a>
    <?php } ?>
</p>
