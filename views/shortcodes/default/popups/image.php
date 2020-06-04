<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => esc_html__('Image URL', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Align', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'align',
			'id' => 'align',
			'options' => array(
				'' => esc_html__('None', TMM_CC_TEXTDOMAIN),
				'alignleft' => esc_html__('Left', TMM_CC_TEXTDOMAIN),
				'alignright' => esc_html__('Right', TMM_CC_TEXTDOMAIN),
				'aligncenter' => esc_html__('Center', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('align', ''),
			'description' => ''
		));
		?>


	</div><!--/ .one-half-->

	<div class="one-half">

		<?php

		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Size', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'image_size_alias',
			'id' => 'image_size_alias',
			'default_value' => TMM_Content_Composer::set_default_value('image_size_alias', ''),
			'description' => esc_html__('width*height. Fore example: 500*300. Empty field means full size', TMM_CC_TEXTDOMAIN),
		));
		?>


	</div><!--/ .one-half-->


	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Image Alt', TMM_CC_TEXTDOMAIN),
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
			'title' => esc_html__('Top Indent (px)', TMM_CC_TEXTDOMAIN),
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
			'title' => esc_html__('Right Indent (px)', TMM_CC_TEXTDOMAIN),
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
			'title' => esc_html__('Bottom Indent (px)', TMM_CC_TEXTDOMAIN),
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
			'title' => esc_html__('Left Indent (px)', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'margin_left',
			'id' => 'margin_left',
			'default_value' => TMM_Content_Composer::set_default_value('margin_left', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->
    
    <div class="one-half">

		<?php
		$action = TMM_Content_Composer::set_default_value('action', 'none');

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Action', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'action',
			'id' => 'img_shortcode_action',
			'options' => array(
				'none' => esc_html__('No link on image', TMM_CC_TEXTDOMAIN),
				'link' => esc_html__('Open link', TMM_CC_TEXTDOMAIN),
				'lightbox' => esc_html__('Open Image in lightbox', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => $action,
			'description' => ''
		));
		?>


		<div id="image_action_link" style="display: <?php echo($action == 'link' ? 'block' : 'none') ?>;">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Image Action Link', TMM_CC_TEXTDOMAIN),
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
				'title' => esc_html__('Link Target', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'target',
				'id' => 'target',
				'options' => array(
					'_self' => esc_html__('Self', TMM_CC_TEXTDOMAIN),
					'_blank' => esc_html__('Blank', TMM_CC_TEXTDOMAIN),
				),
				'default_value' => TMM_Content_Composer::set_default_value('target', '_self'),
				'description' => ''
			));
			?>
            
            <br />
            
            <?php
            TMM_Content_Composer::html_option(array(
                    'type' => 'text',
                    'title' => esc_html__('Link Title', TMM_CC_TEXTDOMAIN),
                    'shortcode_field' => 'link_title',
                    'id' => 'link_title',
                    'default_value' => TMM_Content_Composer::set_default_value('link_title', ''),
                    'description' => ''
                ));
            ?>

		</div>
        
        <div id="image_without_link" style="display: <?php echo($action == 'none' ? 'block' : 'none') ?>;">
            <?php
            TMM_Content_Composer::html_option(array(
                        'type' => 'checkbox',
                        'title' => esc_html__('Parallax Image (On / Off)', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'parallax',
                        'id' => 'parallax',
                        'is_checked' => TMM_Content_Composer::set_default_value('parallax', 0),
                        'description' => ''
                ));
            ?>
            <?php
            TMM_Content_Composer::html_option(array(
                        'type' => 'checkbox',
                        'title' => esc_html__('Parallax Overlay (On / Off)', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'overlay',
                        'id' => 'overlay',
                        'is_checked' => TMM_Content_Composer::set_default_value('overlay', 0),
                        'description' => ''
                ));
                ?>
        </div>

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

		jQuery('#img_shortcode_action').on('change', function() {
			jQuery("#image_action_link").hide(300);
            jQuery("#image_without_link").show(300);
			if (jQuery(this).val() == 'link') {
				jQuery("#image_action_link").show(300);
				jQuery("#image_without_link").hide(300);
                jQuery("#parallax").val('');
                jQuery("#overlay").val('');
			}
			if (jQuery(this).val() == 'lightbox') {
				jQuery("#image_action_link").hide(300);
				jQuery("#image_without_link").hide(300);
                jQuery("#parallax").val('');
                jQuery("#overlay").val('');
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
		
	});	

</script>
