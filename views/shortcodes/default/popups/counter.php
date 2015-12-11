<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	
	<div class="fullwidth">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Data Speed', 'tmm_content_composer'),
			'shortcode_field' => 'speed',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('speed', 3000),
			'description' => ''
		));
		?>
	</div>

	<div class="fullwidth">

		<?php
		$titles = array('');
		$from = array('');		
		$to = array('');
		if (isset($_REQUEST["shortcode_mode_edit"])) {
			if (isset($_REQUEST["shortcode_mode_edit"]['title'])) {
				$titles = explode('^', $_REQUEST["shortcode_mode_edit"]['title']);
				$from = explode('^', $_REQUEST["shortcode_mode_edit"]['from']);				
				$to = explode('^', $_REQUEST["shortcode_mode_edit"]['to']);
			}
		}
		?>

		<h4 class="label"><?php _e('Progress bars', 'tmm_content_composer'); ?></h4>
		<a class="button button-secondary js_add_list_item" href="#"><?php _e('Add bar item', 'tmm_content_composer'); ?></a><br />

		<ul id="list_items" class="list-items">
			<?php foreach ($titles as $key => $title) : ?>
				<li class="list_item tmm-mover">
					<table class="list-table">
						<tr>
							<td width="60%">
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'text',
									'title' => '',
									'shortcode_field' => 'title',
									'id' => '',
									'css_classes' => 'list_item_style save_as_one js_shortcode_template_changer',
									'default_value' => $title,
									'description' => '',
									'placeholder' => __('Title', 'tmm_content_composer')
								));
								?>
							</td>
							<td width="20%">
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'text',
									'title' => '',
									'shortcode_field' => 'from',
									'id' => '',
									'css_classes' => 'list_item_style save_as_one js_shortcode_template_changer',
									'default_value' => $from[$key],
									'description' => '',
									'placeholder' => __('from', 'tmm_content_composer'),
									'display' => 1
								));
								?>
							</td>
							<td width="20%">
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'text',
									'title' => '',
									'shortcode_field' => 'to',
									'id' => '',
									'css_classes' => 'list_item_style save_as_one js_shortcode_template_changer',
									'default_value' => $to[$key],
									'description' => '',
									'placeholder' => __('to', 'tmm_content_composer')
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
	
	<div class="one-half">
		
		<?php
		$css_animation_array = array(
			'' => 'None',
			'opacity' => __('Opacity', 'tmm_content_composer'),
			'scale' => __('Scale', 'tmm_content_composer'),
			'slideRight' => __('SlideRight', 'tmm_content_composer'),
			'slideLeft' => __('SlideLeft', 'tmm_content_composer'),
			'slideDown' => __('SlideDown', 'tmm_content_composer'),
			'slideUp' => __('SlideUp', 'tmm_content_composer'),
		);

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Animation', 'tmm_content_composer'),
			'shortcode_field' => 'animation',
			'id' => '',
			'options' => $css_animation_array,
			'default_value' => TMM_Content_Composer::set_default_value('animation', ''),
			'description' => 'Waypoints is a jQuery plugin that makes it easy to execute a function whenever you scroll to an element.'
		));
		?>	 
		
	</div>

</div>



<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">

	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").life('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
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

