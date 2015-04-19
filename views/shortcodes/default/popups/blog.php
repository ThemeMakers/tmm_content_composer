<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="tabs-holder">

		<ul class="tabs-nav clearfix">

			<li><a href="#"><?php _e( 'Default Options', TMM_CC_TEXTDOMAIN ); ?></a></li>
			<li><a href="#"><?php _e( 'Advanced Blog Options', TMM_CC_TEXTDOMAIN ); ?></a></li>

		</ul>

		<div class="tabs-container clearfix">

			<div class="tab-content">

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'select',
						'title' => __('Blog Type', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'blog_type',
						'id' => 'blog_type',
						'options' => TMM_Content_Composer::get_blog_type(),
						'default_value' => TMM_Content_Composer::set_default_value('blog_type', 'blog-classic'),
						'description' => __('Choose necessary layout for displaying posts.', TMM_CC_TEXTDOMAIN)
					));
					?>
				</div>

				<div class="one-half option-default">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'select',
						'title' => __('Effect for Appearing Post', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'post_appearing_effect',
						'default_value' =>  TMM_Content_Composer::set_default_value('post_appearing_effect', 'elementFade'),
						'options' => array(
							'none' => __('None', TMM_CC_TEXTDOMAIN),
							'elementFade' => __('Element Fade', TMM_CC_TEXTDOMAIN),
							'opacity' => __('Opacity', TMM_CC_TEXTDOMAIN),
							'opacity2xRun' => __('Opacity 2x Run', TMM_CC_TEXTDOMAIN),
							'scale' => __('Scale', TMM_CC_TEXTDOMAIN),
							'slideRight' => __('Slide Right', TMM_CC_TEXTDOMAIN),
							'slideLeft' => __('Slide Left', TMM_CC_TEXTDOMAIN),
							'slideDown' => __('Slide Down', TMM_CC_TEXTDOMAIN),
							'slideUp' => __('Slide Up', TMM_CC_TEXTDOMAIN),
							'slideUp2x' => __('Slide Up 2x', TMM_CC_TEXTDOMAIN),
							'extraRadius' => __('Extra Radius', TMM_CC_TEXTDOMAIN)
						),
						'description' => __('Effect for Appearing Post.', TMM_CC_TEXTDOMAIN)
					));
					?>
				</div>

				<div class="one-half option-default">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'select',
						'multiple' => true,
						'title' => __('Category', TMM_CC_TEXTDOMAIN),
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
						'title' => __('Tag', TMM_CC_TEXTDOMAIN),
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
						'title' => __('Layout', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'columns',
						'id' => '',
						'options' => array(
							'fullwidth' => __('Fullwidth', TMM_CC_TEXTDOMAIN),
							'2' => __('2 Columns', TMM_CC_TEXTDOMAIN),
							'3' => __('3 Columns', TMM_CC_TEXTDOMAIN),
							'4' => __('4 Columns', TMM_CC_TEXTDOMAIN)
						),
						'default_value' => TMM_Content_Composer::set_default_value('columns', '2'),
						'description' => ''
					));
					?>

				</div><!--/ .one-half-->

				<div class="one-half option-default">

					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'select',
						'title' => __('Order By', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'orderby',
						'id' => 'orderby',
						'options' => TMM_Content_Composer::get_post_sort_array(),
						'default_value' => TMM_Content_Composer::set_default_value('orderby', 'date'),
						'description' => ''
					));
					?>

				</div><!--/ .ona-half-->

				<div class="one-half option-default">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'select',
						'title' => __('Order', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'order',
						'id' => 'order',
						'options' => array(
							'DESC' => __('DESC', TMM_CC_TEXTDOMAIN),
							'ASC' => __('ASC', TMM_CC_TEXTDOMAIN),
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
						'title' => __('Posts Per Page', TMM_CC_TEXTDOMAIN),
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
						'title' => __('Posts Per Load', TMM_CC_TEXTDOMAIN),
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
						'title' => __('Posts', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'posts',
						'id' => 'posts',
						'default_value' => TMM_Content_Composer::set_default_value('posts', ''),
						'description' => __('Example: 56,73,119. It has the most hight priority!', TMM_CC_TEXTDOMAIN)
					));
					?>

				</div><!--/ .ona-half-->

				<div class="one-half option-default">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'select',
						'title' => __('Exclude Posts', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'exclude_post_types',
						'id' => 'exclude_posts',
						'options' => array(
							'none' => __('None', TMM_CC_TEXTDOMAIN),
							'post-with-image' => __('Posts With Featured Image', TMM_CC_TEXTDOMAIN),
							'post-without-image' => __('Posts Without Featured Image', TMM_CC_TEXTDOMAIN),
						),
						'default_value' => TMM_Content_Composer::set_default_value('exclude_post_types', 'none'),
						'description' => __('Choose post formats that will not be included in current query.', TMM_CC_TEXTDOMAIN)
					));
					?>

				</div><!--/ .ona-half-->

				<div class="one-half option-default">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'select',
						'title' => __('Exclude Post Formats', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'exclude_post_formats',
						'id' => 'exclude_post_formats',
						'multiple' => true,
						'options' => array(
							'none' => __('None', TMM_CC_TEXTDOMAIN),
							'post-format-gallery' => __('Gallery Post', TMM_CC_TEXTDOMAIN),
							'post-format-quote' => __('Quote Post', TMM_CC_TEXTDOMAIN),
							'post-format-video' => __('Video Post', TMM_CC_TEXTDOMAIN),
							'post-format-audio' => __('Audio Post', TMM_CC_TEXTDOMAIN)
						),
						'default_value' => TMM_Content_Composer::set_default_value('exclude_post_formats', 'none'),
						'description' => __('Choose post formats that will not be included in current query.', TMM_CC_TEXTDOMAIN)
					));
					?>

				</div><!--/ .ona-half-->

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'text',
						'title' => __('Title Symbols Count', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'title_symbols',
						'id' => 'posts',
						'default_value' => TMM_Content_Composer::set_default_value('title_symbols', '25'),
						'description' => __('Truncate post titles depending on symbols number you want.', TMM_CC_TEXTDOMAIN)
					));
					?>
				</div><!--/ .ona-half-->

				<div class="one-half option-excerpt">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Show / Hide Post Excerpt', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'show_excerpt',
						'id' => 'show_excerpt',
						'is_checked' => TMM_Content_Composer::set_default_value('show_excerpt', 1),
						'description' => __('If checked, post excerpts will be shown according to layout.', TMM_CC_TEXTDOMAIN)
					));
					?>
				</div><!--/ .ona-half-->

				<div class="one-half option-excerpt">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'text',
						'title' => __('Excerpt Symbols Count', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'excerpt_symbols',
						'id' => 'excerpt_symbols',
						'default_value' => TMM_Content_Composer::set_default_value('excerpt_symbols', '110'),
						'description' => __('Truncate excerpt depending on symbols number you want.', TMM_CC_TEXTDOMAIN)
					));
					?>
				</div><!--/ .ona-half-->

				<div class="one-half option-default">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Show/Hide Pagination', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'show_pagination',
						'id' => 'show_pagination',
						'is_checked' => TMM_Content_Composer::set_default_value('show_pagination', 0),
						'description' => __('Enable Pagination', TMM_CC_TEXTDOMAIN)
					));
					?>

				</div><!--/ .ona-half-->

				<div class="one-half option-border">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Show/Hide Border Bottom', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'show_border_bottom',
						'id' => 'show_border_bottom',
						'is_checked' => TMM_Content_Composer::set_default_value('show_border_bottom', 1),
						'description' => __('Show/Hide Border Bottom', TMM_CC_TEXTDOMAIN)
					));
					?>

				</div><!--/ .ona-half-->

				<div class="one-half option-masonry">
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
					?>
				</div><!--/ .one-half-->

				<div class="one-half option-classic">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Show/Hide Tags', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'show_tags',
						'id' => 'show_tags',
						'is_checked' => TMM_Content_Composer::set_default_value('show_tags', true),
						'default_value' => TMM_Content_Composer::set_default_value('show_tags', true),
						'description' => ''
					));
					?>
				</div><!--/ .one-half-->

				<div class="one-half option-classic">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Show/Hide Author', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'show_author',
						'id' => 'show_author',
						'is_checked' => TMM_Content_Composer::set_default_value('show_author', true),
						'default_value' => TMM_Content_Composer::set_default_value('show_author', true),
						'description' => ''
					));
					?>
				</div><!--/ .one-half-->

			</div>

			<div class="tab-content">

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'text',
						'title' => __('Image opacity', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'image_opacity',
						'id' => 'posts',
						'default_value' => TMM_Content_Composer::set_default_value('image_opacity', '0.3'),
						'description' => __('Image opacity on hover', TMM_CC_TEXTDOMAIN)
					));
					?>

				</div><!--/ .ona-half-->

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'color',
						'title' => __('Image background', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'image_background',
						'id' => 'image_background',
						'default_value' => TMM_Content_Composer::set_default_value('image_background', '#272729'),
						'description' => '',
						'display' => 1
					));
					?>

				</div><!--/ .ona-half-->

			</div>

		</div>

	</div>

