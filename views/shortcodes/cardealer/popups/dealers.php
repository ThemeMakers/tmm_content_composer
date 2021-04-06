<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">
		<div class="one-half">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Dealers Per Page', 'tmm_content_composer'),
				'shortcode_field' => 'users_per_page',
				'id' => 'users_per_page',
				'default_value' => TMM_Content_Composer::set_default_value('users_per_page', 10),
				'description' => esc_html__('By default 3 dealers will be displayed.', 'tmm_content_composer'),
			));
			?>

	    </div><!--/ .one-half-->

        <div class="one-half">

            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'select',
                'title' => esc_html__('Display Order', 'tmm_content_composer'),
                'shortcode_field' => 'order',
                'id' => 'order',
                'options' => array(
                    'DESC' => esc_html__('Latest First', 'tmm_content_composer'),
                    'ASC' => esc_html__('Oldest First', 'tmm_content_composer'),
                    'random' => esc_html__('Random', 'tmm_content_composer')
                ),
                'default_value' => TMM_Content_Composer::set_default_value('order', 'DESC'),
                'description' => ''
            ));
            ?>

        </div><!--/ .one-half-->

        <div class="one-half">

            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'checkbox',
                'title' => esc_html__('Enable location filter', 'tmm_content_composer'),
                'shortcode_field' => 'enable_location_filter',
                'id' => 'enable_location_filter',
                'is_checked' => TMM_Content_Composer::set_default_value('enable_location_filter', 1),
                'description' => ''
            ));
            ?>

        </div><!--/ .one-half-->

        <div class="one-half">

            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'text',
                'title' => esc_html__('Select region to filter by', 'tmm_content_composer'),
                'shortcode_field' => 'filter_by_key_region',
                'id' => 'filter_by_key_region',
                'default_value' => TMM_Content_Composer::set_default_value('filter_by_key_region', ''),
                'description' => esc_html__('Following field allows you filtering dealers by their location. Say entering a key `Berlin` will display all the dealers from region `Berlin`. Important: Filter applies only for Region address field', 'tmm_content_composer'),
            ));
            ?>

        </div><!--/ .one-half-->

		<div class="one-half">

			<?php
			$packets = TMM_Cardealer_User::get_user_roles();
			$dealer_types = array(
				'0' => esc_html__('All', 'tmm_content_composer'),
				'1' => esc_html__('All without Administrator', 'tmm_content_composer'),
				'administrator' => esc_html__('Administrator', 'tmm_content_composer'),
			);

			foreach ($packets as $key => $value) {
				$dealer_types[$key] = $value['name'];
			}

			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Dealer Type', 'tmm_content_composer'),
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
				'' => esc_html__('All', 'tmm_content_composer'),
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
				'title' => esc_html__('Specific Dealer', 'tmm_content_composer'),
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
				'title' => esc_html__('Display Dealer Logo', 'tmm_content_composer'),
				'shortcode_field' => 'show_dealer_logo',
				'id' => 'show_dealer_logo',
				'is_checked' => TMM_Content_Composer::set_default_value('show_dealer_logo', 1),
				'description' => ''
			));
			?>

		</div><!--/ .one-half-->

	</div>
	<div class="column">

		<div class="one-half">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => esc_html__('Display Dealer Bio', 'tmm_content_composer'),
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
				'title' => esc_html__('Display Phone', 'tmm_content_composer'),
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
				'title' => esc_html__('Display Cell Phone', 'tmm_content_composer'),
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
				'title' => esc_html__('Display Fax', 'tmm_content_composer'),
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
				'title' => esc_html__('Display Email', 'tmm_content_composer'),
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
				'title' => esc_html__('Display Skype ID', 'tmm_content_composer'),
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
				'title' => esc_html__('Display Website Url', 'tmm_content_composer'),
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
				'title' => esc_html__('Display Postal Address', 'tmm_content_composer'),
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
				'title' => esc_html__('Display Working Hours', 'tmm_content_composer'),
				'shortcode_field' => 'show_working_hours',
				'id' => 'show_working_hours',
				'is_checked' => TMM_Content_Composer::set_default_value('show_working_hours', 1),
				'description' => ''
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-half">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => esc_html__('Display Map Location', 'tmm_content_composer'),
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
				'title' => esc_html__('Excerpt Bio symbol count', 'tmm_content_composer'),
				'shortcode_field' => 'dealer_bio_symbols_count',
				'id' => 'dealer_bio_symbols_count',
				'default_value' => TMM_Content_Composer::set_default_value('dealer_bio_symbols_count', 300),
				'description' => esc_html__('Leave empty to limit description field with 300 symbols', 'tmm_content_composer'),
			));
			?>

		</div><!--/ .one-half-->
	</div>

</div>

<script>

	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		const location_checkbox = jQuery('#enable_location_filter');
		const location_field = jQuery('#filter_by_key_region');
        const location_fld_handler = () => {
            if(location_checkbox.is(':checked')) {
                location_field.closest('div').slideDown();
            } else {
                location_field.closest('div').slideUp();
            }
        };

        location_fld_handler();

        location_checkbox.on('change', location_fld_handler);
	});

</script>

