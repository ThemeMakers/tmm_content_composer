<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<?php
		$value_type = TMM_Content_Composer::set_default_value('type', 0);

		TMM_Content_Composer::html_option(array(
			'type' => 'radio',
			'title' => __('Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'type',
			'id' => 'type',
			'name' => 'type',
			'values' => array(
				0 => array(
					'title' => __('Default', TMM_CC_TEXTDOMAIN),
					'id' => 'type_normal',
					'value' => 0,
					'checked' => ($value_type == 0 ? 1 : 0)
				),
				1 => array(
					'title' => __('Alternate Hover Box', TMM_CC_TEXTDOMAIN),
					'id' => 'type_colorized',
					'value' => 1,
					'checked' => ($value_type == 1 ? 1 : 0)
				),
				2 => array(
					'title' => __('Alternate Icon on Top', TMM_CC_TEXTDOMAIN),
					'id' => 'type_icon_top',
					'value' => 2,
					'checked' => ($value_type == 2 ? 1 : 0)
				)
			),
			'value' => $value_type,
			'description' => '',
			'hidden_id' => 'list_type'
		));
		?>	

		<?php
		$type_array = array(
			'icon-search' =>                'search',
			'icon-wrench' =>                'wrench',
			'icon-paper-plane-2' =>         'paper plane',
			'icon-euro' =>                  'euro',
			'icon-dollar' =>                'dollar',
			'icon-pound' =>                 'pound',
			'icon-rupee' =>                 'rupee',
			'icon-yen' =>                   'yen',
			'icon-rouble' =>                'rouble',
			'icon-money' =>                 'money',
			'icon-money-1' =>               'money 1',
			'icon-money-2' =>               'money 2',
			'icon-pencil-7' =>              'pencil',
			'icon-pencil' =>                'pencil 1',
			'icon-beaker' =>                'beaker',
			'icon-megaphone' =>             'megaphone',
			'icon-megaphone-2' =>           'megaphone 1',
			'icon-megaphone-3' =>           'megaphone 2',
			'icon-cog-6' =>                 'cog',
			'icon-cog' =>                   'cog 1',
			'icon-params' =>                'params',
			'icon-thumbs-up-5' =>           'thumbs-up',
			'icon-thumbs-up' =>             'thumbs-up 1',
			'icon-laptop' =>                'laptop',
			'icon-leaf' =>                  'leaf',
			'icon-cogs' =>                  'cogs',
			'icon-group' =>                 'group',
			'icon-folder-close' =>          'folder',
			'icon-folder-open' =>           'folder-open',
			'icon-cloud' =>                 'cloud',
			'icon-cloud-1' =>               'cloud 1',
			'icon-briefcase' =>             'briefcase',
			'icon-beaker-1' =>              'beaker 1',
			'icon-bullhorn' =>              'bullhorn',
			'icon-comment-6' =>             'comment',
			'icon-comment' =>               'comment 1',
			'icon-globe' =>                 'globe',
			'icon-globe-6' =>               'globe 1',
			'icon-heart' =>                 'heart',
			'icon-heart-1' =>               'heart 1',
			'icon-rocket' =>                'rocket',
			'icon-suitcase' =>              'suitcase',
			'icon-cog-alt' =>               'cog-alt',
			'icon-coffee' =>                'coffee',
			'icon-gift' =>                  'gift',
			'icon-gift-1' =>                'gift 1',
			'icon-home' =>                  'home',
			'icon-lightbulb' =>             'lightbulb',
			'icon-lightbulb-3' =>           'lightbulb 1',
			'icon-thumbs-down' =>           'thumbs-down',
			'icon-umbrella' =>              'umbrella',
			'icon-th-large-1' =>            'thumbnails',
			'icon-th-1' =>                  'thubmnails small',
			'icon-th-list' =>               'thumbnail list',
			'icon-list-bullet' =>           'list bullet',
			'icon-list-numbered' =>         'list numbered',
			'icon-resize-small' =>          'resize small',
			'icon-resize-full' =>           'resize full',
			'icon-download' =>              'download',
			'icon-download-alt' =>          'download-cloud',
			'icon-road' =>                  'road',
			'icon-road-1' =>                'road 1',
			'icon-roadblock' =>             'roadblock',
			'icon-truck' =>                 'truck',
			'icon-truck-1' =>               'truck 1',
			'icon-ambulance' =>             'ambulance',
			'icon-bus' =>                   'bus',
			'icon-bicycle' =>               'bicycle',
			'icon-cab' =>                   'cab',
			'icon-taxi' =>                  'taxi',
			'icon-motorcycle' =>            'motorcycle',
			'icon-train' =>                 'train',
			'icon-subway' =>                'subway',
			'icon-ship' =>                  'ship',
			'icon-wheelchair' =>            'wheelchair',
			'icon-cc-visa' =>               'card visa',
			'icon-cc-mastercard' =>         'card mastercard',
			'icon-cc-discover' =>           'card discover',
			'icon-cc-amex' =>               'card amex',
			'icon-cc-paypal' =>             'card paypal',
			'icon-cc-stripe' =>             'card stripe',
			'icon-paypal' =>                'paypal',
			'icon-camera-1' =>              'camera 1',
			'icon-calendar-1' =>            'calendar 1',
			'icon-at' =>                    'at'
		);
		?>

		<h4 class="label"><?php _e('Blocks', TMM_CC_TEXTDOMAIN); ?></h4>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add item', TMM_CC_TEXTDOMAIN); ?></a><br />
		<ul id="list_items" class="list-items">
			<?php
			$content_edit_data = array('');
			$links_edit_data = array('#');
			$titles_edit_data = array('');
			$hover_titles_edit_data = array('');
			$icons_edit_data = array(key($type_array));
			$list_item_color = array('');
			if (isset($_REQUEST["shortcode_mode_edit"])) {
				$content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
				$links_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['links']);
				$titles_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['titles']);
				$hover_titles_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['hover_titles']);
				$icons_edit_data = explode(',', $_REQUEST["shortcode_mode_edit"]['icons']);
				$list_item_color = explode(',', $_REQUEST["shortcode_mode_edit"]['colors']);
			}
            
            //return;
			?>

			<?php foreach ($content_edit_data as $key => $content_edit_text){ ?>
				<li class="list_item tmm-mover">
					<table class="list-table">
						<tr>
							<td>
								<i class="ca-icon <?php echo (isset($icons_edit_data[$key])) ? $icons_edit_data[$key] : 'con-paper-plane-2' ?>"></i>
							</td>
							<td>
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'select',
									'title' => '',
                                    'shortcode_field' => 'list_item_icon',
									'id' => '',
									'options' => $type_array,
									'default_value' => (isset($icons_edit_data[$key])) ? $icons_edit_data[$key] : 'con-paper-plane-2',
									'description' => '',
									'css_classes' => 'list_item_icon'
								));
								?>
								
                                <?php                               
                                
								TMM_Content_Composer::html_option(array(
									'title' => __('Text Color', TMM_CC_TEXTDOMAIN),
									'shortcode_field' => 'list_item_color['.$key.']',
									'type' => 'color',
									'description' => '',
									'default_value' => (isset($list_item_color[$key*4]) && !empty($list_item_color[$key*4])) ? TMM_Content_Composer::set_default_value('list_item_color',  $list_item_color[$key*4]) : '#fff',
									'id' => '',
									'css_classes' => 'list_item_color',
									'display' => $value_type == 1 ? 1 : 0
								));
								?>
								
                                <?php
								TMM_Content_Composer::html_option(array(
									'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
									'shortcode_field' => 'list_item_color['.$key.']',
									'type' => 'color',
									'description' => '',
									'default_value' => (isset($list_item_color[$key*4+1])) ? TMM_Content_Composer::set_default_value('list_item_bgcolor',  $list_item_color[$key*4+1]) : '#f85c37',
									'id' => '',
									'css_classes' => 'list_item_color',
									'display' => $value_type == 1 ? 1 : 0
								));
								?>                                                       
                                
                                <?php
                                
								TMM_Content_Composer::html_option(array(
									'title' => __('Text Hover Color', TMM_CC_TEXTDOMAIN),
									'shortcode_field' => 'list_item_color['.$key.']',
									'type' => 'color',
									'description' => '',
									'default_value' => (isset($list_item_color[$key*4+2])) ? TMM_Content_Composer::set_default_value('list_item_hover_textcolor',  $list_item_color[$key*4+2]) : '#fff',
									'id' => '',
									'css_classes' => 'list_item_color',
									'display' => $value_type == 1 ? 1 : 0
								));
								?>
                                                                
                                <?php
								TMM_Content_Composer::html_option(array(
									'title' => __('Background Hover Color', TMM_CC_TEXTDOMAIN),
									'shortcode_field' => 'list_item_hover_bgcolor['.$key.']',
									'type' => 'color',
									'description' => '',
									'default_value' => (isset($list_item_color[$key*4+3])) ? TMM_Content_Composer::set_default_value('list_item_hover_bgcolor',  $list_item_color[$key*4+3]) : '#262626',
									'id' => '',
									'css_classes' => 'list_item_color',
									'display' => $value_type == 1 ? 1 : 0
								));
								?>
                                                            
							</td>
							<td style="width: 50%;">							

								<h5 class="label"><?php _e('Title', TMM_CC_TEXTDOMAIN); ?></h5>
								<input type="text" value="<?php echo (isset($titles_edit_data[$key])) ? $titles_edit_data[$key] : '' ?>" class="list_item_title js_shortcode_template_changer data-input" style="width: 100%;" /><br />

								<h5 class="label"><?php _e('Link', TMM_CC_TEXTDOMAIN); ?></h5>
								<input type="text" value="<?php echo (isset($links_edit_data[$key])) ? $links_edit_data[$key] : '' ?>" class="list_item_link js_shortcode_template_changer data-input" style="width: 100%;" /><br />
                                
                                <div class="colorized_hover_title" <?php echo ($value_type!==1) ? 'style="display:none"' : '' ?>>
                                    <h5 class="label"><?php _e('Hover Title', TMM_CC_TEXTDOMAIN); ?></h5>
                                    <input type="text" value="<?php echo (isset($hover_titles_edit_data[$key])) ? $hover_titles_edit_data[$key] : '' ?>" class="list_item_hover_title js_shortcode_template_changer data-input" style="width: 100%;" /><br />
                                </div>
                                
								<h5 class="label title_content" <?php echo ($value_type==1) ? 'style="display:none"' : '' ?>><?php  _e('Content', TMM_CC_TEXTDOMAIN); ?></h5>								
								<h5 class="label hover_title_content" <?php echo ($value_type!==1) ? 'style="display:none"' : '' ?>><?php  _e('Hover Content', TMM_CC_TEXTDOMAIN); ?></h5>
								<textarea class="list_item_content js_shortcode_template_changer data-area" style="width: 100%; min-height: 50px;"><?php echo $content_edit_text ?></textarea>
							</td>
							<td>
								<a class="button button-secondary js_delete_list_item js_shortcode_template_changer" href="#"><?php _e('Remove', TMM_CC_TEXTDOMAIN); ?></a>
							</td>
							<td></td>
						</tr>
					</table>

				</li>

            <?php } ?>

		</ul>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add item', TMM_CC_TEXTDOMAIN); ?></a><br />

	</div><!--/ .fullwidth-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		
		colorizator();
        
        tmm_ext_shortcodes.services_changer(shortcode_name);
        
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").life('keyup change', function() {
			tmm_ext_shortcodes.services_changer(shortcode_name);           
		});
		
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.services_changer(shortcode_name);
			}
		});
        
		jQuery("#type_colorized").life('click',function() {
			jQuery(".list-item-color").slideDown(200);
            jQuery(".colorized_hover_title").slideDown(200);
            jQuery("h5.title_content").slideUp(200);
            jQuery("h5.hover_title_content").slideDown(200);
            
			jQuery("#list_type").val(1);
			tmm_ext_shortcodes.services_changer(shortcode_name);
		});

		jQuery("#type_normal").life('click', function() {
			jQuery(".list-item-color").slideUp(200);
            jQuery(".colorized_hover_title").slideUp(200);
            jQuery("h5.title_content").slideDown(200);
            jQuery("h5.hover_title_content").slideUp(200);
			jQuery("#list_type").val(0);
			tmm_ext_shortcodes.services_changer(shortcode_name);
		});

		jQuery("#type_icon_top").life('click', function() {
			jQuery(".list-item-color").slideUp(200);
            jQuery(".colorized_hover_title").slideUp(200);
            jQuery("h5.title_content").slideDown(200);
            jQuery("h5.hover_title_content").slideUp(200);
			jQuery("#list_type").val(2);
			tmm_ext_shortcodes.services_changer(shortcode_name);
		});

		jQuery(".js_add_list_item").on('click', function() {
			var clone = jQuery(".list_item:last").clone(false);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);			
            var item_color = jQuery(".list_item:last").find('.list-item-color');
            jQuery(".list_item:last").find('.list_item_title').val('');
            jQuery(".list_item:last").find('.list_item_hover_title').val('');
            jQuery(".list_item:last").find('.list_item_content').text('');
			jQuery(".list_item:last").find('.list_item_link').val('');
            item_color.each(function(id,el){
                var inp = jQuery(el).find('input[type=text]');
                switch (id){
                    case 0:
                        inp.val('#fff');
                        break;
                    case 1:
                        inp.val('#f85c37');
                        break;
                    case 2:
                        inp.val('#fff');
                        break;
                    case 3:
                        inp.val('#262626');
                        break;                    
                }
            });
			
			var icon_class = jQuery(".list_item:first").find('select').val();
			jQuery(".list_item:last").find('select').val(icon_class);
			tmm_ext_shortcodes.services_changer(shortcode_name);
			colorizator();
			return false;
		});

		jQuery(".js_delete_list_item").life('click',function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(function(){                                     
                                    jQuery(this).remove();
                                    tmm_ext_shortcodes.services_changer(shortcode_name);
                                });
			}                        
			tmm_ext_shortcodes.services_changer(shortcode_name);
			return false;
		});

		jQuery(".list_item_icon").life('change', function() {
			jQuery(this).parents('li').find('i').removeAttr('class').addClass(jQuery(this).val());
			tmm_ext_shortcodes.services_changer(shortcode_name);
		});
		
	});
</script>
