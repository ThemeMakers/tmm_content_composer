<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Products Per Page', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'products_per_page',
			'id' => 'products_per_page',
			'default_value' => TMM_Content_Composer::set_default_value('products_per_page', 12),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Columns', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'columns',
			'id' => 'columns',
			'options' => array(2 => 2, 3 => 3 , 4 => 4),
			'default_value' => TMM_Content_Composer::set_default_value('columns', 3),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		$product_type = array(
			'featured_products' => esc_html__('Featured', TMM_CC_TEXTDOMAIN),
			//'top_rated_products' => esc_html__('Top Rated', TMM_CC_TEXTDOMAIN),
			'best_selling_products' => esc_html__('Best Selling', TMM_CC_TEXTDOMAIN),
			'sale_products' => esc_html__('Sale Products', TMM_CC_TEXTDOMAIN),
		);

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Select Products Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'type',
			'id' => 'type',
			'options' => $product_type,
			'default_value' => TMM_Content_Composer::set_default_value('type','featured_products'),
			'description' => esc_html__('Select products type', TMM_CC_TEXTDOMAIN)
		));
		?>
	</div><!--/ .one-half-->

</div><!--/ .tmm_shortcode_template->
		  
<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>