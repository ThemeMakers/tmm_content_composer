<?php if (!defined('ABSPATH')) exit;

global $tmm_row_options; ?>

<input type="hidden" name="tmm_meta_saving" value="1" />
<a href="#add_row" class="tmm-lc-add-row button button-primary button-large"><?php _e("Add New Section", 'tmm_content_composer') ?></a>
<a href="#" class="tmm-lc-paste-row button button-large"><?php _e("Insert Clipboard Section here", 'tmm_content_composer') ?></a><br />

<ul id="tmm_lc_rows" class="tmm-lc-rows">

	<?php
	if (!empty($tmm_layout_constructor)) {

		foreach ($tmm_layout_constructor as $row => $row_data) {
			?>

			<li id="tmm_lc_row_<?php echo $row ?>" class="tmm-lc-row">

				<div class="tmm-lc-row-buttons-wrapper">
					<a class="tmm-lc-add-column" data-row-id="<?php echo $row ?>" title="<?php _e("Add Column to Section", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-copy-row" data-row-id="<?php echo $row ?>" title="<?php _e("Add Section to Clipboard", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-edit-row" data-row-id="<?php echo $row ?>" title="<?php _e("Section Editor", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-delete-row" data-row-id="<?php echo $row ?>" title="<?php _e("Delete Section", 'tmm_content_composer') ?>"></a>
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
			<a class="tmm-lc-add-column" title="<?php _e("Add Column", 'tmm_content_composer') ?>" data-row-id="__ROW_ID__"></a>
			<a class="tmm-lc-copy-row" data-row-id="__ROW_ID__" title="<?php _e("Add to Clipboard", 'tmm_content_composer') ?>"></a>
			<a class="tmm-lc-edit-row" data-row-id="__ROW_ID__" title="<?php _e("Edit", 'tmm_content_composer') ?>"></a>
			<a class="tmm-lc-delete-row" data-row-id="__ROW_ID__" title="<?php _e("Delete", 'tmm_content_composer') ?>"></a>
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
		'' => __("No effects", 'tmm_content_composer'),
		'swipeDownEffect' => __('Swipe Down', 'tmm_content_composer'),
		'showMeEffect' => __('Show Me', 'tmm_content_composer'),
		'opacityEffect' => __('Opacity', 'tmm_content_composer'),
		'scaleEffect' => __('Scale', 'tmm_content_composer'),
		'rotateEffect' => __('Rotate', 'tmm_content_composer'),
		'slideRightEffect' => __('Slide Right', 'tmm_content_composer'),
		'slideLeftEffect' => __('Slide Left', 'tmm_content_composer'),
		'slideDownEffect' => __('Slide Down', 'tmm_content_composer'),
		'slideUpEffect' => __('Slide Up', 'tmm_content_composer'),
		'translateEffect' => __('Translate', 'tmm_content_composer'),
	);

	TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => '',
		'label' => __("Layout constructor", 'tmm_content_composer'),
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
		'title' => __('Section Content Position', 'tmm_content_composer'),
		'shortcode_field' => 'row_lc_displaying',
		'id' => 'row_lc_displaying',
		'options' => array(
			'default' => __('Below content matching its layout', 'tmm_content_composer'),
			'before_full_width' => __('Before main content with separate layout options', 'tmm_content_composer'),
			'full_width' => __('After main content with separate layout options', 'tmm_content_composer')
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
			'title' => __('Container Width', 'tmm_content_composer'),
			'shortcode_field' => 'row_container_width',
			'id' => 'row_container_width',
			'options' => array(
				0 => __('Fixed Width', 'tmm_content_composer'),
				1 => __('Full Width', 'tmm_content_composer')
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
			'title' => __('Container Height', 'tmm_content_composer'),
			'shortcode_field' => 'row_container_height',
			'id' => 'row_container_height',
			'options' => array(
				0 => __('Auto', 'tmm_content_composer'),
				1 => __('50% of Screen', 'tmm_content_composer'),
				2 => __('100% of Screen', 'tmm_content_composer'),
			),
			'default_value' => $tmm_row_options['container_height'],
			'description' => ''
		));
		?>
		</div>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Content Align', 'tmm_content_composer'),
			'shortcode_field' => 'row_align',
			'id' => 'row_align',
			'options' => array(
				'left' => __('Left', 'tmm_content_composer'),
				'right' => __('Right', 'tmm_content_composer'),
				'center' => __('Center', 'tmm_content_composer'),
			),
			'default_value' => $tmm_row_options['align'],
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Border Top', 'tmm_content_composer'),
			'shortcode_field' => 'row_border_top',
			'id' => 'row_border_top',
			'options' => array(
				'0' => __('No Top Border', 'tmm_content_composer'),
				'1' => __('Border Style 1', 'tmm_content_composer'),
				'2' => __('Border Style 2', 'tmm_content_composer'),
				'3' => __('Border Style 3', 'tmm_content_composer'),
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
			'title' => __('Offset Top', 'tmm_content_composer'),
			'shortcode_field' => 'row_padding_top',
			'id' => 'row_padding_top',
			'options' => array(
				'0' => __('No Top Padding', 'tmm_content_composer'),
				'20' => __('20 PX', 'tmm_content_composer'),
				'40' => __('40 PX', 'tmm_content_composer'),
				'60' => __('60 PX', 'tmm_content_composer'),
				'80' => __('80 PX', 'tmm_content_composer'),
				'100' => __('100 PX', 'tmm_content_composer')
			),
			'default_value' => $tmm_row_options['padding_top'],
			'description' => __('Default Value 0px', 'tmm_content_composer')
		));
		?>
	</div>

	<div class="one-half inner-right">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Offset Bottom', 'tmm_content_composer'),
			'shortcode_field' => 'row_padding_bottom',
			'id' => 'row_padding_bottom',
			'options' => array(
				'0' => __('No Bottom Padding', 'tmm_content_composer'),
				'20' => __('20 PX', 'tmm_content_composer'),
				'40' => __('40 PX', 'tmm_content_composer'),
				'60' => __('60 PX', 'tmm_content_composer'),
				'80' => __('80 PX', 'tmm_content_composer'),
				'100' => __('100 PX', 'tmm_content_composer')
			),
			'default_value' => $tmm_row_options['padding_bottom'],
			'description' => __('Default Value 20px', 'tmm_content_composer')
		));
		?>
	</div>

