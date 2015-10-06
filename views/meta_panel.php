<?php if (!defined('ABSPATH')) exit; ?>

<input type="hidden" name="tmm_meta_saving" value="1" />
<a href="#add_row" class="tmm-lc-add-row button button-primary button-large"><?php _e("Add New Section", TMM_CC_TEXTDOMAIN) ?></a>
<a href="#" class="tmm-lc-paste-row button button-large"><?php _e("Insert Clipboard Section here", TMM_CC_TEXTDOMAIN) ?></a><br />

<ul id="tmm_lc_rows" class="tmm-lc-rows">

	<?php
	if (!empty($tmm_layout_constructor)) {

		foreach ($tmm_layout_constructor as $row => $row_data) {
			?>

			<li id="tmm_lc_row_<?php echo $row ?>" class="tmm-lc-row">

				<div class="tmm-lc-row-buttons-wrapper">
					<a class="tmm-lc-add-column" data-row-id="<?php echo $row ?>" title="<?php _e("Add Column to Section", TMM_CC_TEXTDOMAIN) ?>"></a>
					<a class="tmm-lc-copy-row" data-row-id="<?php echo $row ?>" title="<?php _e("Add Section to Clipboard", TMM_CC_TEXTDOMAIN) ?>"></a>
					<a class="tmm-lc-edit-row" data-row-id="<?php echo $row ?>" title="<?php _e("Section Editor", TMM_CC_TEXTDOMAIN) ?>"></a>
					<a class="tmm-lc-delete-row" data-row-id="<?php echo $row ?>" title="<?php _e("Delete Section", TMM_CC_TEXTDOMAIN) ?>"></a>
				</div>

				<div class="tmm-lc-columns" id="tmm_lc_columns_<?php echo $row ?>">

					<?php
					if (!empty($row_data)) {

						foreach ($row_data as $uniqid => $column) {

							if ($uniqid == 'row_data') {
								continue;
							}

							$col_data = array(
								'row' => $row,
								'uniqid' => $uniqid,
								'css_class' => $column['css_class'],
								'front_css_class' => $column['front_css_class'],
								'value' => $column['value'],
								'content' => $column['content'],
								'title' => $column['title'],
								'effect' => @$column['effect'],
								'row_align' => @$column['row_align'],
								'row_overlay' => @$column['row_overlay'],
								'padding_top' => @$column['padding_top'],
								'padding_bottom' => @$column['padding_bottom'],
							);

							TMM_Layout_Constructor::draw_column_item($col_data);

						}

					}
					?>

				</div>

				<input type="hidden" id="row_lc_displaying_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['lc_displaying']) ? $tmm_layout_constructor_row[$row]['lc_displaying'] : 'default') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][lc_displaying]" />
				<input type="hidden" id="row_container_width_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['container_width']) ? $tmm_layout_constructor_row[$row]['container_width'] : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][container_width]" />
				<input type="hidden" id="row_container_height_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['container_height']) ? $tmm_layout_constructor_row[$row]['container_height'] : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][container_height]" />
				<input type="hidden" id="row_bg_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_type']) ? $tmm_layout_constructor_row[$row]['bg_type'] : 'none') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_type]" />
				<input type="hidden" id="row_bg_data_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_data']) ? $tmm_layout_constructor_row[$row]['bg_data'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_data]" />
				<input type="hidden" id="row_bg_custom_color_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_color']) ? $tmm_layout_constructor_row[$row]['bg_color'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_color]" />
				<input type="hidden" id="row_bg_color_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_color_type']) ? $tmm_layout_constructor_row[$row]['bg_color_type'] : '0') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_color_type]" />

				<input type="hidden" id="row_bg_custom_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_custom_type']) ? $tmm_layout_constructor_row[$row]['bg_custom_type'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_custom_type]" />

				<input type="hidden" id="row_bg_custom_image_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_image']) ? $tmm_layout_constructor_row[$row]['bg_image'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_image]" />
				<input type="hidden" id="row_bg_custom_video_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_video']) ? $tmm_layout_constructor_row[$row]['bg_video'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_video]" />
				<input type="hidden" id="row_bg_custom_opacity_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_opacity']) ? $tmm_layout_constructor_row[$row]['bg_opacity'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_opacity]" />
				<input type="hidden" id="row_bg_is_cover_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_cover']) ? $tmm_layout_constructor_row[$row]['bg_cover'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_cover]" />
				<input type="hidden" id="row_bg_attachment_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_attachment']) ? $tmm_layout_constructor_row[$row]['bg_attachment'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_attachment]" />
				<input type="hidden" id="row_bg_fullscreen_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['bg_fullscreen']) ? $tmm_layout_constructor_row[$row]['bg_fullscreen'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_fullscreen]" />
				<input type="hidden" id="row_border_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['border_type']) ? $tmm_layout_constructor_row[$row]['border_type'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_type]" />
				<input type="hidden" id="row_border_width_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['border_width']) ? $tmm_layout_constructor_row[$row]['border_width'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_width]" />
				<input type="hidden" id="row_border_color_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['border_color']) ? $tmm_layout_constructor_row[$row]['border_color'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_color]" />
				<input type="hidden" id="row_align_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['row_align']) ? $tmm_layout_constructor_row[$row]['row_align'] : 'left') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][row_align]" />
				<input type="hidden" id="row_overlay_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['row_overlay']) ? $tmm_layout_constructor_row[$row]['row_overlay'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][row_overlay]" />
				<input type="hidden" id="row_padding_top_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['padding_top']) ? $tmm_layout_constructor_row[$row]['padding_top'] : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][padding_top]" />
				<input type="hidden" id="row_padding_bottom_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['padding_bottom']) ? $tmm_layout_constructor_row[$row]['padding_bottom'] : 20) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][padding_bottom]" />
				<input type="hidden" id="row_border_top_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]['border_top']) ? $tmm_layout_constructor_row[$row]['border_top'] : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_top]" />

			</li>

		<?php
		}

	}
	?>

