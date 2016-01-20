<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons Text', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Size', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'size',
            'id' => 'size',
            'options' => TMM_Content_Composer::get_theme_buttons_sizes(),
            'default_value' => TMM_Content_Composer::set_default_value('size', ''),
            'description' => ''
        ));
        ?>

        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Color', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'color',
            'id' => 'color',
            'options' => array(
                'default' => __('Default', TMM_CC_TEXTDOMAIN),
                'turquoise' => __('Turquoise', TMM_CC_TEXTDOMAIN)
            ),
            'default_value' => TMM_Content_Composer::set_default_value('color', ''),
            'description' => ''
        ));
        ?>

    </div><!--/ .one-half-->

    <div class="one-half">

        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('URL', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'url',
            'id' => 'url',
            'default_value' => TMM_Content_Composer::set_default_value('url', ''),
            'description' => ''
        ));
        ?>

        <?php
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Align', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'align',
            'id' => '',
            'options' => array(
                'align-left' => 'Left',
                'align-center' => 'Center',
                'align-right' => 'Right'
            ),
            'default_value' => TMM_Content_Composer::set_default_value('align', ''),
            'description' => ''
        ));

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

    </div><!--/ .one-half-->

</div><!--/ .tmm_shortcode_template->


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
            colorizator();
		});
		colorizator();
        
        function transparentChanger(a){
            //var $this = jQuery(this),
            var disableInput = a.parent().prev().find('input[type="text"]');                    
            if (a.is(':checked')) {
                disableInput.prop('readonly', true);
            }
            else{
                disableInput.prop('readonly', false);
            }      
            a.on('change', function(){
                    var $this = jQuery(this),
                    disableInput = $this.parent().prev().find('input[type="text"]');                    
                    if ($this.is(':checked')) {
                        disableInput.prop('readonly', true);
                    }
                    else{
                        disableInput.prop('readonly', false);
                    }
                    
                });
        };
        
        transparentChanger(jQuery('#bg_transparent'));
        transparentChanger(jQuery('#border_color_transparent'));
        transparentChanger(jQuery('#mouseover_bg_transparent'));
        transparentChanger(jQuery('#mouseover_border_color_transparent'));
                        
        if (jQuery('#button_type').val()=='roll' || jQuery('#button_type').val()=='orange-roll'){
            jQuery('.colors').hide();
        }
        jQuery('#button_type').on('change', function(){
            if (jQuery(this).val()=='roll' || jQuery(this).val()=='orange-roll'){
                jQuery('.colors').fadeOut();
            }else{
                jQuery('.colors').fadeIn();
            }
        });
                
                
		
	});
</script>


