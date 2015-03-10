<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	
	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'type',
			'id' => 'type',
			'options' => array(
				'' => __('Accordion', TMM_CC_TEXTDOMAIN),
				'toggle' => __('Toggle', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('type', ''),
			'description' => ''
		));
		?>
		
	</div>
		
	<br />
	<br />

	<div class="fullwidth">

		<a class="button button-secondary js_add_accordion_item" href="#"><?php _e('Add item', TMM_CC_TEXTDOMAIN); ?></a><br />

		<ul id="list_items" class="list-items">

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
					<table class="list-table">
						<tr>
							<td valign="top">
								<input type="text" value="<?php echo $titles_edit_data[$key] ?>" placeholder="<?php _e('Title', TMM_CC_TEXTDOMAIN); ?>" class="accordion_item_title js_shortcode_template_changer data-input" style="width: 50%;" />
								&nbsp;<a class="button button-secondary js_delete_accordion_item js_shortcode_template_changer" href="#"><?php _e('Remove', TMM_CC_TEXTDOMAIN); ?></a>
							</td>
						</tr>
						<tr>
							<td valign="top">
								<textarea class="accordion_item_content js_shortcode_template_changer data-area" placeholder="<?php _e('Content', TMM_CC_TEXTDOMAIN); ?>"><?php echo $content_edit_text ?></textarea>
							</td>
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
				tmm_ext_shortcodes.accordion_changer(shortcode_name);
			}
		});

		//***
		tmm_ext_shortcodes.accordion_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.accordion_changer(shortcode_name);
		});


		//*****

		jQuery(".js_add_accordion_item").on('click',function() {
			var clone = jQuery(".list_item:last").clone(true);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			jQuery(".list_item:last").find('input[type=text]').val("");
			jQuery(".list_item:last").find('textarea').val("");
			//***
			var icon_class = jQuery(".list_item:first").find('select').val();
			jQuery(".list_item:last").find('select').val(icon_class);
			tmm_ext_shortcodes.accordion_changer(shortcode_name);
			return false;
		});

		jQuery(".js_delete_accordion_item").life('click',function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.accordion_changer(shortcode_name);
				});
			}

			return false;
		});

	});
</script>


