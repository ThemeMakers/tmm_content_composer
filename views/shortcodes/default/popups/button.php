<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
        /**
         * ---------------- Buttons Text ----------------
         */
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Buttons Text', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', 'Button'),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
        /**
         * ---------------- URL ----------------
         */
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
		/**
		 * ---------------- Color ----------------
		 */
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'color',
			'id' => 'button_type',
			'options' => array(
				'default' => 'Default',
				'blue' => 'Blue',
				'cyan' => 'Cyan',
				'dark' => 'Dark',
				'green' => 'Green',
				'grey' => 'Grey',
				'lightgreen' => 'Lightgreen',
				'lightgreen' => 'Lightgreen',
				'orange' => 'Orande',
				'red' => 'Red',
				'sky' => 'Sky',
				'vinous' => 'Vinous',
				'yellow' => 'Yellow',
			),
			'default_value' => TMM_Content_Composer::set_default_value('color', 'default'),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
        /**
         * ---------------- Size ----------------
         */
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Size', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'size',
			'id' => 'size',
			'options' => TMM_Content_Composer::get_theme_buttons_sizes(),
			'default_value' => TMM_Content_Composer::set_default_value('size', 'small'),
			'description' => ''
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


