<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
        
        <div class="one-half">
            <?php
            TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Slider type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'type',
			'id' => 'shortcode_slogan_slider_type',
			'options' => array('textslide' => 'TextSlide', 'owlcarousel' => 'OwlCarousel'),
			'default_value' => TMM_Content_Composer::set_default_value('type', ''),
			'description' => ''
		));
            ?>
        </div>
    
	<div class="fullwidth">
        <br />
		<a class="button button-secondary js_add_text_slider_item" href="#"><?php _e('Add item', TMM_CC_TEXTDOMAIN); ?></a><br />

		<ul id="list_items" class="list-items">

			<?php
			$h1_edit_data = array('');
			$h2_edit_data = array('');
			if (isset($_REQUEST["shortcode_mode_edit"])) {
				$h1_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['h1_items']);
                $h1_heading_type = explode('^', $_REQUEST["shortcode_mode_edit"]['h1_heading_type']);
                $h1_fade_in = explode('^', $_REQUEST["shortcode_mode_edit"]['h1_fade_in']);
                $h1_fade_out = explode('^', $_REQUEST["shortcode_mode_edit"]['h1_fade_out']);
                $h1_color = explode('^', $_REQUEST["shortcode_mode_edit"]['h1_color']);
                $h2_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['h2_items']);
                $h2_heading_type = explode('^', $_REQUEST["shortcode_mode_edit"]['h2_heading_type']);
                $h2_fade_in = explode('^', $_REQUEST["shortcode_mode_edit"]['h2_fade_in']);
                $h2_fade_out = explode('^', $_REQUEST["shortcode_mode_edit"]['h2_fade_out']);
                $h2_color = explode('^', $_REQUEST["shortcode_mode_edit"]['h2_color']);                   
                                
			}
                        
			?>
			<?php  foreach ($h1_edit_data as $key => $h1){ ?>
				<li class="list_item">
                                        <a class="button button-secondary js_delete_text_slider_item js_shortcode_template_changer" href="#"><?php _e('Remove', TMM_CC_TEXTDOMAIN); ?></a>
					<table class="list-table">
						<tr>
							<td style="width:22%">
                                                                
                                <?php
                                TMM_Content_Composer::html_option(array(
                                            'type' => 'text',
                                            'title' => __('Title Text 1', TMM_CC_TEXTDOMAIN),
                                            'shortcode_field' => '',
                                            'id' => '',
                                            'default_value' => (isset($h1_edit_data[$key])) ? $h1_edit_data[$key] : '',                                                                            
                                            'description' => '',
                                            'css_classes' => 'h1_item'
                                    ));
                                ?>                                                                 
                                                            
							</td>                                                        
                                <td style="width:7%">
                                    <?php
                                    TMM_Content_Composer::html_option(array(
                                                    'type' => 'select',
                                                    'title' => __('Type', TMM_CC_TEXTDOMAIN),
                                                    'shortcode_field' => '',
                                                    'options' => array(
                                                            'h1' => 'H1',
                                                            'h2' => 'H2',
                                                            'h3' => 'H3',
                                                            'h4' => 'H4',
                                                            'h5' => 'H5',
                                                            'h6' => 'H6',
                                                    ),
                                                    'id' => '',
                                                    'default_value' =>  (isset($h1_heading_type[$key])) ? $h1_heading_type[$key] : '',                                                                            
                                                    'description' => '',
                                                    'css_classes' => 'h1_heading_type'
                                            ));
                                        ?>
                                </td>
                                <td style="width:15%">
                                    <?php
                                    TMM_Content_Composer::html_option(array(
                                                    'type' => 'select',
                                                    'title' => __('Fade in effect', TMM_CC_TEXTDOMAIN),
                                                    'shortcode_field' => '',
                                                    'options' => array(
                                                            'bounce' => 'Bounce',
                                                            'swing' => 'Swing',
                                                            'wobble' => 'Wobble',
                                                            'pulse' => 'Pulse',
                                                            'fadeIn' => 'FadeIn',
                                                            'fadeInUp' => 'FadeInUp',
                                                            'fadeInDown' => 'FadeInDown',
                                                            'fadeInLeft' => 'FadeInLeft',
                                                            'fadeInRight' => 'FadeInRight',
                                                            'fadeInUpBig' => 'FadeInUpBig',
                                                            'fadeInDownBig' => 'FadeInDownBig',
                                                            'fadeOutUp' => 'FadeOutUp',
                                                            'fadeOutDown' => 'FadeOutDown',
                                                            'fadeOutLeft' => 'FadeOutLeft',
                                                            'fadeOutRight' => 'FadeOutRight',
                                                            'rotateIn' => 'RotateIn',
                                                            'rotateInDownLeft' => 'RotateInDownLeft',
                                                            'rotateOut' => 'RotateOut'                                                                                  
                                                    ),
                                                    'id' => '',
                                                    'default_value' => (isset($h1_fade_in[$key])) ? $h1_fade_in[$key] : 'fadeIn',                                                                            
                                                    'description' => '',
                                                    'css_classes' => 'h1_fade_in'
                                            ));
                                        ?>
                                </td>
                                <td style="width:15%">
                                    <?php
                                    TMM_Content_Composer::html_option(array(
                                                    'type' => 'select',
                                                    'title' => __('Fade out effect', TMM_CC_TEXTDOMAIN),
                                                    'shortcode_field' => '',
                                                    'options' => array(                                                                                    
                                                            'swing' => 'Swing',
                                                            'wobble' => 'Wobble',
                                                            'pulse' => 'Pulse',
                                                            'fadeIn' => 'FadeIn',
                                                            'fadeInUp' => 'FadeInUp',
                                                            'fadeInDown' => 'FadeInDown',
                                                            'fadeInLeft' => 'FadeInLeft',
                                                            'fadeInRight' => 'FadeInRight',
                                                            'fadeInUpBig' => 'FadeInUpBig',
                                                            'fadeInDownBig' => 'FadeInDownBig',
                                                            'fadeOutUp' => 'FadeOutUp',
                                                            'fadeOutDown' => 'FadeOutDown',
                                                            'fadeOutLeft' => 'FadeOutLeft',
                                                            'fadeOutRight' => 'FadeOutRight',
                                                            'rotateIn' => 'RotateIn',
                                                            'rotateInDownLeft' => 'RotateInDownLeft',
                                                            'rotateOut' => 'RotateOut'    
                                                    ),
                                                    'id' => '',
                                                    'default_value' =>  (isset($h1_fade_out[$key])) ? $h1_fade_out[$key] : 'fadeIn',                                                                            
                                                    'description' => '',
                                                    'css_classes' => 'h1_fade_out'
                                            ));
                                        ?>
                                </td>
                                <td style="width:16%">
                                    <?php
                                    TMM_Content_Composer::html_option(array(
                                                    'type' => 'color',
                                                    'title' => __('Color', TMM_CC_TEXTDOMAIN),
                                                    'shortcode_field' => '',
                                                    'display' => 1,
                                                    'id' => '',
                                                    'default_value' => (isset($h1_color[$key])) ? $h1_color[$key] : '',                                                                            
                                                    'description' => '',
                                                    'css_classes' => 'h1_color'
                                            ));
                                    ?> 
                                </td>
						</tr>
						<tr>
							<td style="width:22%">
                                <?php
                                TMM_Content_Composer::html_option(array(
                                            'type' => 'textarea',
                                            'title' => __('Title Text 2', TMM_CC_TEXTDOMAIN),
                                            'shortcode_field' => 'content',
                                            'id' => '',
                                            'default_value' =>  (isset($h2_edit_data[$key])) ? $h2_edit_data[$key] : '',                                                                            
                                            'description' => '',
                                            'css_classes' => 'h2_item'
                                    ));
                                ?>                                                        
							</td>
                            <td style="width:7%">
                                <?php
                                TMM_Content_Composer::html_option(array(
                                                'type' => 'select',
                                                'title' => __('Type', TMM_CC_TEXTDOMAIN),
                                                'shortcode_field' => '',
                                                'options' => array(
                                                        'h1' => 'H1',
                                                        'h2' => 'H2',
                                                        'h3' => 'H3',
                                                        'h4' => 'H4',
                                                        'h5' => 'H5',
                                                        'h6' => 'H6',
                                                ),
                                                'id' => '',
                                                'default_value' =>  (isset($h2_heading_type[$key])) ? $h2_heading_type[$key] : 'h1',                                                                            
                                                'description' => '',
                                                'css_classes' => 'h2_heading_type'
                                        ));
                                    ?>                                                            
                            </td>
                            <td style="width:15%">
                                <?php
                                TMM_Content_Composer::html_option(array(
                                                'type' => 'select',
                                                'title' => __('Fade in effect', TMM_CC_TEXTDOMAIN),
                                                'shortcode_field' => '',
                                                'options' => array(                                                                                    
                                                        'swing' => 'Swing',
                                                        'wobble' => 'Wobble',
                                                        'pulse' => 'Pulse',
                                                        'fadeIn' => 'FadeIn',
                                                        'fadeInUp' => 'FadeInUp',
                                                        'fadeInDown' => 'FadeInDown',
                                                        'fadeInLeft' => 'FadeInLeft',
                                                        'fadeInRight' => 'FadeInRight',
                                                        'fadeInUpBig' => 'FadeInUpBig',
                                                        'fadeInDownBig' => 'FadeInDownBig',
                                                        'fadeOutUp' => 'FadeOutUp',
                                                        'fadeOutDown' => 'FadeOutDown',
                                                        'fadeOutLeft' => 'FadeOutLeft',
                                                        'fadeOutRight' => 'FadeOutRight',
                                                        'rotateIn' => 'RotateIn',
                                                        'rotateInDownLeft' => 'RotateInDownLeft',
                                                        'rotateOut' => 'RotateOut'                                                                                  
                                                ),
                                                'id' => '',
                                                'default_value' =>  (isset($h2_fade_in[$key])) ? $h2_fade_in[$key] : 'fadeIn',                                                                            
                                                'description' => '',
                                                'css_classes' => 'h2_fade_in'
                                        ));
                                    ?>
                            </td>
                            <td style="width:15%">
                                <?php
                                TMM_Content_Composer::html_option(array(
                                                'type' => 'select',
                                                'title' => __('Fade out effect', TMM_CC_TEXTDOMAIN),
                                                'shortcode_field' => '',
                                                'options' => array(
                                                        'bounce' => 'Bounce',
                                                        'swing' => 'Swing',
                                                        'wobble' => 'Wobble',
                                                        'pulse' => 'Pulse',
                                                        'fadeIn' => 'FadeIn',
                                                        'fadeInUp' => 'FadeInUp',
                                                        'fadeInDown' => 'FadeInDown',
                                                        'fadeInLeft' => 'FadeInLeft',
                                                        'fadeInRight' => 'FadeInRight',
                                                        'fadeInUpBig' => 'FadeInUpBig',
                                                        'fadeInDownBig' => 'FadeInDownBig',
                                                        'fadeOutUp' => 'FadeOutUp',
                                                        'fadeOutDown' => 'FadeOutDown',
                                                        'fadeOutLeft' => 'FadeOutLeft',
                                                        'fadeOutRight' => 'FadeOutRight',
                                                        'rotateIn' => 'RotateIn',
                                                        'rotateInDownLeft' => 'RotateInDownLeft',
                                                        'rotateOut' => 'RotateOut'    
                                                ),
                                                'id' => '',
                                                'default_value' =>  (isset($h2_fade_out[$key])) ? $h2_fade_out[$key] : 'fadeIn',                                                                            
                                                'description' => '',
                                                'css_classes' => 'h2_fade_out'
                                        ));
                                    ?>
                            </td>
                            <td style="width:16%">
                                <?php
                                TMM_Content_Composer::html_option(array(
                                                'type' => 'color',
                                                'title' => __('Color', TMM_CC_TEXTDOMAIN),
                                                'shortcode_field' => '',
                                                'display' => 1,
                                                'id' => '',
                                                'default_value' => (isset($h2_color[$key])) ?  $h2_color[$key] : '',                                                                            
                                                'description' => '',
                                                'css_classes' => 'h2_color'
                                        ));
                                ?>
                            </td>
						</tr>
					</table>
				</li>
                        <?php } ?>

		</ul>
		<a class="button button-secondary js_add_text_slider_item" href="#"><?php _e('Add item', TMM_CC_TEXTDOMAIN); ?></a><br />

	</div><!--/ .fullwidth-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
            
                jQuery('#shortcode_slogan_slider_type').on('change', function(){
                    if(jQuery(this).val()=='owlcarousel'){                                               
                        jQuery('.list-table').each(function(){
                            jQuery(this).find('tr:eq( 1 )').fadeOut();
                        });                  
                        jQuery('.h1_fade_in').parent().parent().fadeOut();
                        jQuery('.h1_fade_out').parent().parent().fadeOut();
                    }else{
                        jQuery('.list-table').each(function(){
                            jQuery(this).find('tr:eq( 1 )').fadeIn();
                        });                        
                        jQuery('.h1_fade_in').parent().parent().fadeIn();
                        jQuery('.h1_fade_out').parent().parent().fadeIn();
                    }
                });
                
                if (jQuery('#shortcode_slogan_slider_type').val()=='owlcarousel'){                    
                    jQuery('.list-table').each(function(){
                        jQuery(this).find('tr:eq( 1 )').hide();
                    });
                    jQuery('.h1_fade_in').parents('td').hide();
                    jQuery('.h1_fade_out').parents('td').hide();
                }                
                
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.text_slider_changer(shortcode_name);
			}
		});

		//***
		tmm_ext_shortcodes.text_slider_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").life('keyup change', function() {
			tmm_ext_shortcodes.text_slider_changer(shortcode_name);
            colorizator();
		});

		//*****
                
		jQuery(".js_add_text_slider_item").on('click',function() {                                 			
                        var clone = jQuery(".list_item:last").html();
                        var item = jQuery('<li class="list_item">' + clone + '</li>') 
                        jQuery('#list_items').append(item);                                               
			jQuery(".list_item:last").find('input[type=text]').val("");                 
			tmm_ext_shortcodes.text_slider_changer(shortcode_name);
                        colorizator();
			return false;
		});
                
		jQuery(".js_delete_text_slider_item").life('click',function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.text_slider_changer(shortcode_name);
				});
			}

			return false;
		});
                colorizator();

	});
</script>


