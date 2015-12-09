<?php
if (!defined('ABSPATH')) die('No direct access allowed');
global $post;

$first_row = current($tmm_layout_constructor_row);

foreach ($tmm_layout_constructor as $row => $row_data) {

	if (!isset($tmm_layout_constructor_row[$row]['lc_displaying'])) {
		$tmm_layout_constructor_row[$row]['lc_displaying'] = 'default';
	}

	if (!isset($tmm_layout_constructor_row[$row]['container_width'])) {
		$tmm_layout_constructor_row[$row]['container_width'] = '0';
	}

	if (!isset($tmm_layout_constructor_row[$row]['container_height'])) {
		$tmm_layout_constructor_row[$row]['container_height'] = '0';
	}

	if (!isset($tmm_layout_constructor_row[$row]['border_top'])) {
		$tmm_layout_constructor_row[$row]['border_top'] = '0';
	}

	if (!empty($row_data) && ($tmm_layout_constructor_row[$row]['lc_displaying'] == $row_displaying)) {

		$padding_top = 0;
		$padding_bottom = 0;
		$border_top = 0;

		if (isset($tmm_layout_constructor_row[$row]['padding_top'])) {
			$padding_top = (int) $tmm_layout_constructor_row[$row]['padding_top'];
		}

		if (isset($tmm_layout_constructor_row[$row]['padding_bottom'])) {
			$padding_bottom = (int) $tmm_layout_constructor_row[$row]['padding_bottom'];
		}

		if ($tmm_layout_constructor_row[$row]['padding_top'] === '' && $tmm_layout_constructor_row[$row]['padding_bottom'] === '') {
			$padding_top = 0;
			$padding_bottom = 0;
		}

		if (isset($tmm_layout_constructor_row[$row]['border_top'])) {
			$border_top = (int) $tmm_layout_constructor_row[$row]['border_top'];
		}

		$section_class = '';
		$section_style_attr = '';
		$container_class = 'container';
		$row_class = 'row';
		$row_style_attr = '';
		$display_overlay = false;

		if ($row_displaying === 'full_width' || $row_displaying === 'before_full_width') {
			$section_class .= '';

			if ($tmm_layout_constructor_row[$row]['container_width'] == 1) {
				$container_class = 'container-fluid';
			}

			if ($tmm_layout_constructor_row[$row]['container_height'] == 1) {
				$section_class .= ' viewport-50';
			} else if ($tmm_layout_constructor_row[$row]['container_height'] == 2) {
				$section_class .= ' viewport-100';
			}

			$align  = (isset($tmm_layout_constructor_row[$row]['row_align'])) ? $tmm_layout_constructor_row[$row]['row_align'] : 'left';

			if (!empty($align) && $align === 'right') {
				$section_class .= ' content-right';
			} else if (!empty($align) && $align === 'center') {
				$section_class .= ' content-center';
			}

			/* border top */
			if ($tmm_layout_constructor_row[$row]['border_top'] === '1') {
				$section_class .= ' brd-1';
			}

			if ($tmm_layout_constructor_row[$row]['border_top'] === '2') {
				$section_class .= ' brd-2';
			}

			if ($tmm_layout_constructor_row[$row]['border_top'] === '3') {
				$section_class .= ' brd-3';
			}

		}

		/* Offset Options */
		if ($tmm_layout_constructor_row[$row]['padding_top'] === '0' && $tmm_layout_constructor_row[$row]['padding_bottom'] === '0') {
			$section_class .= ' padding-off';
		}

		if ($tmm_layout_constructor_row[$row]['padding_top'] === '20') {
			$section_class .= ' padding-top-20';
		}

		if ($tmm_layout_constructor_row[$row]['padding_top'] === '40') {
			$section_class .= ' padding-top-40';
		}

		if ($tmm_layout_constructor_row[$row]['padding_top'] === '60') {
			$section_class .= ' padding-top-60';
		}

		if ($tmm_layout_constructor_row[$row]['padding_top'] === '80') {
			$section_class .= ' padding-top-80';
		}

		if ($tmm_layout_constructor_row[$row]['padding_top'] === '100') {
			$section_class .= ' padding-top-100';
		}

		if ($tmm_layout_constructor_row[$row]['padding_bottom'] === '20') {
			$section_class .= ' padding-bottom-20';
		}

		if ($tmm_layout_constructor_row[$row]['padding_bottom'] === '40') {
			$section_class .= ' padding-bottom-40';
		}

		if ($tmm_layout_constructor_row[$row]['padding_bottom'] === '60') {
			$section_class .= ' padding-bottom-60';
		}

		if ($tmm_layout_constructor_row[$row]['padding_bottom'] === '80') {
			$section_class .= ' padding-bottom-80';
		}

		if ($tmm_layout_constructor_row[$row]['padding_bottom'] === '100') {
			$section_class .= ' padding-bottom-100';
		}

		/* background */
		if (!empty($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_type'] !== 'none') {

			if ($tmm_layout_constructor_row[$row]['bg_type'] == 'image' && !empty($tmm_layout_constructor_row[$row]['bg_image'])) {
				$section_class .= ' parallax';
				$section_style_attr .= 'background-image: url(' . $tmm_layout_constructor_row[$row]["bg_image"] . ');';

				if (!empty($tmm_layout_constructor_row[$row]['bg_attachment'])) {
					$section_class .= ' bg-scroll';
				}

			}

			if ($tmm_layout_constructor_row[$row]['bg_type'] == 'image' && ($row_displaying === 'full_width' || $row_displaying === 'before_full_width') && !empty($tmm_layout_constructor_row[$row]['bg_overlay'])) {
				$display_overlay = true;
				$overlay_style_attr = '';

				if (!empty($tmm_layout_constructor_row[$row]['bg_overlay_color'])) {
					$overlay_style_attr .= TMM_Content_Composer::hex2RGB($tmm_layout_constructor_row[$row]['bg_overlay_color'], true);
				} else {
					$overlay_style_attr .= '0,0,0';
				}

				if (isset($tmm_layout_constructor_row[$row]['bg_overlay_opacity'])) {
					$overlay_style_attr .= ',' . intval($tmm_layout_constructor_row[$row]['bg_overlay_opacity']) / 100;
				} else {
					$overlay_style_attr .= ',1';
				}

				if (!empty($overlay_style_attr)) {
					$overlay_style_attr = ' style="background-color:rgba(' . $overlay_style_attr . ')"';
				}
			}

			if ($tmm_layout_constructor_row[$row]['bg_type'] == 'color' && !empty($tmm_layout_constructor_row[$row]['bg_color_type'])) {

				if ($tmm_layout_constructor_row[$row]['bg_color_type'] === 'custom') {
					$section_style_attr .= 'background:'.$tmm_layout_constructor_row[$row]['bg_color'].'; ';
				} else {
					$section_class .= ' ' . $tmm_layout_constructor_row[$row]['bg_color_type'];
				}

			}

		}

		if ($row_displaying === 'default') {
			$row_class .= $section_class;
			$row_class = trim($row_class);
			$row_style_attr .= $section_style_attr;
		}

		$section_class = trim($section_class);

		/* wrap section and row styles */
		if (!empty($section_style_attr)) {
			$section_style_attr = ' style="' . $section_style_attr . '"';
		}

		if (!empty($row_style_attr)) {
			$row_style_attr = ' style="'.$row_style_attr.'"';
		}

		?>

		<?php if ($row_displaying === 'full_width' || $row_displaying === 'before_full_width') { ?>
		<section id="<?php echo 'section_'.$row ?>" class="<?php echo $section_class; ?>"<?php echo $section_style_attr; ?>>

			<?php
			if ($display_overlay) { ?>
			<div class="overlay"<?php echo $overlay_style_attr; ?>></div>
			<?php } ?>

			<div class="<?php echo $container_class; ?>">
		<?php } ?>

				<div <?php if ($row_displaying === 'default') { ?>id="<?php echo 'section_'.$row ?>"<?php } ?> class="<?php echo $row_class; ?>"<?php echo $row_style_attr; ?>>

					<?php foreach ($row_data as $uniqid => $column) { ?>

						<?php
						$content = preg_replace('/^<p>|<\/p>$/', '', do_shortcode($column['content']));
						$col_class = $column['front_css_class'];

						if (!empty($column['effect'])) {
							$col_class .= ' ' . $column['effect'];
						}
						?>
						<div class="<?php echo $col_class ?>"><?php echo $content ?></div>

					<?php } ?>

				</div>

		<?php if ($row_displaying === 'full_width' || $row_displaying === 'before_full_width') { ?>
			</div><!--/ .container-->

		</section>
		<?php } ?>

	<?php
	}

} 
