<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Image URL', 'tmm_content_composer'),
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


	</div><!--/ .one-half-->

	<div class="one-half">

		<?php

		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Size', 'tmm_content_composer'),
			'shortcode_field' => 'image_size_alias',
			'id' => 'image_size_alias',
			'default_value' => TMM_Content_Composer::set_default_value('image_size_alias', ''),
			'description' => __('width*height. Fore example: 500*300. Empty field means full size', 'tmm_content_composer'),
		));
		?>


	</div><!--/ .one-half-->


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

	</div><!--/ .one-half-->	

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Top Indent (px)', 'tmm_content_composer'),
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
			'title' => __('Right Indent (px)', 'tmm_content_composer'),
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
			'title' => __('Bottom Indent (px)', 'tmm_content_composer'),
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
			'title' => __('Left Indent (px)', 'tmm_content_composer'),
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
			'title' => __('Action', 'tmm_content_composer'),
			'shortcode_field' => 'action',
			'id' => 'img_shortcode_action',
			'options' => array(
				'none' => __('No link on image', 'tmm_content_composer'),
				'link' => __('Open link', 'tmm_content_composer'),
				'lightbox' => __('Open Image in lightbox', 'tmm_content_composer'),
			),
			'default_value' => $action,
			'description' => ''
		));
		?>


		<div id="image_action_link" style="display: <?php echo($action == 'link' ? 'block' : 'none') ?>;">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => __('Image Action Link', 'tmm_content_composer'),
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
            
            <br />
            
            <?php
            TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => __('Link Title', 'tmm_content_composer'),
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
				'title' => __('Parallax Image (On / Off)', 'tmm_content_composer'),
				'shortcode_field' => 'parallax',
				'id' => 'parallax',
				'is_checked' => TMM_Content_Composer::set_default_value('parallax', 0),
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
