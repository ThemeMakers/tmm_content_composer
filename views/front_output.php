<?php
foreach ($tmm_layout_constructor as $row => $row_data) {

	if (!empty($row_data)) {

		$row_style = TMM_Layout_Constructor::get_row_bg($tmm_layout_constructor_row, $row);
		$section_class = isset($row_data['front_css_class']) ? ' '.$row_data['front_css_class'] : '';

		$padding_top = 0;
		$padding_bottom = 0;
		if (isset($tmm_layout_constructor_row[$row]['padding_top'])) {
			$padding_top = (int) $tmm_layout_constructor_row[$row]['padding_top'];
		}
		if (isset($tmm_layout_constructor_row[$row]['padding_bottom'])) {
			$padding_bottom = (int) $tmm_layout_constructor_row[$row]['padding_bottom'];
		}

		$section_styles = '';

		if($padding_top > 0){
			$section_styles .= 'padding-top: '.$padding_top.'px;';
		}
		if($padding_bottom > 0){
			$section_styles .= 'padding-bottom: '.$padding_bottom.'px;';
		}

		if (isset($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_type'] == 'custom'){
			$section_styles .= $row_style['style_custom_color'];
		}else{
			$section_styles .= $row_style['style_border'];
		}

		if(!empty($section_styles)){
			$section_styles = ' style="'.$section_styles.'"';
		}
		?>

		<div class="section-full-width row_container clearfix <?php echo $section_class; ?>"<?php echo $section_styles; ?>>

			<?php
			if (isset($row_style['bg_type']) && $row_style['bg_type'] == 'custom'){
				$bg_style = '';
				if (!empty($tmm_layout_constructor_row[$row]['bg_image'])){
					$bg_style .= 'background-image: url(' . $tmm_layout_constructor_row[$row]['bg_image'] . ');';
					if ($tmm_layout_constructor_row[$row]['bg_cover'] == 1){
						$bg_style .= 'background-size: cover;';
					}
				}
				$bg_style .= 'opacity:' . (float) $tmm_layout_constructor_row[$row]['bg_opacity'] / 100 . ';';
				$bg_style .= 'filter:alpha(opacity = ' . $tmm_layout_constructor_row[$row]['bg_opacity'] . ';';
				?>
				<div style="<?php echo $bg_style; ?>" class="full-bg-image full-bg-image-<?php echo $tmm_layout_constructor_row[$row]['bg_attachment']; ?>"></div>
			<?php
			}

			foreach ($row_data as $uniqid => $column) {

				$content = preg_replace('/^<p>|<\/p>$/', '', do_shortcode($column['content']));
				?>
				<div class="clearfix <?php echo @$column['effect']; ?> <?php echo $column['front_css_class']; ?>"><?php echo $content; ?></div>
			<?php
			}
			?>

		</div>

	<?php
	}
}
?>
