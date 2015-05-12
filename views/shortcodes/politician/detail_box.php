<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<ul class="contact-details">
	<?php if (!empty($content)): ?>
		<li>
			<strong><?php _e('Address', 'tmm_shortcodes') ?>:</strong>
			<span><?php echo $content ?></span>
		</li>
	<?php endif; ?>
	<?php if (!empty($phone)): ?>
		<li>
			<strong><?php _e('Phone', 'tmm_shortcodes') ?>:</strong> 
			<span><?php echo $phone ?></span>
		</li>
	<?php endif; ?>
	<?php if (!empty($fax)): ?>
		<li>
			<strong><?php _e('FAX', 'tmm_shortcodes') ?>:</strong> 
			<span><?php echo $fax ?></span>
		</li>
	<?php endif; ?>
	<?php if (!empty($email)): ?>
		<li>
			<strong><?php _e('Email', 'tmm_shortcodes') ?>:</strong>
			<span><a href="mailto:<?php echo $email ?>"> <?php echo $email ?></a></span>
		</li>
	<?php endif; ?>
	<?php if (!empty($skype)): ?>
		<li>
			<strong><?php _e('Skype', 'tmm_shortcodes') ?>:</strong> 
			<span><?php echo $skype ?></span>
		</li>
	<?php endif; ?>
</ul>
