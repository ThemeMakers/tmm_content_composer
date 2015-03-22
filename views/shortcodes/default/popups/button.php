<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons Text', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'text',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('text', ''),
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
			'description' => 'http://forums.webtemplatemasters.com/'
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
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

	</div><!--/ .one-half-->

    <div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Button type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'type',
			'id' => 'button_type',
			'options' => array(
	            'default' => 'Default',
	            'colored' => 'Colored',
            ),
			'default_value' => TMM_Content_Composer::set_default_value('type', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

        <div class="one-half">

        </div><!--/ .one-half-->

        <div class="colors">
        
            <div class="one-half">

                <?php
                TMM_Content_Composer::html_option(array(
                    'type' => 'color',
                    'title' => __('Text Color', TMM_CC_TEXTDOMAIN),
                    'shortcode_field' => 'text_color',
                    'id' => '',
                    'default_value' => TMM_Content_Composer::set_default_value('text_color', '#fff'),
                    'description' => '',
                    'display' => 1
                ));
                ?>

            </div><!--/ .one-half-->

            <div class="one-half">

                <?php
                TMM_Content_Composer::html_option(array(
                    'type' => 'color',
                    'title' => __('Mouseover Text Color', TMM_CC_TEXTDOMAIN),
                    'shortcode_field' => 'mouseover_text_color',
                    'id' => '',
                    'default_value' => TMM_Content_Composer::set_default_value('mouseover_text_color', '#000'),
                    'description' => '',
                    'display' => 1
                ));
                ?>

            </div><!--/ .one-half-->

            <div class="one-half">
                <div  class="align-left">
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'type' => 'color',
                        'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'bg_color',
                        'id' => '',
                        'default_value' => TMM_Content_Composer::set_default_value('bg_color', '#14b3e4'),
                        'description' => '',
                        'display' => 1
                    )); ?>
                </div>
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'type' => 'checkbox',
                        'title' => __('Transparent Background Color', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'bg_transparent',
                        'id' => 'bg_transparent',
                        'is_checked' => TMM_Content_Composer::set_default_value('bg_transparent', false),
                        'default_value' => TMM_Content_Composer::set_default_value('bg_transparent', false),
                        'description' => ''
                    ));
                    
                    ?>

            </div><!--/ .one-half-->

            <div class="one-half">
                <div  class="align-left">
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'type' => 'color',
                        'title' => __('Mouseover Background Color', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'mouseover_bg_color',
                        'id' => '',
                        'default_value' => TMM_Content_Composer::set_default_value('mouseover_bg_color', ''),
                        'description' => '',
                        'display' => 1
                    )); ?>
                </div>    
                    <?php                    
                    TMM_Content_Composer::html_option(array(
                        'type' => 'checkbox',
                        'title' => __('Transparent Mouseover Background Color', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'mouseover_bg_transparent',
                        'id' => 'mouseover_bg_transparent',
                        'is_checked' => TMM_Content_Composer::set_default_value('mouseover_bg_transparent', true),
                        'default_value' => TMM_Content_Composer::set_default_value('mouseover_bg_transparent', true),
                        'description' => ''
                    ));
                    
                    ?>

            </div><!--/ .one-half-->

            <div class="one-half">
                <div  class="align-left">
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'type' => 'color',
                        'title' => __('Border Color', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'border_color',
                        'id' => '',
                        'default_value' => TMM_Content_Composer::set_default_value('border_color', ''),
                        'description' => '',
                        'display' => 1
                    )); ?>
                </div>
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'type' => 'checkbox',
                        'title' => __('Transparent Border Color', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'border_color_transparent',
                        'id' => 'border_color_transparent',
                        'is_checked' => TMM_Content_Composer::set_default_value('border_color_transparent', true),
                        'default_value' => TMM_Content_Composer::set_default_value('border_color_transparent', true),
                        'description' => ''
                    ));
                    
                    ?>

            </div><!--/ .one-half-->      

            <div class="one-half">
                <div  class="align-left">
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'type' => 'color',
                        'title' => __('Mouseover Border Color', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'mouseover_border_color',
                        'id' => '',
                        'default_value' => TMM_Content_Composer::set_default_value('mouseover_border_color', '#000'),
                        'description' => '',
                        'display' => 1
                    ));
                    ?>
                </div>
                
                    <?php 
                    TMM_Content_Composer::html_option(array(
                        'type' => 'checkbox',
                        'title' => __('Transparent Mouseover Border Color', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'mouseover_border_color_transparent',
                        'id' => 'mouseover_border_color_transparent',
                        'is_checked' => TMM_Content_Composer::set_default_value('mouseover_border_color_transparent', false),
                        'default_value' => TMM_Content_Composer::set_default_value('mouseover_border_color_transparent', false),
                        'description' => ''
                    ));
                    ?>
                
            </div><!--/ .one-half-->
        
        </div>

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
                        
        if (jQuery('#button_type').val()!='colored'){
            jQuery('.colors').hide();
        }
        jQuery('#button_type').on('change', function(){
            if (jQuery(this).val()!='colored'){
                jQuery('.colors').fadeOut();
            }else{
                jQuery('.colors').fadeIn();
            }
        });
                
                
		
	});
</script>


