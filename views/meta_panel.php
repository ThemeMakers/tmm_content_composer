<?php if (!defined('ABSPATH')) exit; ?>

<input type="hidden" name="tmm_meta_saving" value="1" />
<a href="#add_row" class="tmm-lc-add-row button button-primary button-large"><?php esc_html_e("Add New Row", 'tmm_content_composer') ?></a>
<a href="#" class="tmm-lc-paste-row button button-large"><?php esc_html_e("Insert Clipboard Row here", 'tmm_content_composer') ?></a><br />

<ul id="tmm_lc_rows" class="tmm-lc-rows">

	<?php
	if (!empty($tmm_layout_constructor)) {

		foreach ($tmm_layout_constructor as $row => $row_data) {
			?>

			<li id="tmm_lc_row_<?php echo $row ?>" class="tmm-lc-row">

				<div class="tmm-lc-row-buttons-wrapper">
					<a class="tmm-lc-add-column" data-row-id="<?php echo $row ?>" title="<?php esc_html_e("Add Column", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-copy-row" data-row-id="<?php echo $row ?>" title="<?php esc_html_e("Add Row to Clipboard", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-edit-row" data-row-id="<?php echo $row ?>" title="<?php esc_html_e("Edit", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-delete-row" data-row-id="<?php echo $row ?>" title="<?php esc_html_e("Delete", 'tmm_content_composer') ?>"></a>
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
							);

							TMM_Layout_Constructor::draw_column_item($col_data);

						}

					}
					?>

				</div>

				<input type="hidden" id="row_bg_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['bg_type'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_type]" />
				<input type="hidden" id="row_bg_data_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['bg_data'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][bg_data]" />
				<input type="hidden" id="row_border_type_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['border_type'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_type]" />
				<input type="hidden" id="row_border_width_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['border_width'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_width]" />
				<input type="hidden" id="row_border_color_<?php echo $row ?>" value="<?php echo (isset($tmm_layout_constructor_row[$row]) ? @$tmm_layout_constructor_row[$row]['border_color'] : '') ?>" name="tmm_layout_constructor_row[<?php echo $row ?>][border_color]" />


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
                <a class="tmm-lc-add-column" title="<?php esc_html_e("Add Column", 'tmm_content_composer') ?>" data-row-id="__ROW_ID__"></a>
                <a class="tmm-lc-copy-row" data-row-id="__ROW_ID__" title="<?php esc_html_e("Add to Clipboard", 'tmm_content_composer') ?>"></a>
                <a class="tmm-lc-edit-row" data-row-id="__ROW_ID__" title="<?php esc_html_e("Edit", 'tmm_content_composer') ?>"></a>
                <a class="tmm-lc-delete-row" data-row-id="__ROW_ID__" title="<?php esc_html_e("Delete", 'tmm_content_composer') ?>"></a>
            </div>

			<div class="tmm-lc-columns" id="tmm_lc_columns___ROW_ID__"></div>

			<input type="hidden" id="row_bg_type___ROW_ID__" value="none" name="tmm_layout_constructor_row[__ROW_ID__][bg_type]" />
			<input type="hidden" id="row_bg_data___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][bg_data]" />
			<input type="hidden" id="row_border_type___ROW_ID__" value="none" name="tmm_layout_constructor_row[__ROW_ID__][border_type]" />
			<input type="hidden" id="row_border_width___ROW_ID__" value="0" name="tmm_layout_constructor_row[__ROW_ID__][border_width]" />
			<input type="hidden" id="row_border_color___ROW_ID__" value="" name="tmm_layout_constructor_row[__ROW_ID__][border_color]" />

		</li>

	</ul>


	<!-- ------------------------ Edit Row Template ----------------------------------------- -->

	<div id="tmm_lc_row_edit_options">

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Row Background Type', 'tmm_content_composer'),
				'shortcode_field' => 'row_background_type',
				'id' => 'row_background_type',
				'options' => array(
					'none' => esc_html__('None', 'tmm_content_composer'),
					'color' => esc_html__('Color', 'tmm_content_composer'),
					'image' => esc_html__('Image', 'tmm_content_composer'),
				),
				'default_value' => TMM_Content_Composer::set_default_value('row_background_type', 'color'),
				'description' => ''
			));
			?>

			<div class="option_bg_color" style="display: none">
				<?php
				TMM_Content_Composer::html_option(array(
					'title' => esc_html__('Background Color', 'tmm_content_composer'),
					'shortcode_field' => 'row_background_color',
					'type' => 'color',
					'description' => '',
					'default_value' => '',
					'id' => 'row_background_color'
				));
				?>
			</div>

			<div class="option_bg_image" style="display: none">
				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'upload',
					'title' => esc_html__('Background Image', 'tmm_content_composer'),
					'shortcode_field' => 'row_background_image',
					'id' => 'row_background_image',
					'default_value' => '',
					'description' => ''
				));
				?>
			</div>

		</div>

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Border width', 'tmm_content_composer'),
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
			?>
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Border type', 'tmm_content_composer'),
				'shortcode_field' => 'row_border_type',
				'id' => 'row_border_type',
				'options' => array(
					'none' => esc_html__('None', 'tmm_content_composer'),
					'solid' => esc_html__('Solid', 'tmm_content_composer'),
					'dashed' => esc_html__('Dashed', 'tmm_content_composer'),
					'dotted' => esc_html__('Dotted', 'tmm_content_composer'),
				),
				'default_value' => 'solid',
				'description' => ''
			));
			?>
			<?php
			TMM_Content_Composer::html_option(array(
				'title' => esc_html__('Border Color', 'tmm_content_composer'),
				'shortcode_field' => 'row_border_color',
				'type' => 'color',
				'description' => '',
				'default_value' => '',
				'id' => 'row_border_color'
			));
			?>
		</div>

	</div>

</div>
