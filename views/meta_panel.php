<?php if (!defined('ABSPATH')) exit;

global $tmm_row_options; ?>

<input type="hidden" name="tmm_meta_saving" value="1" />
<a href="#add_row" class="tmm-lc-add-row button button-primary button-large"><?php _e("Add New Section", 'cardealer') ?></a>
<a href="#" class="tmm-lc-paste-row button button-large"><?php _e("Insert Clipboard Section here", 'cardealer') ?></a><br />

<ul id="tmm_lc_rows" class="tmm-lc-rows">

	<?php
	if (!empty($tmm_layout_constructor)) {

		foreach ($tmm_layout_constructor as $row => $row_data) {
			?>

			<li id="tmm_lc_row_<?php echo $row ?>" class="tmm-lc-row">

				<div class="tmm-lc-row-buttons-wrapper">
					<a class="tmm-lc-add-column" data-row-id="<?php echo $row ?>" title="<?php _e("Add Column to Section", 'cardealer') ?>"></a>
					<a class="tmm-lc-copy-row" data-row-id="<?php echo $row ?>" title="<?php _e("Add Section to Clipboard", 'cardealer') ?>"></a>
					<a class="tmm-lc-edit-row" data-row-id="<?php echo $row ?>" title="<?php _e("Section Editor", 'cardealer') ?>"></a>
					<a class="tmm-lc-delete-row" data-row-id="<?php echo $row ?>" title="<?php _e("Delete Section", 'cardealer') ?>"></a>
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
			<a class="tmm-lc-add-column" title="<?php _e("Add Column", 'cardealer') ?>" data-row-id="__ROW_ID__"></a>
			<a class="tmm-lc-copy-row" data-row-id="__ROW_ID__" title="<?php _e("Add to Clipboard", 'cardealer') ?>"></a>
			<a class="tmm-lc-edit-row" data-row-id="__ROW_ID__" title="<?php _e("Edit", 'cardealer') ?>"></a>
			<a class="tmm-lc-delete-row" data-row-id="__ROW_ID__" title="<?php _e("Delete", 'cardealer') ?>"></a>
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
		'' => __("No effects", 'cardealer'),
		'swipeDownEffect' => __('Swipe Down', 'cardealer'),
		'showMeEffect' => __('Show Me', 'cardealer'),
		'opacityEffect' => __('Opacity', 'cardealer'),
		'scaleEffect' => __('Scale', 'cardealer'),
		'rotateEffect' => __('Rotate', 'cardealer'),
		'slideRightEffect' => __('Slide Right', 'cardealer'),
		'slideLeftEffect' => __('Slide Left', 'cardealer'),
		'slideDownEffect' => __('Slide Down', 'cardealer'),
		'slideUpEffect' => __('Slide Up', 'cardealer'),
		'translateEffect' => __('Translate', 'cardealer'),
	);

	TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => '',
		'label' => __("Layout constructor", 'cardealer'),
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
		'title' => __('Section Content Position', 'cardealer'),
		'shortcode_field' => 'row_lc_displaying',
		'id' => 'row_lc_displaying',
		'options' => array(
			'default' => __('Below content matching its layout', 'cardealer'),
			'before_full_width' => __('Before main content with separate layout options', 'cardealer'),
			'full_width' => __('After main content with separate layout options', 'cardealer')
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
			'title' => __('Container Width', 'cardealer'),
			'shortcode_field' => 'row_container_width',
			'id' => 'row_container_width',
			'options' => array(
				0 => __('Fixed Width', 'cardealer'),
				1 => __('Full Width', 'cardealer')
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
			'title' => __('Container Height', 'cardealer'),
			'shortcode_field' => 'row_container_height',
			'id' => 'row_container_height',
			'options' => array(
				0 => __('Auto', 'cardealer'),
				1 => __('50% of Screen', 'cardealer'),
				2 => __('100% of Screen', 'cardealer'),
			),
			'default_value' => $tmm_row_options['container_height'],
			'description' => ''
		));
		?>
		</div>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Content Align', 'cardealer'),
			'shortcode_field' => 'row_align',
			'id' => 'row_align',
			'options' => array(
				'left' => __('Left', 'cardealer'),
				'right' => __('Right', 'cardealer'),
				'center' => __('Center', 'cardealer'),
			),
			'default_value' => $tmm_row_options['align'],
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Border Top', 'cardealer'),
			'shortcode_field' => 'row_border_top',
			'id' => 'row_border_top',
			'options' => array(
				'0' => __('No Top Border', 'cardealer'),
				'1' => __('Border Style 1', 'cardealer'),
				'2' => __('Border Style 2', 'cardealer'),
				'3' => __('Border Style 3', 'cardealer'),
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
			'title' => __('Offset Top', 'cardealer'),
			'shortcode_field' => 'row_padding_top',
			'id' => 'row_padding_top',
			'options' => array(
				'0' => __('No Top Padding', 'cardealer'),
				'20' => __('20 PX', 'cardealer'),
				'40' => __('40 PX', 'cardealer'),
				'60' => __('60 PX', 'cardealer'),
				'80' => __('80 PX', 'cardealer'),
				'100' => __('100 PX', 'cardealer')
			),
			'default_value' => $tmm_row_options['padding_top'],
			'description' => __('Default Value 0px', 'cardealer')
		));
		?>
	</div>

	<div class="one-half inner-right">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Offset Bottom', 'cardealer'),
			'shortcode_field' => 'row_padding_bottom',
			'id' => 'row_padding_bottom',
			'options' => array(
				'0' => __('No Bottom Padding', 'cardealer'),
				'20' => __('20 PX', 'cardealer'),
				'40' => __('40 PX', 'cardealer'),
				'60' => __('60 PX', 'cardealer'),
				'80' => __('80 PX', 'cardealer'),
				'100' => __('100 PX', 'cardealer')
			),
			'default_value' => $tmm_row_options['padding_bottom'],
			'description' => __('Default Value 20px', 'cardealer')
		));
		?>
	</div>

