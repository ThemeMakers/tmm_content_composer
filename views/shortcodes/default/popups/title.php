<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
} ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="tabs-holder">

		<ul class="tabs-nav clearfix">

			<li><a href="#"><?php _e( 'Default Options', TMM_CC_TEXTDOMAIN ); ?></a></li>
			<li><a href="#"><?php _e( 'Advanced Title Options', TMM_CC_TEXTDOMAIN ); ?></a></li>

		</ul>

		<div class="tabs-container clearfix">

			<div class="tab-content">

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'text',
						'title'           => __( 'Title Text', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'content',
						'id'              => 'title_text',
						'default_value'   => TMM_Content_Composer::set_default_value( 'content', '' ),
						'description'     => ''
					) );
					?>

				</div>
				<!--/ .one-half-->

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'select',
						'title'           => __( 'Title Heading', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'type',
						'id'              => 'type',
						'options'         => array(
							'h1' => 'H1',
							'h2' => 'H2',
							'h3' => 'H3',
							'h4' => 'H4',
							'h5' => 'H5',
							'h6' => 'H6',
						),
						'default_value'   => TMM_Content_Composer::set_default_value( 'type', 'H1' ),
						'description'     => ''
					) );
					?>
				</div>
				<!--/ .one-half-->

				<div class="one-half">
					<?php
					$font_size = array( 'default' => __( 'Default', TMM_CC_TEXTDOMAIN ) );
					for ( $i = 8; $i <= 72; $i ++ ) {
						$font_size[ $i ] = $i;
					}
					//***
					TMM_Content_Composer::html_option( array(
						'type'            => 'select',
						'title'           => __( 'Font Size', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'font_size',
						'id'              => 'font_size',
						'options'         => $font_size,
						'default_value'   => TMM_Content_Composer::set_default_value( 'font_size', 'default' ),
						'description'     => ''
					) );
					?>

				</div>

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'text',
						'title'           => __( 'Letter spacing (px)', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'letter_spacing',
						'id'              => 'letter_spacing',
						'default_value'   => TMM_Content_Composer::set_default_value( 'letter_spacing', '' ),
						'description'     => ''
					) );
					?>
				</div>
				<!--/ .ona-half-->

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'select',
						'title'           => __( 'Font weight', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'font_weight',
						'id'              => 'font_weight',
						'options'         => array(
							'normal' => __( 'Normal', TMM_CC_TEXTDOMAIN ),
							'100'    => 100,
							'200'    => 200,
							'300'    => 300,
							'400'    => 400,
							'500'    => 500,
							'600'    => 600,
							'700'    => 700
						),
						'default_value'   => TMM_Content_Composer::set_default_value( 'font_weight', '300' ),
						'description'     => ''
					) );
					?>
				</div>
				<!--/ .ona-half-->

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'select',
						'title'           => __( 'Title Align', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'align',
						'id'              => 'align',
						'options'         => array(
							'left'   => 'Left',
							'right'  => 'Right',
							'center' => 'Center',
						),
						'default_value'   => TMM_Content_Composer::set_default_value( 'align', 'left' ),
						'description'     => ''
					) );
					?>

				</div>

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'select',
						'title'           => __( 'Font Family', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'font_family',
						'id'              => 'font_family',
						'options'         => tmm_get_fonts_array(),
						'default_value'   => TMM_Content_Composer::set_default_value( 'font_family', '' ),
						'description'     => ''
					) );
					?>

				</div>
				<!--/ .one-half-->

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'title'           => __( 'Title type', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'title_type',
						'type'            => 'select',
						'description'     => '',
						'default_value'   => TMM_Content_Composer::set_default_value( 'title_type', '' ),
						'id'              => 'title_type',
						'options'         => array(
							'default' => 'Default',
							'section' => 'Section Title'
						),
						'display'         => 1
					) );
					?>

				</div>


				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'text',
						'title'           => __( 'Margin Bottom (px)', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'bottom_indent',
						'id'              => 'bottom_indent',
						'default_value'   => TMM_Content_Composer::set_default_value( 'bottom_indent', '' ),
						'description'     => ''
					) );
					?>

				</div>
				<!--/ .one-half-->

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'text',
						'title'           => __( 'Line Height (em)', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'line_height',
						'id'              => 'line_height',
						'default_value'   => TMM_Content_Composer::set_default_value( 'line_height', '1.35' ),
						'description'     => ''
					) );
					?>

				</div>
				<!--/ .one-half-->

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'title'           => __( 'Color', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'color',
						'type'            => 'color',
						'description'     => '',
						'default_value'   => TMM_Content_Composer::set_default_value( 'color', '' ),
						'id'              => '',
						'display'         => 1
					) );
					?>

				</div>

				<div class="one-half">

					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'checkbox',
						'title'           => __( 'Text Transform Uppercase', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'text_transform',
						'id'              => 'text_transform',
						'is_checked'      => TMM_Content_Composer::set_default_value( 'text_transform', 0 ),
						'description'     => ''
					) );
					?>

				</div>

			</div>
			<!--/ .tab-content-->


			<div class="tab-content">

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'title'           => __( 'Background Color', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'bg_color',
						'type'            => 'color',
						'description'     => '',
						'default_value'   => TMM_Content_Composer::set_default_value( 'bg_color', '' ),
						'id'              => '',
						'display'         => 1
					) );
					?>

				</div>

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'title'           => __( 'Background Opacity (from 0 to 1)', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'bg_opacity',
						'type'            => 'text',
						'description'     => '',
						'default_value'   => TMM_Content_Composer::set_default_value( 'bg_opacity', '' ),
						'id'              => '',
						'display'         => 1
					) );
					?>

				</div>

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'title'           => __( 'Background Radius (%)', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'bg_radius',
						'type'            => 'text',
						'description'     => '',
						'default_value'   => TMM_Content_Composer::set_default_value( 'bg_radius', '' ),
						'id'              => '',
						'display'         => 1
					) );
					?>

				</div>

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'text',
						'title'           => __( 'Padding (px)', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'bg_padding',
						'id'              => '',
						'default_value'   => TMM_Content_Composer::set_default_value( 'bg_padding', '' ),
						'description'     => ''
					) );
					?>

				</div>
				<!--/ .one-half-->

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'title'           => __( 'Background Width (px)', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'bg_width',
						'type'            => 'text',
						'description'     => '',
						'default_value'   => TMM_Content_Composer::set_default_value( 'bg_width', '' ),
						'id'              => '',
						'display'         => 1
					) );
					?>

				</div>

				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option( array(
						'title'           => __( 'Background Height (px)', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'bg_height',
						'type'            => 'text',
						'description'     => '',
						'default_value'   => TMM_Content_Composer::set_default_value( 'bg_height', '' ),
						'id'              => '',
						'display'         => 1
					) );
					?>

				</div>

				<div class="one-half">

					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'checkbox',
						'title'           => __( 'Use Website General Color', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'use_general_color',
						'id'              => 'use_general_color',
						'is_checked'      => TMM_Content_Composer::set_default_value( 'use_general_color', 0 ),
						'description'     => ''
					) );
					?>

				</div>

				<div class="one-half">

					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'checkbox',
						'title'           => __( 'Background Align Center', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'bg_center',
						'id'              => 'bg_center',
						'is_checked'      => TMM_Content_Composer::set_default_value( 'bg_center', 0 ),
						'description'     => ''
					) );
					?>

				</div>

				<div class="one-half">

					<?php

					TMM_Content_Composer::html_option( array(
						'type'            => 'select',
						'title'           => __( 'Effect for Appearing Title', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'title_effect',
						'id'              => 'title_effect',
						'default_value'   => TMM_Content_Composer::set_default_value( 'title_effect', '' ),
						'options'         => array(
							'none'        => __( 'None', TMM_CC_TEXTDOMAIN ),
							'elementFade' => __( 'Element Fade', TMM_CC_TEXTDOMAIN ),
							'opacity2x'   => __( 'Opacity', TMM_CC_TEXTDOMAIN ),
							'slideRight'  => __( 'Slide Right', TMM_CC_TEXTDOMAIN ),
							'slideLeft'   => __( 'Slide Left', TMM_CC_TEXTDOMAIN ),
							'slideDown'   => __( 'Slide Down', TMM_CC_TEXTDOMAIN ),
							'slideUp'     => __( 'Slide Up', TMM_CC_TEXTDOMAIN ),
							'slideUp2x'   => __( 'Slide Up 2x', TMM_CC_TEXTDOMAIN ),
							'extraRadius' => __( 'Extra Radius', TMM_CC_TEXTDOMAIN )
						),
						'description'     => ''
					) );
					?>

				</div>

				<div class="one-half">

					<?php
					TMM_Content_Composer::html_option( array(
						'type'            => 'checkbox',
						'title'           => __( 'Split Title in Rows and Animate Each Row', TMM_CC_TEXTDOMAIN ),
						'shortcode_field' => 'word_animate',
						'id'              => 'word_animate',
						'is_checked'      => TMM_Content_Composer::set_default_value( 'word_animate', 0 ),
						'description'     => ''
					) );

					?>
					<div class="separate_row"
						 style="<?php echo ( TMM_Content_Composer::set_default_value( 'word_animate', 0 ) ) ? 'display:block' : 'display:none'; ?>">
						<?php
						TMM_Content_Composer::html_option(array(
							'type'            => 'text',
							'title'           => __( 'Split Title with the help "^" symbol', TMM_CC_TEXTDOMAIN ),
							'shortcode_field' => 'separate_row',
							'id'              => 'separate_row',
							'description'     => '',
							'default_value'   => TMM_Content_Composer::set_default_value( 'separate_row', '' ),
						));
						?>
					</div>

				</div>

			</div>
			<!--/ .tab-content-->

		</div>
		<!--/ .tabs-container-->

	</div>

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function () {

		function separateRow() {
			var title_text = jQuery('#title_text').val();
			title_text = title_text.split(' ').join('^');
			var prev_separate = jQuery('#separate_row').val();
			if (prev_separate == '') {
				jQuery('#separate_row').val(title_text);
			}
			if (jQuery('#word_animate').is(':checked')) {
				jQuery('#title_text').prop('readonly', true);
				jQuery('#title_effect').attr('disabled', true).css('background-color', '#eee');
			} else {
				jQuery('#title_text').prop('readonly', false);
				jQuery('#title_effect').attr('disabled', false).css('background-color', '#fff');
			}
		};

		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function () {
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
		});

		colorizator();
		separateRow();

		jQuery('#word_animate').life('click', function () {
			if (jQuery(this).is(':checked')) {
				var title_text = jQuery('#title_text').val();
				var prev_separate = jQuery('#separate_row').val();
				if (prev_separate == '') {
					title_text = title_text.split(' ').join('^');
					jQuery('#separate_row').val(title_text);
				}
				jQuery('.separate_row').fadeIn(300);
				jQuery('#title_text').prop('readonly', true);
				jQuery('#title_effect').attr('disabled', true).css('background-color', '#eee');

			} else {
				jQuery('.separate_row').fadeOut(300);
				jQuery('#title_text').prop('readonly', false);
				jQuery('#title_effect').attr('disabled', false).css('background-color', '#fff');
			}
		});

		if (jQuery('.tabs-holder').length) {

			var $tabsHolder = jQuery('.tabs-holder');

			$tabsHolder.each(function (i, val) {

				var $tabsNav = jQuery('.tabs-nav', val),
					tabsNavLis = $tabsNav.children('li'),
					$tabsContainer = jQuery('.tabs-container', val),
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

