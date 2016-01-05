<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Image URL', TMM_CC_TEXTDOMAIN),
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
            'type' => 'radio',
            'title' => __('Link Target', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'target',
            'id' => 'target',
            'name' => 'target',
            'values' => array(
                1 => array(
                    'title' => __('Self', TMM_CC_TEXTDOMAIN),
                    'id' => 'target_self',
                    'value' => '_self',
                    'checked' => ($value_type == '_self' ? 1 : 0)
                ),
                0 => array(
                    'title' => __('Blank', TMM_CC_TEXTDOMAIN),
                    'id' => 'target_blank',
                    'value' => '_blank',
                    'checked' => ($value_type == '_blank' ? 1 : 0)
                )
            ),
            'value' => $value_type,
            'description' => '',
            'hidden_id' => 'target'
        ));
		?>
	</div><!--/ .one-half-->

    <div class="one-half">
        <?php
        $action = TMM_Content_Composer::set_default_value('action', 'none');
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Action', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'action',
            'id' => 'img_shortcode_action',
            'options' => array(
                'none' => __('No link on image', TMM_CC_TEXTDOMAIN),
                'link' => __('Open link', TMM_CC_TEXTDOMAIN),
                'fancybox' => __('Open Image in fancybox', TMM_CC_TEXTDOMAIN),
            ),
            'default_value' => $action,
            'description' => ''
        ));
        ?>
    </div><!--/ .one-half-->

    <div class="one-half">
        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'radio',
            'title' => __('Show Border', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'show_border',
            'id' => 'show_border',
            'name' => 'show_border',
            'values' => array(
                1 => array(
                    'title' => __('Yes', TMM_CC_TEXTDOMAIN),
                    'id' => 'show_border_1',
                    'value' => 1,
                    'checked' => ($value_type == 1 ? 1 : 0)
                ),
                0 => array(
                    'title' => __('No', TMM_CC_TEXTDOMAIN),
                    'id' => 'show_border_0',
                    'value' => 0,
                    'checked' => ($value_type == 0 ? 1 : 0)
                )
            ),
            'value' => $value_type,
            'description' => '',
            'hidden_id' => 'show_border'
        ));
        ?>


    </div><!--/ .one-half-->

    <div id="image_action_link" class="one-half" style="display: none;">
        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Image Action Link', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'image_action_link',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('image_action_link', 'http://'),
            'description' => '',
        ));
        ?>
    </div>

    <div id="image_fancybox_group" class="one-half" style="display: none;">
        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Fancybox Group', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'fancybox_group',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('fancybox_group', ''),
            'description' => '',
        ));
        ?>
    </div>

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

    <div class="one-half" id="image_without_link"></div><!--/ .one-half-->

    <div class="one-half">

        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Width', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'width',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('width', '200'),
            'description' => '',
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
            'title' => __('Height', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'height',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('height', '200'),
            'description' => '',
        ));
        ?>

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
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery('#img_shortcode_action').on('change', function() {
			jQuery("#image_fancybox_group").hide(300);
			jQuery("#image_action_link").hide(300);
            jQuery("#image_without_link").show(300);
			if (jQuery(this).val() == 'link') {
                jQuery("#image_fancybox_group").hide(300);
				jQuery("#image_without_link").hide(300);
                jQuery("#image_action_link").show(300);
                jQuery("#parallax").val('');
                jQuery("#overlay").val('');
			}
			if (jQuery(this).val() == 'fancybox') {
				jQuery("#image_action_link").hide(300);
                jQuery("#image_without_link").hide(300);
                jQuery("#image_fancybox_group").show(300);
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
