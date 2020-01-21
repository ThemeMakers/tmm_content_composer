<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<ul class="our-contacts">
    <?php if (!empty($content)): ?>
        <li class="address"><b><?php esc_html_e('Address Info', 'tmm_content_composer') ?>:</b> <?php echo esc_html( $content ) ?></li>
    <?php endif; ?>
    <?php if (!empty($phone)): ?>
        <li class="phone"><b><?php esc_html_e('Phone', 'tmm_content_composer') ?>:</b> <?php echo esc_html( $phone ) ?> </li>
    <?php endif; ?>
			
	<?php if (!empty($fax)): ?>
        <li class="fax"><b><?php esc_html_e('FAX', 'tmm_content_composer') ?>:</b> <?php echo esc_html( $fax ) ?></li>
	<?php endif; ?>   

    <?php if (!empty($email)): ?>
        <li class="email"><b><?php esc_html_e('Email', 'tmm_content_composer') ?>:</b> <a href="mailto:<?php echo sanitize_email( $email ) ?>"><?php echo sanitize_email( $email ) ?></a></li>
    <?php endif; ?>
</ul>