</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		colorizator();

		var blogType = jQuery('#blog_type').val(),
			optionBorder = jQuery('.option-border'),
			optionMasonry = jQuery('.option-masonry'),
			optionDefault = jQuery('.option-default'),
			optionExcerpt = jQuery('.option-excerpt'),
			optionClassic = jQuery('.option-classic'),
			showExcerpt = jQuery('#show_excerpt'),
			ExcerptSymbols = jQuery('#excerpt_symbols');

		cahangeExcerpt(showExcerpt.is(':checked'));

		showExcerpt.life('change', function(){
			var val = jQuery(this).is(':checked');
			cahangeExcerpt(val);
		});

		function cahangeExcerpt(val){
			if (val){
				ExcerptSymbols.attr('disabled', false).css('background-color', '#fff');
			}else{
				ExcerptSymbols.attr('disabled', true).css('background-color', '#eee');
			}

		}

		changeBlogType(blogType);

		jQuery('#blog_type').on('change', function(){
			var $this = jQuery(this),
				val = $this.val();

			changeBlogType(val);

		});

		function changeBlogType(val){
			switch (val){
				case 'blog-classic':
					optionDefault.slideDown(300);
					optionMasonry.slideUp(300);
					optionBorder.slideDown(300);
					optionExcerpt.slideDown(300);
					optionClassic.slideDown(300);
					break;
				case 'blog-classic-alt':
					optionDefault.slideDown(300);
					optionMasonry.slideUp(300);
					optionBorder.slideDown(300);
					optionExcerpt.slideDown(300);
					optionClassic.slideUp(300);
					break;
				case 'blog-masonry':
					optionDefault.slideUp(300);
					optionMasonry.slideDown(300);
					optionBorder.slideUp(300);
					optionExcerpt.slideDown(300);
					optionClassic.slideUp(300);
					break;
				case 'blog-second':
					optionDefault.slideDown(300);
					optionMasonry.slideUp(300);
					optionBorder.slideDown(300);
					optionExcerpt.slideUp(300);
					optionClassic.slideUp(300);
					break;
				case 'blog-third':
					optionDefault.slideDown(300);
					optionMasonry.slideUp(300);
					optionBorder.slideUp(300);
					optionExcerpt.slideUp(300);
					optionClassic.slideUp(300);
					break;
				case 'blog-fourth':
					optionDefault.slideDown(300);
					optionMasonry.slideUp(300);
					optionBorder.slideDown(300);
					optionExcerpt.slideUp(300);
					optionClassic.slideUp(300);
					break;
				default:
					optionDefault.slideDown(300);
					optionMasonry.slideUp(300);
					optionBorder.slideDown(300);
					optionExcerpt.slideDown(300);
					optionClassic.slideUp(300);
					break;
			}
		}

		if (jQuery('.tabs-holder').length) {

			var $tabsHolder = jQuery('.tabs-holder');

			$tabsHolder.each(function (i, val) {

				var $tabsNav = jQuery('.tabs-nav', val),
					eventtype = 'click';

				$tabsNav.each(function () {
					jQuery(this).next().children('.tab-content').first().stop(true, true).show();
					jQuery(this).children('li').first().addClass('active').stop(true, true).show();
				});

				$tabsNav.on(eventtype, 'a', function (e) {
					var $this = jQuery(this).parent('li'),
						$index = $this.index();
					$this.siblings().removeClass('active').end().addClass('active');
					$this.parent().next().children('.tab-content').stop(true, true).hide().eq($index).stop(true, true).fadeIn(250);
					e.preventDefault();
				});
			});
		}

	});
</script>



