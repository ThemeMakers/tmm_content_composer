<?php if ( !defined('ABSPATH') ) exit;

wp_enqueue_script('tmm_composer_front');

$site_locale = substr(get_locale(), 0, 2);

if($site_locale !== 'en') {
	wp_enqueue_script( 'tmm_select_locale', TMM_CC_URL . 'js/i18n/' . $site_locale . '.js', array ( 'jquery' ), false, true);
}

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
	$styles .= "background-color: " . $bg_color . "; ";
}

// Styles
if (!empty($styles)) {
	$styles = ' style="' . $styles . '"';
}

if (isset($search_widget_offset) && $search_widget_offset === 'none') {
	$widget_class .= ' no-padding';
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

$mileage_unit = (! empty( tmm_get_car_mileage_unit() ) ? tmm_get_car_mileage_unit() : 'miles');
?>

<div class="<?php echo esc_attr( $widget_class ) ?>" <?php echo wp_kses( $styles, array('style' => array()) ); ?>>

	<div class="form_load_area">
		<div class="cardealer-spinner"><div></div><div></div><div></div><div></div><div></div></div>
	</div>

	<form class="car_form_search" action="<?php echo esc_attr( $searching_page ) ?>">

		<!-- Location -->
		<div class="fieldset">
			<label><?php esc_html_e("Location", 'tmm_content_composer') ?></label>
			<?php if (!empty($show_location0)) { ?>
				<p>
					<select class="qs_carlocation0 carlocations"
					        name="carlocation[0]"
					        data-placeholder="<?php esc_html_e( $locations_captions_on_search_widget[0], 'tmm_content_composer' ); ?>"
					        data-location0="<?php echo esc_attr( $carlocation[0] ) ?>">
						<option value="0"><?php esc_html_e( $locations_captions_on_search_widget[0], 'tmm_content_composer' ); ?></option>
					</select>
				</p>
			<?php } else if(!empty($show_location1) || !empty($show_location2)) { ?>

				<input type="hidden" value="<?php echo !empty($selected_location0) ? $selected_location0 : 0; ?>" class="qs_carlocation0 carlocations">

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


						$data_attr = ' data-location'.($i-1).'=' . $carlocation[$i-1] . ' data-location'.$i.'=' . (isset($carlocation[$i]) ? $carlocation[$i] : 0);
						?>
						<p>
							<select class="qs_carlocation<?php echo esc_attr( $i ) ?> carlocations"
							        name="carlocation[<?php echo esc_attr( $i ) ?>]"
							        data-level="<?php echo esc_attr( $i ) ?>"
							        data-placeholder="<?php esc_html_e( $locations_captions_on_search_widget[ $i ], 'tmm_content_composer' ); ?>"
									<?php echo esc_attr( $data_attr ) ?>>
								<option value="0"><?php esc_html_e( $locations_captions_on_search_widget[ $i ], 'tmm_content_composer' ); ?></option>
							</select>
						</p>

					<?php } else { ?>

						<p>
							<select class="qs_carlocation<?php echo esc_attr( $i ) ?> carlocations"
							        name="carlocation[<?php echo esc_attr( $i ) ?>]"
							        disabled
							        data-placeholder="<?php esc_html_e( $locations_captions_on_search_widget[ $i ], 'tmm_content_composer' ); ?>"
							        data-level="<?php echo esc_attr( $i ) ?>">
								<option value="0"><?php esc_html_e( $locations_captions_on_search_widget[ $i ], 'tmm_content_composer' ); ?></option>
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
		</div>

		<!-- Condition -->
		<?php if (!empty($show_condition)) {
			$condition_list = tmm_get_car_condition_list();
			?>
		<div class="fieldset">
			<p>
				<label for="tmm_qs_condition_<?php echo esc_attr( $uniqid ) ?>"><?php esc_html_e('Condition', 'tmm_content_composer') ?>:</label>
				<select id="tmm_qs_condition_<?php echo esc_attr( $uniqid ) ?>" class="qs_condition" name="car_condition">
					<option value="0"><?php esc_html_e("Any", 'tmm_content_composer') ?></option>
					<?php
					foreach ($condition_list as $cond_id => $cond_name) {
						echo '<option value="'.$cond_id.'"' . selected($car_condition, $cond_id, false) . '>'
							. sprintf( __("Only %s cars", 'tmm_content_composer'), strtolower( __($cond_name, 'tmm_content_composer') ) )
							. '</option>';
					}
					?>
				</select>
			</p>
		</div>
		<?php } ?>

		<?php
		if(isset($carlocation[2])){
			$_level = 3;
			$_selected_region_id = $carlocation[2];
		}else if(isset($carlocation[1])){
			$_level = 2;
			$_selected_region_id = $carlocation[1];
		}else{
			$_level = 0;
			$_selected_region_id = 0;
		}
		?>

		<!-- Make & Model-->
		<?php if (!empty($show_makes)) { ?>

		<div class="fieldset">
			<p>
				<label for="tmm_qs_make_<?php echo esc_attr( $uniqid ) ?>"><?php esc_html_e("Make", 'tmm_content_composer') ?>:</label>
				<select id="tmm_qs_make_<?php echo esc_attr( $uniqid ) ?>" class="qs_carproducer" name="carproducer" data-make="<?php echo esc_attr( $carproducer ) ?>" data-location="<?php echo esc_attr( $carlocation[0] ) ?>" data-region="<?php echo esc_attr( $_selected_region_id ) ?>" data-level="<?php echo esc_attr( $_level ) ?>">
					<option value="0"><?php esc_html_e("Any", 'tmm_content_composer') ?></option>
				</select>
			</p>

			<p>
				<label for="tmm_qs_model_<?php echo esc_attr( $uniqid ) ?>"><?php esc_html_e("Model", 'tmm_content_composer') ?>:</label>
				<select id="tmm_qs_model_<?php echo esc_attr( $uniqid ) ?>" class="qs_carmodel" name="carmodels" <?php if ($carproducer == 0) { ?>disabled=""<?php } ?>  data-make="<?php echo esc_attr( $carproducer ) ?>" data-location="<?php echo esc_attr( $carlocation[0] ) ?>" data-region="<?php echo esc_attr( $_selected_region_id ) ?>" data-level="<?php echo esc_attr( $_level ) ?>" data-model="<?php echo esc_attr( $carmodels ) ?>">
					<option value="0"><?php esc_html_e("Any", 'tmm_content_composer') ?></option>
				</select>
			</p>
		</div>

		<?php } ?>

		<!-- Price Range-->
		<?php if (!empty($show_price_range)) { ?>
		<div class="fieldset">
			<label><?php esc_html_e("Price", 'tmm_content_composer') ?> (<?php echo TMM_Ext_Car_Dealer::$default_currency['symbol'] ?>) <span><?php esc_html_e("min/max", 'tmm_content_composer') ?></span></label>
			<p>
				<input type="number" name="car_price_min" value="<?php echo esc_attr( $car_price_min ) ?>" />
			</p>

			<p>
				<input type="number" name="car_price_max" value="<?php echo esc_attr( $car_price_max ) ?>" />
			</p>
		</div>
		<?php } ?>

		<!-- Year Range-->
		<?php if (!empty($show_year_range)) { ?>
		<div class="fieldset">
			<label><?php esc_html_e("Year", 'tmm_content_composer') ?></label>
			<p>
				<?php
				$now = (int) date("Y") + 1;
				$years = array('any' => esc_html__("min", 'tmm_content_composer'));
				for ($i = $now; $i >= 1900; $i--) {
					$years[$i] = $i;
				}
				?>
				<select name="car_year_from">
					<?php foreach ($years as $k=>$y) { ?>
						<option <?php echo($car_year_from == $y ? "selected" : "") ?> value="<?php echo esc_attr( $k ) ?>"><?php echo esc_attr( $y ) ?></option>
					<?php } ?>
				</select>
			</p>

			<p>
				<?php
				$now = (int) date("Y") + 1;
				$years = array('any' => esc_html__("max", 'tmm_content_composer'));
				for ($i = $now; $i >= 1900; $i--) {
					$years[$i] = $i;
				}
				?>
				<select name="car_year_to">
					<?php foreach ($years as $k=>$y) { ?>
						<option <?php echo($car_year_to == $y ? "selected" : "") ?> value="<?php echo esc_attr( $k ) ?>"><?php echo esc_attr( $y ) ?></option>
					<?php } ?>
				</select>
			</p>
		</div>
		<?php } ?>

		<!-- Mileage Range-->
		<?php if (!empty($show_mileage)) { ?>
		<div class="fieldset">
			<label><?php ($mileage_unit == 'km') ? esc_html_e('Kilometer', 'tmm_content_composer') : esc_html_e('Mileage', 'tmm_content_composer') ?> <span><?php esc_html_e("min/max", 'tmm_content_composer') ?></span></label>
			<p>
				<input type="number" name="car_mileage_from" value="<?php echo esc_attr( $car_mileage_from ) ?>" />
			</p>
			<p>
				<input type="number" name="car_mileage_to" value="<?php echo esc_attr( $car_mileage_to ) ?>" />
			</p>
		</div>
		<?php } ?>

		<!-- Fuel Type-->
		<div class="fieldset">
		<?php if (!empty($show_fuel_type)) { ?>
			<p>
				<label for="tmm_qs_fuel_type_<?php echo esc_attr( $uniqid ) ?>"><?php esc_html_e("Fuel Type", 'tmm_content_composer') ?></label>
				<?php $fuel_types = TMM_Ext_PostType_Car::$car_options['fuel_type']; ?>
				<select id="tmm_qs_fuel_type_<?php echo esc_attr( $uniqid ) ?>" name="car_fuel_type">
					<option value="0"><?php esc_html_e("Any", 'tmm_content_composer') ?></option>
					<?php if (!empty($fuel_types)) { ?>
						<?php foreach ($fuel_types as $fuel_type => $fuel_type_name) { ?>
							<option <?php selected($car_fuel_type, $fuel_type); ?> value="<?php echo esc_attr( $fuel_type ) ?>"><?php esc_html_e($fuel_type_name, 'tmm_content_composer'); ?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</p>
		<?php } ?>

		<!-- Transmission-->
		<?php if (!empty($show_transmission)) { ?>
			<p>
				<label for="tmm_qs_gearbox_<?php echo esc_attr( $uniqid ) ?>"><?php esc_html_e("Gearbox", 'tmm_content_composer') ?></label>
				<?php $car_transmissions = TMM_Ext_PostType_Car::$car_options['transmission']; ?>
				<select id="tmm_qs_gearbox_<?php echo esc_attr( $uniqid ) ?>" name="car_transmission">
					<option value="0"><?php esc_html_e("Any", 'tmm_content_composer') ?></option>
					<?php if (!empty($car_transmissions)) { ?>
						<?php foreach ($car_transmissions as $transmission => $transmission_name) { ?>
							<option <?php selected($car_transmission, $transmission); ?> value="<?php echo esc_attr( $transmission ) ?>"><?php esc_html_e($transmission_name, 'tmm_content_composer'); ?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</p>
		<?php } ?>
		</div>

		<!-- Body Type-->
		<div class="fieldset">
		<?php if (!empty($show_body_type)) { ?>
			<p>
				<label for="tmm_qs_body_type_<?php echo esc_attr( $uniqid ) ?>"><?php esc_html_e("Body Type", 'tmm_content_composer') ?></label>
				<?php $carbodies = TMM_Ext_PostType_Car::$car_options['body']; ?>
				<select id="tmm_qs_body_type_<?php echo esc_attr( $uniqid ) ?>" name="car_body">
					<option value="0"><?php esc_html_e("Any", 'tmm_content_composer') ?></option>
					<?php if (!empty($carbodies)) { ?>
						<?php foreach ($carbodies as $carbody_key => $carbody_name) { ?>
							<option <?php selected($car_body, $carbody_key); ?> value="<?php echo esc_attr( $carbody_key ) ?>"><?php esc_html_e($carbody_name, 'tmm_content_composer'); ?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</p>
		<?php } ?>

		<!-- Doors Count-->
		<?php if (!empty($show_doors_count)) { ?>
			<p>
				<label for="tmm_qs_doors_<?php echo esc_attr( $uniqid ) ?>"><?php esc_html_e("Door Count", 'tmm_content_composer') ?></label>
				<select id="tmm_qs_doors_<?php echo esc_attr( $uniqid ) ?>" name="car_doors_count">
					<option value="0"><?php esc_html_e("Any", 'tmm_content_composer') ?></option>
					<?php for ($i = TMM_Ext_PostType_Car::$car_options['min_doors_count']; $i <= TMM_Ext_PostType_Car::$car_options['max_doors_count']; $i++) { ?>
						<option <?php echo($car_doors_count == $i ? "selected" : "") ?> value="<?php echo esc_attr( $i ) ?>"><?php echo esc_attr( $i ) ?></option>
					<?php } ?>
				</select>
			</p>
		<?php } ?>
		</div>

		<!-- Exterior/Interior Colors-->
		<?php if(!empty($show_colors)) { ?>
		<div class="fieldset">
			<label><?php esc_html_e("Color", 'tmm_content_composer') ?></label>
			<?php
			$car_int_colors = TMM_Ext_PostType_Car::$car_options['interior_color'];
			$car_ext_colors = TMM_Ext_PostType_Car::$car_options['exterior_color'];
			?>

			<p>
				<select name="car_interrior_color">
					<option value="0"><?php esc_html_e("Interior", 'tmm_content_composer') ?></option>
					<?php if (!empty($car_int_colors)) { ?>
						<?php foreach ($car_int_colors as $color => $color_name) { ?>
							<option <?php selected($car_interrior_color, $color); ?> value="<?php echo esc_attr( $color ) ?>"><?php esc_html_e($color_name, 'tmm_content_composer'); ?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</p>

			<p>
				<select name="car_exterior_color">
					<option value="0"><?php esc_html_e("Exterior", 'tmm_content_composer') ?></option>
					<?php if (!empty($car_ext_colors)) { ?>
						<?php foreach ($car_ext_colors as $color => $color_name) { ?>
							<option <?php selected($car_exterior_color, $color); ?> value="<?php echo esc_attr( $color ) ?>"><?php esc_html_e($color_name, 'tmm_content_composer'); ?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</p>
		</div>
		<?php } ?>

		<div class="fieldset flex-end">

			<?php if (!empty($show_advanced_options)) { ?>

				<div class="advanced-row">
				<span>
					<a href="#" class="car_adv_search_btn"><?php esc_html_e("Advanced", 'tmm_content_composer') ?></a>
				</span>
				</div><!--/ .advanced-row-->

			<?php } ?>

			<input class="button orange submit-search" type="submit" value="<?php esc_html_e("Search", 'tmm_content_composer') ?>">

		</div>

	</form><!--/ .form-panel-->

	<?php if (!empty($show_advanced_options)) { ?>

	<form class="advanced_car_search_panel" action="/">

		<div class="car_adv_search hide">

			<?php foreach (TMM_Ext_PostType_Car::$specifications_array as $specification_key => $block_name) { ?>

				<?php $attributes_array = TMM_Ext_PostType_Car::get_attribute_constructors($specification_key); ?>

				<?php if (!empty($attributes_array)) { ?>
				<h4><?php esc_html_e($block_name, 'tmm_content_composer'); ?></h4>
				<?php } ?>

				<?php foreach ($attributes_array as $key => $value) { ?>

					<?php if ($value['type'] == 'checkbox') { ?>

						<fieldset class="field-check">
							<p>
								<input id="<?php echo esc_attr( $key ) . '_' . esc_attr( $uniqid ) ?>" type="checkbox" <?php echo (isset($adv_params['advanced'][$specification_key][$key]) && $adv_params['advanced'][$specification_key][$key]) ? 'checked=""' : ''; ?> class="js_option_checkbox" value="<?php echo (isset($adv_params['advanced'][$specification_key][$key]) && $adv_params['advanced'][$specification_key][$key]) ? '1' : '0'; ?>" name="advanced[<?php echo esc_attr( $specification_key) ?>][<?php echo esc_attr( $key ) ?>]">
								<label class="check" for="<?php echo esc_attr( $key ) . '_' . esc_attr( $uniqid ) ?>">
									<strong><?php esc_html_e($value['name'], 'tmm_content_composer'); ?></strong>
									<?php if (!empty($value['description'])) { ?>
										<i class="description"><?php esc_html_e($value['description'], 'tmm_content_composer'); ?></i>
									<?php } ?>
								</label>
							</p>
						</fieldset>

					<?php } ?>

					<?php if ($value['type'] == 'select') { ?>

						<fieldset class="field-select">
							<p>
								<label for="<?php echo esc_attr( $key ) . '_' . esc_attr( $uniqid ) ?>">
									<?php esc_html_e($value['name'], 'tmm_content_composer'); ?>
									<?php if (!empty($value['description'])) { ?>
										<span data-description="<?php esc_html_e($value['description'], 'tmm_content_composer'); ?>"></span>
									<?php } ?>
								</label>

								<select id="<?php echo esc_attr( $key ) . '_' . esc_attr( $uniqid ) ?>" name="advanced[<?php echo esc_attr( $specification_key ) ?>][<?php echo esc_attr( $key ) ?>]">
									<option value="0"><?php esc_html_e("Any", 'tmm_content_composer') ?></option>
									<?php foreach ($value['values'] as $val_key => $val_name) { ?>
										<option <?php if (isset($adv_params['advanced'][$specification_key][$key]) && $adv_params['advanced'][$specification_key][$key] == $val_key) { ?>selected<?php } ?> value="<?php echo esc_attr( $val_key ) ?>"><?php esc_html_e($val_name, 'tmm_content_composer'); ?></option>
									<?php } ?>
								</select>
							</p>
						</fieldset>

					<?php } ?>

				<?php } ?>

			<?php } ?>

			<div class="clearfix"></div>

			<input class="button orange submit-search" type="submit" value="<?php esc_html_e("Search", 'tmm_content_composer') ?>">

			<div class="clearfix"></div>

		</div>

	</form><!--/ .advanced_car_search_panel-->

	<?php } ?>

</div><!--/ .quicksearch-container-->