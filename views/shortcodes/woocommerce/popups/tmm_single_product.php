<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		$args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> -1,
			'no_found_rows' 	=> 1,
			'post_status' 		=> 'publish',
			'meta_query' 		=> array(
				array(
					'key' 		=> '_visibility',
					'value' 	=> array('catalog', 'visible'),
					'compare' 	=> 'IN'
				)
			)
		);
		$products_query = new WP_Query($args);

		$products = array();

		if($products_query){
			foreach($products_query->posts as $product){
				$products[$product->ID] = $product->post_title;
			}
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Select Product', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'product_id',
			'id' => 'product_id',
			'options' => $products,
			'default_value' => TMM_Content_Composer::set_default_value('product_id',''),
			'description' => __('Select single product by title', TMM_CC_TEXTDOMAIN)
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Product SKU', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'sku',
			'id' => 'sku',
			'default_value' => TMM_Content_Composer::set_default_value('sku', ''),
			'description' => __('Display single product by SKU.', TMM_CC_TEXTDOMAIN)
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