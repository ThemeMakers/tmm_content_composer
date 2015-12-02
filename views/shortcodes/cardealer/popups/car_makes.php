<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Hide empty makes', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'hide_empty',
			'id' => 'hide_empty_carproducers',
			'is_checked' => TMM_Content_Composer::set_default_value('hide_empty', 0),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display car make logos', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_logo',
			'id' => 'show_logo',
			'is_checked' => TMM_Content_Composer::set_default_value('show_logo', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display only makes, that have their logo', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_only_with_logo',
			'id' => 'show_only_with_logo',
			'is_checked' => TMM_Content_Composer::set_default_value('show_only_with_logo', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display make title', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_name',
			'id' => 'show_name',
			'is_checked' => TMM_Content_Composer::set_default_value('show_name', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Display number of cars', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_count',
			'id' => 'show_count',
			'is_checked' => TMM_Content_Composer::set_default_value('show_count', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable link', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_link',
			'id' => 'show_link',
			'is_checked' => TMM_Content_Composer::set_default_value('show_link', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		$args = array(
			'orderby'           => 'name',
			'order'             => 'ASC',
			'hide_empty'        => false,
			'fields'            => 'id=>name',
			'parent'            => 0,
			'hierarchical'      => 1,
			'pad_counts'        => false,
		);
		$makes = get_terms('carproducer', $args);

		$logos = array(
			0 => __('All', TMM_CC_TEXTDOMAIN),
		);

		if (!empty($makes) && is_array($makes)) {
			$logos = $logos + $makes;
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('List of logos', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'logos_list',
			'id' => 'logos_list',
			'multiple' => true,
			'options' => $logos,
			'default_value' => TMM_Content_Composer::set_default_value('logos_list', 0),
			'description' => __('Select multiple car makes by holding CTRL + selecting certain option.', TMM_CC_TEXTDOMAIN),
		));
		?>

	</div><!--/ .one-half-->

</div>


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

