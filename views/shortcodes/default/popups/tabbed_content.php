<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="fullwidth">

        <h4 class="label"><?php _e('Select Type', TMM_CC_TEXTDOMAIN); ?></h4>
		<div class="sel">
			<select id="tmm_toggle_type" class="js_shortcode_template_changer data-select" data-shortcode-field="type">
				<option <?php if (TMM_Content_Composer::set_default_value('type', '') == 'tabs-style-1') echo 'selected' ?>
						value="tabs-style-1"><?php _e('Style', TMM_CC_TEXTDOMAIN); ?> 1</option>
				<option <?php if (TMM_Content_Composer::set_default_value('type', '') == 'tabs-style-2') echo 'selected' ?>
						value="tabs-style-2"><?php _e('Style', TMM_CC_TEXTDOMAIN); ?> 2</option>
				<option <?php if (TMM_Content_Composer::set_default_value('type', '') == 'tabs-style-3') echo 'selected' ?>
						value="tabs-style-3"><?php _e('Style', TMM_CC_TEXTDOMAIN); ?> 3</option>
			</select>
		</div>

        <a class="ui-button js_add_accordion_item ui-widget ui-state-default ui-corner-all ui-button-text-only" href="#"><?php _e('Add Tab', TMM_CC_TEXTDOMAIN); ?></a>

    </div><!--/ .fullwidth-->

</div><!--/ .thememakers_shortcode_template-->


<div id="tmm_shortcode_tab_template" class="tmm_shortcode_template">

    
    <ul id="shortcode_tabs_list list_items" class="list-items">
        
        <?php
			$titles_edit_data = array('');
			$content_edit_data = array('');
			if (isset($_REQUEST["shortcode_mode_edit"])) {
				$titles_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['titles']);
				$content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
			}
                       
	?>
        <?php foreach ($content_edit_data as $key => $content_edit_text) { ?>
        <li class="list_item">
            <h4 class="label"><?php _e('Tab Title', TMM_CC_TEXTDOMAIN); ?></h4>
            <input type="text" value="<?php echo $titles_edit_data[$key] ?>" class="js_shortcode_template_changer data-input accordion_item_title" data-shortcode-field="title" style="width: 67%;" />
            <a class="button button-small js_delete_accordion_item js_shortcode_template_changer" href="#"><?php _e('Remove', TMM_CC_TEXTDOMAIN); ?></a>
            <h4 class="label"><?php _e('Content', TMM_CC_TEXTDOMAIN); ?></h4>
            <textarea class="js_shortcode_template_changer data-area accordion_item_content" data-shortcode-field="content"><?php echo $content_edit_text ?></textarea>
        </li>
        <?php } ?>
    </ul> 

</div><!--/ .thememakers_shortcode_tab_template-->


<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">
	
	<script type="text/javascript">
		var shortcode_tabs_list = null;
		var shortcode_tabs_list_template = null;
		var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

		jQuery(function() {
			tmm_ext_shortcodes.accordion_changer(shortcode_name);
			jQuery(".js_shortcode_template_changer, #tmm_shortcode_tab_template .js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.accordion_changer(shortcode_name);
			});

			//***
			shortcode_tabs_list = jQuery("#shortcode_tabs_list");
			shortcode_tabs_list_template = jQuery("#shortcode_tabs_list li:first-child").html();
                        
            jQuery("#list_items").sortable({
				stop: function(event, ui) {
					tmm_ext_shortcodes.accordion_changer(shortcode_name);
				}
			});
			
			//***
			tmm_ext_shortcodes.accordion_changer(shortcode_name);
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.accordion_changer(shortcode_name);
			});

		});
                    
                       
		//*****
            jQuery(".js_add_accordion_item").click(function() {
            var clone = jQuery(".list_item:last").clone(true);
            var last_row = jQuery(".list_item:last");
            jQuery(clone).insertAfter(last_row, clone);
            jQuery(".list_item:last").find('input[type=text]').val("");
                            jQuery(".list_item:last").find('textarea').html('');
            //***
            var icon_class = jQuery(".list_item:first").find('select').val();
            jQuery(".list_item:last").find('select').val(icon_class);
            tmm_ext_shortcodes.accordion_changer(shortcode_name);
            return false;
            });

            jQuery(".js_delete_accordion_item").click(function() {
            if (jQuery(".list_item").length > 1) {
                jQuery(this).parents('li').hide(200, function() {
                    jQuery(this).remove();
                    tmm_ext_shortcodes.accordion_changer(shortcode_name);
                });
            }

            return false;
		});                
                	

	</script>
	
</div><!--/ .fullwidth-frame-->



