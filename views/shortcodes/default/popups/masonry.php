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
				'col-2' => __('2 Columns', TMM_CC_TEXTDOMAIN),
				'col-3' => __('3 Columns', TMM_CC_TEXTDOMAIN),
				'col-4' => __('4 Columns', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('columns', 'col-3'),
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
			'options' => TMM_Content_Composer::get_post_categories(),
			'default_value' => TMM_Content_Composer::set_default_value('category', ''),
			'description' => __('Show posts from selected category', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .fullwidth-->
        
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
        
    <div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Load Posts By Scrolling', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'load_by_scrolling',
			'id' => 'load_by_scrolling',
            'is_checked' => TMM_Content_Composer::set_default_value('load_by_scrolling', true),
			'default_value' => TMM_Content_Composer::set_default_value('load_by_scrolling', true),
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Load Posts With Animation', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'load_with_animation',
			'id' => 'load_with_animation',
            'is_checked' => TMM_Content_Composer::set_default_value('load_with_animation', true),
			'default_value' => TMM_Content_Composer::set_default_value('load_with_animation', true),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->     
    
    <div class="one-half">
        <h4><?php _e('Social Share Buttons', TMM_CC_TEXTDOMAIN) ?></h4>
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show / Hide Twitter', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_twitter',
			'id' => 'show_twitter',
            'is_checked' => TMM_Content_Composer::set_default_value('show_twitter', true),
			'default_value' => TMM_Content_Composer::set_default_value('show_twitter', true),
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show / Hide Facebook', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_facebook',
			'id' => 'show_facebook',
            'is_checked' => TMM_Content_Composer::set_default_value('show_facebook', true),
			'default_value' => TMM_Content_Composer::set_default_value('show_facebook', true),
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show / Hide Google+', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_google',
			'id' => 'show_google',
            'is_checked' => TMM_Content_Composer::set_default_value('show_google', true),
			'default_value' => TMM_Content_Composer::set_default_value('show_google', true),
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show / Hide Pinterest', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_pinterest',
			'id' => 'show_pinterest',
            'is_checked' => TMM_Content_Composer::set_default_value('show_pinterest', true),
			'default_value' => TMM_Content_Composer::set_default_value('show_pinterest', true),
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
		//***
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.changer(shortcode_name);
			}
		});

		jQuery(".js_add_list_item").click(function() {
			var clone = jQuery(".list_item:last").clone(true);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			tmm_ext_shortcodes.changer(shortcode_name);
			return false;
		});

		jQuery(".js_delete_list_item").life('click',function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.changer(shortcode_name);
				});
			}

			return false;
		});
		
	});

</script>

