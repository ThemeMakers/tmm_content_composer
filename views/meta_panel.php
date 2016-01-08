<?php if (!defined('ABSPATH')) exit;

global $tmm_row_options;
?>

<input type="hidden" name="tmm_meta_saving" value="1" />
<a href="#add_row" class="tmm-lc-add-row button button-primary button-large"><?php _e("Add New Row", 'tmm_content_composer') ?></a>
<a href="#" class="tmm-lc-paste-row button button-large"><?php _e("Insert Clipboard Row here", 'tmm_content_composer') ?></a><br />

<ul id="tmm_lc_rows" class="tmm-lc-rows">

	<?php
	if (!empty($tmm_layout_constructor)) {

		foreach ($tmm_layout_constructor as $row => $row_data) {
			?>

			<li id="tmm_lc_row_<?php echo $row ?>" class="tmm-lc-row">

				<div class="tmm-lc-row-buttons-wrapper">
					<a class="tmm-lc-add-column" data-row-id="<?php echo $row ?>" title="<?php _e("Add Column", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-copy-row" data-row-id="<?php echo $row ?>" title="<?php _e("Add Row to Clipboard", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-edit-row" data-row-id="<?php echo $row ?>" title="<?php _e("Edit", 'tmm_content_composer') ?>"></a>
					<a class="tmm-lc-delete-row" data-row-id="<?php echo $row ?>" title="<?php _e("Delete", 'tmm_content_composer') ?>"></a>
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
			'css_class' => 'element1-4',
			'front_css_class' => 'col-sm-3',
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
			'elementFade' => __('Element Fade', 'tmm_content_composer'),
			'opacity2x' => __('Opacity', 'tmm_content_composer'),
			'slideRight' => __('Slide Right', 'tmm_content_composer'),
			'slideLeft' => __('Slide Left', 'tmm_content_composer'),
			'slideDown' => __('Slide Down', 'tmm_content_composer'),
			'slideUp' => __('Slide Up', 'tmm_content_composer'),
			'slideUp2x' => __('Slide Up 2x', 'tmm_content_composer'),
			'extraRadius' => __('Extra Radius', 'tmm_content_composer')
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
			   'title' => __('Section Title', 'tmm_content_composer'),
			   'shortcode_field' => 'row_section_title',
			   'type' => 'text',
			   'description' => 'for One Page Menu',
			   'default_value' => $tmm_row_options['section_title'],
			   'id' => 'row_section_title'
		   ));

            TMM_Content_Composer::html_option(array(
                'type' => 'select',
                'title' => __('Row content displaying', 'tmm_content_composer'),
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

            <div class="row_full_width" style="display: none;">
            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'select',
                'title' => __('Row Full Width', 'tmm_content_composer'),
                'shortcode_field' => 'row_full_width',
                'id' => 'row_full_width',
                'options' => array(
                    0 => __('No', 'tmm_content_composer'),
                    1 => __('Yes', 'tmm_content_composer')
                ),
                'default_value' => $tmm_row_options['full_width'],
                'description' => ''
            ));
            ?>
            </div>

            <div class="content_full_width" style="display: none;">
				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Content Full Width', 'tmm_content_composer'),
					'shortcode_field' => 'row_content_full_width',
					'id' => 'row_content_full_width',
					'options' => array(
						0 => __('No', 'tmm_content_composer'),
						1 => __('Yes', 'tmm_content_composer')
					),
					'default_value' => $tmm_row_options['content_full_width'],
					'description' => ''
				));
				?>
            </div>

			<div class="one-half">
            <?php
            TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Padding top', 'tmm_content_composer'),
				'shortcode_field' => 'row_padding_top',
				'id' => 'row_padding_top',
				'options' => array(
					'0' => __('No Top Padding', 'tmm_content_composer'),
					'10' => __('10 PX', 'tmm_content_composer'),
					'20' => __('20 PX', 'tmm_content_composer'),
					'30' => __('30 PX', 'tmm_content_composer'),
					'40' => __('40 PX', 'tmm_content_composer'),
					'50' => __('50 PX', 'tmm_content_composer'),
					'55' => __('55 PX', 'tmm_content_composer'),
					'60' => __('60 PX', 'tmm_content_composer'),
					'70' => __('70 PX', 'tmm_content_composer'),
					'80' => __('80 PX', 'tmm_content_composer'),
					'90' => __('90 PX', 'tmm_content_composer'),
					'100' => __('100 PX', 'tmm_content_composer')
				),
				'description' => 'Default Value 55px',
				'default_value' => $tmm_row_options['padding_top']
			));
			?>
			</div>

			<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'title' => __('Padding bottom', 'tmm_content_composer'),
				'shortcode_field' => 'row_padding_bottom',
				'options' => array(
					'0' => __('No Bottom Padding', 'tmm_content_composer'),
					'10' => __('10 PX', 'tmm_content_composer'),
					'20' => __('20 PX', 'tmm_content_composer'),
					'30' => __('30 PX', 'tmm_content_composer'),
					'40' => __('40 PX', 'tmm_content_composer'),
					'50' => __('50 PX', 'tmm_content_composer'),
					'55' => __('55 PX', 'tmm_content_composer'),
					'60' => __('60 PX', 'tmm_content_composer'),
					'70' => __('70 PX', 'tmm_content_composer'),
					'80' => __('80 PX', 'tmm_content_composer'),
					'90' => __('90 PX', 'tmm_content_composer'),
					'100' => __('100 PX', 'tmm_content_composer')
				),
				'type' => 'select',
				'description' => 'Default Value 55px',
				'default_value' => $tmm_row_options['padding_bottom'],
				'id' => 'row_padding_bottom'
			));
			?>
			</div>

			<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'title' => __('Margin top', 'tmm_content_composer'),
				'shortcode_field' => 'row_margin_top',
				'options' => array(
					'0' => __('No Top Margin', 'tmm_content_composer'),
					'10' => __('10 PX', 'tmm_content_composer'),
					'20' => __('20 PX', 'tmm_content_composer'),
					'30' => __('30 PX', 'tmm_content_composer'),
					'40' => __('40 PX', 'tmm_content_composer'),
					'50' => __('50 PX', 'tmm_content_composer'),
					'60' => __('60 PX', 'tmm_content_composer'),
					'70' => __('70 PX', 'tmm_content_composer'),
					'80' => __('80 PX', 'tmm_content_composer'),
					'90' => __('90 PX', 'tmm_content_composer'),
					'100' => __('100 PX', 'tmm_content_composer')
				),
				'type' => 'select',
				'description' => 'Default Value 30px',
				'default_value' => $tmm_row_options['margin_top'],
				'id' => 'row_margin_top'
			));
			?>
			</div>

			<div class="one-half">
			<?php
			TMM_Content_Composer::html_option(array(
				'title' => __('Margin bottom', 'tmm_content_composer'),
				'shortcode_field' => 'row_margin_bottom',
				'options' => array(
					'0' => __('No Bottom Margin', 'tmm_content_composer'),
					'10' => __('10 PX', 'tmm_content_composer'),
					'20' => __('20 PX', 'tmm_content_composer'),
					'30' => __('30 PX', 'tmm_content_composer'),
					'40' => __('40 PX', 'tmm_content_composer'),
					'50' => __('50 PX', 'tmm_content_composer'),
					'60' => __('60 PX', 'tmm_content_composer'),
					'70' => __('70 PX', 'tmm_content_composer'),
					'80' => __('80 PX', 'tmm_content_composer'),
					'90' => __('90 PX', 'tmm_content_composer'),
					'100' => __('100 PX', 'tmm_content_composer')
				),
				'type' => 'select',
				'description' => 'Default Value 30px',
				'default_value' => $tmm_row_options['margin_bottom'],
				'id' => 'row_margin_bottom'
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
                        'left' => 'Left',
                        'right' => 'Right',
                        'center' => 'Center',
                ),
                'default_value' => $tmm_row_options['align'],
                'description' => ''
            ));

			TMM_Content_Composer::html_option(array(
                'type' => 'checkbox',
                'title' => __('Use as default content block', 'tmm_content_composer'),
                'shortcode_field' => 'row_section_content',
                'id' => 'row_section_content',
                'is_checked'=> $tmm_row_options['section_content'],
                'description' => ''
            ));
            ?>
        </div>

		<div class="one-half">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Row Background Type', 'tmm_content_composer'),
				'shortcode_field' => 'row_bg_type',
				'id' => 'row_bg_type',
				'options' => array(
					'none' => __('None', 'tmm_content_composer'),
					'default' => __('Default Theme Color', 'tmm_content_composer'),
					'custom' => __('Custom', 'tmm_content_composer'),
				),
				'default_value' => $tmm_row_options['bg_type'],
				'description' => ''
			));
			?>			

			<div id="row_background_image_box" style="display: none;">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Custom Background Type', 'tmm_content_composer'),
					'shortcode_field' => 'row_bg_custom_type',
					'id' => 'row_bg_custom_type',
                    'options' => array(
                        'color' => __('Color', 'tmm_content_composer'),
                        'image' => __('Image', 'tmm_content_composer'),
                        'video' => __('Video', 'tmm_content_composer')
                    ),
                    'default_value' => $tmm_row_options['bg_custom_type'],
					'description' => ''
				));
				?>
                
                <div id="row_background_color_box" style="display: none;">
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'title' => __('Background Color', 'tmm_content_composer'),
                        'shortcode_field' => 'row_background_color',
                        'type' => 'color',
                        'description' => '',
                        'default_value' => $tmm_row_options['bg_color'],
                        'id' => 'row_bg_color',
                        'display' =>1
                    ));
                    ?>
                </div>
                
                
                <div class="bg_custom_type_image" style="display: none;">
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'type' => 'upload',
                        'title' => __('Background Image', 'tmm_content_composer'),
                        'shortcode_field' => 'row_background_image',
                        'id' => 'row_bg_image',
                        'default_value' => $tmm_row_options['bg_image'],
                        'description' => ''
                    ));
                    ?>
                    <?php
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
					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Overlay', 'tmm_content_composer'),
						'shortcode_field' => 'row_overlay',
						'id' => 'row_overlay',
						'is_checked'=> $tmm_row_options['overlay'],
						'description' => 'Set overlay on background image'
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

                <div class="bg_custom_type_video" style="display: none;">
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'type' => 'upload_video',
                        'title' => __('Background Video', 'tmm_content_composer'),
                        'shortcode_field' => 'row_bg_video',
                        'id' => 'row_bg_video',
                        'default_value' => $tmm_row_options['bg_video'],
                        'description' => 'Examples: https://www.youtube.com/watch?v=_EBYf3lYSEg http://vimeo.com/22439234 or upload self hosted video'
                    ));
                    ?>

					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Show / Hide video control panel', 'tmm_content_composer'),
						'shortcode_field' => 'row_background_video_panel',
						'id' => 'row_bg_video_panel',
						'default_value' => $tmm_row_options['bg_video_panel'],
						'is_checked'=>true,
						'description' => __('Show / Hide video control panel', 'tmm_content_composer'),
					));
					?>

					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Mute audio on video', 'tmm_content_composer'),
						'shortcode_field' => 'row_background_video_mute',
						'id' => 'row_bg_video_mute',
						'default_value' => $tmm_row_options['bg_video_mute'],
						'is_checked'=>false,
						'description' => __('Mute audio on video', 'tmm_content_composer'),
					));
					?>

					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Repeat videos automatically', 'tmm_content_composer'),
						'shortcode_field' => 'row_background_video_loop',
						'id' => 'row_bg_video_loop',
						'default_value' => $tmm_row_options['bg_video_loop'],
						'is_checked'=>true,
						'description' => __('Repeat videos automatically', 'tmm_content_composer'),
					));
					?>
                </div>

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'checkbox',
					'title' => __('Row Background Fullscreen', 'tmm_content_composer'),
					'shortcode_field' => 'row_background_fullscreen',
					'id' => 'row_bg_fullscreen',
					'default_value' => $tmm_row_options['bg_fullscreen'],
					'is_checked'=>false,
					'description' => __('Set The Row Background Image Fullscreen', 'tmm_content_composer'),
				));
				?>

			</div>

		</div>

	</div>

</div>
