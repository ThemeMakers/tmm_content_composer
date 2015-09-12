<<<<<<< HEAD
<?php
if (!defined('ABSPATH')) exit;
=======
<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<?php
		$type_array = array(
			'type-1' => __('Type 1', TMM_CC_TEXTDOMAIN),
			'type-2' => __('Type 2', TMM_CC_TEXTDOMAIN),
			'type-3' => __('Type 3', TMM_CC_TEXTDOMAIN),
		);
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa

$content_edit_data = array('');
if (isset($_REQUEST["shortcode_mode_edit"])) {
	$content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
}
?>

<<<<<<< HEAD
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
=======
		$styles_edit_data = array(key($type_array));
		$content_edit_data = array('');
		if (isset($_REQUEST["shortcode_mode_edit"])) {
			if (isset($_REQUEST["shortcode_mode_edit"]['styles'])) {
				$styles_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['styles']);
			} else {
				$styles_edit_data = array();
			}
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa

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
<<<<<<< HEAD
=======
		$list_type = 'ul';
		if (isset($_REQUEST["shortcode_mode_edit"]['list_type'])) {
			$list_type = $_REQUEST["shortcode_mode_edit"]['list_type'];
		}
		$list_type = ($list_type == 'ul' ? 0 : 1);
		//ul == 0
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('List Type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'list_type',
			'id' => 'list_type',
<<<<<<< HEAD
			'options' => array(
				'type-1' => __('Type 1', TMM_CC_TEXTDOMAIN),
				'type-2' => __('Type 2', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('list_type', 'map'),
			'description' => ''
=======
			'name' => 'list_type',
			'values' => array(
				0 => array(
					'title' => __('Unordered', TMM_CC_TEXTDOMAIN),
					'id' => 'list_type_ul',
					'value' => 0,
					'checked' => ($list_type == 0 ? 1 : 0)
				),
				1 => array(
					'title' => __('Ordered', TMM_CC_TEXTDOMAIN),
					'id' => 'list_type_ol',
					'value' => 1,
					'checked' => ($list_type == 1 ? 1 : 0)
				)
			),
			'value' => $list_type,
			'description' => '',
			'hidden_id' => 'list_type'
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
		));
		?>
	</div><!--/ .one-half-->

	<div class="fullwidth">

		<br>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add list item', TMM_CC_TEXTDOMAIN); ?></a><br />

		<ul id="list_items" class="list-items">
			<?php foreach ($content_edit_data as $key => $content_edit_text) : ?>
<<<<<<< HEAD
			
				<li class="list_item">
					<table class="list-table">
						<tr>
							<td style="width: 80%; vertical-align: top;">
=======
				<li class="list_item">
					<table class="list-table">
						<tr>
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
									'css_classes' => 'list_item_style data-select',
								));
								?>

							</td>
							<td style="width: 60%;">
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
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
<<<<<<< HEAD

	jQuery(function() {
		
=======
	var list_type = "<?php echo($list_type == 0 ? 'ul' : 'ol') ?>";

	jQuery(function() {
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.list_changer(shortcode_name);
			}
		});

		tmm_ext_shortcodes.list_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").life('click change keyup', function() {
			tmm_ext_shortcodes.list_changer(shortcode_name);
		});

<<<<<<< HEAD
=======

		//*****
		jQuery("#list_type_ul").click(function() {
			list_type = 'ul';
			tmm_ext_shortcodes.list_changer(shortcode_name);
		});

		jQuery("#list_type_ol").click(function() {
			list_type = 'ol';
			tmm_ext_shortcodes.list_changer(shortcode_name);
		});

>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
		jQuery(".js_add_list_item").click(function() {
			var clone = jQuery(".list_item:last").clone(true);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			jQuery(".list_item:last").find('input[type=text]').val("");
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
<<<<<<< HEAD
		
=======


>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
	});
</script>

