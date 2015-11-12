jQuery(document).ready(function() {
	if (jQuery('.car_form_search').length) {
		var app_cardealer_widget_quicksearch = new THEMEMAKERS_APP_CARDEALER_WIDGET_QUICKSEARCH();
		app_cardealer_widget_quicksearch.init();
	}
});

var THEMEMAKERS_APP_CARDEALER_WIDGET_QUICKSEARCH = function() {
	var self = {
		init: function() {
			
            jQuery('.qs_carlocation0').life('change', function() {
				var value = jQuery(this).val(),
                    widget = jQuery(this).parents('.quicksearch-container'),
                    car_condition = widget.find('.qs_condition').val(),
                    state = widget.find('.qs_carlocation1'),
                    city = widget.find('.qs_carlocation2');
                    
                self.clear_select(city);
                city.attr('disabled', true);
                
                if (value == 0 && car_condition == 0) {
                    self.clear_select(state);
                    state.attr('disabled', true);
                    self.load_producers(widget);
                }else{
                    state.attr('disabled', true).val(0);
                    self.load_locations(value, 0, widget);
                }
			});

			jQuery('.qs_carlocation1').life('change', function() {
				var level = jQuery(this).data('level'),
                    value = jQuery(this).val(),
                    widget = jQuery(this).parents('.quicksearch-container'),
                    city = widget.find('.qs_carlocation2');
                    
                if(value === '0'){
                    self.clear_select(city);
                    city.attr('disabled', true);
                    self.load_producers(widget);
                }else{
                    self.load_locations(value, level, widget);
                    city.attr('disabled', false);
                }
			});
            
            jQuery('.qs_carlocation2').life('change', function() {
				var widget = jQuery(this).parents('.quicksearch-container');
                    
                self.load_producers(widget);
			});
            
            if(jQuery('.qs_carlocation1').val() !== '0'){
                jQuery('.qs_carlocation2').attr('disabled', false).parent().removeClass('active')
            }
            
			jQuery('.qs_carproducer').life('change', function() {
                var widget = jQuery(this).parents('.quicksearch-container');
				self.load_models(widget);
			});

			jQuery('.car_adv_search_btn').life('click', function() {

				var button = jQuery(this),
                    widget = jQuery(this).parents('.quicksearch-container');

				widget.find('.car_adv_search').slideToggle(400, function() {
					var self = jQuery(this);
					if (self.hasClass("hide")) {
						self.removeClass('hide').addClass('show');
						button.parent().addClass('active');
					} else {
						self.removeClass('show').addClass('hide');
						button.parent().removeClass('active');
					}
				});

				return false;
			});

			jQuery(".submit-search").click(function(e) {
				e.preventDefault();
				var widget = jQuery(this).parents('.quicksearch-container');
                self.search(widget);
				return false;
			});


		},
		load_producers: function(widget) {

			var car_producer = widget.find('.qs_carproducer'),
                car_model = widget.find('.qs_carmodel'),
                car_location = widget.find('.qs_carlocation0'),
                car_location_id = car_location.val(),
                selected_region_id = 0,
                level = 0,
                region_id = 0
                loader = widget.find('.quicksearch_load_area');

			loader.show();
            self.clear_select(car_model);
            car_producer.attr('disabled', true);
            car_model.attr('disabled', true);

			widget.find('.carlocations').each(function() {
				$this = jQuery(this);
				if($this.attr('type') == 'hidden'){
					region_id = $this.val();
				}else{
                    region_id = jQuery(this).find('option:selected').val();
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
			jQuery.post(ajaxurl, data, function(response) {
                self.clear_select(car_producer);
                self.clear_select(car_model);
                car_producer.append(response).attr('disabled', false);
				car_model.attr('disabled', true);
                loader.hide();
			});
		},
		load_models: function(widget) {
			var car_producer_id = widget.find('.qs_carproducer').val(),
                car_model = widget.find('.qs_carmodel'),
                car_location_id = widget.find('.qs_carlocation0').val(),
                selected_region_id = 0,
                level = 0,
                loader = widget.find('.quicksearch_load_area'),
                region_id = 0;
        
            loader.show();
			car_model.attr('disabled', true);
            
            if (car_producer_id == 0) {
                self.clear_select(car_model);
				loader.hide();
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
			jQuery.post(ajaxurl, data, function(response) {
                self.clear_select(car_model);
                car_model.append(response).attr('disabled', false).parent('.sel').removeClass('disabled');
				loader.hide();
			});
		},
		load_locations: function(parent_id, level, widget) {//level 0 is top region
			var loader = widget.find('.quicksearch_load_area');
                
            loader.show();

			var data = {
				action: "app_cardealer_draw_quicksearch_locations",
				parent_id: parent_id,
				level: level + 1
			};
			jQuery.post(ajaxurl, data, function(response) {
                var location = widget.find('.qs_carlocation' + (level + 1));
                self.clear_select(location);
                location.append(response).removeAttr('disabled')
                        .parent('.sel').removeClass('disabled');
                loader.hide();
			});
            self.load_producers(widget);
		},
		search: function(widget) {
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
        
            if(action_link.indexOf('?') == -1){
                action_link += '?';
            }else{
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

			return;
		},
        clear_select: function(select) {
			select.each(function(){
                jQuery(this).val(0).html('<option value="0">' + tmm_l10n.any + '</option>');
            });
		}
	};

	return self;
};
