<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
} ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

<div class="tabs-holder">

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
		for ( $i = 8; $i <= 82; $i ++ ) {
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
			'title'           => __( 'Align', TMM_CC_TEXTDOMAIN ),
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

        TMM_Content_Composer::html_option(array(
            'type' => 'checkbox',
            'title' => __('Use Website General Color', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'use_general_color',
            'id' => 'use_general_color',
            'is_checked' => TMM_Content_Composer::set_default_value('use_general_color', 0),
            'description' => ''
        ));

        TMM_Content_Composer::html_option(array(
            'type' => 'checkbox',
            'title' => __('Use Border', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'use_border',
            'id' => 'use_border',
            'is_checked' => TMM_Content_Composer::set_default_value('use_border', 0),
            'description' => 'Add short border bottom'
        ));

        ?>

    </div>

    <div class="one-half">

        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Animation', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'animation',
            'id' => '',
            'options' => TMM_Content_Composer::css_animation_array(),
            'default_value' => TMM_Content_Composer::set_default_value('animation', ''),
            'description' => 'Waypoints is a jQuery plugin that makes it easy to execute a function whenever you scroll to an element.'
        ));
        ?>

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

		jQuery('#title_type').life('click', function(){
			var val = jQuery(this).val(),
				titleDesc  = jQuery('.hdesc');

			switch(val){
				case 'default':
					titleDesc.slideUp(400);
					break;
				case 'section':
					titleDesc.slideDown(400);
					break;
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

