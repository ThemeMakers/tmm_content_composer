<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display country', 'tmm_content_composer'),
			'shortcode_field' => 'show_location0',
			'id' => 'show_location0',
			'is_checked' => TMM_Content_Composer::set_default_value('show_location0', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display state', 'tmm_content_composer'),
			'shortcode_field' => 'show_location1',
			'id' => 'show_location1',
			'is_checked' => TMM_Content_Composer::set_default_value('show_location1', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display city', 'tmm_content_composer'),
			'shortcode_field' => 'show_location2',
			'id' => 'show_location2',
			'is_checked' => TMM_Content_Composer::set_default_value('show_location2', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display condition', 'tmm_content_composer'),
			'shortcode_field' => 'show_condition',
			'id' => 'show_condition',
			'is_checked' => TMM_Content_Composer::set_default_value('show_condition', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display producers &amp; models', 'tmm_content_composer'),
			'shortcode_field' => 'show_makes',
			'id' => 'show_makes',
			'is_checked' => TMM_Content_Composer::set_default_value('show_makes', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display price range', 'tmm_content_composer'),
			'shortcode_field' => 'show_price_range',
			'id' => 'show_price_range',
			'is_checked' => TMM_Content_Composer::set_default_value('show_price_range', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display year range', 'tmm_content_composer'),
			'shortcode_field' => 'show_year_range',
			'id' => 'show_year_range',
			'is_checked' => TMM_Content_Composer::set_default_value('show_year_range', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'title' => esc_html__('Widget Background', 'tmm_content_composer'),
			'shortcode_field' => 'bg_color',
			'id' => 'bg_color',
			'type' => 'color',
			'description' => '',
			'default_value' => TMM_Content_Composer::set_default_value('bg_color', '')
		));
		?>

		<div id="selected_location0_cont" <?php echo TMM_Content_Composer::set_default_value('show_location0', 1) == 1 ? 'style="display:none"' : ''; ?>>

			<?php
			$terms = TMM_Ext_PostType_Car::get_locations(0);
			$countries = array();

			foreach ($terms as $term) {
				$countries[$term->id] = $term->name;
			}

			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Select default country', 'tmm_content_composer'),
				'shortcode_field' => 'selected_location0',
				'id' => 'selected_location0',
				'options' => $countries,
				'default_value' => TMM_Content_Composer::set_default_value('selected_location0', 0),
				'description' => ''
			));
			?>

		</div>

		<div id="selected_location1_cont" <?php echo TMM_Content_Composer::set_default_value('show_location1', 1) == 1 ? 'style="display:none"' : ''; ?>>

			<?php
			$parent_id = TMM_Content_Composer::set_default_value('selected_location0', 0);
			$states = array();

			if ($parent_id > 0) {
				$terms = TMM_Ext_PostType_Car::get_locations( $parent_id );

				foreach ($terms as $term) {
					$states[$term->id] = $term->name;
				}
			} else {
				$states[0] = '';
			}

			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Select default state', 'tmm_content_composer'),
				'shortcode_field' => 'selected_location1',
				'id' => 'selected_location1',
				'options' => $states,
				'default_value' => TMM_Content_Composer::set_default_value('selected_location1', 0),
				'description' => ''
			));
			?>

		</div>


	</div>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display mileage', 'tmm_content_composer'),
			'shortcode_field' => 'show_mileage',
			'id' => 'show_mileage',
			'is_checked' => TMM_Content_Composer::set_default_value('show_mileage', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display fuel type', 'tmm_content_composer'),
			'shortcode_field' => 'show_fuel_type',
			'id' => 'show_fuel_type',
			'is_checked' => TMM_Content_Composer::set_default_value('show_fuel_type', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display gearbox', 'tmm_content_composer'),
			'shortcode_field' => 'show_transmission',
			'id' => 'show_transmission',
			'is_checked' => TMM_Content_Composer::set_default_value('show_transmission', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display body type', 'tmm_content_composer'),
			'shortcode_field' => 'show_body_type',
			'id' => 'show_body_type',
			'is_checked' => TMM_Content_Composer::set_default_value('show_body_type', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display doors count', 'tmm_content_composer'),
			'shortcode_field' => 'show_doors_count',
			'id' => 'show_doors_count',
			'is_checked' => TMM_Content_Composer::set_default_value('show_doors_count', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display colors', 'tmm_content_composer'),
			'shortcode_field' => 'show_colors',
			'id' => 'show_colors',
			'is_checked' => TMM_Content_Composer::set_default_value('show_colors', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display advanced search', 'tmm_content_composer'),
			'shortcode_field' => 'show_advanced_options',
			'id' => 'show_advanced_options',
			'is_checked' => TMM_Content_Composer::set_default_value('show_advanced_options', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Widget Width', 'tmm_content_composer'),
			'shortcode_field' => 'search_widget_width',
			'id' => 'search_widget_width',
			'options' => array(
					'tmm-site-full-width' => esc_html__('Full Width', 'tmm_content_composer'),
					'tmm-site-two-thirds' => esc_html__('Two thirds (of site width)', 'tmm_content_composer'),
					'none' => esc_html__('One third (of site width)', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('search_widget_width', 'none'),
			'description' => ''
		));
		?>

	</div>

</div><!--/ .tmm_shortcode_template->
		  
<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
		});
		colorizator();

		jQuery('#selected_location0_cont select').on('change', function(){
			var select = jQuery('#selected_location1_cont select'),
				parent_id = jQuery(this).val();

			select.empty();

			if(parent_id !== ''){
				var data = {
					action: "app_cardealer_draw_locations_select",
					hide_empty: 0,
					parent_id: parent_id,
					selected: 0,
					container: false
				};
				jQuery.post(ajaxurl, data, function(responce) {
					temp = jQuery('<span style="display: none"></span>');
					temp.appendTo('body').html(responce).find('option').eq(0).remove();
					select.html(temp.find('select').children());
					temp.empty();
				});
			}

			return false;
		});

		jQuery('#show_location0').on('click', function(){
			if(jQuery(this).is(':checked')){
				jQuery('#selected_location0_cont').hide();
			}else{
				jQuery('#selected_location0_cont').show().find('select').trigger('change');
			}
		});

		jQuery('#show_location1').on('click', function(){
			if(jQuery(this).is(':checked')){
				jQuery('#selected_location1_cont').hide();
			}else{
				jQuery('#selected_location1_cont').show();
			}
		});

	});

</script>