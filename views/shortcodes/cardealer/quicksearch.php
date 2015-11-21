<?php
wp_enqueue_script('tmm_composer_front');

$car_condition = 0;
$carlocation = array(0);
$carproducer = 0;
$carmodels = 0;
$car_price_min = 0;
$car_price_max = 0;
$car_year_from = $car_year_to = 'any';
$car_fuel_type = '';
$car_body = '';
$car_doors_count = 0;
$car_interrior_color = '';
$car_exterior_color = '';
$car_mileage_from = 0;
$car_mileage_to = 0;
$adv_params = array();
$car_transmission = '';
$widget_class = 'quicksearch-container';
$styles = '';

// Background Color
if (!empty($bg_color)) {
	$styles.="background-color: " . $bg_color . "; ";
}

// Styles
if (!empty($styles)) {
	$styles = ' style="' . $styles . '"';
}

if (!isset($button_position)) {
	$button_position = 3;
}

if (isset($search_widget_offset) && $search_widget_offset === 'none') {
	$widget_class .= ' no-padding';
}

if (isset($show_in_one_col)) {
	$widget_class .= ' one-column';
}

if (isset($_GET['car_condition'])) {
	$car_condition = $_GET['car_condition'];
}

if (isset($_GET['carlocation'])) {
	$carlocation = explode(',', $_GET['carlocation']);
	$carlocation = array_map('intval', $carlocation);
}

if (isset($_GET['carproducer'])) {
	$carproducer = $_GET['carproducer'];
}

if (isset($_GET['carmodels'])) {
	$carmodels = $_GET['carmodels'];
}

if (isset($_GET['car_price_min'])) {
	$car_price_min = $_GET['car_price_min'];
}

if (isset($_GET['car_price_max'])) {
	$car_price_max = $_GET['car_price_max'];
}

if (isset($_GET['car_year_from'])) {
	$car_year_from = $_GET['car_year_from'];
}

if (isset($_GET['car_year_to'])) {
	$car_year_to = $_GET['car_year_to'];
}

if (isset($_GET['car_body'])) {
	$car_body = $_GET['car_body'];
}

if (isset($_GET['car_doors_count'])) {
	$car_doors_count = $_GET['car_doors_count'];
}

if (isset($_GET['car_interrior_color'])) {
	$car_interrior_color = $_GET['car_interrior_color'];
}


if (isset($_GET['car_exterior_color'])) {
	$car_exterior_color = $_GET['car_exterior_color'];
}

if (isset($_GET['car_transmission'])) {
	$car_transmission = $_GET['car_transmission'];
}

if (isset($_GET['car_fuel_type'])) {
	$car_fuel_type = $_GET['car_fuel_type'];
}

if (isset($_GET['car_mileage_from'])) {
	$car_mileage_from = $_GET['car_mileage_from'];
}

if (isset($_GET['car_mileage_to'])) {
	$car_mileage_to = $_GET['car_mileage_to'];
}

if (isset($_GET['adv_params'])) {
	$adv_params = unserialize(base64_decode($_GET['adv_params']));
}

$searching_page = TMM_Helper::get_permalink_by_lang( TMM::get_option('searching_page', TMM_APP_CARDEALER_PREFIX) );
//get locations selects name
$locations_captions_on_search_widget = TMM::get_option('locations_captions_on_search_widget', TMM_APP_CARDEALER_PREFIX);
$locations_captions_on_search_widget = explode(',', $locations_captions_on_search_widget);
$uniqid = uniqid();
?>

