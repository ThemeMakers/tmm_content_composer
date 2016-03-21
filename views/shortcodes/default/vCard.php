<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php if (!empty($name)): ?>
	<h4 class="fn org"><span class="organization-name"><?php echo esc_html($name) ?></span></h4>
<?php endif; ?>

<ul class="lc-vCard">
	<?php if (!empty($address) || !empty($city) || !empty($region) || !empty($postal_code) || !empty($country)): ?>
        <li<?php echo !empty($icons) ? ' class="icon-address"' : ''; ?>>
            <?php echo !empty($icons) ? '<span class="table">' : ''; ?>

	            <?php if (!empty($labels)): ?>
	                <span class="label"><?php _e('Address', 'tmm_content_composer') ?>:</span>
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

            <?php echo !empty($icons) ? '</span>' : ''; ?>
        </li>
    <?php endif; ?>

    <?php if (!empty($phone)): ?>
        <li<?php echo !empty($icons) ? ' class="icon-phone"' : ''; ?>>
            <span class="tel">
            <?php if (!empty($labels)): ?>
	            <span class="label type"><?php _e('Phone', 'tmm_content_composer') ?>:</span>
            <?php endif; ?>
	            <span class="value"><?php echo esc_html($phone) ?></span>
	        </span>
        </li>
    <?php endif; ?>
			
	<?php if (!empty($fax)): ?>
		<li<?php echo !empty($icons) ? ' class="icon-print"' : ''; ?>>
			<span class="tel">
			<?php if (!empty($labels)): ?>
				<span class="label type"><?php _e('Fax', 'tmm_content_composer') ?>:</span>
			<?php endif; ?>
				<span class="value"><?php echo esc_html($fax) ?></span>
			</span>
		</li>
	<?php endif; ?>   

    <?php if (!empty($email)): ?>
        <li<?php echo !empty($icons) ? ' class="icon-email"' : ''; ?>>
		    <?php if (!empty($labels)): ?>
			    <span class="label"><?php _e('Email', 'tmm_content_composer') ?>:</span>
		    <?php endif; ?>
		    <span class="email"><?php echo esc_html($email) ?></span>
        </li>
    <?php endif; ?>
</ul>