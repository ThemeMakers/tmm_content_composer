<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Image URL', 'cardealer'),
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
					'title' => __('Image Hover Effect', 'cardealer'),
					'shortcode_field' => 'hover_effect',
					'id' => 'hover_effect',
					'options' => array(
						'' => __('None', 'cardealer'),
						'opacity' => __('Opacity', 'cardealer'),
						'grayscale' => __('Grayscale', 'cardealer'),
						'sepia' => __('Sepia', 'cardealer'),
						'saturate' => __('Saturate', 'cardealer'),
						'brightness' => __('Brightness', 'cardealer'),
						'contrast' => __('Contrast', 'cardealer'),
						'blur' => __('Blur', 'cardealer'),
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
					'title' => __('Action', 'cardealer'),
					'shortcode_field' => 'action',
					'id' => 'img_shortcode_action',
					'options' => array(
						'none' => __('No link on image', 'cardealer'),
						'link' => __('Open link', 'cardealer'),
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
						'title' => __('Target URL', 'cardealer'),
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
						'title' => __('Link Target', 'cardealer'),
						'shortcode_field' => 'target',
						'id' => 'target',
						'options' => array(
							'_self' => __('Self', 'cardealer'),
							'_blank' => __('Blank', 'cardealer'),
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
					'title' => __('Open original image size in Fancybox', 'cardealer'),
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
					'title' => __('Align', 'cardealer'),
					'shortcode_field' => 'align',
					'id' => 'align',
					'options' => array(
						'' => __('None', 'cardealer'),
						'alignleft' => __('Left', 'cardealer'),
						'alignright' => __('Right', 'cardealer'),
						'aligncenter' => __('Center', 'cardealer'),
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
					'title' => __('Size', 'cardealer'),
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
					'title' => __('Caption Type', 'cardealer'),
					'shortcode_field' => 'caption_type',
					'id' => 'caption_type',
					'options' => array(
						'' => __('Default (Beneath Image)', 'cardealer'),
						'static' => __('Static (Over Image)', 'cardealer'),
						'animated' => __('Animated (Over Image)', 'cardealer'),
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
					'title' => __('Caption Style', 'cardealer'),
					'shortcode_field' => 'caption_style',
					'id' => 'caption_style',
					'options' => array(
						'' => __('Default', 'cardealer'),
						'style-1' => __('Light Translucent BG', 'cardealer'),
						'style-2' => __('Dark Translucent BG', 'cardealer'),
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
					'title' => __('Image Alt', 'cardealer'),
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
					'title' => __('Image Caption', 'cardealer'),
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
			'title' => __('Inner Offset', 'cardealer'),
			'shortcode_field' => 'inner_offset',
			'id' => 'inner_offset',
			'options' => array(
				'' => __('None', 'cardealer'),
				'io-1' => __('Smaller...........1px', 'cardealer'),
				'io-3' => __('Small..............3px', 'cardealer'),
				'io-5' => __('Middle............5px', 'cardealer'),
				'io-10' => __('Large.............10px', 'cardealer'),
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
					'title' => __('Outer Offset (top)', 'cardealer'),
					'shortcode_field' => 'margin_top',
					'id' => 'margin_top',
					'options' => array(
						'' => __('None', 'cardealer'),
						'oo-t-5' => __('Smaller...........5px', 'cardealer'),
						'oo-t-10' => __('Small..............10px', 'cardealer'),
						'oo-t-15' => __('Middle............15px', 'cardealer'),
						'oo-t-20' => __('Large.............20px', 'cardealer'),
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
					'title' => __('Outer Offset (right)', 'cardealer'),
					'shortcode_field' => 'margin_right',
					'id' => 'margin_right',
					'options' => array(
						'' => __('None', 'cardealer'),
						'oo-r-5' => __('Smaller...........5px', 'cardealer'),
						'oo-r-10' => __('Small..............10px', 'cardealer'),
						'oo-r-15' => __('Middle............15px', 'cardealer'),
						'oo-r-20' => __('Large.............20px', 'cardealer'),
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
					'title' => __('Outer Offset (bottom)', 'cardealer'),
					'shortcode_field' => 'margin_bottom',
					'id' => 'margin_bottom',
					'options' => array(
						'' => __('None', 'cardealer'),
						'oo-b-5' => __('Smaller...........5px', 'cardealer'),
						'oo-b-10' => __('Small..............10px', 'cardealer'),
						'oo-b-15' => __('Middle............15px', 'cardealer'),
						'oo-b-20' => __('Large.............20px', 'cardealer'),
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
					'title' => __('Outer Offset (left)', 'cardealer'),
					'shortcode_field' => 'margin_left',
					'id' => 'margin_left',
					'options' => array(
						'' => __('None', 'cardealer'),
						'oo-l-5' => __('Smaller...........5px', 'cardealer'),
						'oo-l-10' => __('Small..............10px', 'cardealer'),
						'oo-l-15' => __('Middle............15px', 'cardealer'),
						'oo-l-20' => __('Large.............20px', 'cardealer'),
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
					'title' => __('Border Style', 'cardealer'),
					'shortcode_field' => 'brd_style',
					'id' => 'brd_style',
					'options' => array(
						'brd-solid' => __('Solid', 'cardealer'),
						'brd-dashed' => __('Dashed', 'cardealer'),
						'brd-dotted' => __('Dotted', 'cardealer'),
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
					'title' => __('Border Width', 'cardealer'),
					'shortcode_field' => 'brd_width',
					'id' => 'brd_width',
					'options' => array(
						'brd-w-0' => __('None', 'cardealer'),
						'brd-w-1' => __('Small..............1px', 'cardealer'),
						'brd-w-2' => __('Middle............2px', 'cardealer'),
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
			'title' => __('Border Color', 'cardealer'),
			'shortcode_field' => 'brd_color',
			'id' => 'brd_color',
			'options' => array(
				'brd-light-grey' => __('Light Grey', 'cardealer'),
				'brd-grey' => __('Grey', 'cardealer'),
				'brd-white' => __('White', 'cardealer'),
				'brd-white-transparent' => __('White with opacity', 'cardealer'),
				'brd-grey-transparent' => __('Grey with opacity', 'cardealer'),
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
