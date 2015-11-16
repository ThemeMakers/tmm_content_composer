<?php if (!defined('ABSPATH')) exit;

global $tmm_row_options;
?>

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
                <a class="tmm-lc-add-column" title="<?php _e("Add Column", TMM_CC_TEXTDOMAIN) ?>" data-row-id="__ROW_ID__"></a>
                <a class="tmm-lc-copy-row" data-row-id="__ROW_ID__" title="<?php _e("Add to Clipboard", TMM_CC_TEXTDOMAIN) ?>"></a>
                <a class="tmm-lc-edit-row" data-row-id="__ROW_ID__" title="<?php _e("Edit", TMM_CC_TEXTDOMAIN) ?>"></a>
                <a class="tmm-lc-delete-row" data-row-id="__ROW_ID__" title="<?php _e("Delete", TMM_CC_TEXTDOMAIN) ?>"></a>
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
                'title' => __('Row content displaying', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'row_lc_displaying',
                'id' => 'row_lc_displaying',
                'options' => array(
                    'default' => __('Below content matching its layout', TMM_CC_TEXTDOMAIN),
                    'before_full_width' => __('Before main content with separate layout options', TMM_CC_TEXTDOMAIN),
		   			'full_width' => __('After main content with separate layout options', TMM_CC_TEXTDOMAIN)
                ),
                'default_value' => $tmm_row_options['lc_displaying'],
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
                'default_value' => $tmm_row_options['full_width'],
                'description' => ''
            ));
            ?>
            </div>

            <div class="content_full_width" style="display: none;">
            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'select',
                'title' => __('Content Full Width', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'row_content_full_width',
                'id' => 'row_content_full_width',
                'options' => array(
                    0 => __('No', TMM_CC_TEXTDOMAIN),
                    1 => __('Yes', TMM_CC_TEXTDOMAIN)
                ),
                'default_value' => $tmm_row_options['content_full_width'],
                'description' => ''
            ));
            ?>
            </div>

            <?php
            TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Padding top', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_padding_top',
				'id' => 'row_padding_top',
				'options' => array(
					'0' => __('No Top Padding', TMM_CC_TEXTDOMAIN),
					'10' => __('10 PX', TMM_CC_TEXTDOMAIN),
					'20' => __('20 PX', TMM_CC_TEXTDOMAIN),
					'30' => __('30 PX', TMM_CC_TEXTDOMAIN),
					'40' => __('40 PX', TMM_CC_TEXTDOMAIN),
					'50' => __('50 PX', TMM_CC_TEXTDOMAIN),
					'55' => __('55 PX', TMM_CC_TEXTDOMAIN),
					'60' => __('60 PX', TMM_CC_TEXTDOMAIN),
					'70' => __('70 PX', TMM_CC_TEXTDOMAIN),
					'80' => __('80 PX', TMM_CC_TEXTDOMAIN),
					'90' => __('90 PX', TMM_CC_TEXTDOMAIN),
					'100' => __('100 PX', TMM_CC_TEXTDOMAIN)
				),
				'description' => 'Default Value 55px',
				'default_value' => $tmm_row_options['padding_top']
			));

			TMM_Content_Composer::html_option(array(
				'title' => __('Padding bottom', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_padding_bottom',
				'options' => array(
					'0' => __('No Top Padding', TMM_CC_TEXTDOMAIN),
					'10' => __('10 PX', TMM_CC_TEXTDOMAIN),
					'20' => __('20 PX', TMM_CC_TEXTDOMAIN),
					'30' => __('30 PX', TMM_CC_TEXTDOMAIN),
					'40' => __('40 PX', TMM_CC_TEXTDOMAIN),
					'50' => __('50 PX', TMM_CC_TEXTDOMAIN),
					'55' => __('55 PX', TMM_CC_TEXTDOMAIN),
					'60' => __('60 PX', TMM_CC_TEXTDOMAIN),
					'70' => __('70 PX', TMM_CC_TEXTDOMAIN),
					'80' => __('80 PX', TMM_CC_TEXTDOMAIN),
					'90' => __('90 PX', TMM_CC_TEXTDOMAIN),
					'100' => __('100 PX', TMM_CC_TEXTDOMAIN)
				),
				'type' => 'select',
				'description' => 'Default Value 55px',
				'default_value' => $tmm_row_options['padding_bottom'],
				'id' => 'row_padding_bottom'
			));

			TMM_Content_Composer::html_option(array(
				'title' => __('Margin top', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_margin_top',
				'options' => array(
					'0' => __('No Top Margin', TMM_CC_TEXTDOMAIN),
					'10' => __('10 PX', TMM_CC_TEXTDOMAIN),
					'20' => __('20 PX', TMM_CC_TEXTDOMAIN),
					'30' => __('30 PX', TMM_CC_TEXTDOMAIN),
					'40' => __('40 PX', TMM_CC_TEXTDOMAIN),
					'50' => __('50 PX', TMM_CC_TEXTDOMAIN),
					'60' => __('60 PX', TMM_CC_TEXTDOMAIN),
					'70' => __('70 PX', TMM_CC_TEXTDOMAIN),
					'80' => __('80 PX', TMM_CC_TEXTDOMAIN),
					'90' => __('90 PX', TMM_CC_TEXTDOMAIN),
					'100' => __('100 PX', TMM_CC_TEXTDOMAIN)
				),
				'type' => 'select',
				'description' => 'Default Value 30px',
				'default_value' => $tmm_row_options['margin_top'],
				'id' => 'row_margin_top'
			));

			TMM_Content_Composer::html_option(array(
				'title' => __('Margin bottom', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_margin_bottom',
				'options' => array(
					'0' => __('No Top Margin', TMM_CC_TEXTDOMAIN),
					'10' => __('10 PX', TMM_CC_TEXTDOMAIN),
					'20' => __('20 PX', TMM_CC_TEXTDOMAIN),
					'30' => __('30 PX', TMM_CC_TEXTDOMAIN),
					'40' => __('40 PX', TMM_CC_TEXTDOMAIN),
					'50' => __('50 PX', TMM_CC_TEXTDOMAIN),
					'60' => __('60 PX', TMM_CC_TEXTDOMAIN),
					'70' => __('70 PX', TMM_CC_TEXTDOMAIN),
					'80' => __('80 PX', TMM_CC_TEXTDOMAIN),
					'90' => __('90 PX', TMM_CC_TEXTDOMAIN),
					'100' => __('100 PX', TMM_CC_TEXTDOMAIN)
				),
				'type' => 'select',
				'description' => 'Default Value 30px',
				'default_value' => $tmm_row_options['margin_bottom'],
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
                'default_value' => $tmm_row_options['align'],
                'description' => ''
            ));

			TMM_Content_Composer::html_option(array(
                'type' => 'checkbox',
                'title' => __('Use as default content blockt', TMM_CC_TEXTDOMAIN),
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
				'title' => __('Row Background Type', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'row_bg_type',
				'id' => 'row_bg_type',
				'options' => array(
					'none' => __('None', TMM_CC_TEXTDOMAIN),
					'default' => __('Default Theme Color', TMM_CC_TEXTDOMAIN),
					'custom' => __('Custom', TMM_CC_TEXTDOMAIN),
				),
				'default_value' => $tmm_row_options['bg_type'],
				'description' => ''
			));
			?>			

			<div id="row_background_image_box" style="display: none;">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Custom Background Type', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'row_bg_custom_type',
					'id' => 'row_bg_custom_type',
                    'options' => array(
                        'color' => __('Color', TMM_CC_TEXTDOMAIN),
                        'image' => __('Image', TMM_CC_TEXTDOMAIN),
                        'video' => __('Video', TMM_CC_TEXTDOMAIN)                        
                    ),
                    'default_value' => $tmm_row_options['bg_custom_type'],
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
                        'title' => __('Background Image', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'row_background_image',
                        'id' => 'row_bg_image',
                        'default_value' => $tmm_row_options['bg_image'],
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
						'1' => __('scroll', TMM_CC_TEXTDOMAIN),
						'0' => __('fixed', TMM_CC_TEXTDOMAIN)
					),
					'default_value' => $tmm_row_options['bg_attachment'],
					'description' => ''
				));
				?>
                </div>
                <div class="bg_custom_type_video" style="display: none;">
                    <?php
                    TMM_Content_Composer::html_option(array(
                        'type' => 'upload_video',
                        'title' => __('Background Video', TMM_CC_TEXTDOMAIN),
                        'shortcode_field' => 'row_bg_video',
                        'id' => 'row_bg_video',
                        'default_value' => $tmm_row_options['bg_video'],
                        'description' => 'Examples: https://www.youtube.com/watch?v=_EBYf3lYSEg http://vimeo.com/22439234 or upload self hosted video'
                    ));
                    ?>

					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Show / Hide video control panel', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'row_background_video_panel',
						'id' => 'row_bg_video_panel',
						'default_value' => $tmm_row_options['bg_video_panel'],
						'is_checked'=>true,
						'description' => __('Show / Hide video control panel', TMM_CC_TEXTDOMAIN),
					));
					?>

					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Mute audio on video', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'row_background_video_mute',
						'id' => 'row_bg_video_mute',
						'default_value' => $tmm_row_options['bg_video_mute'],
						'is_checked'=>false,
						'description' => __('Mute audio on video', TMM_CC_TEXTDOMAIN),
					));
					?>

					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Repeat videos automatically', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'row_background_video_loop',
						'id' => 'row_bg_video_loop',
						'default_value' => $tmm_row_options['bg_video_loop'],
						'is_checked'=>true,
						'description' => __('Repeat videos automatically', TMM_CC_TEXTDOMAIN),
					));
					?>
                </div>

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'checkbox',
					'title' => __('Row Background Fullscreen', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'row_background_fullscreen',
					'id' => 'row_bg_fullscreen',
					'default_value' => $tmm_row_options['bg_fullscreen'],
					'is_checked'=>false,
					'description' => __('Set The Row Background Image Fullscreen', TMM_CC_TEXTDOMAIN),
				));
				?>

				<div id="row_bg_overlay_box" style="display: none;">

					<?php
					TMM_Content_Composer::html_option(array(
						'type' => 'checkbox',
						'title' => __('Overlay', TMM_CC_TEXTDOMAIN),
						'shortcode_field' => 'row_overlay',
						'id' => 'row_overlay',
						'is_checked'=> $tmm_row_options['overlay'],
						'description' => 'Set overlay on background image'
					));
					?>

					<div class="one-half inner-left">
						<?php
						TMM_Content_Composer::html_option(array(
							'title' => __('Overlay Color', TMM_CC_TEXTDOMAIN),
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
							'title' => __('Overlay Opacity', TMM_CC_TEXTDOMAIN),
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

	</div>

</div>
