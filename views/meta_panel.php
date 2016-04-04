<?php if (!defined('ABSPATH')) exit; ?>

<input type="hidden" name="tmm_meta_saving" value="1" />
<a href="#add_row" class="tmm-lc-add-row button button-primary button-large"><?php esc_html_e("Add New Row", TMM_CC_TEXTDOMAIN) ?></a>
<a href="#" class="tmm-lc-paste-row button button-large"><?php esc_html_e("Insert Clipboard Row here", TMM_CC_TEXTDOMAIN) ?></a><br />

<ul id="tmm_lc_rows" class="tmm-lc-rows">

	<?php
	if (!empty($tmm_layout_constructor)) {

		foreach ($tmm_layout_constructor as $row => $row_data) {
			?>

			<li id="tmm_lc_row_<?php echo $row ?>" class="tmm-lc-row">

				<div class="tmm-lc-row-buttons-wrapper">
					<a class="tmm-lc-add-column" data-row-id="<?php echo esc_attr($row); ?>" title="<?php esc_html_e("Add Column", TMM_CC_TEXTDOMAIN) ?>"></a>
					<a class="tmm-lc-copy-row" data-row-id="<?php echo esc_attr($row); ?>" title="<?php esc_html_e("Add Row to Clipboard", TMM_CC_TEXTDOMAIN) ?>"></a>
					<a class="tmm-lc-edit-row" data-row-id="<?php echo esc_attr($row); ?>" title="<?php esc_html_e("Edit", TMM_CC_TEXTDOMAIN) ?>"></a>
					<a class="tmm-lc-delete-row" data-row-id="<?php echo esc_attr($row); ?>" title="<?php esc_html_e("Delete", TMM_CC_TEXTDOMAIN) ?>"></a>
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
								'left_indent' => ($column['left_indent']!='') ? $column['left_indent'] : TMM_Content_Composer::get_def_value('left_indent'),
								'right_indent' => ($column['right_indent']!='') ? $column['right_indent'] : TMM_Content_Composer::get_def_value('right_indent'),
								'row_align' => @$column['row_align'],
								'padding_top' => @$column['padding_top'],
								'padding_bottom' => @$column['padding_bottom'],
							);

							TMM_Layout_Constructor::draw_column_item($col_data);

						}

					}
					?>

				</div>

				<input type="hidden" id="row_lc_displaying_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['lc_displaying']) : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][lc_displaying]" />
				<input type="hidden" id="row_full_width_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['full_width']) : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][full_width]" />
				<input type="hidden" id="row_content_full_width_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['content_full_width']) : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][content_full_width]" />
				<input type="hidden" id="row_bg_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['bg_type']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_type]" />
				<input type="hidden" id="row_bg_data_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['bg_data']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_data]" />
				<input type="hidden" id="row_bg_custom_color_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['bg_color']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_color]" />
                
				<input type="hidden" id="row_bg_custom_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['bg_custom_type']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_custom_type]" />
                
				<input type="hidden" id="row_bg_custom_image_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['bg_image']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_image]" />
				<input type="hidden" id="row_bg_custom_video_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['bg_video']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_video]" />
				<input type="hidden" id="row_bg_custom_opacity_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['bg_opacity']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_opacity]" />
				<input type="hidden" id="row_bg_is_cover_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['bg_cover']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_cover]" />
				<input type="hidden" id="row_border_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['border_type']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_type]" />
				<input type="hidden" id="row_border_width_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['border_width']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_width]" />
				<input type="hidden" id="row_border_color_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['border_color']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_color]" />
				<input type="hidden" id="row_align_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['row_align']) : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][row_align]" />
				<input type="hidden" id="row_padding_top_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['padding_top']) : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][padding_top]" />
				<input type="hidden" id="row_padding_bottom_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['padding_bottom']) : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][padding_bottom]" />
				<input type="hidden" id="row_margin_top_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['margin_top']) : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][margin_top]" />
				<input type="hidden" id="row_margin_bottom_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['margin_bottom']) : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][margin_bottom]" />
				<input type="hidden" id="row_custom_css_class_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? esc_attr(@$tmm_layout_constructor_row[$row]['custom_css_class']) : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][custom_css_class]" />

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
			'css_class' => 'element1-4',
			'front_css_class' => 'medium-3',
			'value' => '1/4',
			'content' => '',
			'title' => '',
			'effect' => '',
			'left_indent' => TMM_Content_Composer::get_def_value('left_indent'),
			'right_indent' => TMM_Content_Composer::get_def_value('right_indent'),
		);
		TMM_Layout_Constructor::draw_column_item($col_data);
		?>
	</div>

	<ul id="tmm_lc_row_wrapper">

		<li id="tmm_lc_row___ROW_ID__" class="tmm-lc-row">

            <div class="tmm-lc-row-buttons-wrapper">
                <a class="tmm-lc-add-column" title="<?php esc_attr_e("Add Column", TMM_CC_TEXTDOMAIN) ?>" data-row-id="__ROW_ID__"></a>
                <a class="tmm-lc-copy-row" data-row-id="__ROW_ID__" title="<?php esc_attr_e("Add to Clipboard", TMM_CC_TEXTDOMAIN) ?>"></a>
                <a class="tmm-lc-edit-row" data-row-id="__ROW_ID__" title="<?php esc_attr_e("Edit", TMM_CC_TEXTDOMAIN) ?>"></a>
                <a class="tmm-lc-delete-row" data-row-id="__ROW_ID__" title="<?php esc_attr_e("Delete", TMM_CC_TEXTDOMAIN) ?>"></a>
            </div>

			<div class="tmm-lc-columns" id="tmm_lc_columns___ROW_ID__"></div>

			<input type="hidden" id="row_lc_displaying___ROW_ID__" value="default" name="tmm_layout_constructor_row[__ROW_ID__][lc_displaying]" />
			<input type="hidden" id="row_full_width___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][full_width]" />
			<input type="hidden" id="row_content_full_width___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][content_full_width]" />
			<input type="hidden" id="row_bg_type___ROW_ID__" value="none" name="tmm_layout_constructor_row[__ROW_ID__][bg_type]" />
			<input type="hidden" id="row_bg_data___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_data]" />
			<input type="hidden" id="row_bg_custom_color___ROW_ID__" value="#fff" name="tmm_layout_constructor_row[__ROW_ID__][bg_color]" />
            
			<input type="hidden" id="row_bg_custom_type___ROW_ID__" value="color" name="tmm_layout_constructor_row[__ROW_ID__][bg_custom_type]" />
            
			<input type="hidden" id="row_bg_custom_image___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_image]" />
			<input type="hidden" id="row_bg_custom_video___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_video]" />
			<input type="hidden" id="row_bg_custom_opacity___ROW_ID__" value="30" name="tmm_layout_constructor_row[__ROW_ID__][bg_opacity]" />
			<input type="hidden" id="row_bg_is_cover___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_cover]" />
			<input type="hidden" id="row_align___ROW_ID__" value="left" name="tmm_layout_constructor_row[__ROW_ID__][row_align]" />
			<input type="hidden" id="row_padding_top___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][padding_top]" />
			<input type="hidden" id="row_padding_bottom___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][padding_bottom]" />
			<input type="hidden" id="row_margin_top___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][margin_top]" />
			<input type="hidden" id="row_margin_bottom___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][margin_bottom]" />
			<input type="hidden" id="row_custom_css_class___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][custom_css_class]" />

		</li>

	</ul>

	<div id="tmm_lc_column_effects">
		<div class="one-fourth">
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
				'title' =>  __("Column Appearing Effect", TMM_CC_TEXTDOMAIN),
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
		<div class="one-fourth">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' =>  __("Column Left Indent", TMM_CC_TEXTDOMAIN),
				'label' => __("Column Left Indent", TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'tmm-lc-column-left-indent',
				'id' => '',
				'default_value' => '',
				'description' => 'px',
				'css_classes' => 'tmm-lc-column-left-indent'
			));
			?>
		</div>
		<div class="one-fourth">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' =>  __("Column Right Indent", TMM_CC_TEXTDOMAIN),
				'label' => __("Column Right Indent", TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'tmm-lc-column-right-indent',
				'id' => '',
				'default_value' => '',
				'description' => 'px',
				'css_classes' => 'tmm-lc-column-right-indent'
			));
			?>
		</div>
	</div>

	<!-- ------------------------ Edit Row Template ----------------------------------------- -->

	<div id="tmm_lc_row_edit_options">

        <div class="one-half">

           <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'select',
                'title' => __('Row content displaying', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'row_lc_displaying',
                'id' => 'row_lc_displaying',
                'options' => array(
                    'default' => __('Below content matching its layout', TMM_CC_TEXTDOMAIN),
                    'before_full_width' => __('Before main content with separate layout options', TMM_CC_TEXTDOMAIN),
		   			'full_width' => __('Below main content with separate layout options', TMM_CC_TEXTDOMAIN)
                ),
                'default_value' => TMM_Content_Composer::set_default_value('row_lc_displaying', 'default'),
                'description' => ''
            ));
            ?>

            <div class="row_full_width" style="display: none;">
            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'select',
                'title' => __('Row Full Width', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'row_full_width',
                'id' => 'row_full_width',
                'options' => array(
                    0 => __('No', TMM_CC_TEXTDOMAIN),
                    1 => __('Yes', TMM_CC_TEXTDOMAIN)
                ),
                'default_value' => TMM_Content_Composer::set_default_value('full_width', 0),
                'description' => ''
            ));
            ?>
            </div>

            <div class="content_full_width" style="display: none;">
            <?php
			/*
            TMM_Content_Composer::html_option(array(
                'type' => 'select',
                'title' => __('Content Full Width', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'row_content_full_width',
                'id' => 'row_content_full_width',
                'options' => array(
                    0 => __('No', TMM_CC_TEXTDOMAIN),
                    1 => __('Yes', TMM_CC_TEXTDOMAIN)
                ),
                'default_value' => TMM_Content_Composer::set_default_value('content_full_width', 0),
                'description' => ''
            ));*/
            ?>
            </div>

            <?php
            TMM_Content_Composer::html_option(array(
				'title' => __('Padding top', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_padding_top',
				'type' => 'text',
				'description' => 'Default Value 55px',
				'default_value' => TMM_Content_Composer::set_default_value('padding_top', '55'),
				'id' => 'row_padding_top'
			));

			TMM_Content_Composer::html_option(array(
				'title' => __('Padding bottom', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_padding_bottom',
				'type' => 'text',
				'description' => 'Default Value 55px',
				'default_value' => TMM_Content_Composer::set_default_value('padding_bottom', '55'),
				'id' => 'row_padding_bottom'
			));

			TMM_Content_Composer::html_option(array(
				'title' => __('Margin top', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_margin_top',
				'type' => 'text',
				'description' => 'Default Value 30px',
				'default_value' => TMM_Content_Composer::set_default_value('margin_top', '30'),
				'id' => 'row_margin_top'
			));

			TMM_Content_Composer::html_option(array(
				'title' => __('Margin bottom', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_margin_bottom',
				'type' => 'text',
				'description' => 'Default Value 30px',
				'default_value' => TMM_Content_Composer::set_default_value('margin_bottom', '30'),
				'id' => 'row_margin_bottom'
			));

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
                'default_value' => TMM_Content_Composer::set_default_value('align', 'center'),
                'description' => ''
            ));

			?>
        </div>

		<div class="one-half">

			<?php

			TMM_Content_Composer::html_option(array(
				'title' => __('Custom css class', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_custom_css_class',
				'type' => 'text',
				'description' => '',
				'default_value' => TMM_Content_Composer::set_default_value('row_custom_css_class', ''),
				'id' => 'row_custom_css_class'
			));

			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Row Background Type', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_background_type',
				'id' => 'row_background_type',
				'options' => array(
					'none' => __('None', TMM_CC_TEXTDOMAIN),
					'default' => __('Default Theme Color', TMM_CC_TEXTDOMAIN),
					'custom' => __('Custom', TMM_CC_TEXTDOMAIN),
				),
				'default_value' => 'none',
				'description' => ''
			));
			?>			

			<div id="row_background_image_box" style="display: none;">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Custom Background Type', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'row_background_custom_type',
					'id' => 'row_bg_custom_type',
                    'options' => array(
                        'color' => __('Color', TMM_CC_TEXTDOMAIN),
                        'image' => __('Image', TMM_CC_TEXTDOMAIN),
                    ),
                    'default_value' => 'color',
					'description' => ''
				));
				?>
                
                <div id="row_background_color_box" style="display: none;">
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'row_background_color',
                        'type' => 'color',
                        'description' => '',
                        'default_value' => '',
                        'id' => 'row_background_color',
                        'display' =>1
                    ));
                    ?>
                </div>
                
                
                <div class="bg_custom_type_image" style="display: none;">
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

			</div>

		</div>

	</div>

</div>
