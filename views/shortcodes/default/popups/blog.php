<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
    
    <div class="one-half"> 
        <?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Blog Title', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'title',
			'id' => 'posts_per_page',
			'default_value' => TMM_Content_Composer::set_default_value('title', ''),
			'description' => ''
		));
        ?>
    </div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Blog View', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'blog_view',
			'default_value' =>  TMM_Content_Composer::set_default_value('blog_view', 'default'),
			'options' => array(
				'default' => __('Default Blog Layout', TMM_CC_TEXTDOMAIN),
				'alternate' => __('Alternate Blog Layout', TMM_CC_TEXTDOMAIN),
			),
			'description' => ''
		));
		?>
	</div>

	<div class="one-half">
		<?php
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            //'multiple' => true,
            'title' => __('Category', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'category',
            'id' => 'category',
            'options' => TMM_Content_Composer::get_post_categories(),
            'default_value' => TMM_Content_Composer::set_default_value('category', ''),
            'description' => ''
        ));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Order By', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'orderby',
			'id' => 'orderby',
			'options' => TMM_Content_Composer::get_post_sort_array(),
			'default_value' => TMM_Content_Composer::set_default_value('orderby', ''),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
        TMM_Content_Composer::html_option(array(
            'type' => 'radio',
            'title' => __('Order', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'order',
            'id' => 'order',
            'name' => 'order',
            'values' => array(
                1 => array(
                    'title' => __('ASC', TMM_CC_TEXTDOMAIN),
                    'id' => 'order_asc',
                    'value' => 1,
                    'checked' => ($value_type == 1 ? 1 : 0)
                ),
                0 => array(
                    'title' => __('DESC', TMM_CC_TEXTDOMAIN),
                    'id' => 'order_desc',
                    'value' => 0,
                    'checked' => ($value_type == 0 ? 1 : 0)
                )
            ),
            'value' => $value_type,
            'description' => '',
            'hidden_id' => 'order'
        ));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts Per Page', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'posts_per_page',
			'id' => 'posts_per_page',
			'default_value' => TMM_Content_Composer::set_default_value('posts_per_page', 5),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'posts',
			'id' => 'posts',
			'default_value' => TMM_Content_Composer::set_default_value('posts', ''),
			'description' => __('Example: 56,73,119. It has the most hight priority!', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
        TMM_Content_Composer::html_option(array(
            'type' => 'radio',
            'title' => __('Show Full Content', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'show_full_content',
            'id' => 'show_full_content',
            'name' => 'show_full_content',
            'values' => array(
                1 => array(
                    'title' => __('YES', TMM_CC_TEXTDOMAIN),
                    'id' => 'show_full_content_2',
                    'value' => 1,
                    'checked' => ($value_type == 1 ? 1 : 0)
                ),
                0 => array(
                    'title' => __('NO', TMM_CC_TEXTDOMAIN),
                    'id' => 'show_full_content_1',
                    'value' => 0,
                    'checked' => ($value_type == 0 ? 1 : 0)
                )
            ),
            'value' => $value_type,
            'description' => '',
            'hidden_id' => 'show_full_content'
        ));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
        TMM_Content_Composer::html_option(array(
            'type' => 'checkbox',
            'title' => __('Show Image', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'show_image',
            'id' => 'show_image',
            'is_checked' => TMM_Content_Composer::set_default_value('show_image', 0),
            //'description' => __('Whether to display featured image in alternate layout', TMM_CC_TEXTDOMAIN)
        ));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show Pagination', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'show_pagination',
			'id' => 'show_pagination',
			'is_checked' => TMM_Content_Composer::set_default_value('show_pagination', 0),
			//'description' => __('Enable Pagination', TMM_CC_TEXTDOMAIN)
		));
		?>

	</div><!--/ .ona-half-->

</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		var option_default = jQuery('.option-default'),
			option_masonry = jQuery('.option-masonry'),
			option_columns = jQuery('.option-columns'),
			option_carousel = jQuery('.option-carousel'),
			post_review = jQuery('#show_review'),
			post_review_val = post_review.val(),
			blog_type = jQuery('#blog_type'),
			blog_type_val = blog_type.val();

		switchBlogType(blog_type_val);
		switchPostQuery(post_review_val);

		blog_type.on('change', function(){
			var val = jQuery(this).val();
			switchBlogType(val);
		});

		post_review.on('change', function(){
			var val = jQuery(this).val();
			switchPostQuery(val);
		});

		function switchBlogType(val){
			switch(val){
				case 'blog-masonry':
					option_default.slideUp();
					option_columns.slideDown(300);
					option_masonry.slideDown(300);
					option_carousel.slideUp();
					break;
				case 'blog-classic':
				case 'blog-medium':
					option_columns.slideUp();
					option_default.slideDown(300);
					option_masonry.slideUp();
					option_carousel.slideUp();
					break;
				case 'blog-grid-overlay':
				case 'blog-grid-layout':
					option_columns.slideDown(300);
					option_default.slideDown(300);
					option_masonry.slideUp();
					option_carousel.slideDown(300);
					break;
				case 'blog-grid':
					option_columns.slideDown(300);
					option_default.slideDown(300);
					option_masonry.slideUp();
					option_carousel.slideUp(300);
					break;
			}
		}
		function switchPostQuery(val){
			var category = jQuery('#category'),
				posts = jQuery('#posts');
			switch(val){
				case '1':
					category.prop('disabled', true).css('background-color','#eee');
					posts.prop('disabled', true).css('background-color','#eee');
					break;
				case '0':
					category.prop('disabled', false).css('background-color','#fff');
					posts.prop('disabled', false).css('background-color','#fff');
					break;
			}
		}
	});
</script>