</div>

<div class="one-half">

	<?php
	TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => __('Section Background Type', 'tmm_content_composer'),
		'shortcode_field' => 'row_bg_type',
		'id' => 'row_bg_type',
		'options' => array(
			'none' => __('Transparent (default)', 'tmm_content_composer'),
			'color' => __('Color', 'tmm_content_composer'),
			'image' => __('Image', 'tmm_content_composer'),
			//'video' => __('Video', 'tmm_content_composer')
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
			'title' => __('Preinstalled BG Colors', 'tmm_content_composer'),
			'shortcode_field' => 'row_bg_color_type',
			'id' => 'row_bg_color_type',
			'options' => array(
				'0' => __('None', 'tmm_content_composer'),
				'bg-color-1' => __('White', 'tmm_content_composer'),
				'bg-color-2' => __('Silver', 'tmm_content_composer'),
				'bg-color-3' => __('Light Gray', 'tmm_content_composer'),
				'bg-color-4' => __('Light Blue', 'tmm_content_composer'),
				'custom' => __('Custom', 'tmm_content_composer'),
			),
			'default_value' => $tmm_row_options['bg_color_type'],
			'description' => ''
		));
		?>
		</div>

		<div class="one-half inner-right">
		<?php
		TMM_Content_Composer::html_option(array(
			'title' => __('Custom Background Color', 'tmm_content_composer'),
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
			'title' => __('Background Image', 'tmm_content_composer'),
			'shortcode_field' => 'row_bg_image',
			'id' => 'row_bg_image',
			'default_value' => $tmm_row_options['bg_image'],
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Background Attachment', 'tmm_content_composer'),
			'shortcode_field' => 'row_bg_attachment',
			'id' => 'row_bg_attachment',
			'options' => array(
				'1' => __('scroll', 'tmm_content_composer'),
				'0' => __('fixed', 'tmm_content_composer')
			),
			'default_value' => $tmm_row_options['bg_attachment'],
			'description' => ''
		));
		?>

		<div class="row_full_width_box" style="display: none;">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => __('Overlay', 'tmm_content_composer'),
				'shortcode_field' => 'row_bg_overlay',
				'id' => 'row_bg_overlay',
				'is_checked' => $tmm_row_options['bg_overlay'],
				'description' => __('Set overlay on background image', 'tmm_content_composer')
			));
			?>


			<div id="row_bg_overlay_box" style="display: none;">

				<div class="one-half inner-left">
				<?php
				TMM_Content_Composer::html_option(array(
					'title' => __('Overlay Color', 'tmm_content_composer'),
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
					'title' => __('Overlay Opacity', 'tmm_content_composer'),
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
//			'title' => __('Background Video', 'tmm_content_composer'),
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
