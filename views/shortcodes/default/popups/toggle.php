<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="thememakers_shortcode_template" class="thememakers_shortcode_template clearfix">


</div><!--/ .thememakers_shortcode_template-->


<div class="fullwidth thememakers_shortcode_template">
	<div id="thememakers_shortcode_tab_template">

		<div class="fullwidth">
			<a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only js_add_accordion_item"
			   href="#"><?php _e('Add Toggle', TMM_CC_TEXTDOMAIN); ?></a>
		</div>

		<ul id="shortcode_tabs_list list_items" class="list-items">
            <?php
			$titles_edit_data = array('');
			$content_edit_data = array('');
			if (isset($_REQUEST["shortcode_mode_edit"])) {
				$titles_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['titles']);
				$content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
			}                       
            ?>
            <?php foreach ($content_edit_data as $key => $content_edit_text) : ?>
				<li class="list_item">

					<h4><?php
						/**
						* ---------------- Toggle Title ----------------
						*/
						_e('Toggle Title', TMM_CC_TEXTDOMAIN);
						?>
					</h4>
					<input type="text" value="<?php echo $titles_edit_data[$key] ?>"
						   class="js_shortcode_template_changer data-input accordion_item_title"
						   data-shortcode-field="title" style="width: 67%;" />

					<a class="button button-small js_delete_accordion_item js_shortcode_template_changer"
					   href="#"><?php _e('Remove', TMM_CC_TEXTDOMAIN); ?></a>

					<h4><?php
						/**
						* ---------------- Content ----------------
						*/
						_e('Content', TMM_CC_TEXTDOMAIN);
						?>
					</h4>
					<textarea class="js_shortcode_template_changer data-area accordion_item_content"
							  data-shortcode-field="content"><?php echo $content_edit_text ?></textarea>

				</li>
            <?php endforeach; ?>
		</ul> 

	</div><!--/ .thememakers_shortcode_tab_template-->

</div><!--/ .fullwidth-->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">

	<script type="text/javascript">
		var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
		var shortcode_tabs_list = null;
		var shortcode_tabs_list_template = null;

		jQuery(function() {
			tmm_ext_shortcodes.accordion_changer(shortcode_name);
			jQuery(".js_shortcode_template_changer, #thememakers_shortcode_tab_template .js_shortcode_template_changer").on('keyup, change', function() {
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



