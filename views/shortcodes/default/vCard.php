<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<ul class="our-contacts">

    <?php if (!empty($name)): ?>
        <li class="name<?php echo !empty($icons) ? ' icon-sitemap' : ''; ?>">
            <?php if (!empty($labels)): ?>
            <b><?php _e('Organization Name', 'tmm_content_composer') ?>:</b>
            <?php endif; ?>
	        <?php echo esc_html($name) ?>
        </li>
    <?php endif; ?>

	<?php if (!empty($address) || !empty($city) || !empty($region)): ?>
            <li class="address<?php echo !empty($icons) ? ' icon-address' : ''; ?>">
	            <?php if (!empty($labels)): ?>
	            <b><?php _e('Address Info', 'tmm_content_composer') ?>:</b>
	            <?php endif; ?>
	            <?php if (!empty($address)): ?>
		            <span class="street-address"><?php echo esc_html($address) ?></span>,
	            <?php endif; ?>

	            <?php if (!empty($city)): ?>
		            <span class="locality"><?php echo esc_html($city); ?></span>,<br>
	            <?php endif; ?>

	            <?php if (!empty($region)): ?>
		            <span class="region"><?php echo esc_html($region); ?></span>&nbsp;
	            <?php endif; ?>

	            <?php if (!empty($postal_code)): ?>
		            <span class="postal-code"><?php echo esc_html($postal_code); ?></span>&nbsp;
	            <?php endif; ?>

	            <?php if (!empty($country)): ?>
		            <span class="country"><?php echo esc_html($country); ?></span>
	            <?php endif; ?>
            </li>
    <?php endif; ?>
    <?php if (!empty($phone)): ?>
            <li class="phone<?php echo !empty($icons) ? ' icon-phone' : ''; ?>">
                <?php if (!empty($labels)): ?>
	            <b><?php _e('Phone', 'tmm_content_composer') ?>:</b>
                <?php endif; ?>
	            <?php echo esc_html($phone) ?>
            </li>
    <?php endif; ?>
			
	<?php if (!empty($fax)): ?>
		<li class="fax<?php echo !empty($icons) ? ' icon-print' : ''; ?>">
			<?php if (!empty($labels)): ?>
			<b><?php _e('FAX', 'tmm_content_composer') ?>:</b>
			<?php endif; ?>
			<?php echo esc_html($fax) ?>
		</li>
	<?php endif; ?>   

    <?php if (!empty($email)): ?>
            <li class="email<?php echo !empty($icons) ? ' icon-email' : ''; ?>">
	            <?php if (!empty($labels)): ?>
	            <b><?php _e('Email', 'tmm_content_composer') ?>:</b>
	            <?php endif; ?>
	            <a href="mailto:<?php echo esc_attr($email) ?>"><?php echo esc_html($email) ?></a>
            </li>
    <?php endif; ?>
</ul>