<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
        
	<div class="one-half">
            
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Layout', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'columns',
			'id' => '',
			'options' => array(
				3 => __('3 Columns', TMM_CC_TEXTDOMAIN),
				4 => __('4 Columns', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('columns', 3),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		$col_algorims_ids = array(
			1 => __('Algoritm 1', TMM_CC_TEXTDOMAIN),
			2 => __('Algoritm 2', TMM_CC_TEXTDOMAIN),
		);
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Image Sizes', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'col_alg',
			'id' => '',
			'options' => $col_algorims_ids,
			'default_value' => TMM_Content_Composer::set_default_value('col_alg', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->


	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Category', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'category',
			'id' => 'category',
			'options' => TMM_Helper::get_post_categories(),
			'default_value' => TMM_Content_Composer::set_default_value('category', ''),
			'description' => __('Show posts from selected category', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .one-half-->
        
    <div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts Per Load', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'posts_per_load',
			'id' => 'posts_per_load',
			'default_value' => TMM_Content_Composer::set_default_value('posts_per_load', 5),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->


	


</div>



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

