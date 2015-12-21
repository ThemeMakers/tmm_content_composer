<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="thememakers_shortcode_template clearfix">

    <div class="one-half">
		<?php
        /**
        * ---------------- Position ----------------
        */
		$positions = get_terms('position');
		$positions_array = array();
		if (!empty($positions)) {
			foreach ($positions as $value) {
				$positions_array[$value->term_id] = $value->name;
			}
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Position', TMM_THEME_FOLDER_NAME),
			'options' => array(0 => __('All', TMM_THEME_FOLDER_NAME)) + $positions_array,
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content',''),
			'description' => ''
		));
		?>
    </div><!--/ .one-half-->

	<div class="one-half">
		<?php
        /**
        * ---------------- Per page ----------------
        */
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Per page', TMM_THEME_FOLDER_NAME),
			'options' => array(
				10 => 10,
				20 => 20,
				30 => 30,
				40 => 40,
				50 => 50,
			),
			'shortcode_field' => 'per_page',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('per_page','10'),
			'description' => ''
		));
		?>
    </div><!--/ .one-half-->


	<div class="one-half">
		<?php
        /**
        * ---------------- Order by ----------------
        */
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Order by', TMM_THEME_FOLDER_NAME),
			'options' => array(
				'title' => __('Name', TMM_THEME_FOLDER_NAME),
				'date' => __('Date', TMM_THEME_FOLDER_NAME),
			),
			'shortcode_field' => 'order',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('order','title'),
			'description' => ''
		));
		?>
    </div><!--/ .one-half-->


	<div class="one-half">
		<?php
        /**
        * ---------------- Sort order ----------------
        */
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Sort order', TMM_THEME_FOLDER_NAME),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC',
			),
			'shortcode_field' => 'sort_order',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('sort_order','ASC'),
			'description' => ''
		));
		?>
    </div><!--/ .one-half-->

</div><!--/ .tmm_shortcode_template->
		  
<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
	});
</script>

