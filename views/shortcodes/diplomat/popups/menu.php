<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">     

	<div class="fullwidth">

		<h4 class="label"><?php _e('Menu Items', TMM_CC_TEXTDOMAIN); ?></h4>

		<a class="button button-secondary js_add_accordion_item" href="#"><?php _e('Add item', TMM_CC_TEXTDOMAIN); ?></a>

		<ul id="list_items" class="list-items">

			<?php
			$titles = array('');
			$urls = array('');
            $icons = array('');
           
			if (isset($_REQUEST["shortcode_mode_edit"])) {
				$titles = explode('^', $_REQUEST["shortcode_mode_edit"]['menu_titles']);
				$links = explode('^', $_REQUEST["shortcode_mode_edit"]['menu_links']);			
				$icons = explode('^', $_REQUEST["shortcode_mode_edit"]['menu_icons']);			
			}            

            $all_menu_items = TMM_Content_Composer::get_all_menu_items();

            $icon_type_array = array(
                'none' => __('None', TMM_CC_TEXTDOMAIN),
                'icon-paper-plane-2' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-paper-plane-2',
                'icon-pencil-7' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-pencil-7',
                'icon-beaker-1' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-beaker-1',
                'icon-megaphone-3' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-megaphone-3',
                'icon-cog-6' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-cog-6',
                'icon-lightbulb-3' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-lightbulb-3',
                'icon-comment-6' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-comment-6',
                'icon-thumbs-up-5' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-thumbs-up-5',
                'icon-laptop' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-laptop',
                'icon-search' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-search',
                'icon-wrench' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-wrench',
                'icon-leaf' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-leaf',
                'icon-cogs' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-cogs',
                'icon-group' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-group',
                'icon-folder-close' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-folder-close',
                'icon-cloud' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-cloud',
                'icon-briefcase' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-briefcase',
                'icon-beaker' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-beaker',
                'icon-bullhorn' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-bullhorn',
                'icon-comment' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-comment',
                'icon-globe' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-globe',
                'icon-globe-6' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-globe-6',
                'icon-heart' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-heart',
                'icon-rocket' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-rocket',
                'icon-suitcase' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-suitcase',
                'icon-pencil' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-pencil',
                'icon-params' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-params',
                'icon-folder-open' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-folder-open',
                'icon-cog' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-cog',
                'icon-coffee' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-coffee',
                'icon-gift' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-gift',
                'icon-home' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-home',
                'icon-lightbulb' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-lightbulb',
                'icon-thumbs-up' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-thumbs-up',
                'icon-umbrella' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-umbrella',
                'icon-th-list' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-th-list',
                'icon-resize-small' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-resize-small',
                'icon-download-alt' => __('Type', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-download-alt'
            );
           
			?>

			<?php foreach ($titles as $key => $title) : ?>
				<li class="list_item">
					<table class="list-table">
						<tr>
							<td valign="top" style="width: 100%;">
								<?php                                
								TMM_Content_Composer::html_option(array(
									'type' => 'select',
									'title' => '',
									'shortcode_field' => '',
									'id' => '',
                                    'options' => $all_menu_items,
									'default_value' => (isset($title) && isset($links[$key])) ? $links[$key] : 'none',
									'description' => '',
									'css_classes' => 'select_menu_item'                                    
								));                         
								?>
							</td>
							<td><a class="button button-secondary js_delete_accordion_item js_shortcode_template_changer" href="#"><?php _e('Remove', TMM_CC_TEXTDOMAIN); ?></a></td>
						</tr>
						<tr>
                            <td colspan="2">
                                <div class="one-half">
                                    <?php 
                                    TMM_Content_Composer::html_option(array(
                                        'type' => 'text',
                                        'title' => __('Link Text', TMM_CC_TEXTDOMAIN),
                                        'shortcode_field' => 'link_text',
                                        'id' => '',
                                        'css_classes' => 'link_text',                                        
                                        'default_value' => isset($title) ? $title : '',
                                        'description' => ''
                                    ));
                                    ?>
                                   
                                </div>
                                <div class="one-half">
                                    <?php 
                                    TMM_Content_Composer::html_option(array(
                                        'type' => 'text',
                                        'title' => __('Link URL', TMM_CC_TEXTDOMAIN),
                                        'shortcode_field' => 'link_url',
                                        'id' => '',
                                        'css_classes' => 'link_url',                                         
                                        'default_value' => isset ($links[$key]) ? $links[$key] : '',
                                        'description' => ''
                                    ));
                                    ?>                                    
                                </div>													
                                <div class="one-half">
                                    <?php 
                                    TMM_Content_Composer::html_option(array(
                                        'type' => 'select',
                                        'title' => __(' Icon Type', TMM_CC_TEXTDOMAIN),
                                        'shortcode_field' => 'icon_type',
                                        'id' => '',
                                        'css_classes' => 'icon_type',    
                                        'options' => $icon_type_array,
                                        'default_value' => isset ($icons[$key]) ? $icons[$key] : '',                                        
                                        'description' => ''
                                    ));
                                    ?>
                                </div>
                                <div class="one-half">    
                                    <i class="<?php echo (isset($icons[$key]) && $icons[$key]!='none' && !empty($icons[$key])) ? $icons[$key].' icons-type' : 'none_icon'; ?>"></i>                                                                  
                                </div>													
						</tr>
					</table>
				</li>
			<?php endforeach; ?>


		</ul>

		<a class="button button-secondary js_add_accordion_item" href="#"><?php _e('Add item', TMM_CC_TEXTDOMAIN); ?></a><br />

	</div><!--/ .fullwidth-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.menu_changer(shortcode_name);
			}
		});
		
		tmm_ext_shortcodes.menu_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.menu_changer(shortcode_name);
		});
        
        jQuery('.select_menu_item').on('change', function(){
            var $this = jQuery(this),
            val = $this.val(),
            val_text, val_url,
            link_text = $this.parents('table').find('.link_text'),
            link_url = $this.parents('table').find('.link_url');         
            val_text = $this.find('option:selected').text();
            val_url = val;
            link_text.val(val_text);
            link_url.val(val_url);
            tmm_ext_shortcodes.menu_changer(shortcode_name);
        });	
        
        jQuery('.icon_type').life('change', function(){
            var $this = jQuery(this),
            val = $this.val(), 
            this_icon = $this.parents('.one-half').next('.one-half').find('i');
            if (val!='none'){
                this_icon.attr('class', val+' icons-type');
            }else{
                this_icon.attr('class', 'none_icon');
            }   
            
        });

		jQuery(".js_add_accordion_item").on('click',function() {
			var clone = jQuery(".list_item:last").clone(true);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			jQuery(".list_item:last").find('input[type=text]').val("");
						
			jQuery(".list_item:last").find('select').val('none');
			jQuery(".list_item:last").find('i').attr('class', 'none_icon');
			tmm_ext_shortcodes.menu_changer(shortcode_name);
			return false;
		});

		jQuery(".js_delete_accordion_item").life('click',function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.menu_changer(shortcode_name);
				});
			}

			return false;
		});

	});
</script>


