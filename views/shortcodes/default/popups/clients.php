<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
    
    <div class="one-half">
       <?php
       $items_per_slide = array();
		for ($i = 1; $i < 10; $i++) {
			$items_per_slide[$i] = $i;
		}
       TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Items Per Slide', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'items_per_slide',
			'id' => 'items_per_slide',
            'options' => $items_per_slide,
			'default_value' => TMM_Content_Composer::set_default_value('items_per_slide', '6'),
			'description' => ''
		));
		?>       
      
    </div>
    <div class="one-half">
       <?php
       
       $animation_types = array(
           'fade' => 'Fade',
           'fades' => 'Fades',
           'slide' => 'Slide',
           'goDown' => 'go Down',
           'scaleToFade' => 'Scale To Fade',
           'backSlide' => 'Back Slide',
           'fadeUp' => 'Fade Up',
           'verticalSlide' => 'Vertical Slide'
       );
       
       TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Slides Animation Effect', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'animation_type',
			'id' => 'animation_type',
            'options' => $animation_types,
			'default_value' => TMM_Content_Composer::set_default_value('animation_type', 'scaleToFade'),
			'description' => ''
		));
		?>       
      
    </div>

	<div class="fullwidth">

		<h4 class="label"><?php esc_html_e('Items', TMM_CC_TEXTDOMAIN); ?></h4>

		<a class="button button-secondary js_add_accordion_item" href="#"><?php esc_html_e('Add item', TMM_CC_TEXTDOMAIN); ?></a>

		<ul id="list_items" class="list-items">

			<?php
			$titles_edit_data = array('');
			$content_edit_data = array('#');
			if (isset($_REQUEST["shortcode_mode_edit"])) {
				$titles_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['titles']);
				$content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
			}
			?>

			<?php foreach ($content_edit_data as $key => $content_edit_text) : ?>
				<li class="list_item">
					<table class="list-table">
						<tr>
							<td valign="top" style="width: 100%;">
								<?php
								TMM_Content_Composer::html_option(array(
									'type' => 'upload',
									'title' => '',
									'shortcode_field' => '',
									'id' => '',
									'default_value' => $titles_edit_data[$key],
									'description' => '',
									'css_classes' => 'accordion_item_title'
								));
								?>
							</td>
							<td><a class="button button-secondary js_delete_accordion_item js_shortcode_template_changer" href="#"><?php esc_html_e('Remove', TMM_CC_TEXTDOMAIN); ?></a></td>
						</tr>
						<tr>
							<td valign="top" style="width: 100%;" colspan="2">
								<input type="text" value="<?php echo $content_edit_text ?>" class="accordion_item_content js_shortcode_template_changer" style="width: 100%;" />
							</td>
						</tr>
					</table>
				</li>
			<?php endforeach; ?>


		</ul>

		<a class="button button-secondary js_add_accordion_item" href="#"><?php esc_html_e('Add item', TMM_CC_TEXTDOMAIN); ?></a><br />

	</div><!--/ .fullwidth-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.clients_changer(shortcode_name);
			}
		});

		//***
		tmm_ext_shortcodes.clients_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.clients_changer(shortcode_name);
		});


		//*****

		jQuery(".js_add_accordion_item").on('click',function() {
			var clone = jQuery(".list_item:last").clone(true);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			jQuery(".list_item:last").find('input[type=text]').val("");
			//***
			var icon_class = jQuery(".list_item:first").find('select').val();
			jQuery(".list_item:last").find('select').val(icon_class);
			tmm_ext_shortcodes.clients_changer(shortcode_name);
			return false;
		});

		jQuery(".js_delete_accordion_item").life('click',function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.clients_changer(shortcode_name);
				});
			}

			return false;
		});

	});
</script>