</ul>


<div style="display: none;">

<div id="tmm_lc_column_item">
	<?php
	$col_data = array(
		'row' => '__ROW_ID__',
		'uniqid' => '__UNIQUE_ID__',
			'css_class' => 'col-md-3',
			'front_css_class' => 'col-md-3',
		'value' => '1/4',
		'content' => '',
		'title' => '',
		'effect' => '',
	);
	TMM_Layout_Constructor::draw_column_item($col_data);
	?>
</div>

<ul id="tmm_lc_row_wrapper">

	<li id="tmm_lc_row___ROW_ID__" class="tmm-lc-row">

		<div class="tmm-lc-row-buttons-wrapper">
			<a class="tmm-lc-add-column" title="<?php _e("Add Column", TMM_CC_TEXTDOMAIN) ?>" data-row-id="__ROW_ID__"></a>
			<a class="tmm-lc-copy-row" data-row-id="__ROW_ID__" title="<?php _e("Add to Clipboard", TMM_CC_TEXTDOMAIN) ?>"></a>
			<a class="tmm-lc-edit-row" data-row-id="__ROW_ID__" title="<?php _e("Edit", TMM_CC_TEXTDOMAIN) ?>"></a>
			<a class="tmm-lc-delete-row" data-row-id="__ROW_ID__" title="<?php _e("Delete", TMM_CC_TEXTDOMAIN) ?>"></a>
		</div>

		<div class="tmm-lc-columns" id="tmm_lc_columns___ROW_ID__"></div>

		<input type="hidden" id="row_lc_displaying___ROW_ID__" value="default" name="tmm_layout_constructor_row[__ROW_ID__][lc_displaying]" />
		<input type="hidden" id="row_container_width___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][container_width]" />
		<input type="hidden" id="row_container_height___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][container_height]" />
		<input type="hidden" id="row_bg_type___ROW_ID__" value="none" name="tmm_layout_constructor_row[__ROW_ID__][bg_type]" />
		<input type="hidden" id="row_bg_data___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_data]" />
		<input type="hidden" id="row_bg_custom_color___ROW_ID__" value="#fff" name="tmm_layout_constructor_row[__ROW_ID__][bg_color]" />
		<input type="hidden" id="row_bg_custom_color_type___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][bg_color_type]" />

		<input type="hidden" id="row_bg_custom_type___ROW_ID__" value="none" name="tmm_layout_constructor_row[__ROW_ID__][bg_custom_type]" />

		<input type="hidden" id="row_bg_custom_image___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_image]" />
		<input type="hidden" id="row_bg_custom_video___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_video]" />
		<input type="hidden" id="row_bg_custom_opacity___ROW_ID__" value="30" name="tmm_layout_constructor_row[__ROW_ID__][bg_opacity]" />
		<input type="hidden" id="row_bg_is_cover___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][bg_cover]" />
		<input type="hidden" id="row_bg_attachment___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_attachment]" />
		<input type="hidden" id="row_bg_fullscreen___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_fullscreen]" />
		<input type="hidden" id="row_align___ROW_ID__" value="left" name="tmm_layout_constructor_row[__ROW_ID__][row_align]" />
		<input type="hidden" id="row_overlay___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][row_overlay]" />
		<input type="hidden" id="row_padding_top___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][padding_top]" />
		<input type="hidden" id="row_padding_bottom___ROW_ID__" value="20" name="tmm_layout_constructor_row[__ROW_ID__][padding_bottom]" />
		<input type="hidden" id="row_border_top___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][border_top]" />

	</li>

