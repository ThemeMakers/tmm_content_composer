<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<link rel="stylesheet" href="<?php echo TMM_THEME_URI; ?>/css/fontello.css" type="text/css" media="all" />
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<?php
		$type_array = array(
			'icon-paper-plane-2' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-paper-plane-2',
			'icon-pencil-7' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-pencil-7',
			'icon-cog-6' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-cog-6',
			'icon-beaker-1' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-beaker-1',
			'icon-megaphone-3' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-megaphone-3',
			'icon-search' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-search',
			'icon-comment-6' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-comment-6',
			'icon-lightbulb-3' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-lightbulb-3',
			'icon-thumbs-up-5' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-thumbs-up-5',
			'icon-laptop' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-laptop',
			'icon-wrench' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-wrench',
			'icon-leaf' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-leaf',
			'icon-cogs' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-cogs',
			'icon-group' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-group',
			'icon-comments-alt' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-comments-alt',
			'icon-folder-close' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-folder-close',
			'icon-cloud' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-cloud',
			'icon-briefcase' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-briefcase',
			'icon-beaker' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-beaker',
			'icon-bullhorn' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-bullhorn',
			'icon-comment' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-comment',
			'icon-globe' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-globe',
			'icon-globe-6' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-globe-6',
			'icon-heart' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-heart',
			'icon-rocket' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-rocket',
			'icon-suitcase' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-suitcase',
			'icon-pencil' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-pencil',
			'icon-params' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-params',
			'icon-folder-open' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-folder-open',
			'icon-cog' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-cog',
			'icon-coffee' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-coffee',
			'icon-gift' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-gift',
			'icon-home' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-home',
			'icon-lightbulb' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-lightbulb',
			'icon-thumbs-up' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-thumbs-up',
			'icon-umbrella' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-umbrella',
			'icon-random' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-random',
			'icon-th-list' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-th-list',
			'icon-resize-small' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-resize-small',
			'icon-download-alt' => __('Icon', TMM_CC_TEXTDOMAIN) . ': ' . 'icon-download-alt'
		);
		?>

		<h4 class="label"><?php _e('Blocks', TMM_CC_TEXTDOMAIN); ?></h4>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add item', TMM_CC_TEXTDOMAIN); ?></a><br />
		<ul id="list_items" class="list-items">
			<?php
			$content_edit_data = array('');
			$links_edit_data = array('#');
			$titles_edit_data = array('');
			$icons_edit_data = array(key($type_array));
			$list_item_color = array('');
			if (isset($_REQUEST["shortcode_mode_edit"])) {
				$content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
				$links_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['links']);
				$titles_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['titles']);
				$icons_edit_data = explode(',', $_REQUEST["shortcode_mode_edit"]['icons']);
				$list_item_color = explode(',', $_REQUEST["shortcode_mode_edit"]['colors']);
			}
			?>

			<?php foreach ($content_edit_data as $key => $content_edit_text){ ?>
				<li class="list_item tmm-mover">
					<table class="list-table">
						<tr>
							<td>
								<h5 class="label"><?php _e('Icon View', TMM_CC_TEXTDOMAIN); ?></h5>
								<i class="ca-icon <?php echo (isset($icons_edit_data[$key])) ? $icons_edit_data[$key] : 'con-paper-plane-2' ?>"></i>
							</td>
							<td>
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'select',
									'title' => __('Select Icon', TMM_CC_TEXTDOMAIN),
                                    'shortcode_field' => 'list_item_icon',
									'id' => '',
									'options' => $type_array,
									'default_value' => (isset($icons_edit_data[$key])) ? $icons_edit_data[$key] : 'con-paper-plane-2',
									'description' => '',
									'css_classes' => 'list_item_icon'
								));
								?>
                                                            
							</td>
							<td style="width: 50%;">							

								<h5 class="label"><?php _e('Title', TMM_CC_TEXTDOMAIN); ?></h5>
								<input type="text" value="<?php echo (isset($titles_edit_data[$key])) ? $titles_edit_data[$key] : '' ?>" class="list_item_title js_shortcode_template_changer data-input" style="width: 100%;" /><br />
                                
								<h5 class="label title_content" <?php echo ($icons_edit_data[$key]==1) ? 'style="display:none"' : '' ?>><?php  _e('Content', TMM_CC_TEXTDOMAIN); ?></h5>
								<h5 class="label hover_title_content" <?php echo ($icons_edit_data[$key]==0) ? 'style="display:none"' : '' ?>><?php  _e('Hover Content', TMM_CC_TEXTDOMAIN); ?></h5>
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

    <div class="one-half">

        <?php
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

    </div>

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function () {

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



		jQuery(".js_add_list_item").on('click', function() {
			var clone = jQuery(".list_item:last").clone(false);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			tmm_ext_shortcodes.services_changer(shortcode_name);
			jQuery(".list_item:last").find('input[type=text]').val("");
			jQuery(".list_item:last").find('textarea').val("");
			tmm_ext_shortcodes.services_changer(shortcode_name);

			colorizator();
			return false;
		});

		jQuery(".js_delete_list_item").life('click', function () {

			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(function(){
					jQuery(this).remove();
                    tmm_ext_shortcodes.services_changer(shortcode_name);
				});
			}
			tmm_ext_shortcodes.services_changer(shortcode_name);
			return false;
		});

		jQuery(".list_item_icon").life('change', function () {
			jQuery(this).parents('li').find('i').removeAttr('class').addClass(jQuery(this).val());
			tmm_ext_shortcodes.services_changer(shortcode_name);
		});

	});
</script>
