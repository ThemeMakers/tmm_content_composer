<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	
	<div class="fullwidth">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => esc_html__('Data Speed', TMM_CC_TEXTDOMAIN),
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

		<h4 class="label"><?php esc_html_e('Progress bars', TMM_CC_TEXTDOMAIN); ?></h4>
		<a class="button button-secondary js_add_list_item" href="#"><?php esc_html_e('Add bar item', TMM_CC_TEXTDOMAIN); ?></a><br />

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
									'placeholder' => esc_html__('Title', TMM_CC_TEXTDOMAIN)
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
									'placeholder' => esc_html__('from', TMM_CC_TEXTDOMAIN),
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
									'placeholder' => esc_html__('to', TMM_CC_TEXTDOMAIN)
								));
								?>
							</td>
							

							<td>
								<a class="button button-secondary js_delete_list_item" href="#"><?php esc_html_e('Remove', TMM_CC_TEXTDOMAIN); ?></a>
							</td>
							<td></td>
						</tr>
					</table>
				</li>
			<?php endforeach; ?>

		</ul>

		<a class="button button-secondary js_add_list_item" href="#"><?php esc_html_e('Add bar item', TMM_CC_TEXTDOMAIN); ?></a><br />

	</div>
	
	<div class="one-half">
		
		<?php
		$css_animation_array = array(
			'' => 'None',
			'opacity' => esc_html__('Opacity', TMM_CC_TEXTDOMAIN),
			'scale' => esc_html__('Scale', TMM_CC_TEXTDOMAIN),
			'slideRight' => esc_html__('SlideRight', TMM_CC_TEXTDOMAIN),
			'slideLeft' => esc_html__('SlideLeft', TMM_CC_TEXTDOMAIN),
			'slideDown' => esc_html__('SlideDown', TMM_CC_TEXTDOMAIN),
			'slideUp' => esc_html__('SlideUp', TMM_CC_TEXTDOMAIN),
		);

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Animation', TMM_CC_TEXTDOMAIN),
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

