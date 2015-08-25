<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php $unique_id = uniqid(); ?>

<?php if (!empty($title)): ?>
    <h3><?php echo esc_html($title); ?></h3>
<?php endif; ?>

<?php if (!empty($description)){ ?>
    <p><?php echo esc_html($description); ?></p>
<?php } ?>

<form method="post" class="subscription-form" enctype="multipart/form-data">

    <input type="hidden" name="subscription_form" value="subscription_form_<?php echo $unique_id ?>" />

    <fieldset>
        <?php if ($zipcode){ ?>

	        <div class="row collapse">
		        <div class="medium-12 large-12">
			        <input id="email_<?php echo $unique_id ?>" required type="email" name="subscriber_email" value="" placeholder="<?php echo esc_attr($placeholder); ?>" />
		        </div>
	        </div>

	        <div class="row collapse">
		        <div class="medium-6 large-6 columns">
			        <input id="zipcode_<?php echo $unique_id ?>" required type="text" name="zipcode" value="" placeholder="<?php esc_attr_e('Zip code', TMM_CC_TEXTDOMAIN); ?>" />
		        </div>
		        <div class="medium-6 large-6 columns">
			        <button href="#" class="button submit middle right"><?php esc_attr_e('Submit', TMM_CC_TEXTDOMAIN); ?></button>
		        </div>
	        </div>

        <?php } else { ?>

	    <div class="row collapse">
		    <div class="medium-10 large-10 columns">
			    <input id="email_<?php echo $unique_id ?>" required type="email" name="subscriber_email" value="" placeholder="<?php echo esc_attr($placeholder); ?>" />
		    </div>
		    <div class="medium-2 large-2 columns">
			    <button href="#" class="button submit mail-icon"></button>
		    </div>
	    </div>

        <?php } ?>

    </fieldset>

    <div class="subscription_form_responce" style="display: none;"><ul></ul></div>

</form>