</div>

<div class="one-half">

	<?php
	TMM_Content_Composer::html_option(array(
		'type' => 'select',
		'title' => __('Section Background Type', 'cardealer'),
		'shortcode_field' => 'row_bg_type',
		'id' => 'row_bg_type',
		'options' => array(
			'none' => __('Transparent (default)', 'cardealer'),
			'color' => __('Color', 'cardealer'),
			'image' => __('Image', 'cardealer'),
			//'video' => __('Video', 'cardealer')
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
			'title' => __('Preinstalled BG Colors', 'cardealer'),
			'shortcode_field' => 'row_bg_color_type',
			'id' => 'row_bg_color_type',
			'options' => array(
				'0' => __('None', 'cardealer'),
				'bg-color-1' => __('White', 'cardealer'),
				'bg-color-2' => __('Silver', 'cardealer'),
				'bg-color-3' => __('Light Gray', 'cardealer'),
				'bg-color-4' => __('Light Blue', 'cardealer'),
				'custom' => __('Custom', 'cardealer'),
			),
			'default_value' => $tmm_row_options['bg_color_type'],
			'description' => ''
		));
		?>
		</div>

		<div class="one-half inner-right">
		<?php
		TMM_Content_Composer::html_option(array(
			'title' => __('Custom Background Color', 'cardealer'),
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
			'title' => __('Background Image', 'cardealer'),
			'shortcode_field' => 'row_bg_image',
			'id' => 'row_bg_image',
			'default_value' => $tmm_row_options['bg_image'],
			'description' => ''
		));

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Background Attachment', 'cardealer'),
			'shortcode_field' => 'row_bg_attachment',
			'id' => 'row_bg_attachment',
			'options' => array(
				'1' => __('scroll', 'cardealer'),
				'0' => __('fixed', 'cardealer')
			),
			'default_value' => $tmm_row_options['bg_attachment'],
			'description' => ''
		));
		?>

		<div class="row_full_width_box" style="display: none;">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'checkbox',
				'title' => __('Overlay', 'cardealer'),
				'shortcode_field' => 'row_bg_overlay',
				'id' => 'row_bg_overlay',
				'is_checked' => $tmm_row_options['bg_overlay'],
				'description' => __('Set overlay on background image', 'cardealer')
			));
			?>


			<div id="row_bg_overlay_box" style="display: none;">

				<div class="one-half inner-left">
				<?php
				TMM_Content_Composer::html_option(array(
					'title' => __('Overlay Color', 'cardealer'),
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
					'title' => __('Overlay Opacity', 'cardealer'),
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
//			'title' => __('Background Video', 'cardealer'),
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
