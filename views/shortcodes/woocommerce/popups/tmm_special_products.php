<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Products Per Page', 'tmm_content_composer'),
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
			'title' => __('Columns', 'tmm_content_composer'),
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
			'featured_products' => __('Featured', 'tmm_content_composer'),
			//'top_rated_products' => __('Top Rated', 'tmm_content_composer'),
			'best_selling_products' => __('Best Selling', 'tmm_content_composer'),
			'sale_products' => __('Sale Products', 'tmm_content_composer'),
		);

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Select Products Type', 'tmm_content_composer'),
			'shortcode_field' => 'type',
			'id' => 'type',
			'options' => $product_type,
			'default_value' => TMM_Content_Composer::set_default_value('type','featured_products'),
			'description' => __('Select products type', 'tmm_content_composer')
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