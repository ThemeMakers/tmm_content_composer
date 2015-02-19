<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Products Per Page', TMM_CC_TEXTDOMAIN),
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
			'title' => __('Columns', TMM_CC_TEXTDOMAIN),
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
		$args = array(
			'pad_counts'         => 1,
			'show_counts'        => 1,
			'hierarchical'       => 1,
			'hide_empty'         => 1,
			'show_uncategorized' => 1,
			'orderby'            => 'name',
			'menu_order'         => false,
		);
		$terms = get_terms('product_cat', $args);

		$product_categories = array('0' => __('None', TMM_CC_TEXTDOMAIN));

		if($terms){
			foreach($terms as $term){
				$product_categories[$term->slug] = $term->name;
			}
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Select Category', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'category',
			'id' => 'category',
			'options' => $product_categories,
			'default_value' => TMM_Content_Composer::set_default_value('category',''),
			'description' => __('Display products by selected category', TMM_CC_TEXTDOMAIN)
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