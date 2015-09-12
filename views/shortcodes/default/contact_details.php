<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<ul class="our-contacts">
    <?php if (!empty($content)): ?>
            <li class="address"><b><?php _e('Address Info', TMM_CC_TEXTDOMAIN) ?>:</b> <?php echo $content ?></li>
    <?php endif; ?>
    <?php if (!empty($phone)): ?>
            <li class="phone"><b><?php _e('Phone', TMM_CC_TEXTDOMAIN) ?>:</b> <?php echo $phone ?> </li>
    <?php endif; ?>
			
	<?php if (!empty($fax)): ?>
		<li class="fax"><b><?php _e('FAX', TMM_CC_TEXTDOMAIN) ?>:</b> <?php echo $fax ?></li>
	<?php endif; ?>   

    <?php if (!empty($email)): ?>
            <li class="email"><b><?php _e('Email', TMM_CC_TEXTDOMAIN) ?>:</b> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
    <?php endif; ?>
</ul>