<div class="<?php echo $widget_class ?>" <?php echo $styles ?>>

	<div class="quicksearch_load_area"></div>

	<form class="car_form_search" action="<?php echo $searching_page; ?>">

		<div class="row">
			<div class="col-md-4">
				<fieldset class="locations-level-<?php echo TMM_Ext_Car_Dealer::get_locations_max_level(); ?>">

					<!-- Location -->
					<?php if (!empty($show_location0)) { ?>
						<p>
							<label for="tmm_qs_location0_<?php echo $uniqid; ?>"><?php _e($locations_captions_on_search_widget[0], TMM_CC_TEXTDOMAIN); ?>:</label>
							<select id="tmm_qs_location0_<?php echo $uniqid; ?>" name="carlocation[0]" class="qs_carlocation0 carlocations">
								<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
								<?php
								$_REQUEST['location_id'] = 0;
								$_REQUEST['level'] = 0;
								TMM_Ext_PostType_Car::draw_quicksearch_locations(false, $carlocation[0]); //print options of select
								?>
							</select>
						</p>
					<?php } else if(!empty($show_location1) || !empty($show_location2)) { ?>

						<input type="hidden" value="<?php echo isset($selected_location0) ? $selected_location0 : 0; ?>" class="qs_carlocation0 carlocations">

					<?php } ?>

					<?php
					for ($i = 1; $i < TMM_Ext_Car_Dealer::get_locations_max_level(); $i++) {
						$var_show_location = 'show_location'.$i;
						$var_show_location_prev = 'show_location'.($i-1);
						$var_selected_location_prev = 'selected_location'.($i-1);

						if (!empty($$var_show_location)) {

							if ( (!isset($$var_show_location_prev) || !$$var_show_location_prev) && !empty($$var_selected_location_prev) ) {
								$carlocation[$i-1] = $$var_selected_location_prev;
							}

							if (isset($carlocation[$i-1]) && $carlocation[$i-1] != 0) {

								$parent_id = $carlocation[0];
								if ($i > 1 && isset($carlocation[$i - 1])) {
									$parent_id = $carlocation[$i - 1];
								}
								?>
								<p>
									<label for="tmm_qs_location<?php echo $i.'_'.$uniqid; ?>"><?php _e($locations_captions_on_search_widget[$i], TMM_CC_TEXTDOMAIN); ?>:</label>
									<select id="tmm_qs_location<?php echo $i.'_'.$uniqid; ?>" class="qs_carlocation<?php echo $i ?> carlocations" name="carlocation[<?php echo $i ?>]" data-level="<?php echo ($i ) ?>">
										<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
										<?php
										$_REQUEST['parent_id'] = $parent_id;
										$_REQUEST['level'] = $i;
										$selected = 0;
										if (isset($carlocation[$i])) {
											$selected = $carlocation[$i];
										}
										TMM_Ext_PostType_Car::draw_quicksearch_locations(false, $selected); //print options of select
										?>
									</select>
								</p>

							<?php }else{ ?>

								<p>
									<label for="tmm_qs_location<?php echo $i.'_'.$uniqid; ?>"><?php _e(@$locations_captions_on_search_widget[$i], TMM_CC_TEXTDOMAIN); ?>:</label>
									<select id="tmm_qs_location<?php echo $i.'_'.$uniqid; ?>" class="qs_carlocation<?php echo $i ?> carlocations" name="carlocation[<?php echo $i ?>]" disabled="" data-level="<?php echo $i ?>">
										<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									</select>
								</p>

							<?php }

						} else if ($show_location2 && !$show_location1) {
							?>

							<input type="hidden" value="<?php echo isset($selected_location1) ? $selected_location1 : 0; ?>" class="qs_carlocation1 carlocations">

						<?php
						}

					}
					?>

					<!-- Condition -->
					<?php if (!empty($show_condition)) { ?>
						<p>
							<label for="tmm_qs_condition_<?php echo $uniqid; ?>"><?php _e('Condition', TMM_CC_TEXTDOMAIN) ?>:</label>
							<select id="tmm_qs_condition_<?php echo $uniqid; ?>" class="qs_condition" name="car_condition">
								<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
								<option value="car_is_new"     <?php selected($car_condition, 'car_is_new');      ?>><?php _e("Only new cars", TMM_CC_TEXTDOMAIN) ?></option>
								<option value="car_is_damaged" <?php selected($car_condition, 'car_is_damaged');  ?>><?php _e("Only damaged cars", TMM_CC_TEXTDOMAIN) ?></option>
								<option value="car_is_used"    <?php selected($car_condition, 'car_is_used');     ?>><?php _e("Only used cars", TMM_CC_TEXTDOMAIN) ?></option>
							</select>
						</p>
					<?php } ?>

				</fieldset>

				<!-- Make & Model-->
				<?php if (!empty($show_makes)) { ?>
				<fieldset>
					<div class="row">
						<div class="col-xs-6">
							<p>
								<label for="tmm_qs_make_<?php echo $uniqid; ?>"><?php _e("Make", TMM_CC_TEXTDOMAIN) ?>:</label>
								<select id="tmm_qs_make_<?php echo $uniqid; ?>" class="qs_carproducer" name="carproducer">
									<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									<?php
									$_REQUEST['location_id'] = $carlocation[0];
									if(isset($carlocation[2])){
										$_REQUEST['level'] = 3;
										$_REQUEST['selected_region_id'] = $carlocation[2];
									}else if(isset($carlocation[1])){
										$_REQUEST['level'] = 2;
										$_REQUEST['selected_region_id'] = $carlocation[1];
									}else{
										$_REQUEST['level'] = 0;
										$_REQUEST['selected_region_id'] = 0;
									}
									?>
									<?php echo TMM_Ext_PostType_Car::draw_quicksearch_producers(false, $carproducer); ?>
								</select>
							</p>
						</div>
						<div class="col-xs-6">
							<p>
								<label for="tmm_qs_model_<?php echo $uniqid; ?>"><?php _e("Model", TMM_CC_TEXTDOMAIN) ?>:</label>
								<select id="tmm_qs_model_<?php echo $uniqid; ?>" class="qs_carmodel" name="carmodels" <?php if ($carproducer == 0) { ?>disabled=""<?php } ?>>
									<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									<?php
									if ($carproducer > 0) {

										$_REQUEST['producer_id'] = $carproducer;
										$_REQUEST['location_id'] = $carlocation[0];
										$_REQUEST['selected_model'] = $carmodels;
										if(isset($carlocation[2])){
											$_REQUEST['level'] = 3;
											$_REQUEST['selected_region_id'] = $carlocation[2];
										}else if(isset($carlocation[1])){
											$_REQUEST['level'] = 2;
											$_REQUEST['selected_region_id'] = $carlocation[1];
										}else{
											$_REQUEST['level'] = 0;
											$_REQUEST['selected_region_id'] = 0;
										}

										echo TMM_Ext_PostType_Car::draw_quicksearch_models(false);

									} ?>
								</select>
							</p>
						</div>
					</div>
				</fieldset>
				<?php } ?>

				<?php if ($button_position == 1) { ?>
					<input class="button orange submit-search" type="submit" value="<?php _e("Search", TMM_CC_TEXTDOMAIN) ?>">

					<?php if (!empty($show_advanced_options)) { ?>

						<div class="advanced-row">
							<span>
								<a href="#" class="car_adv_search_btn"><?php _e("Advanced", TMM_CC_TEXTDOMAIN) ?></a>
							</span>
						</div><!--/ .advanced-row-->

					<?php } ?>
				<?php } ?>

			</div>
			<div class="col-md-4">

				<!-- Price Range-->
				<?php if (!empty($show_price_range)) { ?>
					<fieldset>
						<div class="row">
							<div class="col-xs-6">
								<p>
									<label for="tmm_qs_price_min_<?php echo $uniqid; ?>"><?php _e("Price", TMM_CC_TEXTDOMAIN) ?> (<?php echo TMM_Ext_Car_Dealer::$default_currency['symbol'] ?>) <span><?php _e("min", TMM_CC_TEXTDOMAIN) ?></span>:</label>
									<input id="tmm_qs_price_min_<?php echo $uniqid; ?>" type="text" name="car_price_min" value="<?php echo $car_price_min ?>" />
								</p>
							</div>
							<div class="col-xs-6">
								<p>
									<label for="tmm_qs_price_max_<?php echo $uniqid; ?>"><?php _e("Price", TMM_CC_TEXTDOMAIN) ?> (<?php echo TMM_Ext_Car_Dealer::$default_currency['symbol'] ?>) <span><?php _e("max", TMM_CC_TEXTDOMAIN) ?></span>:</label>
									<input id="tmm_qs_price_max_<?php echo $uniqid; ?>" type="text" name="car_price_max" value="<?php echo $car_price_max ?>" />
								</p>
							</div>
						</div>
					</fieldset>
				<?php } ?>

				<!-- Year Range-->
				<?php if (!empty($show_year_range)) { ?>
					<fieldset>
						<div class="row">
							<div class="col-xs-6">
								<p>
									<label for="tmm_qs_year_from_<?php echo $uniqid; ?>"><?php _e("Year", TMM_CC_TEXTDOMAIN) ?> <span><?php _e("from", TMM_CC_TEXTDOMAIN) ?></span>:</label>
									<?php
									$now = (int) date("Y");
									$years = array('any' => __("Any", TMM_CC_TEXTDOMAIN));
									for ($i = $now; $i >= 1900; $i--) {
										$years[$i] = $i;
									}
									?>
									<select id="tmm_qs_year_from_<?php echo $uniqid; ?>" name="car_year_from">
										<?php foreach ($years as $k=>$y) { ?>
											<option <?php echo($car_year_from == $y ? "selected" : "") ?> value="<?php echo $k ?>"><?php echo $y ?></option>
										<?php } ?>
									</select>
								</p>
							</div>
							<div class="col-xs-6">
								<p>
									<label for="tmm_qs_year_to_<?php echo $uniqid; ?>"><?php _e("Year", TMM_CC_TEXTDOMAIN) ?> <span><?php _e("to", TMM_CC_TEXTDOMAIN) ?></span>:</label>
									<?php
									$now = (int) date("Y");
									$years = array('any' => __("Any", TMM_CC_TEXTDOMAIN));
									for ($i = $now; $i >= 1900; $i--) {
										$years[$i] = $i;
									}
									?>
									<select id="tmm_qs_year_to_<?php echo $uniqid; ?>" name="car_year_to">
										<?php foreach ($years as $k=>$y) { ?>
											<option <?php echo($car_year_to == $y ? "selected" : "") ?> value="<?php echo $k ?>"><?php echo $y ?></option>
										<?php } ?>
									</select>
								</p>
							</div>
						</div>
					</fieldset>
				<?php } ?>

				<!-- Mileage Range-->
				<?php if (!empty($show_mileage)) { ?>
					<fieldset>
						<div class="row">
							<div class="col-xs-6">
								<p>
									<label for="tmm_qs_mileage_from_<?php echo $uniqid; ?>"><?php _e("Mileage", TMM_CC_TEXTDOMAIN) ?> <span><?php _e("from", TMM_CC_TEXTDOMAIN) ?>:</span></label>
									<input id="tmm_qs_mileage_from_<?php echo $uniqid; ?>" type="text" name="car_mileage_from" value="<?php echo $car_mileage_from ?>" />
								</p>
							</div>
							<div class="col-xs-6">
								<p>
									<label for="tmm_qs_mileage_to_<?php echo $uniqid; ?>"><?php _e("Mileage", TMM_CC_TEXTDOMAIN) ?> <span><?php _e("to", TMM_CC_TEXTDOMAIN) ?>:</span></label>
									<input id="tmm_qs_mileage_to_<?php echo $uniqid; ?>" type="text" name="car_mileage_to" value="<?php echo $car_mileage_to ?>" />
								</p>
							</div>
						</div>
					</fieldset>
				<?php } ?>

				<?php if ($button_position == 2) { ?>
					<input class="button orange submit-search" type="submit" value="<?php _e("Search", TMM_CC_TEXTDOMAIN) ?>">

					<?php if (!empty($show_advanced_options)) { ?>

						<div class="advanced-row">
							<span>
								<a href="#" class="car_adv_search_btn"><?php _e("Advanced", TMM_CC_TEXTDOMAIN) ?></a>
							</span>
						</div><!--/ .advanced-row-->

					<?php } ?>
				<?php } ?>

			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-xs-6">
						<!-- Fuel Type-->
						<?php if (!empty($show_fuel_type)) { ?>
							<p>
								<label for="tmm_qs_fuel_type_<?php echo $uniqid; ?>"><?php _e("Fuel Type", TMM_CC_TEXTDOMAIN) ?></label>
								<?php $fuel_types = TMM_Ext_PostType_Car::$car_options['fuel_type']; ?>
								<select id="tmm_qs_fuel_type_<?php echo $uniqid; ?>" name="car_fuel_type">
									<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									<?php if (!empty($fuel_types)) { ?>
										<?php foreach ($fuel_types as $fuel_type => $fuel_type_name) { ?>
											<option <?php selected($car_fuel_type, $fuel_type); ?> value="<?php echo $fuel_type ?>"><?php _e($fuel_type_name, TMM_CC_TEXTDOMAIN); ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</p>
						<?php } ?>
					</div>
					<div class="col-xs-6">
						<!-- Transmission-->
						<?php if (!empty($show_transmission)) { ?>
							<p>
								<label for="tmm_qs_gearbox_<?php echo $uniqid; ?>"><?php _e("Gearbox", TMM_CC_TEXTDOMAIN) ?></label>
								<?php $car_transmissions = TMM_Ext_PostType_Car::$car_options['transmission']; ?>
								<select id="tmm_qs_gearbox_<?php echo $uniqid; ?>" name="car_transmission">
									<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									<?php if (!empty($car_transmissions)) { ?>
										<?php foreach ($car_transmissions as $transmission => $transmission_name) { ?>
											<option <?php selected($car_transmission, $transmission); ?> value="<?php echo $transmission ?>"><?php _e($transmission_name, TMM_CC_TEXTDOMAIN); ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</p>
						<?php } ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<!-- Body Type-->
						<?php if (!empty($show_body_type)) { ?>
							<p>
								<label for="tmm_qs_body_type_<?php echo $uniqid; ?>"><?php _e("Body Type", TMM_CC_TEXTDOMAIN) ?></label>
								<?php $carbodies = TMM_Ext_PostType_Car::$car_options['body']; ?>
								<select id="tmm_qs_body_type_<?php echo $uniqid; ?>" name="car_body">
									<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									<?php if (!empty($carbodies)) { ?>
										<?php foreach ($carbodies as $carbody_key => $carbody_name) { ?>
											<option <?php selected($car_body, $carbody_key); ?> value="<?php echo $carbody_key ?>"><?php _e($carbody_name, TMM_CC_TEXTDOMAIN); ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</p>
						<?php } ?>
					</div>
					<div class="col-xs-6">
						<!-- Doors Count-->
						<?php if (!empty($show_doors_count)) { ?>
							<p>
								<label for="tmm_qs_doors_<?php echo $uniqid; ?>"><?php _e("Door Count", TMM_CC_TEXTDOMAIN) ?></label>
								<select id="tmm_qs_doors_<?php echo $uniqid; ?>" name="car_doors_count">
									<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									<?php for ($i = TMM_Ext_PostType_Car::$car_options['min_doors_count']; $i <= TMM_Ext_PostType_Car::$car_options['max_doors_count']; $i++) { ?>
										<option <?php echo($car_doors_count == $i ? "selected" : "") ?> value="<?php echo $i ?>"><?php echo $i ?></option>
									<?php } ?>
								</select>
							</p>
						<?php } ?>
					</div>
				</div>

				<!-- Exterior/Interior Colors-->
				<?php if(!empty($show_colors)) { ?>

					<?php
					$car_int_colors = TMM_Ext_PostType_Car::$car_options['interior_color'];
					$car_ext_colors = TMM_Ext_PostType_Car::$car_options['exterior_color'];
					?>

					<div class="row">
						<div class="col-xs-6">
							<p>
								<label for="tmm_qs_interrior_color_<?php echo $uniqid; ?>"><?php _e("Interior Color", TMM_CC_TEXTDOMAIN) ?></label>
								<select id="tmm_qs_interrior_color_<?php echo $uniqid; ?>" name="car_interrior_color">
									<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									<?php if (!empty($car_int_colors)) { ?>
										<?php foreach ($car_int_colors as $color => $color_name) { ?>
											<option <?php selected($car_interrior_color, $color); ?> value="<?php echo $color ?>"><?php _e($color_name, TMM_CC_TEXTDOMAIN); ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</p>
						</div>
						<div class="col-xs-6">
							<p>
								<label for="tmm_qs_exterior_color_<?php echo $uniqid; ?>"><?php _e("Exterior Color", TMM_CC_TEXTDOMAIN) ?></label>
								<select id="tmm_qs_exterior_color_<?php echo $uniqid; ?>" name="car_exterior_color">
									<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									<?php if (!empty($car_ext_colors)) { ?>
										<?php foreach ($car_ext_colors as $color => $color_name) { ?>
											<option <?php selected($car_exterior_color, $color); ?> value="<?php echo $color ?>"><?php _e($color_name, TMM_CC_TEXTDOMAIN); ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</p>
						</div>
					</div>

				<?php } ?>

				<?php if ($button_position == 3) { ?>

					<input class="button orange submit-search" type="submit" value="<?php _e("Search", TMM_CC_TEXTDOMAIN) ?>">

					<?php if (!empty($show_advanced_options)) { ?>

						<div class="advanced-row">
							<span>
								<a href="#" class="car_adv_search_btn"><?php _e("Advanced", TMM_CC_TEXTDOMAIN) ?></a>
							</span>
						</div><!--/ .advanced-row-->

					<?php } ?>
				<?php } ?>

			</div>
		</div>

	</form><!--/ .form-panel-->

	<?php if (!empty($show_advanced_options)) { ?>

	<form class="advanced_car_search_panel" action="/">

		<div class="car_adv_search hide">

			<?php foreach (TMM_Ext_PostType_Car::$specifications_array as $specification_key => $block_name) { ?>

				<?php $attributes_array = TMM_Ext_PostType_Car::get_attribute_constructors($specification_key); ?>

				<?php if (!empty($attributes_array)) { ?>
				<h4><?php _e($block_name, TMM_CC_TEXTDOMAIN); ?></h4>
				<?php } ?>

				<?php foreach ($attributes_array as $key => $value) { ?>

					<?php if ($value['type'] == 'checkbox') { ?>

						<fieldset class="field-check">
							<p>
								<input id="<?php echo $key.'_'.$uniqid; ?>" type="checkbox" <?php echo (isset($adv_params['advanced'][$specification_key][$key]) && $adv_params['advanced'][$specification_key][$key]) ? 'checked=""' : ''; ?> class="js_option_checkbox" value="<?php echo (isset($adv_params['advanced'][$specification_key][$key]) && $adv_params['advanced'][$specification_key][$key]) ? '1' : '0'; ?>" name="advanced[<?php echo $specification_key ?>][<?php echo $key ?>]">
								<label class="check" for="<?php echo $key.'_'.$uniqid; ?>">
									<strong><?php _e($value['name'], TMM_CC_TEXTDOMAIN); ?></strong>
									<?php if (!empty($value['description'])) { ?>
										<i class="description"><?php _e($value['description'], TMM_CC_TEXTDOMAIN); ?></i>
									<?php } ?>
								</label>
							</p>
						</fieldset>

					<?php } ?>

					<?php if ($value['type'] == 'select') { ?>

						<fieldset class="field-select">
							<p>
								<label for="<?php echo $key.'_'.$uniqid; ?>">
									<?php _e($value['name'], TMM_CC_TEXTDOMAIN); ?>
									<?php if (!empty($value['description'])) { ?>
										<span data-description="<?php _e($value['description'], TMM_CC_TEXTDOMAIN); ?>"></span>
									<?php } ?>
								</label>

								<select id="<?php echo $key.'_'.$uniqid; ?>" name="advanced[<?php echo $specification_key ?>][<?php echo $key ?>]">
									<option value="0"><?php _e("Any", TMM_CC_TEXTDOMAIN) ?></option>
									<?php foreach ($value['values'] as $val_key => $val_name) { ?>
										<option <?php if (isset($adv_params['advanced'][$specification_key][$key]) && $adv_params['advanced'][$specification_key][$key] == $val_key) { ?>selected<?php } ?> value="<?php echo $val_key ?>"><?php _e($val_name, TMM_CC_TEXTDOMAIN); ?></option>
									<?php } ?>
								</select>
							</p>
						</fieldset>

					<?php } ?>

				<?php } ?>

			<?php } ?>

			<div class="clearfix"></div>

			<input class="button orange submit-search" type="submit" value="<?php _e("Search", TMM_CC_TEXTDOMAIN) ?>">

			<div class="clearfix"></div>

		</div>

	</form><!--/ .advanced_car_search_panel-->

	<?php } ?>

</div><!--/ .quicksearch-container-->