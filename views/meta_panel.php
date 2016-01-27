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
               'type' => 'checkbox',
               'title' => __('Full width', TMM_CC_TEXTDOMAIN),
               'shortcode_field' => 'is_full_width',
               'id' => 'row_section_content',
               'is_checked'=> $tmm_row_options['is_full_width'],
               'description' => __('On / Off', TMM_CC_TEXTDOMAIN)
           ));
           ?>

        </div>

        <div class="one-half">

            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'upload',
                'title' => __('Background Image', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'bg_image',
                'id' => 'bg_image',
                'default_value' => $tmm_row_options['bg_image'],
                'description' => ''
            ));
            ?>

        </div>

        <div class="one-half">
           <?php
           TMM_Content_Composer::html_option(array(
               'type' => 'checkbox',
               'title' => __('Disable Padding Top', TMM_CC_TEXTDOMAIN),
               'shortcode_field' => 'padding_top',
               'id' => 'padding_top',
               'is_checked'=> $tmm_row_options['padding_top'],
               'description' => __('On / Off', TMM_CC_TEXTDOMAIN)
           ));
           ?>

        </div>

        <div class="one-half">
            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'upload',
                'title' => __('Image instead of video', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'bg_touch_image',
                'id' => 'bg_touch_image',
                'default_value' => '',
                'description' => __('(for touch devices)', TMM_CC_TEXTDOMAIN)
            ));
            ?>

        </div>

        <div class="one-half">
           <?php
           TMM_Content_Composer::html_option(array(
               'type' => 'checkbox',
               'title' => __('Disable Padding Bottom', TMM_CC_TEXTDOMAIN),
               'shortcode_field' => 'padding_bottom',
               'id' => 'padding_bottom',
               'is_checked'=> $tmm_row_options['padding_bottom'],
               'description' => __('On / Off', TMM_CC_TEXTDOMAIN)
           ));
           ?>

        </div>

        <div class="one-half">
            <?php
            TMM_Content_Composer::html_option(array(
                'title' => __('Opacity', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'opacity',
                'id' => 'value_opacity',
                'type' => 'slider',
                'min' => '0',
                'max' => '100',
                'description' => '(add color shade over background image) min: 0, max: 100',
                'default_value' => $tmm_row_options['opacity'],
            ));
            ?>

        </div>

        <div class="one-half">
           <?php
           TMM_Content_Composer::html_option(array(
               'type' => 'checkbox',
               'title' => __('Transparent Section', TMM_CC_TEXTDOMAIN),
               'shortcode_field' => 'is_parallax',
               'id' => 'is_parallax',
               'is_checked'=> $tmm_row_options['is_parallax'],
               'description' => __('Set transparent section background for using video background and set white color to section text', TMM_CC_TEXTDOMAIN)
           ));
           ?>

        </div>

        <div class="one-half">
            <?php
            TMM_Content_Composer::html_option(array(
                'title' => __('Border Bottom Color', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'border_bottom_color',
                'type' => 'color',
                'description' => '',
                'default_value' => $tmm_row_options['border_bottom_color'],
                'id' => 'row_bg_color',
                'display' =>1
            ));
            ?>

        </div>

        <div class="one-half">

            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'checkbox',
                'title' => __('Background Attachment', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'bg_attachment',
                'id' => 'bg_attachment',
                'is_checked'=> $tmm_row_options['bg_attachment'],
                'description' => __('Fixed / Scroll', TMM_CC_TEXTDOMAIN)
            ));
            ?>

        </div>

        <div class="one-half">
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

        <div class="one-half">
            <?php
            TMM_Content_Composer::html_option(array(
                'type' => 'checkbox',
                'title' => __('Overlay', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'is_overlay',
                'id' => 'is_overlay',
                'is_checked'=> $tmm_row_options['overlay'],
                'description' => __('Set overlay on background image', TMM_CC_TEXTDOMAIN)
            ));
            ?>

		</div>

	</div>

</div>
