<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Dealers Number', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'user_number',
			'id' => 'user_number',
			'default_value' => TMM_Content_Composer::set_default_value('user_number', 9),
			'description' => '',
		));
		?>

    </div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Display Order', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'order',
			'id' => 'order',
			'options' => array(
				'DESC' => __('Latest First', TMM_CC_TEXTDOMAIN),
				'ASC' => __('Oldest First', TMM_CC_TEXTDOMAIN),
				'random' => __('Random', TMM_CC_TEXTDOMAIN)
			),
			'default_value' => TMM_Content_Composer::set_default_value('order', 'DESC'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		$packets = TMM_Cardealer_User::get_user_roles();
		$dealer_types = array(
			'0' => __('All', TMM_CC_TEXTDOMAIN),
			'1' => __('All without Administrator', TMM_CC_TEXTDOMAIN),
			'administrator' => __('Administrator', TMM_CC_TEXTDOMAIN),
		);

		foreach ($packets as $key => $value) {
			$dealer_types[$key] = $value['name'];
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Dealer Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'dealer_type',
			'id' => 'dealer_type',
			'css_classes' => 'widget_dealer_type',
			'options' => $dealer_types,
			'default_value' => TMM_Content_Composer::set_default_value('dealer_type', '0'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		$dealer_type = TMM_Content_Composer::set_default_value('dealer_type', '0');
		$dealers = array(
			'' => __('All', TMM_CC_TEXTDOMAIN),
		);

		$args = array();

		if (!empty($dealer_type) && $dealer_type !== '1') {
			$args['role'] = $dealer_type;
		}
		$users = get_users($args);

		foreach ($users as $value) {
			if ($dealer_type === '1' && !empty($value->caps['administrator'])) {
				continue;
			}
			$dealers[$value->ID] = $value->user_nicename;
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Specific Dealer', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'specific_dealer',
			'id' => 'specific_dealer',
			'css_classes' => 'widget_specific_dealer',
			'options' => $dealers,
			'default_value' => TMM_Content_Composer::set_default_value('specific_dealer', '0'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->


	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Dealer Logo', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_dealer_logo',
			'id' => 'show_dealer_logo',
			'is_checked' => TMM_Content_Composer::set_default_value('show_dealer_logo', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Dealer Bio', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_dealer_bio',
			'id' => 'show_dealer_bio',
			'is_checked' => TMM_Content_Composer::set_default_value('show_dealer_bio', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Phone', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_phone',
			'id' => 'show_phone',
			'is_checked' => TMM_Content_Composer::set_default_value('show_phone', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Cell Phone', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_mobile',
			'id' => 'show_mobile',
			'is_checked' => TMM_Content_Composer::set_default_value('show_mobile', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Fax', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_fax',
			'id' => 'show_fax',
			'is_checked' => TMM_Content_Composer::set_default_value('show_fax', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Email', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_email',
			'id' => 'show_email',
			'is_checked' => TMM_Content_Composer::set_default_value('show_email', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Skype ID', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_skype',
			'id' => 'show_skype',
			'is_checked' => TMM_Content_Composer::set_default_value('show_skype', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Website Url', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_site',
			'id' => 'show_site',
			'is_checked' => TMM_Content_Composer::set_default_value('show_site', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Postal Address', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_address',
			'id' => 'show_address',
			'is_checked' => TMM_Content_Composer::set_default_value('show_address', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display Map Location', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_map',
			'id' => 'show_map',
			'is_checked' => TMM_Content_Composer::set_default_value('show_map', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Excerpt Bio symbol count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'dealer_bio_symbols_count',
			'id' => 'dealer_bio_symbols_count',
			'default_value' => TMM_Content_Composer::set_default_value('dealer_bio_symbols_count', 100),
			'description' => '',
		));
		?>

	</div><!--/ .one-half-->

</div>

<script type="text/javascript">

	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
	});

</script>

