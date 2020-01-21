<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Image URL', 'tmm_content_composer'),
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
					'title' => __('Image Hover Effect', 'tmm_content_composer'),
					'shortcode_field' => 'hover_effect',
					'id' => 'hover_effect',
					'options' => array(
						'' => __('None', 'tmm_content_composer'),
						'opacity' => __('Opacity', 'tmm_content_composer'),
						'grayscale' => __('Grayscale', 'tmm_content_composer'),
						'sepia' => __('Sepia', 'tmm_content_composer'),
						'saturate' => __('Saturate', 'tmm_content_composer'),
						'brightness' => __('Brightness', 'tmm_content_composer'),
						'contrast' => __('Contrast', 'tmm_content_composer'),
						'blur' => __('Blur', 'tmm_content_composer'),
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
					'title' => __('Action', 'tmm_content_composer'),
					'shortcode_field' => 'action',
					'id' => 'img_shortcode_action',
					'options' => array(
						'none' => __('No link on image', 'tmm_content_composer'),
						'link' => __('Open link', 'tmm_content_composer'),
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
						'title' => __('Target URL', 'tmm_content_composer'),
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
						'title' => __('Link Target', 'tmm_content_composer'),
						'shortcode_field' => 'target',
						'id' => 'target',
						'options' => array(
							'_self' => __('Self', 'tmm_content_composer'),
							'_blank' => __('Blank', 'tmm_content_composer'),
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
					'title' => __('Open original image size in Fancybox', 'tmm_content_composer'),
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
					'title' => __('Align', 'tmm_content_composer'),
					'shortcode_field' => 'align',
					'id' => 'align',
					'options' => array(
						'' => __('None', 'tmm_content_composer'),
						'alignleft' => __('Left', 'tmm_content_composer'),
						'alignright' => __('Right', 'tmm_content_composer'),
						'aligncenter' => __('Center', 'tmm_content_composer'),
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
					'title' => __('Size', 'tmm_content_composer'),
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
					'title' => __('Caption Type', 'tmm_content_composer'),
					'shortcode_field' => 'caption_type',
					'id' => 'caption_type',
					'options' => array(
						'' => __('Default (Beneath Image)', 'tmm_content_composer'),
						'static' => __('Static (Over Image)', 'tmm_content_composer'),
						'animated' => __('Animated (Over Image)', 'tmm_content_composer'),
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
					'title' => __('Caption Style', 'tmm_content_composer'),
					'shortcode_field' => 'caption_style',
					'id' => 'caption_style',
					'options' => array(
						'' => __('Default', 'tmm_content_composer'),
						'style-1' => __('Light Translucent BG', 'tmm_content_composer'),
						'style-2' => __('Dark Translucent BG', 'tmm_content_composer'),
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
					'title' => __('Image Alt', 'tmm_content_composer'),
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
					'title' => __('Image Caption', 'tmm_content_composer'),
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
			'title' => __('Inner Offset', 'tmm_content_composer'),
			'shortcode_field' => 'inner_offset',
			'id' => 'inner_offset',
			'options' => array(
				'' => __('None', 'tmm_content_composer'),
				'io-1' => __('Smaller...........1px', 'tmm_content_composer'),
				'io-3' => __('Small..............3px', 'tmm_content_composer'),
				'io-5' => __('Middle............5px', 'tmm_content_composer'),
				'io-10' => __('Large.............10px', 'tmm_content_composer'),
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
					'title' => __('Outer Offset (top)', 'tmm_content_composer'),
					'shortcode_field' => 'margin_top',
					'id' => 'margin_top',
					'options' => array(
						'' => __('None', 'tmm_content_composer'),
						'oo-t-5' => __('Smaller...........5px', 'tmm_content_composer'),
						'oo-t-10' => __('Small..............10px', 'tmm_content_composer'),
						'oo-t-15' => __('Middle............15px', 'tmm_content_composer'),
						'oo-t-20' => __('Large.............20px', 'tmm_content_composer'),
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
					'title' => __('Outer Offset (right)', 'tmm_content_composer'),
					'shortcode_field' => 'margin_right',
					'id' => 'margin_right',
					'options' => array(
						'' => __('None', 'tmm_content_composer'),
						'oo-r-5' => __('Smaller...........5px', 'tmm_content_composer'),
						'oo-r-10' => __('Small..............10px', 'tmm_content_composer'),
						'oo-r-15' => __('Middle............15px', 'tmm_content_composer'),
						'oo-r-20' => __('Large.............20px', 'tmm_content_composer'),
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
					'title' => __('Outer Offset (bottom)', 'tmm_content_composer'),
					'shortcode_field' => 'margin_bottom',
					'id' => 'margin_bottom',
					'options' => array(
						'' => __('None', 'tmm_content_composer'),
						'oo-b-5' => __('Smaller...........5px', 'tmm_content_composer'),
						'oo-b-10' => __('Small..............10px', 'tmm_content_composer'),
						'oo-b-15' => __('Middle............15px', 'tmm_content_composer'),
						'oo-b-20' => __('Large.............20px', 'tmm_content_composer'),
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
					'title' => __('Outer Offset (left)', 'tmm_content_composer'),
					'shortcode_field' => 'margin_left',
					'id' => 'margin_left',
					'options' => array(
						'' => __('None', 'tmm_content_composer'),
						'oo-l-5' => __('Smaller...........5px', 'tmm_content_composer'),
						'oo-l-10' => __('Small..............10px', 'tmm_content_composer'),
						'oo-l-15' => __('Middle............15px', 'tmm_content_composer'),
						'oo-l-20' => __('Large.............20px', 'tmm_content_composer'),
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
					'title' => __('Border Style', 'tmm_content_composer'),
					'shortcode_field' => 'brd_style',
					'id' => 'brd_style',
					'options' => array(
						'brd-solid' => __('Solid', 'tmm_content_composer'),
						'brd-dashed' => __('Dashed', 'tmm_content_composer'),
						'brd-dotted' => __('Dotted', 'tmm_content_composer'),
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
					'title' => __('Border Width', 'tmm_content_composer'),
					'shortcode_field' => 'brd_width',
					'id' => 'brd_width',
					'options' => array(
						'brd-w-0' => __('None', 'tmm_content_composer'),
						'brd-w-1' => __('Small..............1px', 'tmm_content_composer'),
						'brd-w-2' => __('Middle............2px', 'tmm_content_composer'),
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
			'title' => __('Border Color', 'tmm_content_composer'),
			'shortcode_field' => 'brd_color',
			'id' => 'brd_color',
			'options' => array(
				'brd-light-grey' => __('Light Grey', 'tmm_content_composer'),
				'brd-grey' => __('Grey', 'tmm_content_composer'),
				'brd-white' => __('White', 'tmm_content_composer'),
				'brd-white-transparent' => __('White with opacity', 'tmm_content_composer'),
				'brd-grey-transparent' => __('Grey with opacity', 'tmm_content_composer'),
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
