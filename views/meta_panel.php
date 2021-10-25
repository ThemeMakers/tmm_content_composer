<?php if (!defined('ABSPATH')) exit;

global $tmm_row_options; ?>

<input type="hidden" name="tmm_meta_saving" value="1" />
<a href="#add_row" class="tmm-lc-add-row button button-primary button-large"><?php esc_html_e("Add New Section", 'tmm_content_composer') ?></a>
<a href="#" class="tmm-lc-paste-row button button-large"><?php esc_html_e("Insert Clipboard Section here", 'tmm_content_composer') ?></a><br />

<ul id="tmm_lc_rows" class="tmm-lc-rows">

	<?php
	if (!empty($tmm_layout_constructor)) {

		foreach ($tmm_layout_constructor as $row => $row_data) {
			?>

			<li id="tmm_lc_row_<?php echo esc_attr( $row ) ?>" class="tmm-lc-row">

				<div class="tmm-lc-row-buttons-wrapper">
					<a class="tmm-lc-add-column" data-row-id="<?php echo esc_attr( $row ) ?>" title="<?php esc_html_e("Add Column to Section", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-copy-row" data-row-id="<?php echo esc_attr( $row ) ?>" title="<?php esc_html_e("Add Section to Clipboard", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-edit-row" data-row-id="<?php echo esc_attr( $row ) ?>" title="<?php esc_html_e("Section Editor", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-delete-row" data-row-id="<?php echo esc_attr( $row ) ?>" title="<?php esc_html_e("Delete Section", 'tmm_content_composer') ?>"></a>
				</div>

				<div class="tmm-lc-columns" id="tmm_lc_columns_<?php echo esc_attr( $row ) ?>">

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

				<?php
				foreach ($tmm_row_options as $name => $def_value) {
					$value = isset($tmm_layout_constructor_row[$row][$name]) ? $tmm_layout_constructor_row[$row][$name] : $def_value;
					echo '<input
							type="hidden"
							id="row_' . $name . '_' . $row . '"
                            value="' . $value . '"
							name="tmm_layout_constructor_row[' . $row . '][' . $name . ']" />';

				}
				?>

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
		'css_class' => 'col-md-3 col-sm-6',
		'front_css_class' => 'col-md-3 col-sm-6',
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

		<?php
		foreach ($tmm_row_options as $name => $def_value) {
			echo '<input
							type="hidden"
							id="row_' . $name . '___ROW_ID__"
                            value="' . $def_value . '"
							name="tmm_layout_constructor_row[__ROW_ID__][' . $name . ']" />';

		}
		?>

	</li>

</ul>

<div id="tmm_lc_column_effects">
	<?php
	$effects = array(
		'' => esc_html__("No effects", 'tmm_content_composer'),
		'swipeDownEffect' => esc_html__('Swipe Down', 'tmm_content_composer'),
		'showMeEffect' => esc_html__('Show Me', 'tmm_content_composer'),
		'opacityEffect' => esc_html__('Opacity', 'tmm_content_composer'),
		'scaleEffect' => esc_html__('Scale', 'tmm_content_composer'),
		'rotateEffect' => esc_html__('Rotate', 'tmm_content_composer'),
		'slideRightEffect' => esc_html__('Slide Right', 'tmm_content_composer'),
		'slideLeftEffect' => esc_html__('Slide Left', 'tmm_content_composer'),
		'slideDownEffect' => esc_html__('Slide Down', 'tmm_content_composer'),
		'slideUpEffect' => esc_html__('Slide Up', 'tmm_content_composer'),
		'translateEffect' => esc_html__('Translate', 'tmm_content_composer'),
	);

	TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => '',
		'label' => esc_html__("Layout constructor", 'tmm_content_composer'),
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
		'title' => esc_html__('Section Content Position', 'tmm_content_composer'),
		'shortcode_field' => 'row_lc_displaying',
		'id' => 'row_lc_displaying',
		'options' => array(
			'default' => esc_html__('Below content matching its layout', 'tmm_content_composer'),
			'before_full_width' => esc_html__('Before main content with separate layout options', 'tmm_content_composer'),
			'full_width' => esc_html__('After main content with separate layout options', 'tmm_content_composer')
		),
		'default_value' => $tmm_row_options['lc_displaying'],
		'description' => ''
	));
	?>

	<div class="row_full_width_box" style="display: none;">
		<div class="one-half inner-left">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Container Width', 'tmm_content_composer'),
			'shortcode_field' => 'row_container_width',
			'id' => 'row_container_width',
			'options' => array(
				0 => esc_html__('Fixed Width', 'tmm_content_composer'),
				1 => esc_html__('Full Width', 'tmm_content_composer')
			),
			'default_value' => $tmm_row_options['container_width'],
			'description' => ''
		));
		?>
		</div>

		<div class="one-half inner-right">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Container Height', 'tmm_content_composer'),
			'shortcode_field' => 'row_container_height',
			'id' => 'row_container_height',
			'options' => array(
				0 => esc_html__('Auto', 'tmm_content_composer'),
				1 => esc_html__('50% of Screen', 'tmm_content_composer'),
				2 => esc_html__('100% of Screen', 'tmm_content_composer'),
			),
			'default_value' => $tmm_row_options['container_height'],
			'description' => ''
		));
		?>
		</div>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Content Align', 'tmm_content_composer'),
			'shortcode_field' => 'row_align',
			'id' => 'row_align',
			'options' => array(
				'left' => esc_html__('Left', 'tmm_content_composer'),
				'right' => esc_html__('Right', 'tmm_content_composer'),
				'center' => esc_html__('Center', 'tmm_content_composer'),
			),
			'default_value' => $tmm_row_options['align'],
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Border Top', 'tmm_content_composer'),
			'shortcode_field' => 'row_border_top',
			'id' => 'row_border_top',
			'options' => array(
				'0' => esc_html__('No Top Border', 'tmm_content_composer'),
				'1' => esc_html__('Border Style 1', 'tmm_content_composer'),
				'2' => esc_html__('Border Style 2', 'tmm_content_composer'),
				'3' => esc_html__('Border Style 3', 'tmm_content_composer'),
			),
			'default_value' => $tmm_row_options['border_top'],
			'description' => ''
		));

		?>
	</div>

	<div class="one-half inner-left">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Offset Top', 'tmm_content_composer'),
			'shortcode_field' => 'row_padding_top',
			'id' => 'row_padding_top',
			'options' => array(
				'0' => esc_html__('No Top Padding', 'tmm_content_composer'),
				'20' => esc_html__('20 PX', 'tmm_content_composer'),
				'40' => esc_html__('40 PX', 'tmm_content_composer'),
				'60' => esc_html__('60 PX', 'tmm_content_composer'),
				'80' => esc_html__('80 PX', 'tmm_content_composer'),
				'100' => esc_html__('100 PX', 'tmm_content_composer')
			),
			'default_value' => $tmm_row_options['padding_top'],
			'description' => esc_html__('Default Value 0px', 'tmm_content_composer')
		));
		?>
	</div>

	<div class="one-half inner-right">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Offset Bottom', 'tmm_content_composer'),
			'shortcode_field' => 'row_padding_bottom',
			'id' => 'row_padding_bottom',
			'options' => array(
				'0' => esc_html__('No Bottom Padding', 'tmm_content_composer'),
				'20' => esc_html__('20 PX', 'tmm_content_composer'),
				'40' => esc_html__('40 PX', 'tmm_content_composer'),
				'60' => esc_html__('60 PX', 'tmm_content_composer'),
				'80' => esc_html__('80 PX', 'tmm_content_composer'),
				'100' => esc_html__('100 PX', 'tmm_content_composer')
			),
			'default_value' => $tmm_row_options['padding_bottom'],
			'description' => esc_html__('Default Value 20px', 'tmm_content_composer')
		));
		?>
	</div>

