<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<link rel="stylesheet" href="<?php echo TMM_THEME_URI; ?>/css/font-awesome.css" type="text/css" media="all" />
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<?php
		$type_array = array(
			'icon-ok' => 'icon-ok',
			'icon-ok-circle' => 'icon-ok-circle',
			'icon-ok-circle' => 'icon-ok-circle',
			'icon-ok-sign' => 'icon-ok-sign',
			'icon-pencil' => 'icon-pencil',
			'icon-plus' => 'icon-plus',
			'icon-plus' => 'icon-plus',
			'icon-plus-sign' => 'icon-plus-sign',
			'icon-plus-sign' => 'icon-plus-sign',
			'icon-upload' => 'icon-upload',
			'icon-upload-alt' => 'icon-upload-alt',
			'icon-asterisk' => 'icon-asterisk',
			'icon-cogs' => 'icon-cogs',
			'icon-comments' => 'icon-comments',
		);

		//***

		$styles_edit_data = array(key($type_array));
		$content_edit_data = array('');
		if (isset($_REQUEST["shortcode_mode_edit"])) {
			if (isset($_REQUEST["shortcode_mode_edit"]['styles'])) {
				$styles_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['styles']);
			} else {
				$styles_edit_data = array();
			}

			$content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
		}
		?>

		<?php
		$value_type = !empty($styles_edit_data) ? 0 : 1;
		//ul == 0
		TMM_Content_Composer::html_option(array(
			'type' => 'radio',
			'title' => __('List Type', 'tmm_shortcodes'),
			'shortcode_field' => 'list_type',
			'id' => 'list_type',
			'name' => 'list_type',
			'values' => array(
				0 => array(
					'title' => __('Unordered', 'tmm_shortcodes'),
					'id' => 'list_type_ul',
					'value' => 0,
					'checked' => ($value_type == 0 ? 1 : 0)
				),
				1 => array(
					'title' => __('Ordered', 'tmm_shortcodes'),
					'id' => 'list_type_ol',
					'value' => 1,
					'checked' => ($value_type == 1 ? 1 : 0)
				)
			),
			'value' => $value_type,
			'description' => '',
			'hidden_id' => 'list_type'
		));
		?>

		<h4 class="label"><?php _e('List Styles', 'tmm_shortcodes'); ?></h4>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add list item', 'tmm_shortcodes'); ?></a><br />

		<ul id="list_items" class="list-items">
			<?php foreach ($content_edit_data as $key => $content_edit_text) : ?>
				<li class="list_item">
					<table class="list-table">
						<tr>
							<td>
								<i class="<?php echo(!empty($styles_edit_data) ? $type_array[$styles_edit_data[$key]] : ''); ?>"></i>
							</td>
							<td>
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'select',
									'title' => '',
									'shortcode_field' => 'action',
									'id' => '',
									'options' => $type_array,
									'default_value' => empty($styles_edit_data) ? '' : $styles_edit_data[$key],
									'description' => '',
									'css_classes' => 'list_item_style',
									'display' => empty($styles_edit_data) ? 0 : 1
								));
								?>

							</td>
							<td style="width: 50%;">
								<input type="text" value="<?php echo $content_edit_text ?>" class="list_item_content js_shortcode_template_changer data-area" />
							</td>
							<td>
								<a class="button button-secondary js_delete_list_item js_shortcode_template_changer" href="#"><?php _e('Remove', 'tmm_shortcodes'); ?></a>
							</td>
							<td><div class="row-mover"></div></td>
						</tr>
					</table>
				</li>
			<?php endforeach; ?>

		</ul>

		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add list item', 'tmm_shortcodes'); ?></a><br />

	</div><!--/ .fullwidth-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	var list_type = 0;

	jQuery(function() {
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.list_changer(shortcode_name);
			}
		});


		//***
		tmm_ext_shortcodes.list_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.list_changer(shortcode_name);
		});


		//*****
		jQuery("#list_type_ul").click(function() {
			jQuery(".list_item_style").add('.list-table i').show(200);
			list_type = 0;
		});

		jQuery("#list_type_ol").click(function() {
			jQuery(".list_item_style").add('.list-table i').hide(200);
			list_type = 1;
		});

		jQuery(".js_add_list_item").click(function() {
			var clone = jQuery(".list_item:last").clone(true);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			jQuery(".list_item:last").find('input[type=text]').val("");
			//***
			var icon_class = jQuery(".list_item:first").find('select').val();
			jQuery(".list_item:last").find('select').val(icon_class);
			tmm_ext_shortcodes.list_changer(shortcode_name);
			return false;
		});

		jQuery(".js_delete_list_item").click(function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.list_changer(shortcode_name);
				});
			}

			return false;
		});

		jQuery(".list_item_style").on('change', function() {
			jQuery(this).parents('li').find('i').removeAttr('class').addClass(jQuery(this).val());
			tmm_ext_shortcodes.list_changer(shortcode_name);
		});

	});
</script>


