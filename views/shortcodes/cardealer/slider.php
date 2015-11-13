<div class="slider-container">
<div class="row">

	<?php if ($show_sidebar && $sidebar_position === 'left') { ?>

		<div class="col-md-4">

			<?php if (function_exists('dynamic_sidebar') ) dynamic_sidebar('cars_slider_sidebar'); ?>

		</div>

	<?php } ?>

	<?php
	if ($slider_type == 0) {

		wp_enqueue_script('tmm_flexslider');
		$featured_cars = TMM_Ext_PostType_Car::get_featured_cars($images_count);
		$slider_size = TMM_Ext_PostType_Car::slider_image_size($show_sidebar);
		$slider_id = 'slider_' . uniqid();

		if (!empty($featured_cars)) {
			?>

			<div id="<?php echo $slider_id; ?>" class="flexslider clearfix <?php echo $show_sidebar ? 'col-md-8' : 'col-xs-12'; ?>">

				<ul class="slides">

					<?php
					foreach ($featured_cars as $car_id => $car) {

						$car_fuel_type = tmm_get_car_option('fuel_type', $car_id);
						$car_transmission = tmm_get_car_option('transmission', $car_id);
						$car_body = tmm_get_car_option('body', $car_id);
						$car_engine_size = tmm_get_car_engine($car_id);
						$car_mileage = tmm_get_car_mileage($car_id);

						$slider_img_src = tmm_get_car_cover_image($car_id, 'homeslide', (int) $show_sidebar);

						if (!isset($placeholder)) {
							$placeholder = 0;
						}

						if (!isset($show_caption)) {
							$show_caption = 1;
						}

						if($placeholder){
							if(file_get_contents($slider_img_src)){
								$current_size = getimagesize($slider_img_src);
								if ($current_size[0] < $slider_size['width'] || $current_size[1] < $slider_size['height']) {
									$slider_img_src = 'http://placehold.it/' . $slider_size['width'] . 'x' . $slider_size['height'] . '/ccc/444/&amp;text=IMAGE has inappropriate DIMENSIONS (recommended '.$slider_size['width'].'x'.$slider_size['height'].')';
								}
							}
						}
						?>

						<li<?php if(!$placeholder) echo ' class="resized"' . ' style="width:' . $slider_size['width'] . 'px;height:' . $slider_size['height'] . 'px;"'; ?>>

							<img src="<?php echo $slider_img_src; ?>" alt="" />

							<?php if ($show_caption) { ?>

								<div class="caption">

									<div class="caption-entry">

										<dl class="auto-detailed clearfix">
											<dt>
												<span class="model">
													<a href="<?php echo get_permalink($car_id) ?>">
														<?php tmm_get_car_title($car_id, 1); ?>
													</a>
												</span>
											</dt>
											<?php if (!empty($car_body)) { ?>
											<dd class="media-hidden">
													<?php echo ' ' . $car_body; ?>
											</dd>
											<?php } ?>
											<?php if( !empty($car_engine_size) || !empty($car_fuel_type) || !empty($car_mileage) ){ ?>
											<dd class="media-hidden">
												<?php
												echo $car_engine_size . ' ';

												if(!empty($car_fuel_type)){
													echo $car_fuel_type;
													if(!empty($car_mileage)){
														echo ' ';
													}
												}

												echo esc_html( $car_mileage );
												?>
											</dd>
											<?php } ?>
											<?php if (!empty($car_transmission)) { ?>
											<dd class="media-hidden">
												<?php echo $car_transmission; ?>
											</dd>
											<?php } ?>
										</dl><!--/ .auto-detailed-->

										<span class="heading">
											<?php echo esc_html( tmm_get_car_price($car_id) ); ?>
										</span>

									</div><!--/ .caption-entry-->

								</div><!--/ .caption-->

							<?php } ?>

						</li>

					<?php } ?>

				</ul><!--/ .slides-->

				<?php
				$slider_opts = array(
					'animation' => $animation,
					'animationLoop' => $animation_loop,
					'slideshow' => $slideshow,
					'reverse' => $reverse, //Boolean: Reverse the animation direction
					'slideshowSpeed' => $slideshow_speed, //Integer: Set the speed of the slideshow cycling, in milliseconds
					'animationSpeed' => $animation_speed, //Integer: Set the speed of animations, in milliseconds
					'initDelay' => $init_delay, //Integer: Set an initialization delay, in milliseconds
					'randomize' => $randomize, //Boolean: Randomize slide order
					'controlNav' => true,
					'directionNav' => false,
					'easing' => 'swing', //String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
					'direction' => 'horizontal', //String: Select the sliding direction, "horizontal" or "vertical"
					'smoothHeight' => false, //Boolean: Allow height of the slider to animate smoothly in horizontal mode
					'startAt' => 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)
					'pauseOnAction' => true, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
					'pauseOnHover' => false, //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
					'useCSS' => true, //Boolean: Slider will use CSS3 transitions if available
					'touch' => true, //Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
					'video' => false, //Boolean: If using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches
				);
				?>

				<script type="text/javascript">

					jQuery(function() {
						jQuery('#<?php echo $slider_id; ?>').flexslider(<?php echo json_encode($slider_opts); ?>);
					});

				</script>

			</div><!--/ #slider-->

		<?php
		}

	} else {
		?>

		<div class="wrapper-slider <?php echo $show_sidebar ? 'col-md-8' : 'col-xs-12'; ?>">
			<?php
			$alias = TMM_Ext_PostType_Car::slider_image_size($show_sidebar, 1);
			$options = array(
				'enable_caption' => $show_caption,
				'animation' => $animation,
				'animation_loop' => $animation_loop,
				'slideshow' => $slideshow,
				'reverse' => $reverse,
				'slideshow_speed' => $slideshow_speed,
				'animation_speed' => $animation_speed,
				'init_delay' => $init_delay,
				'randomize' => $randomize,
			);
			echo TMM_Ext_Sliders::draw_group_slider($slider_type, 'flex', $alias['width'] . '*' . $alias['height'], $options);
			?>
		</div>

	<?php } ?>

	<?php if ($show_sidebar && $sidebar_position !== 'left') { ?>

		<div class="col-md-4">

			<?php if (function_exists('dynamic_sidebar') ) dynamic_sidebar('cars_slider_sidebar'); ?>

		</div>

	<?php } ?>

</div><!--/ .row-->
</div><!--/ .slider-container-->
