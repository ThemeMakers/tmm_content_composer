<?php
if (!defined('ABSPATH')) die('No direct access allowed');
global $post;
global $tmm_row_options;

$first_row = current($tmm_layout_constructor_row);

foreach ($tmm_layout_constructor as $row => $row_data) {

    // use the default values, if the options have not been defined
    if ( !isset($tmm_layout_constructor_row[$row]['section_title']) ) {
        $tmm_layout_constructor_row[$row]['section_title'] = $tmm_row_options['section_title'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['lc_displaying']) ) {
        //$tmm_layout_constructor_row[$row]['lc_displaying'] = $tmm_row_options['lc_displaying'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['full_width']) ) {
        $tmm_layout_constructor_row[$row]['full_width'] = $tmm_row_options['full_width'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['content_full_width']) ) {
        $tmm_layout_constructor_row[$row]['content_full_width'] = $tmm_row_options['content_full_width'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['padding_top']) ) {
        $tmm_layout_constructor_row[$row]['padding_top'] = $tmm_row_options['padding_top'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['padding_bottom']) ) {
        $tmm_layout_constructor_row[$row]['padding_bottom'] = $tmm_row_options['padding_bottom'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['margin_top']) ) {
        $tmm_layout_constructor_row[$row]['margin_top'] = $tmm_row_options['margin_top'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['margin_bottom']) ) {
        $tmm_layout_constructor_row[$row]['margin_bottom'] = $tmm_row_options['margin_bottom'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['align']) ) {
        $tmm_layout_constructor_row[$row]['align'] = $tmm_row_options['align'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['section_content']) ) {
        //$tmm_layout_constructor_row[$row]['section_content'] = $tmm_row_options['section_content'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_type']) ) {
        $tmm_layout_constructor_row[$row]['bg_type'] = $tmm_row_options['bg_type'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_custom_type']) ) {
        $tmm_layout_constructor_row[$row]['bg_custom_type'] = $tmm_row_options['bg_custom_type'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_color']) ) {
        $tmm_layout_constructor_row[$row]['bg_color'] = $tmm_row_options['bg_color'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_image']) ) {
        $tmm_layout_constructor_row[$row]['bg_image'] = $tmm_row_options['bg_image'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_attachment']) ) {
        $tmm_layout_constructor_row[$row]['bg_attachment'] = $tmm_row_options['bg_attachment'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_video']) ) {
        $tmm_layout_constructor_row[$row]['bg_video'] = $tmm_row_options['bg_video'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_video_panel']) ) {
        $tmm_layout_constructor_row[$row]['bg_video_panel'] = $tmm_row_options['bg_video_panel'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_video_mute']) ) {
        $tmm_layout_constructor_row[$row]['bg_video_mute'] = $tmm_row_options['bg_video_mute'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_video_loop']) ) {
        $tmm_layout_constructor_row[$row]['bg_video_loop'] = $tmm_row_options['bg_video_loop'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_fullscreen']) ) {
        $tmm_layout_constructor_row[$row]['bg_fullscreen'] = $tmm_row_options['bg_fullscreen'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['overlay']) ) {
        $tmm_layout_constructor_row[$row]['overlay'] = $tmm_row_options['overlay'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_overlay_color']) ) {
        $tmm_layout_constructor_row[$row]['bg_overlay_color'] = $tmm_row_options['bg_overlay_color'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['bg_overlay_opacity']) ) {
        $tmm_layout_constructor_row[$row]['bg_overlay_opacity'] = $tmm_row_options['bg_overlay_opacity'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['border_width']) ) {
        $tmm_layout_constructor_row[$row]['border_width'] = $tmm_row_options['border_width'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['border_type']) ) {
        $tmm_layout_constructor_row[$row]['border_type'] = $tmm_row_options['border_type'];
    }
    if ( !isset($tmm_layout_constructor_row[$row]['border_color']) ) {
        $tmm_layout_constructor_row[$row]['border_color'] = $tmm_row_options['border_color'];
    }

    if (!empty($row_data)/* && ($tmm_layout_constructor_row[$row]['lc_displaying'] == $row_displaying)*/) {

		$row_style = TMM_Layout_Constructor::get_row_bg($tmm_layout_constructor_row, $row);

		$section_class = 'section';
		$display_overlay = false;

		/* Offset Options */
		/*if ($tmm_layout_constructor_row[$row]['padding_top'] === '0' && $tmm_layout_constructor_row[$row]['padding_bottom'] === '0') {
			$section_class .= ' padding-off';
		}

		if ($tmm_layout_constructor_row[$row]['section_content']=='1'){
			$section_class .=' section-content';
		}
		if ($tmm_layout_constructor_row[$row]['bg_type']=='none'){
			$section_class .=' background-color-off';
		}
		if ($tmm_layout_constructor_row[$row]['full_width'] == 1 && $tmm_layout_constructor_row[$row]['bg_type'] == 'default') {
			$section_class .= ' theme-default-bg';
		}*/

		$margin_top = (isset($tmm_layout_constructor_row[$row]['margin_top'])) ? $tmm_layout_constructor_row[$row]['margin_top'] : '';
		$margin_bottom = (isset($tmm_layout_constructor_row[$row]['margin_bottom'])) ? $tmm_layout_constructor_row[$row]['margin_bottom'] : '';

		$section_style_attr = '';
		if ($margin_top != '0'){
			$section_style_attr .= 'margin-top:' . $margin_top . 'px;';
		}
		if ($margin_bottom != '0'){
			$section_style_attr .= 'margin-bottom:' . $margin_bottom . 'px;';
		}

		/* background */
		if (!empty($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_type'] !== 'none') {

			if ($tmm_layout_constructor_row[$row]['bg_custom_type'] == 'image' && !empty($tmm_layout_constructor_row[$row]['bg_image'])) {
				$section_class .= ' parallax';
				$section_style_attr .= 'background-image: url(' . $tmm_layout_constructor_row[$row]["bg_image"] . ');';

				if (!empty($tmm_layout_constructor_row[$row]['bg_attachment'])) {
					$section_class .= ' bg-scroll';
				}

			}

			if ($tmm_layout_constructor_row[$row]['bg_custom_type'] == 'image' ) {
                if (!empty($tmm_layout_constructor_row[$row]['bg_overlay_color'])) {
                    $display_overlay = true;
                    $overlay_style_attr = '';

                    if (!empty($tmm_layout_constructor_row[$row]['bg_overlay_color'])) {
                        $overlay_style_attr .= TMM_Content_Composer::hex2RGB($tmm_layout_constructor_row[$row]['bg_overlay_color'], true);
                    } else {
                        $overlay_style_attr .= '0,0,0';
                    }
                }
                if (!empty($tmm_layout_constructor_row[$row]['bg_overlay_opacity'])) {
                    if (isset($tmm_layout_constructor_row[$row]['bg_overlay_opacity'])) {
                        $overlay_style_attr .= ',' . intval($tmm_layout_constructor_row[$row]['bg_overlay_opacity']) / 100;
                    } else {
                        $overlay_style_attr .= ',1';
                    }
                    if (!empty($overlay_style_attr)) {
                        $overlay_style_attr = ' background-color:rgba(' . $overlay_style_attr . ');';
                    }
                }
			}

			if ($tmm_layout_constructor_row[$row]['bg_custom_type'] == 'video' && !empty($tmm_layout_constructor_row[$row]['bg_video'])) {
				$video_type = TMM_Layout_Constructor::get_video_type($tmm_layout_constructor_row[$row]['bg_video']);

				$top = ($post->post_type=='page' && empty($post->post_content) && $first_row['bg_custom_type']=='video') ? '0' : '100px';
				$video_options=array(
					'video_url' => $tmm_layout_constructor_row[$row]['bg_video'],
					'bg_cover' => isset($tmm_layout_constructor_row[$row]['bg_cover']) ? $tmm_layout_constructor_row[$row]['bg_cover'] : '',
					'video_type' => $video_type,
					'video_quality' => 'default',
					'top' => $top,
					'panel' => $tmm_layout_constructor_row[$row]['bg_video_panel'],
					'mute' => $tmm_layout_constructor_row[$row]['bg_video_mute'],
					'loop' => $tmm_layout_constructor_row[$row]['bg_video_loop'],
					'containment' => '#section_'.$row
				);

				echo TMM_Layout_Constructor::display_rowbg_video($video_options);
			}

			if ($tmm_layout_constructor_row[$row]['bg_custom_type'] == 'color' && !empty($tmm_layout_constructor_row[$row]['bg_color'])) {

				$section_style_attr .= 'background:'.$tmm_layout_constructor_row[$row]['bg_color'].'; ';

			}

		}

		/* wrap section and row styles */
		if (!empty($section_style_attr)) {
			$section_style_attr = ' style="' . $section_style_attr . '"';
		}


		if (($tmm_layout_constructor_row[$row]['full_width'] == 0)&&(($row_displaying=='full_width')||($row_displaying=='before_full_width'))){
			?>

			<div class="container">

		<?php
		}
		?>

	<section id="<?php echo 'section_'.$row ?>" class="<?php echo $section_class; ?>"<?php echo $section_style_attr; ?>>

		<?php
		if ($display_overlay) { ?>
			<!--<div class="overlay"<?php /*echo $overlay_style_attr; */?>></div>-->
		<?php } ?>

            <?php

				$bg_color = (isset($tmm_layout_constructor_row[$row]['bg_color'])) ? $tmm_layout_constructor_row[$row]['bg_color'] : '';
				$padding_top = (isset($tmm_layout_constructor_row[$row]['padding_top'])) ? $tmm_layout_constructor_row[$row]['padding_top'] : '';
				$padding_bottom = (isset($tmm_layout_constructor_row[$row]['padding_bottom'])) ? $tmm_layout_constructor_row[$row]['padding_bottom'] : '';
				$align  = (isset($tmm_layout_constructor_row[$row]['align'])) ? $tmm_layout_constructor_row[$row]['align'] : '';

				$row_class = 'row';
				if (isset($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_type'] == 'default') {
					$row_class .= ' theme-default-bg';
				}

				$row_style_attr = '';
				if (isset($tmm_layout_constructor_row[$row]['bg_type'])
						&& $tmm_layout_constructor_row[$row]['bg_type'] != 'custom'
						&& isset($row_style['style_custom_color'])) {
					$row_style_attr .= $row_style['style_custom_color'];
				}

                /* border */
                if (!empty($tmm_layout_constructor_row[$row]['border_width']) && '0' !== $tmm_layout_constructor_row[$row]['border_width']) {
                    $border_width = $tmm_layout_constructor_row[$row]['border_width'];
                    $border_type = $tmm_layout_constructor_row[$row]['border_type'];
                    $border_color = $tmm_layout_constructor_row[$row]['border_color'];
                    $row_style_attr .= 'border-width:' . $border_width . 'px;';
                    $row_style_attr .= 'border-style:' . $border_type . ';';
                    $row_style_attr .= 'border-color:' . $border_color . ';';
                }

				if ($padding_top != '0') {
					$row_style_attr .= 'padding-top:'.$padding_top.'px; ';
				}
				if ($padding_bottom != '0') {
					$row_style_attr .= 'padding-bottom:'.$padding_bottom.'px; ';
				}
				if (!empty($align) && ($align != 'left')) {
					$row_style_attr .= 'text-align:'.$align.'; ';
				}
				if (!empty($row_style_attr)) {
                    if ($display_overlay && '1' == $tmm_layout_constructor_row[$row]['overlay']) {
                        $row_style_attr = ' style="' . $row_style_attr . $overlay_style_attr . '"';
                    } else {
                        $row_style_attr = ' style="' . $row_style_attr . '"';
                    }
				}

				if ($tmm_layout_constructor_row[$row]['content_full_width'] == 0
					&& $tmm_layout_constructor_row[$row]['full_width'] != 0
					&& ($row_displaying=='full_width' || $row_displaying == 'before_full_width')) {
					?>

					<div class="container">

					<?php
				}
					?>

                <div class="<?php echo $row_class; ?>"<?php echo $row_style_attr; ?>>

                    <?php foreach ($row_data as $uniqid => $column) {

                        $content = TMM_Shortcode::remove_empty_tags($column['content']);
                        $content = do_shortcode(shortcode_unautop($content));
                        ?>
                        <div class="<?php echo @$column['effect'] ?> <?php echo $column['front_css_class'] ?>"><?php echo $content ?></div>

                    <?php } ?>

                    <div class="clearfix"></div>

                </div>

					<?php
				if ($tmm_layout_constructor_row[$row]['content_full_width'] == 0
					&& $tmm_layout_constructor_row[$row]['full_width'] != 0
					&& ($row_displaying=='full_width' || $row_displaying == 'before_full_width')) {
					?>

					</div><!--/ .container -->

					<?php
				}

			?>

	</section><!--/ .section -->

    <?php
		if (($tmm_layout_constructor_row[$row]['full_width'] == 0)&&(($row_displaying=='full_width')||($row_displaying=='before_full_width'))){
			?>

			</div><!--/ .container-->

		<?php
		}
	}

}
