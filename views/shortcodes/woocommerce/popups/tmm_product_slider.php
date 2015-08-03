<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">		

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Products Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'product_type',
			'id' => 'tmm_product_type',
			'options' => array(
				'newest' => __('Newest', TMM_CC_TEXTDOMAIN),
				'featured_products' => __('Featured', TMM_CC_TEXTDOMAIN),
				//'top_rated' => __('Top Rated', TMM_CC_TEXTDOMAIN),
				'best_selling' => __('Best Selling', TMM_CC_TEXTDOMAIN),
				'for_sale' => __('Sale Products', TMM_CC_TEXTDOMAIN),
				//'custom' => __('Select Products', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('product_type', ''),
			'description' => ''
		));
		?>

		<div class="native_sliders_groups2" <?php if (TMM_Content_Composer::set_default_value('product_type', '') !== 'custom') echo 'style="display: none;"'; ?>>

			<?php
//			TMM_Content_Composer::html_option(array(
//				'type' => 'select',
//				'title' => __('Select Products', TMM_CC_TEXTDOMAIN),
//				'shortcode_field' => 'selected_products',
//				'id' => 'selected_products',
//				'options' => array(),
//				'default_value' => TMM_Content_Composer::set_default_value('selected_products', ''),
//				'description' => '',
//				'css_classes' => 'selected_products'
//			));
			?>

		</div>
		
	 </div>
	
	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Max Products Number', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'per_page',
			'id' => 'per_page',
			'default_value' => TMM_Content_Composer::set_default_value('per_page', 12),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Autoplay Delay', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'autoplay_delay',
			'id' => 'autoplay_delay',
			'default_value' => TMM_Content_Composer::set_default_value('autoplay_delay', 3000),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable Pagination', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'pagination',
			'id' => 'pagination',
			'is_checked' => TMM_Content_Composer::set_default_value('pagination', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable Autoplay', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'autoplay',
			'id' => 'autoplay',
			'is_checked' => TMM_Content_Composer::set_default_value('autoplay', 1),
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

		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

//		jQuery("#tmm_product_type").change(function() {
//
//			tmm_ext_shortcodes.changer(shortcode_name);
//		});

	});
</script>

