jQuery(document).ready(function() {
	const form = jQuery('.car_form_search');

	if (form.length) {

		/* load locations 0 level */
		var loc_0 = jQuery('.qs_carlocation0');

		var widget = loc_0.closest('.quicksearch-container');
		var loader = widget.eq(0).find('.form_load_area');

		if (loc_0.length) {
			var data = {
				action: "app_cardealer_draw_quicksearch_locations",
				parent_id: 0,
				level: 0,
				selected_region: loc_0.eq(0).data('location0')
			};

			jQuery.when(
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: data,
					beforeSend: function () {
						loader.show();
					},
					success: function (response) {
						if (response && response != '0' && loc_0.is('select')) {
							loc_0.append(response);
						}
					}
				})
			).then(function () {
				console.log('done with loading countries...');
				if(typeof jQuery.fn.select2 === 'function' && loc_0.is('select')){
					loc_0.select2();
				}

				if(loc_0.is('select')) {
					loader.hide();
				}

			});

		}

		/* load locations 1 level */
		var loc_1 = jQuery('.qs_carlocation1');

		if (loc_1.length && loc_1.eq(0).data('location0') > 0) {

			var data = {
				action: "app_cardealer_draw_quicksearch_locations",
				parent_id: loc_1.eq(0).data('location0'),
				level: loc_1.eq(0).data('level'),
				selected_region: loc_1.eq(0).data('location1')
			};

			jQuery.when(
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: data,
					success: function (response) {
						if (response && response != '0') {
							loc_1.append(response);
						}
					}
				})
			).then(function () {
				console.log('done with loading regions...');
				if(typeof jQuery.fn.select2 === 'function' && loc_1.is('select')){
					loc_1.select2();
				}

				if(!loc_0.is('select')) {
					loader.hide();
				}
			});

		}

		/* load locations 2 level */
		var loc_2 = jQuery('.qs_carlocation2');

		if (loc_2.length && loc_2.eq(0).data('location1') > 0) {

			var data = {
				action: "app_cardealer_draw_quicksearch_locations",
				parent_id: loc_2.eq(0).data('location1'),
				level: loc_2.eq(0).data('level'),
				selected_region: loc_2.eq(0).data('location2')
			};

			jQuery.when(
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: data,
					success: function(response) {
						if (response && response != '0') {
							loc_2.append(response);
						}
					}
				})
			).then(function () {
				console.log('done with loading cities...');
				if(typeof jQuery.fn.select2 === 'function' && loc_2.is('select')){
					loc_2.select2();
				}

				if(!loc_0.is('select') || !loc_1.is('select')) {
					loader.hide();
				}
			});

		}

		/* load makes */
		var $make = jQuery('.qs_carproducer');

		if ($make.length) {

			var data = {
				action: "app_cardealer_draw_quicksearch_producers",
				location_id: $make.eq(0).data('location'),
				selected_region_id: $make.eq(0).data('region'),
				selected_producer_id: $make.eq(0).data('make'),
				selected_model: $make.eq(0).data('model'),
				level: $make.eq(0).data('level')
			};

			jQuery.when(
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: data,
					success: function(response) {
						if (response && response != '0') {
							$make.append(response);
						}
					}
				})
			).then(function () {
				console.log('done with loading car makes...');
				if(typeof jQuery.fn.select2 === 'function' && $make.is('select')){
					$make.select2();
				}

				if(!loc_0.is('select') || !loc_1.is('select') || !loc_2.is('select') || $make.is('select')) {
					loader.hide();
				}
			});

		}

		/* load models */
		var $model = jQuery('.qs_carmodel');

		if ($model.length && $model.eq(0).data('make') > 0) {

			var data = {
				action: "app_cardealer_draw_quicksearch_models",
				producer_id: $model.eq(0).data('make'),
				selected_model: $model.eq(0).data('model'),
				location_id: $model.eq(0).data('location'),
				selected_region_id: $model.eq(0).data('region'),
				level: $model.eq(0).data('level')
			};

			jQuery.when(
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: data,
					success: function(response) {
						if (response && response != '0') {
							$model.append(response);
						}
					}
				})
			).then(function () {
				console.log('done with loading car models...');
				if(typeof jQuery.fn.select2 === 'function' && $model.is('select')){
					$model.select2();
				}
			});

		}

		var app = new TmmQuickSearchApp();

		app.init();
	}
});

