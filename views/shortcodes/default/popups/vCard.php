<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Organization Name', 'tmm_content_composer'),
			'shortcode_field' => 'name',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('name', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Address', 'tmm_content_composer'),
			'shortcode_field' => 'address',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('address', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter City', 'tmm_content_composer'),
			'shortcode_field' => 'city',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('city', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Region', 'tmm_content_composer'),
			'shortcode_field' => 'region',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('region', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Postal Code', 'tmm_content_composer'),
			'shortcode_field' => 'postal_code',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('postal_code', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Country', 'tmm_content_composer'),
			'shortcode_field' => 'country',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('country', ''),
			'description' => ''
		));
		?>

    </div>

    <div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Phone', 'tmm_content_composer'),
			'shortcode_field' => 'phone',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('phone', ''),
			'description' => ''
		));
		?>
		
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Fax', 'tmm_content_composer'),
			'shortcode_field' => 'fax',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('fax', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Enter Email', 'tmm_content_composer'),
			'shortcode_field' => 'email',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('email', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show Labels', 'tmm_content_composer'),
			'shortcode_field' => 'labels',
			'id' => 'tmm-labels',
			'is_checked' => TMM_Content_Composer::set_default_value('labels', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show Icons', 'tmm_content_composer'),
			'shortcode_field' => 'icons',
			'id' => 'tmm-icons',
			'is_checked' => TMM_Content_Composer::set_default_value('icons', 1),
			'description' => ''
		));
		?>

    </div><!--/ .fullwidth-->

</div><!--/ .tmm_shortcode_template->

<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
		var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
		
		jQuery(function() {			
			tmm_ext_shortcodes.changer(shortcode_name);
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});

		});
    </script>
	