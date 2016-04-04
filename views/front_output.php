<?php
if (!defined('ABSPATH')) die('No direct access allowed');
global $post;

$first_row = current($tmm_layout_constructor_row);

foreach ($tmm_layout_constructor as $row => $row_data) {   
    
    if (!empty($row_data) && ($tmm_layout_constructor_row[$row]['lc_displaying']==$row_displaying)) {
        
		$row_style = TMM_Layout_Constructor::get_row_bg($tmm_layout_constructor_row, $row);

		$first = reset($row_data);

		$show_column = true;

		if (count($row_data)==1 && $first['front_css_class']=='medium-12 large-12'){
			$section_class = 'section padding-off columns medium-12 large-12';
			$show_column = false;
		}else{
			$section_class = 'section padding-off';
		}

		if ($tmm_layout_constructor_row[$row]['bg_type']=='none'){
			$section_class .=' background-color-off';
		}
		if ($tmm_layout_constructor_row[$row]['full_width'] == 1 && $tmm_layout_constructor_row[$row]['bg_type'] == 'default') {
			$section_class .= ' theme-default-bg';
		}
		if (!empty($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_custom_type'] == 'image') {
			$section_class .= ' parallax';
		}

		$margin_top = (isset($tmm_layout_constructor_row[$row]['margin_top'])) ? $tmm_layout_constructor_row[$row]['margin_top'] : '';
		$margin_bottom = (isset($tmm_layout_constructor_row[$row]['margin_bottom'])) ? $tmm_layout_constructor_row[$row]['margin_bottom'] : '';
		$section_style = '';
		if ($margin_top != '' && $margin_top){
			$section_style .= 'margin-top:' . $margin_top . 'px;';
		}
		if ($margin_bottom != '' && $margin_bottom){
			$section_style .= 'margin-bottom:' . $margin_bottom . 'px;';
		}
		if (!empty($section_style)){
			$section_style = ' style="'. esc_attr($section_style) .'"';
		}

	    $cont_full_width = false;

	    if ($row_displaying == 'full_width' || $row_displaying == 'before_full_width'){

	        if ( empty($tmm_layout_constructor_row[$row]['full_width']) ) {
			    $cont_full_width = true;
		    }

	    }
		?>

	    <?php if ( $cont_full_width ) { ?>

	    <div class="row">

	    <?php } ?>

		<div id="<?php echo 'section_'.$row ?>" class="<?php echo esc_attr($section_class); ?>" <?php echo $section_style ?>>

			<?php
			if (!empty($tmm_layout_constructor_row[$row]['bg_video']) && $tmm_layout_constructor_row[$row]['bg_custom_type']=='video' && $row_style['bg_type'] == 'custom'){
				$video_type = TMM_Layout_Constructor::get_video_type($tmm_layout_constructor_row[$row]['bg_video']);

				$top = ($post->post_type=='page' && empty($post->post_content) && $first_row['bg_custom_type']=='video') ? '0' : '100px';
				$video_options=array(
					'video_url' => $tmm_layout_constructor_row[$row]['bg_video'],
					'video_type' => $video_type,
					'video_quality' => 'default',
					'top' => $top,
					'containment' => '#section_'.$row
				);
				echo TMM_Layout_Constructor::display_rowbg_video($video_options);
			}

			$bg_color = (isset($tmm_layout_constructor_row[$row]['bg_color'])) ? $tmm_layout_constructor_row[$row]['bg_color'] : '';
			$padding_top = (isset($tmm_layout_constructor_row[$row]['padding_top'])) ? $tmm_layout_constructor_row[$row]['padding_top'] : 0;
			$padding_bottom = (isset($tmm_layout_constructor_row[$row]['padding_bottom'])) ? $tmm_layout_constructor_row[$row]['padding_bottom'] : 0;
			$align  = (isset($tmm_layout_constructor_row[$row]['row_align'])) ? $tmm_layout_constructor_row[$row]['row_align'] : '';

			$row_class = 'tmm_row';

			if ($tmm_layout_constructor_row[$row]['lc_displaying'] == 'default' || $show_column){
				$row_class .= ' row';
			}

			if (isset($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_type'] == 'default') {
				$row_class .= ' theme-default-bg';
			}
			if (isset($tmm_layout_constructor_row[$row]['custom_css_class']) && !empty($tmm_layout_constructor_row[$row]['custom_css_class'])){
				$row_class .= ' '.$tmm_layout_constructor_row[$row]['custom_css_class'];
			}

			$row_style_attr = '';
			if (isset($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_type'] != 'custom' && isset($row_style['style_custom_color'])) {
				$row_style_attr .= $row_style['style_custom_color'];
			}
			if (!empty($bg_color)) {
				//$row_style_attr .= 'background:'.$bg_color.'; ';
			}
			if ($padding_top > 0) {
				$row_style_attr .= 'padding-top:'.$padding_top.'px; ';
			}
			if ($padding_bottom > 0) {
				$row_style_attr .= 'padding-bottom:'.$padding_bottom.'px; ';
			}
			if (!empty($align)) {
				$row_style_attr .= 'text-align:'.$align.'; ';
			}
			if (!empty($row_style_attr)) {
				$row_style_attr = ' style="'. esc_attr($row_style_attr) .'"';
			}
				?>

				<div class="<?php echo esc_attr($row_class); ?>"<?php echo $row_style_attr; ?>>

					<?php
					if (isset($row_style['bg_type']) && $row_style['bg_type'] == 'custom' && $tmm_layout_constructor_row[$row]['bg_custom_type']=='color'){
						?>
						<div style="<?php echo (!empty($tmm_layout_constructor_row[$row]['bg_color'])) ? 'background-color: ' . $tmm_layout_constructor_row[$row]["bg_color"] . '' : ''; ?>" class="full-bg-image"></div>
					<?php
					}

					if (isset($row_style['bg_type']) && $row_style['bg_type'] == 'custom' && $tmm_layout_constructor_row[$row]['bg_custom_type']=='image'){
						?>
						<div style="<?php echo (!empty($tmm_layout_constructor_row[$row]['bg_image'])) ? 'background-image: url(' . $tmm_layout_constructor_row[$row]["bg_image"] . ');' : ''; ?>" class="full-bg-image full-bg-image-<?php echo $tmm_layout_constructor_row[$row]['bg_attachment'] ?>"></div>
					<?php
					}
					?>

					<?php foreach ($row_data as $uniqid => $column){

						$content = TMM_Shortcode::remove_empty_tags($column['content']);
						$content = do_shortcode(shortcode_unautop($content));

						$column_class = $show_column ? 'columns '.$column['effect'].' '.$column['front_css_class'] : 'relative '.$column['effect'];
						$column_style = '';
						if ($column['left_indent']!=TMM_Content_Composer::get_def_value('left_indent')){
							$column_style .= 'padding-left:'.$column['left_indent'].'px; ';
						}
						if ($column['right_indent']!=TMM_Content_Composer::get_def_value('right_indent')){
							$column_style .= 'padding-right:'.$column['right_indent'].'px; ';
						}
						if (!empty($column_style)){
							$column_style = 'style="' . esc_attr($column_style) . '"';
						}
						?>
						<div class="<?php echo esc_attr($column_class) ?>" <?php echo $column_style ?>><?php echo $content; ?></div>

					<?php } ?>

				</div>
                             
		</div><!--/ .section -->

	    <?php if ( $cont_full_width ) { ?>

	    </div>

        <?php } ?>

    <?php

	} 

}