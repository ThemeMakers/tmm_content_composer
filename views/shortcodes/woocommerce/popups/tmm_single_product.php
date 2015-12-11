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
			'title' => __('Select Product', 'tmm_content_composer'),
			'shortcode_field' => 'product_id',
			'id' => 'product_id',
			'options' => $products,
			'default_value' => TMM_Content_Composer::set_default_value('product_id',''),
			'description' => __('Select single product by title', 'tmm_content_composer')
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Product SKU', 'tmm_content_composer'),
			'shortcode_field' => 'sku',
			'id' => 'sku',
			'default_value' => TMM_Content_Composer::set_default_value('sku', ''),
			'description' => __('Display single product by SKU.', 'tmm_content_composer')
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