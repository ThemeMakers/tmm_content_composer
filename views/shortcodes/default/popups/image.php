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

	</div><!--/ .one-half-->


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

		<div id="image_action_link" style="display: <?php echo($action == 'none' ? 'none' : 'block') ?>;">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => __('Image Action Link', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'image_action_link',
				'id' => 'image_action_link',
				'default_value' => TMM_Content_Composer::set_default_value('image_action_link', '#'),
				'description' => ''
			));
			?>

			<br />

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
			
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => __('Open in Fancybox', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'fancybox',
				'id' => 'fancybox',
				'is_checked' => TMM_Content_Composer::set_default_value('fancybox', 0),
				'description' => ''
			));
			?>	

		</div>

	</div><!--/ .one-half-->

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

	</div><!--/ .one-half-->

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

	</div><!--/ .one-half-->

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

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Link Title', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'link_title',
			'id' => 'link_title',
			'default_value' => TMM_Content_Composer::set_default_value('link_title', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Top Indent (px)', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'margin_top',
			'id' => 'margin_top',
			'default_value' => TMM_Content_Composer::set_default_value('margin_top', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Right Indent (px)', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'margin_right',
			'id' => 'margin_right',
			'default_value' => TMM_Content_Composer::set_default_value('margin_right', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Bottom Indent (px)', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'margin_bottom',
			'id' => 'margin_bottom',
			'default_value' => TMM_Content_Composer::set_default_value('margin_bottom', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Left Indent (px)', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'margin_left',
			'id' => 'margin_left',
			'default_value' => TMM_Content_Composer::set_default_value('margin_left', ''),
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
			jQuery("#image_action_link").hide(300);
			if (jQuery(this).val() == 'link') {
				jQuery("#image_action_link").show(300);
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
