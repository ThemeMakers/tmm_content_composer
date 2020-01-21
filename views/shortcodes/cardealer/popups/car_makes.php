<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Hide items with no cars', 'tmm_content_composer'),
			'shortcode_field' => 'hide_empty',
			'id' => 'hide_empty_carproducers',
			'is_checked' => TMM_Content_Composer::set_default_value('hide_empty', 0),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display car make logos', 'tmm_content_composer'),
			'shortcode_field' => 'show_logo',
			'id' => 'show_logo',
			'is_checked' => TMM_Content_Composer::set_default_value('show_logo', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display only makes, that have their logo', 'tmm_content_composer'),
			'shortcode_field' => 'show_only_with_logo',
			'id' => 'show_only_with_logo',
			'is_checked' => TMM_Content_Composer::set_default_value('show_only_with_logo', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display make title', 'tmm_content_composer'),
			'shortcode_field' => 'show_name',
			'id' => 'show_name',
			'is_checked' => TMM_Content_Composer::set_default_value('show_name', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Display number of cars', 'tmm_content_composer'),
			'shortcode_field' => 'show_count',
			'id' => 'show_count',
			'is_checked' => TMM_Content_Composer::set_default_value('show_count', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => esc_html__('Enable link', 'tmm_content_composer'),
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
			0 => esc_html__('All', 'tmm_content_composer'),
		);

		if (!empty($makes) && is_array($makes)) {
			$logos = $logos + $makes;
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('List of logos', 'tmm_content_composer'),
			'shortcode_field' => 'logos_list',
			'id' => 'logos_list',
			'multiple' => true,
			'options' => $logos,
			'default_value' => TMM_Content_Composer::set_default_value('logos_list', 0),
			'description' => esc_html__('Select multiple car makes by holding CTRL + selecting certain option.', 'tmm_content_composer'),
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

