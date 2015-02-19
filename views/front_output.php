<?php
if (!defined('ABSPATH')) die('No direct access allowed');
global $post;

$first_row = current($tmm_layout_constructor_row);

foreach ($tmm_layout_constructor as $row => $row_data) {   
    
    if (!empty($row_data) && ($tmm_layout_constructor_row[$row]['lc_displaying']==$row_displaying)) {
        
		$row_style = TMM_Layout_Constructor::get_row_bg($tmm_layout_constructor_row, $row);
		
		$section_class = 'section padding-off';

		if ($tmm_layout_constructor_row[$row]['section_content']=='1'){
			$section_class .=' section-content';
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
		$section_style = 'style="';
		if ($margin_top != ''){
			$section_style .= 'margin-top:' . $margin_top . 'px;';
		}
		if ($margin_bottom != ''){
			$section_style .= 'margin-bottom:' . $margin_bottom . 'px;';
		}
		$section_style .= '"';

		if (($tmm_layout_constructor_row[$row]['full_width'] == 0)&&(($row_displaying=='full_width')||($row_displaying=='before_full_width'))){
			?>

			<div class="container">

		<?php
		}
		?>

		<div id="<?php echo 'section_'.$row ?>" class="<?php echo $section_class; ?>" <?php echo $section_style ?>>
                
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
                    
				if (isset($tmm_layout_constructor_row[$row]['bg_fullscreen']) && $tmm_layout_constructor_row[$row]['bg_fullscreen'] == true) {
					?>
					
					<div id="fullscreen" class="full-screen">
						
						<div class="fullscreen-entry">
							
						<?php
				}                                         
                            $bg_color = (isset($tmm_layout_constructor_row[$row]['bg_color'])) ? $tmm_layout_constructor_row[$row]['bg_color'] : '';                               
							$padding_top = (isset($tmm_layout_constructor_row[$row]['padding_top'])) ? $tmm_layout_constructor_row[$row]['padding_top'] : 0;                   
							$padding_bottom = (isset($tmm_layout_constructor_row[$row]['padding_bottom'])) ? $tmm_layout_constructor_row[$row]['padding_bottom'] : 0;
							$align  = (isset($tmm_layout_constructor_row[$row]['row_align'])) ? $tmm_layout_constructor_row[$row]['row_align'] : '';
							$row_center = (isset($tmm_layout_constructor_row[$row]['row_center'])&&($tmm_layout_constructor_row[$row]['row_center']==true)) ? true : false;
							
							$row_class = 'row';
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
								$row_style_attr = ' style="'.$row_style_attr.'"';
							}

							if ($tmm_layout_constructor_row[$row]['content_full_width'] == 0 && $tmm_layout_constructor_row[$row]['full_width'] != 0 && $row_displaying=='full_width'){
								?>
							
								<div class="container">
											
								<?php
							}                    
									?>	                       

									<div class="<?php echo $row_class; ?>"<?php echo $row_style_attr; ?>>

										<?php foreach ($row_data as $uniqid => $column){ ?>

											<?php $content = preg_replace('/^<p>|<\/p>$/', '', do_shortcode($column['content'])); ?>
											<div class="columns <?php echo (!empty($row_center)&&($row_center==true)) ? 'col-sm-push-2 col-sm-pull-2 ' :  ''?><?php echo @$column['effect'] ?> <?php echo $column['front_css_class'] ?>"><?php echo $content ?></div>

										<?php } ?>
												
										<div class="clearfix"></div>
												
									</div>
									
									<?php
							if ($tmm_layout_constructor_row[$row]['content_full_width'] == 0 && $tmm_layout_constructor_row[$row]['full_width'] != 0 && $row_displaying=='full_width'){
								?>
									
								</div><!--/ .container -->
										
								<?php
							}                    
                    
					if (isset($tmm_layout_constructor_row[$row]['bg_fullscreen']) && $tmm_layout_constructor_row[$row]['bg_fullscreen'] == true) {
							?>
								
                             </div><!--/ .fullscreen-entry-->
						
                        </div><!--/ .full-screen-->
						
						<?php
					}

			?>
                             
		</div><!--/ .section -->

    <?php
		if (($tmm_layout_constructor_row[$row]['full_width'] == 0)&&(($row_displaying=='full_width')||($row_displaying=='before_full_width'))){
			?>

			</div><!--/ .container-->

		<?php
		}
	} 

} 
