<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<?php
		$colors = array('');
		$titles = array('');
		$percentages = array('');
		if (isset($_REQUEST["shortcode_mode_edit"])) {
			if (isset($_REQUEST["shortcode_mode_edit"]['color'])) {
				$colors = explode('^', $_REQUEST["shortcode_mode_edit"]['color']);
				$titles = explode('^', $_REQUEST["shortcode_mode_edit"]['title']);
				$percentages = explode('^', $_REQUEST["shortcode_mode_edit"]['percentage']);
			}
		}
		?>

		<h4 class="label"><?php _e('Progress bars', 'tmm_content_composer'); ?></h4>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add bar item', 'tmm_content_composer'); ?></a><br />

		<ul id="list_items" class="list-items">
			<?php foreach ($colors as $key => $color) : ?>
				<li class="list_item tmm-mover">
					<table class="list-table">
						<tr>
							<td width="20%">
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'text',
									'title' => '',
									'shortcode_field' => 'title',
									'id' => '',
									'css_classes' => 'list_item_style save_as_one js_shortcode_template_changer',
									'default_value' => $titles[$key],
									'description' => '',
									'placeholder' => __('Title', 'tmm_content_composer')
								));
								?>
							</td>
							<td width="50%">
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'text',
									'title' => '',
									'shortcode_field' => 'percentage',
									'id' => '',
									'css_classes' => 'list_item_style save_as_one js_shortcode_template_changer',
									'default_value' => $percentages[$key],
									'description' => '',
									'placeholder' => __('Percentage %', 'tmm_content_composer')
								));
								?>
							</td>
							<td width="50%">
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'color',
									'title' => '',
									'shortcode_field' => 'color',
									'id' => 'color_' . uniqid(),
									'css_classes' => 'list_item_style save_as_one js_shortcode_template_changer',
									'default_value' => $color,
									'description' => '',
									'display' => 1
								));
								?>
							</td>

							<td>
								<a class="button button-secondary js_delete_list_item" href="#"><?php _e('Remove', 'tmm_content_composer'); ?></a>
							</td>
							<td></td>
						</tr>
					</table>
				</li>
			<?php endforeach; ?>

		</ul>

		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add bar item', 'tmm_content_composer'); ?></a><br />

	</div>

</div>



<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">

	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").life('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
		});
		colorizator();
		//***
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.changer(shortcode_name);
			}
		});

		jQuery(".js_add_list_item").on('click',function() {            
			var clone = jQuery(".list_item:last").clone(false);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
            jQuery(".list_item:last").find('input[type=text]').val("");
			jQuery(".list_items:last .bg_hex_color").attr('id', 'color_' + get_tmp_id());
			colorizator();
			//***
			function get_tmp_id() {
				var d = new Date();
				return d.getTime();
			}
			//***
			tmm_ext_shortcodes.changer(shortcode_name);
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
	});

</script>

