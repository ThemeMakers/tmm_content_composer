<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
    
    <div class="one-half"> 
        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Blog Type', 'tmm_content_composer'),
            'shortcode_field' => 'blog_type',
            'id' => 'blog_type',
            'options' => TMM_Content_Composer::get_blog_type(),
            'default_value' => TMM_Content_Composer::set_default_value('blog_type', 'blog-classic'),
            'description' => __('', 'tmm_content_composer')
        ));
        ?>
    </div>

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Effect for Appearing Post', 'tmm_content_composer'),
			'shortcode_field' => 'post_appearing_effect',
			'default_value' =>  TMM_Content_Composer::set_default_value('post_appearing_effect', 'elementFade'),
            'options' => array(
				'none' => __('None', 'tmm_content_composer'),
				'elementFade' => __('Element Fade', 'tmm_content_composer'),
				'opacity' => __('Opacity', 'tmm_content_composer'),
				'opacity2x' => __('Opacity 2x Run', 'tmm_content_composer'),
				'scale' => __('Scale', 'tmm_content_composer'),
				'slideRight' => __('Slide Right', 'tmm_content_composer'),
				'slideLeft' => __('Slide Left', 'tmm_content_composer'),
				'slideDown' => __('Slide Down', 'tmm_content_composer'),
				'slideUp' => __('Slide Up', 'tmm_content_composer'),
				'slideUp2x' => __('Slide Up 2x', 'tmm_content_composer'),
				'extraRadius' => __('Extra Radius', 'tmm_content_composer')
			),
			'description' => __('Effect for Appearing Post.', 'tmm_content_composer')
		));
		?>
	</div>

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'multiple' => true,
			'title' => __('Category', 'tmm_content_composer'),
			'shortcode_field' => 'category',
			'id' => 'category',
			'options' => TMM_Content_Composer::get_post_categories(),
			'default_value' => TMM_Content_Composer::set_default_value('category', ''),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'multiple' => true,
			'title' => __('Tag', 'tmm_content_composer'),
			'shortcode_field' => 'tag',
			'id' => 'tag',
			'options' => TMM_Content_Composer::get_post_tags(),
			'default_value' => TMM_Content_Composer::set_default_value('tag', ''),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-columns">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Layout', 'tmm_content_composer'),
			'shortcode_field' => 'columns',
			'id' => '',
			'options' => array(
				'2' => __('2 Columns', 'tmm_content_composer'),
				'3' => __('3 Columns', 'tmm_content_composer'),
				'4' => __('4 Columns', 'tmm_content_composer'),
				'5' => __('5 Columns', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('columns', '3'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->



	<div class="one-half option-default">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Order By', 'tmm_content_composer'),
			'shortcode_field' => 'orderby',
			'id' => 'orderby',
			'options' => TMM_Content_Composer::get_post_sort_array(),
			'default_value' => TMM_Content_Composer::set_default_value('orderby', ''),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Order', 'tmm_content_composer'),
			'shortcode_field' => 'order',
			'id' => 'order',
			'options' => array(
				'DESC' => __('DESC', 'tmm_content_composer'),
				'ASC' => __('ASC', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('order', 'DESC'),
			'description' => ''
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts Per Page', 'tmm_content_composer'),
			'shortcode_field' => 'posts_per_page',
			'id' => 'posts_per_page',
			'default_value' => TMM_Content_Composer::set_default_value('posts_per_page', 5),
			'description' => ''
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-masonry">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts Per Load', 'tmm_content_composer'),
			'shortcode_field' => 'posts_per_load',
			'id' => 'posts_per_load',
			'default_value' => TMM_Content_Composer::set_default_value('posts_per_load', 5),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Posts', 'tmm_content_composer'),
			'shortcode_field' => 'posts',
			'id' => 'posts',
			'default_value' => TMM_Content_Composer::set_default_value('posts', ''),
			'description' => __('Example: 56,73,119. It has the most hight priority!', 'tmm_content_composer')
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Exclude Posts', 'tmm_content_composer'),
			'shortcode_field' => 'exclude_post_types',
			'id' => 'exclude_posts',
			'options' => array(
				'none' => __('None', 'tmm_content_composer'),
				'post-with-image' => __('Posts With Featured Image', 'tmm_content_composer'),
				'post-without-image' => __('Posts Without Featured Image', 'tmm_content_composer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('exclude_post_types', 'none'),
			'description' => __('Choose post formats that will not be included in current query.', 'tmm_content_composer')
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Exclude Post Formats', 'tmm_content_composer'),
			'shortcode_field' => 'exclude_post_formats',
			'id' => 'exclude_post_formats',
			'multiple' => true,
			'options' => array(
				'none' => __('None', 'tmm_content_composer'),
				'post-format-gallery' => __('Gallery Post', 'tmm_content_composer'),
				'post-format-quote' => __('Quote Post', 'tmm_content_composer'),
				'post-format-video' => __('Video Post', 'tmm_content_composer'),
				'post-format-audio' => __('Audio Post', 'tmm_content_composer')
			),
			'default_value' => TMM_Content_Composer::set_default_value('exclude_post_formats', 'none'),
			'description' => __('Choose post formats that will not be included in current query.', 'tmm_content_composer')
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title Symbols Count', 'tmm_content_composer'),
			'shortcode_field' => 'title_symbols',
			'id' => 'posts',
			'default_value' => TMM_Content_Composer::set_default_value('title_symbols', '25'),
			'description' => __('Truncate post titles depending on symbols number you want.', 'tmm_content_composer')
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Excerpt Symbols Count', 'tmm_content_composer'),
			'shortcode_field' => 'excerpt_symbols',
			'id' => 'excerpt_symbols',
			'default_value' => TMM_Content_Composer::set_default_value('excerpt_symbols', '100'),
			'description' => __('Truncate post excerpt depending on symbols number you want.', 'tmm_content_composer')
		));
		?>
	</div><!--/ .ona-half-->

	<div class="one-half option-default">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show/Hide Meta Data', 'tmm_content_composer'),
			'shortcode_field' => 'show_metadata',
			'id' => 'show_metadata',
			'is_checked' => TMM_Content_Composer::set_default_value('show_metadata', 1),
			'description' => __('Show/Hide Meta Info', 'tmm_content_composer')
		));
		?>

	</div>

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show Latest Review', 'tmm_content_composer'),
			'shortcode_field' => 'show_review',
			'id' => 'show_review',
			'is_checked' => TMM_Content_Composer::set_default_value('show_review', 0),
			'description' => __('', 'tmm_content_composer')
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Show/Hide Pagination', 'tmm_content_composer'),
			'shortcode_field' => 'show_pagination',
			'id' => 'show_pagination',
			'is_checked' => TMM_Content_Composer::set_default_value('show_pagination', 1),
			'description' => __('Enable Pagination', 'tmm_content_composer')
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-default">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Lazy Loading', 'tmm_content_composer'),
			'shortcode_field' => 'infinity_pagination',
			'id' => 'infinity_pagination',
			'is_checked' => TMM_Content_Composer::set_default_value('infinity_pagination', 0),
			'description' => __('Lazy Loading', 'tmm_content_composer')
		));
		?>

	</div><!--/ .ona-half-->

	<div class="one-half option-carousel">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Use as Post Carousel', 'tmm_content_composer'),
			'shortcode_field' => 'post_carousel',
			'id' => 'post_carousel',
			'is_checked' => TMM_Content_Composer::set_default_value('post_carousel', 0),
			'description' => __('Use as Post Carousel', 'tmm_content_composer')
		));
		?>
	</div>

	<div class="one-half option-masonry">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Load Posts By Scrolling', 'tmm_content_composer'),
			'shortcode_field' => 'load_by_scrolling',
			'id' => 'load_by_scrolling',
			'is_checked' => TMM_Content_Composer::set_default_value('load_by_scrolling', true),
			'default_value' => TMM_Content_Composer::set_default_value('load_by_scrolling', true),
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
				case 'blog-list':
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



