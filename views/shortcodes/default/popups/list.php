<?php
if (!defined('ABSPATH')) exit;

$content_edit_data = array('');
if (isset($_REQUEST["shortcode_mode_edit"])) {
	$content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
}
?>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('List Style', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'list_style',
			'id' => 'list_style',
			'options' => array(
				'unordered' => __('Unordered', TMM_CC_TEXTDOMAIN),
				'ordered' => __('Ordered', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('list_style', 'map'),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('List Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'list_type',
			'id' => 'list_type',
			'options' => array(
				'type-1' => __('Type 1', TMM_CC_TEXTDOMAIN),
				'type-2' => __('Type 2', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('list_type', 'map'),
			'description' => ''
		));
		?>
	</div><!--/ .one-half-->

	<div class="fullwidth">

		<br>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add list item', TMM_CC_TEXTDOMAIN); ?></a><br />

		<ul id="list_items" class="list-items">		
			
			<?php foreach ($content_edit_data as $key => $content_edit_text) : ?>
			
				<li class="list_item">
					<table class="list-table">
						<tr>
							<td style="width: 80%; vertical-align: top;">
								<input type="text" value="<?php echo $content_edit_text ?>" class="list_item_content js_shortcode_template_changer data-area" />
							</td>
							<td>
								<a class="button button-secondary js_delete_list_item js_shortcode_template_changer" href="#"><?php _e('Remove', TMM_CC_TEXTDOMAIN); ?></a>
							</td>
							<td><div class="row-mover"></div></td>
						</tr>
					</table>
				</li>
			<?php endforeach; ?>

		</ul>

		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add list item', TMM_CC_TEXTDOMAIN); ?></a><br />

	</div><!--/ .fullwidth-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.list_changer(shortcode_name);
			}
		});

		tmm_ext_shortcodes.list_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").life('keyup change', function() {
			tmm_ext_shortcodes.list_changer(shortcode_name);
		});

		jQuery(".js_add_list_item").click(function() {
			var clone = jQuery(".list_item:last").clone(false);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			jQuery(".list_item:last").find('input[type=text]').val("");
			tmm_ext_shortcodes.list_changer(shortcode_name);
			return false;
		});

		jQuery(".js_delete_list_item").life('click',function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.list_changer(shortcode_name);
				});
			}

			return false;
		});
		
	});
</script>

