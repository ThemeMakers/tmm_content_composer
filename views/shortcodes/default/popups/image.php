<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Image URL', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => 'content',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

		<div class="row">
			<div class="one-half">
				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Image Hover Effect', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'hover_effect',
					'id' => 'hover_effect',
					'options' => array(
						'' => __('None', TMM_CC_TEXTDOMAIN),
						'opacity' => __('Opacity', TMM_CC_TEXTDOMAIN),
						'grayscale' => __('Grayscale', TMM_CC_TEXTDOMAIN),
						'sepia' => __('Sepia', TMM_CC_TEXTDOMAIN),
						'saturate' => __('Saturate', TMM_CC_TEXTDOMAIN),
						'brightness' => __('Brightness', TMM_CC_TEXTDOMAIN),
						'contrast' => __('Contrast', TMM_CC_TEXTDOMAIN),
						'blur' => __('Blur', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('hover_effect', ''),
					'description' => ''
				));
				?>
			</div>
			<div class="one-half">
				<?php
				$action = TMM_Content_Composer::set_default_value('action', 'none');
				//***
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Action', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'action',
					'id' => 'img_shortcode_action',
					'options' => array(
						'none' => __('No link on image', TMM_CC_TEXTDOMAIN),
						'link' => __('Open link', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => $action,
					'description' => ''
				));
				?>

			</div>
		</div>

		<div id="target_url" style="display: <?php echo($action == 'none' ? 'none' : 'block') ?>;">

			<div class="row">
				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'text',
						'title' => __('Target URL', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'target_url',
						'id' => 'target_url',
						'default_value' => TMM_Content_Composer::set_default_value('target_url', '#'),
						'description' => ''
					));
					?>
				</div>
				<div class="one-half">
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'select',
						'title' => __('Link Target', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'target',
						'id' => 'target',
						'options' => array(
							'_self' => __('Self', TMM_CC_TEXTDOMAIN),
							'_blank' => __('Blank', TMM_CC_TEXTDOMAIN),
						),
						'default_value' => TMM_Content_Composer::set_default_value('target', '_self'),
						'description' => ''
					));
					?>
				</div>
			</div>

			<br />

			<?php
			TMM_Content_Composer::html_option(array(
					'type' => 'checkbox',
					'title' => __('Open original image size in Fancybox', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'fancybox',
					'id' => 'fancybox',
					'is_checked' => TMM_Content_Composer::set_default_value('fancybox', 0),
					'description' => ''
			));
			?>

		</div>

		<div class="row">
			<div class="one-half">
				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Align', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'align',
					'id' => 'align',
					'options' => array(
						'' => __('None', TMM_CC_TEXTDOMAIN),
						'alignleft' => __('Left', TMM_CC_TEXTDOMAIN),
						'alignright' => __('Right', TMM_CC_TEXTDOMAIN),
						'aligncenter' => __('Center', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('align', ''),
					'description' => ''
				));
				?>
			</div>
			<div class="one-half">
				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Size', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'image_size_alias',
					'id' => 'image_size_alias',
					'options' => TMM_OptionsHelper::get_theme_image_sizes_aliases(),
					'default_value' => TMM_Content_Composer::set_default_value('image_size_alias', ''),
					'description' => ''
				));
				?>
			</div>
		</div>

		<div class="row">
			<div class="one-half">
				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Caption Type', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'caption_type',
					'id' => 'caption_type',
					'options' => array(
						'' => __('Default (Beneath Image)', TMM_CC_TEXTDOMAIN),
						'static' => __('Static (Over Image)', TMM_CC_TEXTDOMAIN),
						'animated' => __('Animated (Over Image)', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('caption_type', ''),
					'description' => ''
				));
				?>
			</div>
			<div class="one-half">
				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Caption Style', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'caption_style',
					'id' => 'caption_style',
					'options' => array(
						'' => __('Default', TMM_CC_TEXTDOMAIN),
						'style-1' => __('Light Translucent BG', TMM_CC_TEXTDOMAIN),
						'style-2' => __('Dark Translucent BG', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('caption_style', ''),
					'description' => ''
				));
				?>
			</div>
		</div>

		<div class="row">
			<div class="one-half">
				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'text',
					'title' => __('Image Alt', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'image_alt',
					'id' => 'image_alt',
					'default_value' => TMM_Content_Composer::set_default_value('image_alt', ''),
					'description' => ''
				));
				?>
			</div>
			<div class="one-half">
				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'text',
					'title' => __('Image Caption', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'img_caption',
					'id' => 'img_caption',
					'default_value' => TMM_Content_Composer::set_default_value('img_caption', ''),
					'description' => ''
				));
				?>
			</div>
		</div>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Inner Offset', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'inner_offset',
			'id' => 'inner_offset',
			'options' => array(
				'' => __('None', TMM_CC_TEXTDOMAIN),
				'io-1' => __('Smaller...........1px', TMM_CC_TEXTDOMAIN),
				'io-3' => __('Small..............3px', TMM_CC_TEXTDOMAIN),
				'io-5' => __('Middle............5px', TMM_CC_TEXTDOMAIN),
				'io-10' => __('Large.............10px', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('inner_offset', ''),
			'description' => ''
		));
		?>

		<div class="row">
			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Outer Offset (top)', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'margin_top',
					'id' => 'margin_top',
					'options' => array(
						'' => __('None', TMM_CC_TEXTDOMAIN),
						'oo-t-5' => __('Smaller...........5px', TMM_CC_TEXTDOMAIN),
						'oo-t-10' => __('Small..............10px', TMM_CC_TEXTDOMAIN),
						'oo-t-15' => __('Middle............15px', TMM_CC_TEXTDOMAIN),
						'oo-t-20' => __('Large.............20px', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('margin_top', ''),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Outer Offset (right)', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'margin_right',
					'id' => 'margin_right',
					'options' => array(
						'' => __('None', TMM_CC_TEXTDOMAIN),
						'oo-r-5' => __('Smaller...........5px', TMM_CC_TEXTDOMAIN),
						'oo-r-10' => __('Small..............10px', TMM_CC_TEXTDOMAIN),
						'oo-r-15' => __('Middle............15px', TMM_CC_TEXTDOMAIN),
						'oo-r-20' => __('Large.............20px', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('margin_right', ''),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->
		</div>

		<div class="row">
			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Outer Offset (bottom)', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'margin_bottom',
					'id' => 'margin_bottom',
					'options' => array(
						'' => __('None', TMM_CC_TEXTDOMAIN),
						'oo-b-5' => __('Smaller...........5px', TMM_CC_TEXTDOMAIN),
						'oo-b-10' => __('Small..............10px', TMM_CC_TEXTDOMAIN),
						'oo-b-15' => __('Middle............15px', TMM_CC_TEXTDOMAIN),
						'oo-b-20' => __('Large.............20px', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('margin_bottom', ''),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Outer Offset (left)', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'margin_left',
					'id' => 'margin_left',
					'options' => array(
						'' => __('None', TMM_CC_TEXTDOMAIN),
						'oo-l-5' => __('Smaller...........5px', TMM_CC_TEXTDOMAIN),
						'oo-l-10' => __('Small..............10px', TMM_CC_TEXTDOMAIN),
						'oo-l-15' => __('Middle............15px', TMM_CC_TEXTDOMAIN),
						'oo-l-20' => __('Large.............20px', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('margin_left', ''),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->
		</div>

		<div class="row">
			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Border Style', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'brd_style',
					'id' => 'brd_style',
					'options' => array(
						'brd-solid' => __('Solid', TMM_CC_TEXTDOMAIN),
						'brd-dashed' => __('Dashed', TMM_CC_TEXTDOMAIN),
						'brd-dotted' => __('Dotted', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('brd_style', 'brd-solid'),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Border Width', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'brd_width',
					'id' => 'brd_width',
					'options' => array(
						'brd-w-0' => __('None', TMM_CC_TEXTDOMAIN),
						'brd-w-1' => __('Small..............1px', TMM_CC_TEXTDOMAIN),
						'brd-w-2' => __('Middle............2px', TMM_CC_TEXTDOMAIN),
					),
					'default_value' => TMM_Content_Composer::set_default_value('brd_width', 'brd-w-0'),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->
		</div>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Border Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'brd_color',
			'id' => 'brd_color',
			'options' => array(
				'brd-light-grey' => __('Light Grey', TMM_CC_TEXTDOMAIN),
				'brd-grey' => __('Grey', TMM_CC_TEXTDOMAIN),
				'brd-white' => __('White', TMM_CC_TEXTDOMAIN),
				'brd-white-transparent' => __('White with opacity', TMM_CC_TEXTDOMAIN),
				'brd-grey-transparent' => __('Grey with opacity', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('brd_color', 'brd-light-grey'),
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
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery('#img_shortcode_action').on('change', function() {
			jQuery("#target_url").hide(300);
			if (jQuery(this).val() == 'link') {
				jQuery("#target_url").show(300);
			}
		});
		
		var $align = jQuery('select#align'),
			$inputs = jQuery('input[type=text]#margin_left, input[type=text]#margin_right');

		var checkAlign = function(mode) {
			if (mode.children(':selected').val() == 'aligncenter') {
				$inputs.val('').prop({
					"disabled": true
				}).css('background-color', '#eee');
			} else {
				$inputs.prop({
					"disabled": false
				}).css('background-color', '#fff');
			}
		};

		checkAlign($align);

		$align.on('change', function() { checkAlign(jQuery(this)); });	
		
		var $img_animated = jQuery("#img_animated");
		
		function slideDownUp (el) {
			if (el.is(':checked')) {
				jQuery('.hide').slideDown(300);
			} else {
				jQuery('.hide').slideUp(300);
			}	
		}
		
		slideDownUp($img_animated)

		$img_animated.on('click', function () {
			slideDownUp(jQuery(this));
		});

	});

	function app_shortcode_border_align_values(self) {
		jQuery("#image_border_align_values").hide(300);
		if (jQuery(self).val() == 1) {
			jQuery("#image_border_align_values").show(300);
		}
	}

</script>
