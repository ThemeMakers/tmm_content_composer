<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">
	<?php 
    $slider_types = TMM_Slider::get_slider_types();
    if (class_exists('TMM_Grid_Slider')){
        $slider_types['grid_slider'] = 'Grid Slider';
    }        
    ?>
   
	<div class="one-half">		

		<?php
		if (!isset($_REQUEST["shortcode_mode_edit"])) {
			$_REQUEST["shortcode_mode_edit"] = array();
			$_REQUEST["shortcode_mode_edit"]['type'] = '';
		}
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Page slider type', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'type',
			'id' => 'shortcode_page_slider_type',
			'options' => $slider_types,
			'default_value' => TMM_Content_Composer::set_default_value('type', ''),
			'description' => ''
		));
		?>
		
	</div>
	
	<div class="one-half">
		
		<div class="native_sliders_groups2" <?php if ($_REQUEST["shortcode_mode_edit"]['type'] == 'layerslider' || $_REQUEST["shortcode_mode_edit"]['type'] == 'grid_slider' ): ?>style="display: none;"<?php endif; ?>>
			<?php $slides = TMM_Slider::get_list_of_groups(); ?>
			<?php if (!empty($slides)): ?>

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Slider groups', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'slider_group',
					'id' => 'slider_group',
					'options' => $slides,
					'default_value' => TMM_Content_Composer::set_default_value('slider_group', ''),
					'description' => '',
					'css_classes' => 'slider_group'
				));
				?>

			<?php else: ?>
				<?php _e("No one slider exists", TMM_CC_TEXTDOMAIN) ?>
			<?php endif; ?>
		</div>
        
        <?php if (class_exists('TMM_Grid_Slider')){ 
            $sliders = (class_exists('TMM_Grid_Slider')) ? TMM_Grid_Slider::get_sliders() : array();
                       
        ?>
        <div id="grid_slidegroups" <?php echo ($_REQUEST["shortcode_mode_edit"]['type'] != 'grid_slider')? 'style="display: none;"' : ''; ?>>
            <?php if (count($sliders)!=0){ 
                foreach ($sliders as $slider) {
                    $sliders_options[$slider->ID] = $slider->post_title;
                }
	            TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Grid Slider groups', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'grid_slider_group',
					'id' => 'grid_slider_group',
					'options' => $sliders_options,
					'default_value' => TMM_Content_Composer::set_default_value('grid_slider_group', ''),
					'description' => '',
					'css_classes' => 'grid_slider_group'
				));
            }else{
                 _e('Please, create accordion grid slider at first', TMM_CC_TEXTDOMAIN);
            }  ?>
        </div>
        <?php } ?>

		<?php if (function_exists('layerslider')): ?>
			<div id="layerslider_slidegroups2" <?php if ($_REQUEST["shortcode_mode_edit"]['type'] != 'layerslider'): ?>style="display: none;"<?php endif; ?>>

				<?php
				global $wpdb;
				$table_name = $wpdb->prefix . "layerslider";
				// Get sliders
				$sliders = $wpdb->get_results("SELECT * FROM $table_name
										WHERE flag_hidden = '0' AND flag_deleted = '0'
										ORDER BY id ASC LIMIT 200");
				?>
				<?php if (!empty($sliders)) : ?>
					<?php
					$slides = array();
					foreach ($sliders as $item) {
						$slides[$item->id] = empty($item->name) ? 'Unnamed' : $item->name;
					}

					TMM_Content_Composer::html_option(array(
						'type' => 'select',
						'title' => __('Layerslider plugins groups', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'layerslider_group',
						'id' => 'layerslider_group',
						'options' => array('' => __("Choose sliders group", TMM_CC_TEXTDOMAIN)) + $slides,
						'default_value' => TMM_Content_Composer::set_default_value('layerslider_group', ''),
						'description' => '',
						'css_classes' => 'layerslider_group'
					));
					?>

				<?php else: ?>
					<?php _e("No one Layerslider group exists", TMM_CC_TEXTDOMAIN) ?>
				<?php endif; ?>

			</div>
		<?php endif; ?>
		
	</div>

</div><!--/ .tmm_shortcode_template->
		  
<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery("#shortcode_page_slider_type").change(function() {

			var value = jQuery(this).val();

			if (value == 'layerslider') {
				jQuery(".native_sliders_groups2").hide();
				jQuery("#layerslider_slidegroups2").show();
				jQuery("#shortcode_sliders_aliases").hide();
                jQuery("#grid_slidegroups").hide();
				return;
			}
            if (value == 'grid_slider'){
                console.log('grid_slider');
                jQuery(".native_sliders_groups2").hide();
				jQuery("#layerslider_slidegroups2").hide();
				jQuery("#shortcode_sliders_aliases").hide();
				jQuery("#grid_slidegroups").show();
				return;
            }

			jQuery(".native_sliders_groups2").show();
			jQuery("#layerslider_slidegroups2").hide();
			jQuery("#grid_slidegroups").hide();
			jQuery("#shortcode_sliders_aliases").show();

			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery(".slider_group").change(function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
		
	});
</script>

