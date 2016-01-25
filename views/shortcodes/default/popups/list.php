<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<?php
		$type_array = array(
			'icon-right-4' => 'icon-right-4',
			'icon-right-open-outline' => 'icon-right-open-outline',
			'icon-angle-double-right' => 'icon-angle-double-right',
			'icon-pencil-alt-1' => 'icon-pencil-alt-1',
			'icon-right-dir' => 'icon-right-dir',
			'icon-right-open-1' => 'icon-right-open-1',
			'icon-right-bold' => 'icon-right-bold',
			'icon-right-thin' => 'icon-right-thin',
			'icon-down-dir-1' => 'icon-down-dir-1',
			'icon-fast-forward' => 'icon-fast-forward',
			'icon-ok-2' => 'icon-ok-2',
			'icon-ok-4' => 'icon-ok-4',
			'icon-pencil-alt' => 'icon-pencil-alt',
			'icon-right-open-3' => 'icon-right-open-3',
			'icon-right-circle-1' => 'icon-right-circle-1',
			'icon-share-2' => 'icon-share-2'
		);

		$actions = array(key($type_array));

		$color_data = array();
		$content_edit_data = array('');

		if (isset($_REQUEST["shortcode_mode_edit"])) {

			if (isset($_REQUEST["shortcode_mode_edit"]['actions'])) {
				$actions = explode('^', $_REQUEST["shortcode_mode_edit"]['actions']);
			} else {
				$actions = array();
			}

			if (isset($_REQUEST["shortcode_mode_edit"]['colors'])) {
				$color_data = explode('^', $_REQUEST["shortcode_mode_edit"]['colors']);
			} else {
				$color_data = array();
			}

			$list_item_content = explode('^', $_REQUEST["shortcode_mode_edit"]['list_item_content']);
		}
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('List Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'list_type',
			'id' => '',
			'options' => array(
				0 => __('Unordered', TMM_CC_TEXTDOMAIN),
				1 => __('Ordered', TMM_CC_TEXTDOMAIN),
				2 => __('Circle', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('list_type', 0),
			'description' => ''
		));

		?>

		<h4 class="label"><?php _e('List Styles', TMM_CC_TEXTDOMAIN); ?></h4>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add list item', TMM_CC_TEXTDOMAIN); ?></a><br />

		<ul id="list_items" class="list-items">

			<?php foreach ($actions as $key => $action): ?>

				<li class="list_item">
					<table class="list-table">
						<tr>
							<td><i class="<?php echo @$action ?>"></i></td>
							<td>
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'select',
									'title' => '',
									'shortcode_field' => 'actions',
									'id' => '',
									'options' => $type_array,
									'default_value' => $action,
									'description' => '',
									'css_classes' => 'list_item_style save_as_one js_shortcode_template_changer',
									'display' => empty($action) ? 0 : 1
								));
								?>
							</td>
							<td>
								<?php
								TMM_Content_Composer::html_option(array(
									'title' => '',
									'shortcode_field' => 'colors',
									'type' => 'color',
									'description' => '',
									'default_value' => empty($color_data) ? '' : $color_data[$key],
									'id' => '',
									'css_classes' => 'list_item_color save_as_one js_shortcode_template_changer',
									'display' => 1
								));
								?>
							</td>
							<td>
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'text',
									'title' => '',
									'shortcode_field' => 'list_item_content',
									'id' => '',
									'css_classes' => 'list_item_content save_as_one js_shortcode_template_changer',
									'default_value' => @$list_item_content[$key],
									'description' => '',
									'placeholder' => __('List item content', TMM_CC_TEXTDOMAIN)
								));
								?>

							</td>
							<td>
								<a class="button button-secondary js_delete_list_item js_shortcode_template_changer" href="#"><?php _e('Remove', TMM_CC_TEXTDOMAIN); ?></a>
							</td>
							<td><div class="row-mover"></div></td>
						</tr>
					</table><!--/ .list-table-->
				</li>

			<?php endforeach; ?>

		</ul>

		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add list item', TMM_CC_TEXTDOMAIN); ?></a><br />

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
	var list_type = 0;

	jQuery(function() {

		colorizator();

		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.changer(shortcode_name);
			}
		});

		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").life('click change', function(e) {
			e.preventDefault();
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		var list_type = jQuery('[data-shortcode-field=list_type]'),
			select = jQuery('.sel', '.list-items'),
			color = jQuery('.list-item-color'),
			icon = jQuery('i');

		function listItems(val, select, color, icon) {
			switch (parseInt(val)) {
				case 0:
					select.add(color).add(icon).css({ display: 'inline-block' });
					break;
				case 1:
					select.add(icon).css({ display: 'none' });
					color.css({ display: 'inline-block'});
					break;
				case 2:
					select.add(color).add(icon).css({ display: 'none' });
					break;
				default:
					select.add(color).add(icon).css({ display: 'inline-block' });
					break;
			}
		}

		listItems(list_type.val(), select, color, icon);

		list_type.on('change', function (e) {
			var val = jQuery(this).val();
			listItems(val, select, color, icon);
			e.preventDefault();
		});

		jQuery(".js_add_list_item").on('click', function() {
			var clone = jQuery(".list_item:last").clone(false);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			jQuery(".list_item:last").find('input[type=text]').val("");

			var icon_class = jQuery(".list_item:first").find('select').val();
			jQuery(".list_item:last").find('select').val(icon_class);
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
			return false;
		});

		jQuery(".js_delete_list_item").life('click',function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.changer(shortcode_name);
				});
			}
			return false;
		});

		jQuery(".list_item_style").life('change', function() {
			jQuery(this).parents('li').find('i').removeAttr('class').addClass(jQuery(this).val());
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>

