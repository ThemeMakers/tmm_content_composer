<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<?php
		$value_type = TMM_Content_Composer::set_default_value('type', 0);

		TMM_Content_Composer::html_option(array(
			'type' => 'radio',
			'title' => __('Type', 'tmm_content_composer'),
			'shortcode_field' => 'type',
			'id' => 'type',
			'name' => 'type',
			'values' => array(
				0 => array(
					'title' => __('Default', 'tmm_content_composer'),
					'id' => 'type_normal',
					'value' => 0,
					'checked' => ($value_type == 0 ? 1 : 0)
				),
				1 => array(
					'title' => __('Alternate Hover Box', 'tmm_content_composer'),
					'id' => 'type_colorized',
					'value' => 1,
					'checked' => ($value_type == 1 ? 1 : 0)
				),
				2 => array(
					'title' => __('Alternate Icon on Top', 'tmm_content_composer'),
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

			'icon-paper-plane-2' => __('Type', 'tmm_content_composer') . ': ' . 'paper plane 2',
			'icon-euro' => __('Type', 'tmm_content_composer') . ': ' . 'euro',
			'icon-dollar' => __('Type', 'tmm_content_composer') . ': ' . 'dollar',
			'icon-pound' => __('Type', 'tmm_content_composer') . ': ' . 'pound',
			'icon-money' => __('Type', 'tmm_content_composer') . ': ' . 'money',
			'icon-money-1' => __('Type', 'tmm_content_composer') . ': ' . 'money 1',
			'icon-money-2' => __('Type', 'tmm_content_composer') . ': ' . 'money 2',
			'icon-pencil-7' => __('Type', 'tmm_content_composer') . ': ' . 'pencil 7',
			'icon-beaker-1' => __('Type', 'tmm_content_composer') . ': ' . 'beaker 1',
			'icon-megaphone' => __('Type', 'tmm_content_composer') . ': ' . 'megaphone',
			'icon-megaphone-1' => __('Type', 'tmm_content_composer') . ': ' . 'megaphone 1',
			'icon-megaphone-2' => __('Type', 'tmm_content_composer') . ': ' . 'megaphone 2',
			'icon-megaphone-3' => __('Type', 'tmm_content_composer') . ': ' . 'megaphone 3',
			'icon-cog-6' => __('Type', 'tmm_content_composer') . ': ' . 'cog 6',
			'icon-lightbulb-3' => __('Type', 'tmm_content_composer') . ': ' . 'lightbulb 3',
			'icon-comment-6' => __('Type', 'tmm_content_composer') . ': ' . 'comment 6',
			'icon-thumbs-up-5' => __('Type', 'tmm_content_composer') . ': ' . 'thumbs up 5',
			'icon-laptop' => __('Type', 'tmm_content_composer') . ': ' . 'laptop',
			'icon-search' => __('Type', 'tmm_content_composer') . ': ' . 'search',
			'icon-wrench' => __('Type', 'tmm_content_composer') . ': ' . 'wrench',
			'icon-leaf' => __('Type', 'tmm_content_composer') . ': ' . 'leaf',
			'icon-cogs' => __('Type', 'tmm_content_composer') . ': ' . 'cogs',
			'icon-group' => __('Type', 'tmm_content_composer') . ': ' . 'group',
			'icon-folder-close' => __('Type', 'tmm_content_composer') . ': ' . 'folder close',
			'icon-cloud' => __('Type', 'tmm_content_composer') . ': ' . 'cloud',
			'icon-briefcase' => __('Type', 'tmm_content_composer') . ': ' . 'briefcase',
			'icon-beaker' => __('Type', 'tmm_content_composer') . ': ' . 'beaker',
			'icon-bullhorn' => __('Type', 'tmm_content_composer') . ': ' . 'bullhorn',
			'icon-comment' => __('Type', 'tmm_content_composer') . ': ' . 'comment',
			'icon-globe' => __('Type', 'tmm_content_composer') . ': ' . 'globe',
			'icon-globe-6' => __('Type', 'tmm_content_composer') . ': ' . 'globe-6',
			'icon-heart' => __('Type', 'tmm_content_composer') . ': ' . 'heart',
			'icon-rocket' => __('Type', 'tmm_content_composer') . ': ' . 'rocket',
			'icon-suitcase' => __('Type', 'tmm_content_composer') . ': ' . 'suitcase',
			'icon-pencil' => __('Type', 'tmm_content_composer') . ': ' . 'pencil',
			'icon-params' => __('Type', 'tmm_content_composer') . ': ' . 'params',
			'icon-folder-open' => __('Type', 'tmm_content_composer') . ': ' . 'folder open',
			'icon-cog' => __('Type', 'tmm_content_composer') . ': ' . 'cog',
			'icon-coffee' => __('Type', 'tmm_content_composer') . ': ' . 'coffee',
			'icon-gift' => __('Type', 'tmm_content_composer') . ': ' . 'gift',
			'icon-home' => __('Type', 'tmm_content_composer') . ': ' . 'home',
			'icon-lightbulb' => __('Type', 'tmm_content_composer') . ': ' . 'lightbulb',
			'icon-thumbs-up' => __('Type', 'tmm_content_composer') . ': ' . 'thumbs up',
			'icon-umbrella' => __('Type', 'tmm_content_composer') . ': ' . 'umbrella',
			'icon-th-list' => __('Type', 'tmm_content_composer') . ': ' . 'th list',
			'icon-resize-small' => __('Type', 'tmm_content_composer') . ': ' . 'resize small',
			'icon-download-alt' => __('Type', 'tmm_content_composer') . ': ' . 'download alt',
			'icon-road' => __('Type', 'tmm_content_composer') . ': ' . 'road',
			'icon-road-1' => __('Type', 'tmm_content_composer') . ': ' . 'road 1',
			'icon-roadblock' => __('Type', 'tmm_content_composer') . ': ' . 'roadblock',
			'icon-truck' => __('Type', 'tmm_content_composer') . ': ' . 'truck',
			'icon-truck-1' => __('Type', 'tmm_content_composer') . ': ' . 'truck 1',
			'icon-ambulance' => __('Type', 'tmm_content_composer') . ': ' . 'ambulance',
			'icon-bus' => __('Type', 'tmm_content_composer') . ': ' . 'bus',
			'icon-bicycle' => __('Type', 'tmm_content_composer') . ': ' . 'bicycle'
		);
		?>

		<h4 class="label"><?php _e('Blocks', 'tmm_content_composer'); ?></h4>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add item', 'tmm_content_composer'); ?></a><br />
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
									'title' => __('Text Color', 'tmm_content_composer'),
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
									'title' => __('Background Color', 'tmm_content_composer'),
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
									'title' => __('Text Hover Color', 'tmm_content_composer'),
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
									'title' => __('Background Hover Color', 'tmm_content_composer'),
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

								<h5 class="label"><?php _e('Title', 'tmm_content_composer'); ?></h5>
								<input type="text" value="<?php echo (isset($titles_edit_data[$key])) ? $titles_edit_data[$key] : '' ?>" class="list_item_title js_shortcode_template_changer data-input" style="width: 100%;" /><br />

								<h5 class="label"><?php _e('Link', 'tmm_content_composer'); ?></h5>
								<input type="text" value="<?php echo (isset($links_edit_data[$key])) ? $links_edit_data[$key] : '' ?>" class="list_item_link js_shortcode_template_changer data-input" style="width: 100%;" /><br />

								<div class="colorized_hover_title" <?php echo ($value_type!==1) ? 'style="display:none"' : '' ?>>
									<h5 class="label"><?php _e('Hover Title', 'tmm_content_composer'); ?></h5>
									<input type="text" value="<?php echo (isset($hover_titles_edit_data[$key])) ? $hover_titles_edit_data[$key] : '' ?>" class="list_item_hover_title js_shortcode_template_changer data-input" style="width: 100%;" /><br />
								</div>

								<h5 class="label title_content" <?php echo ($value_type==1) ? 'style="display:none"' : '' ?>><?php  _e('Content', 'tmm_content_composer'); ?></h5>
								<h5 class="label hover_title_content" <?php echo ($value_type!==1) ? 'style="display:none"' : '' ?>><?php  _e('Hover Content', 'tmm_content_composer'); ?></h5>
								<textarea class="list_item_content js_shortcode_template_changer data-area" style="width: 100%; min-height: 50px;"><?php echo $content_edit_text ?></textarea>
							</td>
							<td>
								<a class="button button-secondary js_delete_list_item js_shortcode_template_changer" href="#"><?php _e('Remove', 'tmm_content_composer'); ?></a>
							</td>
							<td></td>
						</tr>
					</table>

				</li>

			<?php } ?>

		</ul>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add item', 'tmm_content_composer'); ?></a><br />

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