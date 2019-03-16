<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<ul class="our-contacts">
    <?php if (!empty($content)): ?>
            <li class="address"><b><?php esc_html_e('Address Info', TMM_CC_TEXTDOMAIN) ?>:</b> <?php echo $content ?></li>
    <?php endif; ?>
    <?php if (!empty($phone)): ?>
            <li class="phone"><b><?php esc_html_e('Phone', TMM_CC_TEXTDOMAIN) ?>:</b> <?php echo $phone ?> </li>
    <?php endif; ?>
			
	<?php if (!empty($fax)): ?>
		<li class="fax"><b><?php esc_html_e('FAX', TMM_CC_TEXTDOMAIN) ?>:</b> <?php echo $fax ?></li>
	<?php endif; ?>   

    <?php if (!empty($email)): ?>
            <li class="email"><b><?php esc_html_e('Email', TMM_CC_TEXTDOMAIN) ?>:</b> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
    <?php endif; ?>
</ul>