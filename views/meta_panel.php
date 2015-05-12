<?php if (!defined('ABSPATH')) exit; ?>

<input type="hidden" name="tmm_meta_saving" value="1" />
<a href="#add_row" class="tmm-lc-add-row button button-primary button-large"><?php _e("Add New Row", TMM_CC_TEXTDOMAIN) ?></a>
<a href="#" class="tmm-lc-paste-row button button-large"><?php _e("Insert Clipboard Row here", TMM_CC_TEXTDOMAIN) ?></a><br />

<ul id="tmm_lc_rows" class="tmm-lc-rows">

	<?php
	if (!empty($tmm_layout_constructor)) {

		foreach ($tmm_layout_constructor as $row => $row_data) {
			?>

			<li id="tmm_lc_row_<?php echo $row ?>" class="tmm-lc-row">

				<div class="tmm-lc-row-buttons-wrapper">
					<a class="tmm-lc-add-column" data-row-id="<?php echo $row ?>" title="<?php _e("Add Column", TMM_CC_TEXTDOMAIN) ?>"></a>
					<a class="tmm-lc-copy-row" data-row-id="<?php echo $row ?>" title="<?php _e("Add Row to Clipboard", TMM_CC_TEXTDOMAIN) ?>"></a>
					<a class="tmm-lc-edit-row" data-row-id="<?php echo $row ?>" title="<?php _e("Edit", TMM_CC_TEXTDOMAIN) ?>"></a>
					<a class="tmm-lc-delete-row" data-row-id="<?php echo $row ?>" title="<?php _e("Delete", TMM_CC_TEXTDOMAIN) ?>"></a>
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
								'padding_top' => @$column['padding_top'],
								'padding_bottom' => @$column['padding_bottom'],
							);

							TMM_Layout_Constructor::draw_column_item($col_data);

						}

					}
					?>

				</div>

				<input type="hidden" id="row_bg_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['bg_type'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_type]" />
				<input type="hidden" id="row_bg_data_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['bg_data'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_data]" />
				<input type="hidden" id="row_bg_custom_color_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['bg_color'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_color]" />
				<input type="hidden" id="row_bg_custom_image_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['bg_image'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_image]" />
				<input type="hidden" id="row_bg_custom_opacity_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['bg_opacity'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_opacity]" />
				<input type="hidden" id="row_bg_is_cover_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['bg_cover'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_cover]" />
				<input type="hidden" id="row_bg_attachment_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['bg_attachment'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_attachment]" />
				<input type="hidden" id="row_border_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['border_type'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_type]" />
				<input type="hidden" id="row_border_width_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['border_width'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_width]" />
				<input type="hidden" id="row_border_color_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['border_color'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_color]" />
				<input type="hidden" id="row_padding_top_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['padding_top'] : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][padding_top]" />
				<input type="hidden" id="row_padding_bottom_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['padding_bottom'] : 0) ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][padding_bottom]" />

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
			'front_css_class' => 'four columns',
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

			<input type="hidden" id="row_bg_type___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_type]" />
			<input type="hidden" id="row_bg_data___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_data]" />
			<input type="hidden" id="row_bg_custom_color___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_color]" />
			<input type="hidden" id="row_bg_custom_image___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_image]" />
			<input type="hidden" id="row_bg_custom_opacity___ROW_ID__" value="30" name="tmm_layout_constructor_row[__ROW_ID__][bg_opacity]" />
			<input type="hidden" id="row_bg_is_cover___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][bg_cover]" />
			<input type="hidden" id="row_bg_attachment___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_attachment]" />
			<input type="hidden" id="row_border_type___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][border_type]" />
			<input type="hidden" id="row_border_width___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][border_width]" />
			<input type="hidden" id="row_border_color___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][border_color]" />
			<input type="hidden" id="row_padding_top___ROW_ID__" value="50" name="tmm_layout_constructor_row[__ROW_ID__][padding_top]" />
			<input type="hidden" id="row_padding_bottom___ROW_ID__" value="50" name="tmm_layout_constructor_row[__ROW_ID__][padding_bottom]" />

		</li>

	</ul>

	<div id="tmm_lc_column_effects">
		<?php
		$effects = array(
			'' => __("No effects", TMM_CC_TEXTDOMAIN),
			'opacityEffect' => __("Opacity", TMM_CC_TEXTDOMAIN),
			'scaleEffect' => __("Scale", TMM_CC_TEXTDOMAIN),
			'rotateEffect' => __("Rotate", TMM_CC_TEXTDOMAIN),
			'slideRightEffect' => __("Slide Right", TMM_CC_TEXTDOMAIN),
			'slideLeftEffect' => __("Slide Left", TMM_CC_TEXTDOMAIN),
			'slideDownEffect' => __("Slide Down", TMM_CC_TEXTDOMAIN),
			'slideUpEffect' => __("Slide Up", TMM_CC_TEXTDOMAIN)
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
	            'title' => __('Border Width', TMM_CC_TEXTDOMAIN),
	            'shortcode_field' => 'row_border_width',
	            'id' => 'row_border_width',
	            'options' => array(
		            0 => 0,
		            1 => 1,
		            2 => 2,
		            3 => 3,
		            4 => 4,
		            5 => 5,
	            ),
	            'default_value' => 0,
	            'description' => ''
            ));

            TMM_Content_Composer::html_option(array(
	            'type' => 'select',
	            'title' => __('Border type', TMM_CC_TEXTDOMAIN),
	            'shortcode_field' => 'row_border_type',
	            'id' => 'row_border_type',
	            'options' => array(
		            'solid' => __('Solid', TMM_CC_TEXTDOMAIN),
		            'dashed' => __('Dashed', TMM_CC_TEXTDOMAIN),
		            'dotted' => __('Dotted', TMM_CC_TEXTDOMAIN),
	            ),
	            'default_value' => 0,
	            'description' => ''
            ));

			TMM_Content_Composer::html_option(array(
				'title' => __('Border Color', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_border_color',
				'type' => 'color',
				'description' => '',
				'default_value' => '',
				'id' => 'row_border_color'
			));

            TMM_Content_Composer::html_option(array(
				'title' => __('Padding top', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_padding_top',
				'type' => 'text',
				'description' => 'Default Value 80px',
				'default_value' => TMM_Content_Composer::set_default_value('padding_top', '80'),
				'id' => 'row_padding_top'
			));

			TMM_Content_Composer::html_option(array(
				'title' => __('Padding bottom', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_padding_bottom',
				'type' => 'text',
				'description' => 'Default Value 80px',
				'default_value' => TMM_Content_Composer::set_default_value('padding_bottom', '80'),
				'id' => 'row_padding_bottom'
			));

            ?>
        </div>

		<div class="one-half">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Row Background Type', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_background_type',
				'id' => 'row_background_type',
				'options' => array(
					'default' => __('Default Theme Color', TMM_CC_TEXTDOMAIN),
					'custom' => __('Custom', TMM_CC_TEXTDOMAIN),
				),
				'default_value' => 'default',
				'description' => ''
			));
			?>

			<div id="row_background_image_box" style="display: none;">
				<?php
				TMM_Content_Composer::html_option(array(
					'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'row_background_color',
					'type' => 'color',
					'description' => '',
					'default_value' => '',
					'id' => 'row_background_color'
				));
				?>

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

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Background Attachment', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'row_bg_attachment',
					'id' => 'row_bg_attachment',
					'options' => array(
						'scroll' => __('scroll', TMM_CC_TEXTDOMAIN),
						'fixed' => __('fixed', TMM_CC_TEXTDOMAIN)
					),
					'default_value' => 'scroll',
					'description' => ''
				));
				?>

				<?php
				TMM_Content_Composer::html_option(array(
					'title' => __('Opacity', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'row_background_opacity',
					'type' => 'text',
					'description' => 'min:0, max:100',
					'default_value' => 100,
					'id' => 'row_background_opacity'
				));
				?>

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'checkbox',
					'title' => __('Background Size - cover', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'row_background_is_cover',
					'id' => 'row_background_is_cover',
					'default_value' => 1,
					'is_checked'=>false,
					'description' => __('Background Size - cover', TMM_CC_TEXTDOMAIN),
				));
				?>

			</div>

		</div>

	</div>

</div>