</div>

<div class="one-half">

	<?php
	TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => esc_html__('Section Background Type', 'tmm_content_composer'),
		'shortcode_field' => 'row_bg_type',
		'id' => 'row_bg_type',
		'options' => array(
			'none' => esc_html__('Transparent (default)', 'tmm_content_composer'),
			'color' => esc_html__('Color', 'tmm_content_composer'),
			'image' => esc_html__('Image', 'tmm_content_composer'),
			//'video' => esc_html__('Video', 'tmm_content_composer')
		),
		'default_value' => $tmm_row_options['bg_type'],
		'description' => ''
	));
	?>

	<div id="row_bg_color_box" style="display: none;">

		<div class="one-half inner-left">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Preinstalled BG Colors', 'tmm_content_composer'),
			'shortcode_field' => 'row_bg_color_type',
			'id' => 'row_bg_color_type',
			'options' => array(
				'0' => esc_html__('None', 'tmm_content_composer'),
				'bg-color-1' => esc_html__('White', 'tmm_content_composer'),
				'bg-color-2' => esc_html__('Silver', 'tmm_content_composer'),
				'bg-color-3' => esc_html__('Light Gray', 'tmm_content_composer'),
				'bg-color-4' => esc_html__('Light Blue', 'tmm_content_composer'),
				'custom' => esc_html__('Custom', 'tmm_content_composer'),
			),
			'default_value' => $tmm_row_options['bg_color_type'],
			'description' => ''
		));
		?>
		</div>

		<div class="one-half inner-right">
		<?php
		TMM_Content_Composer::html_option(array(
			'title' => esc_html__('Custom Background Color', 'tmm_content_composer'),
			'shortcode_field' => 'row_bg_color',
			'id' => 'row_bg_color',
			'type' => 'color',
			'description' => '',
			'default_value' => $tmm_row_options['bg_color'],
			'display' => 1
		));
		?>
		</div>

	</div>

	<div id="row_bg_image_box" style="display: none;">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'upload',
			'title' => esc_html__('Background Image', 'tmm_content_composer'),
			'shortcode_field' => 'row_bg_image',
			'id' => 'row_bg_image',
			'default_value' => $tmm_row_options['bg_image'],
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Background Attachment', 'tmm_content_composer'),
			'shortcode_field' => 'row_bg_attachment',
			'id' => 'row_bg_attachment',
			'options' => array(
				'1' => esc_html__('scroll', 'tmm_content_composer'),
				'0' => esc_html__('fixed', 'tmm_content_composer')
			),
			'default_value' => $tmm_row_options['bg_attachment'],
			'description' => ''
		));
		?>

		<div class="row_full_width_box" style="display: none;">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => esc_html__('Overlay', 'tmm_content_composer'),
				'shortcode_field' => 'row_bg_overlay',
				'id' => 'row_bg_overlay',
				'is_checked' => $tmm_row_options['bg_overlay'],
				'description' => esc_html__('Set overlay on background image', 'tmm_content_composer')
			));
			?>


			<div id="row_bg_overlay_box" style="display: none;">

				<div class="one-half inner-left">
				<?php
				TMM_Content_Composer::html_option(array(
					'title' => esc_html__('Overlay Color', 'tmm_content_composer'),
					'shortcode_field' => 'row_bg_overlay_color',
					'id' => 'row_bg_overlay_color',
					'type' => 'color',
					'description' => '',
					'default_value' => $tmm_row_options['bg_overlay_color'],
					'display' => 1
				));
				?>
				</div>

				<div class="one-half inner-right">
				<?php
				TMM_Content_Composer::html_option(array(
					'title' => esc_html__('Overlay Opacity', 'tmm_content_composer'),
					'shortcode_field' => 'row_bg_overlay_opacity',
					'id' => 'row_bg_overlay_opacity',
					'type' => 'slider',
					'min' => '0',
					'max' => '100',
					'description' => '',
					'default_value' => $tmm_row_options['bg_overlay_opacity'],
				));
				?>
				</div>

			</div>

		</div>

	</div>

	<div id="row_bg_video_box" style="display: none;">
		<?php
//		TMM_Content_Composer::html_option(array(
//			'type' => 'upload_video',
//			'title' => esc_html__('Background Video', 'tmm_content_composer'),
//			'shortcode_field' => 'row_bg_video',
//			'id' => 'row_bg_video',
//			'default_value' => $tmm_row_options['bg_video'],
//			'description' => 'Examples: https://www.youtube.com/watch?v=_EBYf3lYSEg http://vimeo.com/22439234 or upload self hosted video'
//		));
		?>
	</div>

</div>

</div>

</div>