</ul>

<div id="tmm_lc_column_effects">
	<?php
	$effects = array(
		'' => __("No effects", TMM_CC_TEXTDOMAIN),
		'elementFade' => __('Element Fade', TMM_CC_TEXTDOMAIN),
		'opacity2x' => __('Opacity', TMM_CC_TEXTDOMAIN),
		'slideRight' => __('Slide Right', TMM_CC_TEXTDOMAIN),
		'slideLeft' => __('Slide Left', TMM_CC_TEXTDOMAIN),
		'slideDown' => __('Slide Down', TMM_CC_TEXTDOMAIN),
		'slideUp' => __('Slide Up', TMM_CC_TEXTDOMAIN),
		'slideUp2x' => __('Slide Up 2x', TMM_CC_TEXTDOMAIN),
		'extraRadius' => __('Extra Radius', TMM_CC_TEXTDOMAIN)
	);

	TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => '',
		'label' => __("Layout constructor", TMM_CC_TEXTDOMAIN),
		'shortcode_field' => 'tmm-lc-column-effects-selector',
		'id' => '',
		'options' => $effects,
		'default_value' => '',
		'description' => '',
		'css_classes' => 'tmm-lc-column-effects-selector'
	));
	?>
</div>

<!-- ------------------------ Edit Row Template ----------------------------------------- -->

<div id="tmm_lc_row_edit_options">

<div class="one-half">

	<?php
	TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => __('Section Content Position', TMM_CC_TEXTDOMAIN),
		'shortcode_field' => 'row_lc_displaying',
		'id' => 'row_lc_displaying',
		'options' => array(
			'default' => __('Below content matching its layout', TMM_CC_TEXTDOMAIN),
			'full_width' => __('Below main content with separate layout options', TMM_CC_TEXTDOMAIN)
		),
		'default_value' => TMM_Content_Composer::set_default_value('row_lc_displaying', 'default'),
		'description' => ''
	));
	?>

	<div class="row_full_width" style="display: none;">
		<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Container Width', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_container_width',
			'id' => 'row_container_width',
			'options' => array(
				0 => __('Fixed Width', TMM_CC_TEXTDOMAIN),
				1 => __('Full Width', TMM_CC_TEXTDOMAIN)
			),
			'default_value' => TMM_Content_Composer::set_default_value('container_width', 0),
			'description' => ''
		));
		?>
		</div>

		<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Container Height', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_container_height',
			'id' => 'row_container_height',
			'options' => array(
				0 => __('Auto', TMM_CC_TEXTDOMAIN),
				1 => __('50% of Screen', TMM_CC_TEXTDOMAIN),
				2 => __('100% of Screen', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('container_height', 0),
			'description' => ''
		));
		?>
		</div>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Content Align', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_align',
			'id' => 'row_align',
			'options' => array(
				'left' => 'Left',
				'right' => 'Right',
				'center' => 'Center',
			),
			'default_value' => TMM_Content_Composer::set_default_value('align', 'left'),
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Border Top', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_border_top',
			'id' => 'row_border_top',
			'options' => array(
				'0' => __('No Top Border', TMM_CC_TEXTDOMAIN),
				'1' => __('Border Style 1', TMM_CC_TEXTDOMAIN),
				'2' => __('Border Style 2', TMM_CC_TEXTDOMAIN),
				'3' => __('Border Style 3', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('border_top', '0'),
			'description' => ''
		));

		?>
	</div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Offset Top', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_padding_top',
			'id' => 'row_padding_top',
			'options' => array(
				'0' => __('No Top Padding', TMM_CC_TEXTDOMAIN),
				'20' => __('20 PX', TMM_CC_TEXTDOMAIN),
				'40' => __('40 PX', TMM_CC_TEXTDOMAIN),
				'60' => __('60 PX', TMM_CC_TEXTDOMAIN),
				'80' => __('80 PX', TMM_CC_TEXTDOMAIN),
				'100' => __('100 PX', TMM_CC_TEXTDOMAIN)
			),
			'default_value' => TMM_Content_Composer::set_default_value('padding_top', '0'),
			'description' => __('Default Value 0px', TMM_CC_TEXTDOMAIN)
		));
		?>
	</div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Offset Bottom', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_padding_bottom',
			'id' => 'row_padding_bottom',
			'options' => array(
				'0' => __('No Bottom Padding', TMM_CC_TEXTDOMAIN),
				'20' => __('20 PX', TMM_CC_TEXTDOMAIN),
				'40' => __('40 PX', TMM_CC_TEXTDOMAIN),
				'60' => __('60 PX', TMM_CC_TEXTDOMAIN),
				'80' => __('80 PX', TMM_CC_TEXTDOMAIN),
				'100' => __('100 PX', TMM_CC_TEXTDOMAIN)
			),
			'default_value' => TMM_Content_Composer::set_default_value('padding_bottom', '20'),
			'description' => 'Default Value 20px'
		));
		?>
	</div>

