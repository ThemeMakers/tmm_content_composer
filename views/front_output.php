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

		$row_style = TMM_Layout_Constructor::get_row_bg($tmm_layout_constructor_row, $row);
		$section_class = '';
		$container_class = 'container';
		$row_class = 'row';

		if ($row_displaying === 'full_width') {
			$section_class .= 'section';

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
		if (!empty($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_type'] == 'custom') {
			$section_class .= ' parallax';
		}

		if ($row_displaying === 'default') {
			$row_class .= $section_class;
		}

		?>

		<?php if ($row_displaying === 'full_width') { ?>
		<section id="<?php echo 'section_'.$row ?>" class="<?php echo $section_class; ?>">

			<div class="<?php echo $container_class; ?>">
		<?php } ?>

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

				if (isset($tmm_layout_constructor_row[$row]['row_overlay']) && $tmm_layout_constructor_row[$row]['row_overlay'] == true && isset($row_style['bg_type']) && $row_style['bg_type'] == 'custom'){
					?>

					<div class="parallax-overlay"></div>

				<?php
				}

				$bg_color = (isset($tmm_layout_constructor_row[$row]['bg_color'])) ? $tmm_layout_constructor_row[$row]['bg_color'] : '';

				if (isset($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_type'] == 'default') {
					$row_class .= ' theme-default-bg';
				}

				$row_style_attr = '';
				if (isset($tmm_layout_constructor_row[$row]['bg_type']) && $tmm_layout_constructor_row[$row]['bg_type'] != 'custom' && isset($row_style['style_custom_color'])) {
					$row_style_attr .= $row_style['style_custom_color'];
				}
				if (!empty($bg_color)) {
					//$row_style_attr .= 'background:'.$bg_color.'; ';
				}

				if (!empty($row_style_attr)) {
					$row_style_attr = ' style="'.$row_style_attr.'"';
				}

				?>

				<div class="<?php echo $row_class; ?>"<?php echo $row_style_attr; ?>>

					<?php foreach ($row_data as $uniqid => $column){ ?>

						<?php $content = preg_replace('/^<p>|<\/p>$/', '', do_shortcode($column['content'])); ?>
						<div class="<?php echo @$column['effect'] ?> <?php echo $column['front_css_class'] ?>"><?php echo $content ?></div>

					<?php } ?>

					<div class="clearfix"></div>

				</div>

		<?php if ($row_displaying === 'full_width') { ?>
			</div><!--/ .container-->

		</section>
		<?php } ?>

	<?php
	}

} 