function TmmQuickSearchApp() {

	const self = this;

	this.init = () => {
		jQuery(document.body).on('change', '.qs_carlocation0', function() {
			const value = jQuery(this).val(),
				widget = jQuery(this).closest('.quicksearch-container'),
				car_condition = widget.find('.qs_condition').val(),
				state = widget.find('.qs_carlocation1'),
				city = widget.find('.qs_carlocation2');

			self.clear_select(city);
			city.attr('disabled', true);

			if (value == 0 && car_condition == 0) {
				self.clear_select(state);
				state.attr('disabled', true);
				self.load_producers(widget);
			} else {
				state.attr('disabled', true).val(0);
				self.load_locations(value, 0, widget);
			}
		});

		jQuery(document.body).on('change', '.qs_carlocation1', function() {
			const level = jQuery(this).data('level'),
				value = jQuery(this).val(),
				widget = jQuery(this).closest('.quicksearch-container'),
				city = widget.find('.qs_carlocation2');

			if (value === '0') {
				self.clear_select(city);
				city.attr('disabled', true);
				self.load_producers(widget);
			} else {
				self.load_locations(value, level, widget);
				city.attr('disabled', false);
			}
		});

		jQuery(document.body).on('change', '.qs_carlocation2', function() {
			var widget = jQuery(this).closest('.quicksearch-container');

			self.load_producers(widget);
		});

		if(jQuery('.qs_carlocation1').val() !== '0'){
			jQuery('.qs_carlocation2').attr('disabled', false).parent().removeClass('active')
		}

		jQuery(document.body).on('change', '.qs_carproducer', function() {
			var widget = jQuery(this).closest('.quicksearch-container');
			self.load_models(widget);
		});

		jQuery(document.body).on('click', '.car_adv_search_btn', function() {

			var button = jQuery(this),
				widget = jQuery(this).closest('.quicksearch-container');

			widget.find('.car_adv_search').slideToggle(400, function() {
				if (jQuery(this).hasClass("hide")) {
					jQuery(this).removeClass('hide').addClass('show');
					button.parent().addClass('active');
				} else {
					jQuery(this).removeClass('show').addClass('hide');
					button.parent().removeClass('active');
				}
			});

			return false;
		});

		jQuery(".submit-search").on('click', function(e) {
			e.preventDefault();
			var widget = jQuery(this).closest('.quicksearch-container');
			self.search(widget);
			return false;
		});


	};

	this.load_producers = (widget) => {

		var car_producer = widget.find('.qs_carproducer'),
			car_model = widget.find('.qs_carmodel'),
			car_location = widget.find('.qs_carlocation0'),
			car_location_id = car_location.val(),
			selected_region_id = 0,
			level = 0,
			region_id = 0,
			loader = widget.find('.form_load_area');

		//loader.show();
		self.clear_select(car_model);
		car_producer.attr('disabled', true);
		car_model.attr('disabled', true);

		widget.find('.carlocations').each(function() {
			var $this = jQuery(this);
			if ($this.attr('type') == 'hidden') {
				region_id = $this.val();
			} else {
				region_id = $this.find('option:selected').val();
			}

			if (region_id > 0) {
				level++;
			} else {
				return;
			}
			selected_region_id = region_id;
		});

		var data = {
			action: "app_cardealer_draw_quicksearch_producers",
			location_id: car_location_id,
			selected_region_id: selected_region_id,
			level: level
		};

		jQuery.when(
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data: data,
				beforeSend: function() {
					loader.show();
				},
				success: function(response) {
					self.clear_select(car_producer);
					self.clear_select(car_model);
					car_producer.append(response).attr('disabled', false);
					car_model.attr('disabled', true);
				},
				error: function (xhr, ajaxOptions, thrownError) {
					console.log(xhr);
					console.log(thrownError);
				}
			})
		).then(function(){
			console.log('done with loading car makes...');
			if(typeof jQuery.fn.select2 === 'function' && car_producer.is('select')){
				car_producer.select2({
					width: '100%',
					language: tmm_l10n.any
				});
			}
			loader.hide();
		});
	};

	this.load_models = (widget) => {
		var car_producer_id = widget.find('.qs_carproducer').val(),
			car_model = widget.find('.qs_carmodel'),
			car_location_id = widget.find('.qs_carlocation0').val(),
			selected_region_id = 0,
			level = 0,
			loader = widget.find('.form_load_area'),
			region_id = 0;

		//loader.show();
		car_model.attr('disabled', true);

		if (car_producer_id == 0) {
			self.clear_select(car_model);
			//loader.hide();
			return;
		}

		widget.find('.carlocations').each(function(index, obj) {
			$this = jQuery(obj);
			if($this.attr('type') == 'hidden'){
				region_id = $this.val();
			}else{
				region_id = $this.find('option:selected').val();
			}

			if (region_id > 0) {
				level++;
			} else {
				return;
			}
			selected_region_id = region_id;
		});

		var data = {
			action: "app_cardealer_draw_quicksearch_models",
			location_id: car_location_id,
			selected_region_id: selected_region_id,
			producer_id: car_producer_id,
			level: level
		};

		jQuery.when(
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data: data,
				beforeSend: function() {
					loader.show();
				},
				success: function(response) {
					self.clear_select(car_model);
					car_model.append(response).attr('disabled', false);
				},
				error: function (xhr, ajaxOptions, thrownError) {
					console.log(xhr);
					console.log(thrownError);
				}
			})
		).then(function(){
			console.log('done with loading models...');
			if(typeof jQuery.fn.select2 === 'function' && car_model.is('select')){
				car_model.select2({
					width: '100%',
					language: tmm_l10n.any
				});
			}
			loader.hide();
		});
	};

	this.load_locations = (parent_id, level, widget) => {//level 0 is top region
		const loader = widget.find('.form_load_area');
		const locationSelectorClass = '.qs_carlocation' + (level + 1);
		const locationSelector = jQuery(locationSelectorClass);

		var data = {
			action: "app_cardealer_draw_quicksearch_locations",
			parent_id: parent_id,
			level: level + 1
		};

		jQuery.when(
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data: data,
				beforeSend: function() {
					loader.show();
				},
				success: function(response) {
					var location = widget.find(locationSelectorClass);
					self.clear_select(location);
					location.append(response).removeAttr('disabled');
				},
				error: function (xhr, ajaxOptions, thrownError) {
					console.log(xhr);
					console.log(thrownError);
				}
			})
		).then(function(){
			console.log('done with loading location level_' + level + '...');
			if(typeof jQuery.fn.select2 === 'function' && locationSelector.is('select')){
				locationSelector.select2({
					width: '100%',
					language: tmm_l10n.site_locale,
					minimumInputLength: (level==2) ? 3 : 0
				});
			}
			loader.hide();
		});

		self.load_producers(widget);
	};

	this.search = (widget) => {
		var form = widget.find(".car_form_search"),
			action_link = form.attr('action'),
			main_params_object = {
				car_condition: widget.find(".qs_condition").length ? widget.find(".qs_condition").val() : '0',
				carlocation: '0',
				carproducer: widget.find(".qs_carproducer").length ? widget.find('.qs_carproducer').val() : '0',
				carmodels: widget.find(".qs_carmodel").length ? widget.find('.qs_carmodel').val() : '0',
				car_price_min: widget.find("[name=car_price_min]").length ? widget.find("[name=car_price_min]").val() : '0',
				car_price_max: widget.find("[name=car_price_max]").length ? widget.find("[name=car_price_max]").val() : '0',
				car_year_from: widget.find("[name=car_year_from]").length ? widget.find("[name=car_year_from]").val() : '0',
				car_year_to: widget.find("[name=car_year_to]").length ? widget.find("[name=car_year_to]").val() : '0',
				car_fuel_type: widget.find("[name=car_fuel_type]").length ? widget.find("[name=car_fuel_type]").val() : '0',
				car_body: widget.find("[name=car_body]").length ? widget.find("[name=car_body]").val() : '0',
				car_doors_count: widget.find("[name=car_doors_count]").length ? widget.find("[name=car_doors_count]").val() : '0',
				car_interrior_color: widget.find("[name=car_interrior_color]").length ? widget.find("[name=car_interrior_color]").val() : '0',
				car_exterior_color: widget.find("[name=car_exterior_color]").length ? widget.find("[name=car_exterior_color]").val() : '0',
				car_transmission: widget.find("[name=car_transmission]").length ? widget.find("[name=car_transmission]").val() : '0',
				car_mileage_from: widget.find("[name=car_mileage_from]").length ? widget.find("[name=car_mileage_from]").val() : '0',
				car_mileage_to: widget.find("[name=car_mileage_to]").length ? widget.find("[name=car_mileage_to]").val() : '0'
			},
			carlocations = [
				widget.find('.qs_carlocation0').length ? widget.find('.qs_carlocation0').val() : '0',
				widget.find('.qs_carlocation1').length ? widget.find('.qs_carlocation1').val() : '0',
				widget.find('.qs_carlocation2').length ? widget.find('.qs_carlocation2').val() : '0'
			],
			i = 0;

		if (action_link.indexOf('?') == -1) {
			action_link += '?';
		} else {
			action_link += '&';
		}

		if(carlocations[0] !== '0'){
			main_params_object.carlocation = carlocations[0];
			if(carlocations[1] !== '0'){
				main_params_object.carlocation += ',' + carlocations[1];
				if(carlocations[2] !== '0'){
					main_params_object.carlocation += ',' + carlocations[2];
				}
			}
		}

		for(i in main_params_object){
			if(main_params_object[i] !== '0'){
				action_link = action_link + i + "=" + main_params_object[i] + "&";
			}
		}

		if (widget.find(".advanced_car_search_panel").length) {
			var data = {
				action: "app_cardealer_process_advanced_search_params",
				advanced_search_params: widget.find(".advanced_car_search_panel").serialize()
			};
			jQuery.post(ajaxurl, data, function(response) {
				window.location = action_link + "adv_params=" + response;
			});
		} else {
			window.location = action_link
		}

		return true;
	};

	this.clear_select = (select) => {
		select.each(function(){
			if(jQuery(select).hasClass('qs_carlocation0')) {
				jQuery(this).val(0).html('<option value="0">' + tmm_l10n.country + '</option>');
			} else if(jQuery(select).hasClass('qs_carlocation1')) {
				jQuery(this).val(0).html('<option value="0">' + tmm_l10n.region + '</option>');
			} else if(jQuery(select).hasClass('qs_carlocation2')) {
				jQuery(this).val(0).html('<option value="0">' + tmm_l10n.city + '</option>');
			} else {
				jQuery(this).val(0).html('<option value="0">' + tmm_l10n.any + '</option>');
			}
		});
	};
}