</div>

<div class="one-half">

	<?php
	TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => __('Section Background Type', TMM_CC_TEXTDOMAIN),
		'shortcode_field' => 'row_background_type',
		'id' => 'row_background_type',
		'options' => array(
			'none' => __('Transparent (default)', TMM_CC_TEXTDOMAIN),
			'color' => __('Color', TMM_CC_TEXTDOMAIN),
			'image' => __('Image', TMM_CC_TEXTDOMAIN),
			//'video' => __('Video', TMM_CC_TEXTDOMAIN)
		),
		'default_value' => TMM_Content_Composer::set_default_value('background_type', 'none'),
		'description' => ''
	));
	?>

	<div id="row_background_color_box" style="display: none;">

		<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Preinstalled BG Colors', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_background_color_type',
			'id' => 'row_background_color_type',
			'options' => array(
				'0' => __('None', TMM_CC_TEXTDOMAIN),
				'bg-color-1' => __('White', TMM_CC_TEXTDOMAIN),
				'bg-color-2' => __('Silver', TMM_CC_TEXTDOMAIN),
				'bg-color-3' => __('Light Gray', TMM_CC_TEXTDOMAIN),
				'bg-color-4' => __('Light Blue', TMM_CC_TEXTDOMAIN),
				'custom' => __('Custom', TMM_CC_TEXTDOMAIN),
			),
			'default_value' => TMM_Content_Composer::set_default_value('background_color_type', '0'),
			'description' => ''
		));
		?>
		</div>

		<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'title' => __('Custom Background Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_background_color',
			'type' => 'color',
			'description' => '',
			'default_value' => '',
			'id' => 'row_background_color',
			'display' =>1
		));
		?>
		</div>

	</div>

	<div class="bg_custom_type_image" style="display: none;">

		<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => __('Background Image', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_background_image',
			'id' => 'row_background_image',
			'default_value' => '',
			'description' => ''
		));
		?>
		</div>

		<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Background Attachment', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_bg_attachment',
			'id' => 'row_bg_attachment',
			'options' => array(
				'1' => __('scroll', TMM_CC_TEXTDOMAIN),
				'0' => __('fixed', TMM_CC_TEXTDOMAIN)
			),
			'default_value' => 'scroll',
			'description' => ''
		));
		?>
		</div>

	</div>

	<div class="bg_custom_type_video" style="display: none;">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload_video',
			'title' => __('Background Video', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_background_video',
			'id' => 'row_background_video',
			'default_value' => '',
			'description' => 'Examples: https://www.youtube.com/watch?v=_EBYf3lYSEg http://vimeo.com/22439234 or upload self hosted video'
		));
		?>
	</div>

	<div id="row_background_image_box" style="display: none;">


		<?php
//		TMM_Content_Composer::html_option(array(
//			'type' => 'checkbox',
//			'title' => __('Overlay', TMM_CC_TEXTDOMAIN),
//			'shortcode_field' => 'row_overlay',
//			'id' => 'row_overlay',
//			'is_checked'=>TMM_Content_Composer::set_default_value('overlay', false),
//			'description' => 'Set overlay on background image'
//		));
		?>

	</div>

	<div id="row_background_opacity_box" style="display: none;">

		<?php
//		TMM_Content_Composer::html_option(array(
//			'title' => __('Opacity', TMM_CC_TEXTDOMAIN),
//			'shortcode_field' => 'row_background_opacity',
//			'type' => 'text',
//			'description' => 'min:0, max:100',
//			'default_value' => 100,
//			'id' => 'row_background_opacity'
//		));
		?>

	</div>

</div>

</div>

</div>
