<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Layout', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'layout',
			'id' => 'type',
			'options' => array(
				4 => __('Four Columns', TMM_CC_TEXTDOMAIN),
				3 => __('Three Columns', TMM_CC_TEXTDOMAIN),
				2 => __('Two Columns', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('layout', 1),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<div class="fullwidth">

		<?php
		$posts = get_posts(array('numberposts' => -1, 'post_type' => TMM_Staff::$slug, 'suppress_filters' => false));
		$posts_array = array();
		if (!empty($posts)) {
			foreach ($posts as $value) {
				$posts_array[$value->ID] = $value->post_title;
			}
		}
		
		$albums_edit_data = array('');
		if (isset($_REQUEST["shortcode_mode_edit"])) {
			if (isset($_REQUEST["shortcode_mode_edit"]['staff'])) {
				$albums_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['staff']);
			} else {
				$albums_edit_data = array('0');
			}
		}
		?>

		<h4 class="label"><?php _e('Team', TMM_CC_TEXTDOMAIN); ?></h4>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add team member', TMM_CC_TEXTDOMAIN); ?></a><br />

		<ul id="list_items" class="list-items">
			<?php foreach ($albums_edit_data as $staff_id) : ?>
				<li class="list_item tmm-mover">
					<table class="list-table">
						<tr>
							<td width="100%">
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'select',
									'title' => '',
									'shortcode_field' => 'staff',
									'id' => '',
									'options' => $posts_array,
									'css_classes' => 'list_item_style save_as_one js_shortcode_template_changer',
									'default_value' => $staff_id,
									'description' => ''
								));
								?>
							</td>
							<td>
								<a class="button button-secondary js_delete_list_item" href="#"><?php _e('Remove', TMM_CC_TEXTDOMAIN); ?></a>
							</td>
							<td></td>
						</tr>
					</table>
				</li>
			<?php endforeach; ?>

		</ul>

		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add team member', TMM_CC_TEXTDOMAIN); ?></a><br />

	</div>

</div>



<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
		//***
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.changer(shortcode_name);
			}
		});

		jQuery(".js_add_list_item").on('click',function() {
			var clone = jQuery(".list_item:last").clone(true);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
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

