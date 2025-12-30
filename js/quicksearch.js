const tmmNormalizeBase = function (url) {
  var base = url.split('#')[0].split('?')[0];
  base = base.replace(/\/+$/, '');
  if (base.slice(-1) !== '/') {
    base += '/';
  }
  return base;
};

jQuery(document).ready(function () {
  // If we just redirected to the results page, clean the address bar.
  try {
    var qsCleanKey = 'tmm_qs_clean_url';
    var pendingCleanUrl = sessionStorage.getItem(qsCleanKey);
    if (pendingCleanUrl) {
      var currentBase = tmmNormalizeBase(window.location.href);
      var targetBase = tmmNormalizeBase(pendingCleanUrl);
      if (
        currentBase === targetBase &&
        window.history &&
        window.history.replaceState
      ) {
        window.history.replaceState({}, '', targetBase);
      }
      sessionStorage.removeItem(qsCleanKey);
    }
  } catch (e) {
    // sessionStorage may be unavailable; ignore.
  }

  const form = jQuery('.car_form_search');
  const yrFrom = jQuery('select[name=car_year_from]');
  const yrTo = jQuery('select[name=car_year_to]');

  if (form.length) {
    /* load locations 0 level */
    var loc_0 = jQuery('.qs_carlocation0');

    var widget = loc_0.closest('.quicksearch-container');
    var loader = widget.eq(0).find('.form_load_area');

    if (loc_0.length) {
      var data = {
        action: 'app_cardealer_draw_quicksearch_locations',
        parent_id: 0,
        level: 0,
        selected_region: loc_0.eq(0).data('location0'),
      };

      jQuery
        .when(
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            beforeSend: function () {
              loader.show();
            },
            success: function (response) {
              if (response && response != '0' && loc_0.is('select')) {
                loc_0.append(response);
              }
            },
          })
        )
        .then(function () {
          // console.log('done with loading countries...');
          if (typeof jQuery.fn.select2 === 'function' && loc_0.is('select')) {
            loc_0.select2({ dir: tmm_l10n.is_rtl });
          }

          if (loc_0.is('select')) {
            loader.hide();
          }
        });
    }

    /* load locations 1 level */
    var loc_1 = jQuery('.qs_carlocation1');

    if (loc_1.length && loc_1.eq(0).data('location0') > 0) {
      var data = {
        action: 'app_cardealer_draw_quicksearch_locations',
        parent_id: loc_1.eq(0).data('location0'),
        level: loc_1.eq(0).data('level'),
        selected_region: loc_1.eq(0).data('location1'),
      };

      jQuery
        .when(
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            success: function (response) {
              if (response && response != '0') {
                loc_1.append(response);
              }
            },
          })
        )
        .then(function () {
          // console.log('done with loading regions...');
          if (typeof jQuery.fn.select2 === 'function' && loc_1.is('select')) {
            loc_1.select2({ dir: tmm_l10n.is_rtl });
          }

          if (!loc_0.is('select')) {
            loader.hide();
          }
        });
    }

    /* load locations 2 level */
    var loc_2 = jQuery('.qs_carlocation2');

    if (loc_2.length && loc_2.eq(0).data('location1') > 0) {
      var data = {
        action: 'app_cardealer_draw_quicksearch_locations',
        parent_id: loc_2.eq(0).data('location1'),
        level: loc_2.eq(0).data('level'),
        selected_region: loc_2.eq(0).data('location2'),
      };

      jQuery
        .when(
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            success: function (response) {
              if (response && response != '0') {
                loc_2.append(response);
              }
            },
          })
        )
        .then(function () {
          // console.log('done with loading cities...');
          if (typeof jQuery.fn.select2 === 'function' && loc_2.is('select')) {
            loc_2.select2({ dir: tmm_l10n.is_rtl });
          }

          if (!loc_0.is('select') || !loc_1.is('select')) {
            loader.hide();
          }
        });
    }

    /* load makes */
    var $make = jQuery('.qs_carproducer');

    if ($make.length) {
      var data = {
        action: 'app_cardealer_draw_quicksearch_producers',
        location_id: $make.eq(0).data('location'),
        selected_region_id: $make.eq(0).data('region'),
        selected_producer_id: $make.eq(0).data('make'),
        selected_model: $make.eq(0).data('model'),
        level: $make.eq(0).data('level'),
      };

      jQuery
        .when(
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            success: function (response) {
              if (response && response != '0') {
                $make.append(response);
              }
            },
          })
        )
        .then(function () {
          // console.log('done with loading car makes...');
          if (typeof jQuery.fn.select2 === 'function' && $make.is('select')) {
            $make.select2({ dir: tmm_l10n.is_rtl });
          }

          if (
            !loc_0.is('select') ||
            !loc_1.is('select') ||
            !loc_2.is('select') ||
            $make.is('select')
          ) {
            loader.hide();
          }
        });
    }

    /* load models */
    var $model = jQuery('.qs_carmodel');

    if ($model.length && $model.eq(0).data('make') > 0) {
      var data = {
        action: 'app_cardealer_draw_quicksearch_models',
        producer_id: $model.eq(0).data('make'),
        selected_model: $model.eq(0).data('model'),
        location_id: $model.eq(0).data('location'),
        selected_region_id: $model.eq(0).data('region'),
        level: $model.eq(0).data('level'),
      };

      jQuery
        .when(
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            success: function (response) {
              if (response && response != '0') {
                $model.append(response);
              }
            },
          })
        )
        .then(function () {
          // console.log('done with loading car models...');
          if (typeof jQuery.fn.select2 === 'function' && $model.is('select')) {
            $model.select2({ dir: tmm_l10n.is_rtl });
          }
        });
    }

    /* apply select2 to year fields */
    if (typeof jQuery.fn.select2 === 'function') {
      yrFrom.select2({ dir: tmm_l10n.is_rtl });
      yrTo.select2({ dir: tmm_l10n.is_rtl });
    }

    var app = new TmmQuickSearchApp();

    app.init();
  }
});

function TmmQuickSearchApp() {
  this.body = jQuery(document.body);
  this.make = '.qs_carproducer';
  this.model = '.qs_carmodel';
  this.locs = '.carlocations';
  this.loc_0 = '.qs_carlocation0';
  this.loc_1 = '.qs_carlocation1';
  this.loc_2 = '.qs_carlocation2';
  this.btnSubmit = '.submit-search';
  this.searchContainer = '.quicksearch-container';
  this.advSearchBtn = '.car_adv_search_btn';
  this.advSearchPanel = '.car_adv_search';
}

TmmQuickSearchApp.prototype = {
  init() {
    const self = this;
    const body = self.body;

    body.on('change', self.loc_0, function () {
      const $current = jQuery(this);
      const value = $current.val();
      const widget = $current.closest(self.searchContainer);
      const car_condition = widget.find('.qs_condition').val();
      const state = widget.find(self.loc_1);
      const city = widget.find(self.loc_2);

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

    body.on('change', self.loc_1, function () {
      const $current = jQuery(this);
      const level = $current.data('level');
      const value = $current.val();
      const widget = $current.closest(self.searchContainer);
      const city = widget.find(self.loc_2);

      if (value === '0') {
        self.clear_select(city);
        city.attr('disabled', true);
        self.load_producers(widget);
      } else {
        self.load_locations(value, level, widget);
        city.attr('disabled', false);
      }
    });

    body.on('change', self.loc_2, function () {
      var widget = jQuery(this).closest(self.searchContainer);

      self.load_producers(widget);
    });

    if (jQuery(self.loc_1).val() !== '0') {
      jQuery(self.loc_2).attr('disabled', false).parent().removeClass('active');
    }

    body.on('change', self.make, function () {
      var widget = jQuery(this).closest(self.searchContainer);
      self.load_models(widget);
    });

    body.on('click', self.advSearchBtn, function () {
      var button = jQuery(this),
        widget = button.closest(self.searchContainer),
        advSearch = widget.find(self.advSearchPanel);

      advSearch.slideToggle(400, function () {
        if (jQuery(this).hasClass('hide')) {
          jQuery(this).removeClass('hide').addClass('show');
          button.parent().addClass('active');
        } else {
          jQuery(this).removeClass('show').addClass('hide');
          button.parent().removeClass('active');
        }
      });

      return false;
    });

    jQuery(self.btnSubmit).on('click', function (e) {
      e.preventDefault();
      var widget = jQuery(this).closest(self.searchContainer);
      self.search(widget);
      return false;
    });
  },

  load_producers(widget) {
    const self = this;

    var make = widget.find(self.make),
      model = widget.find(self.model),
      locations = widget.find(self.locs),
      car_location = widget.find(self.loc_0),
      car_location_id = car_location.val(),
      loader = widget.find('.form_load_area');

    //loader.show();
    self.clear_select(model);
    make.attr('disabled', true);
    model.attr('disabled', true);

    const regionDetails = self.getRegionDetails(locations);

    var data = {
      action: 'app_cardealer_draw_quicksearch_producers',
      location_id: car_location_id,
      selected_region_id: regionDetails.selected_region_id,
      level: regionDetails.level,
    };

    jQuery
      .when(
        jQuery.ajax({
          type: 'POST',
          url: ajaxurl,
          data: data,
          beforeSend: function () {
            loader.show();
          },
          success: function (response) {
            self.clear_select(make);
            self.clear_select(model);
            make.append(response).attr('disabled', false);
            model.attr('disabled', true);
          },
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr);
            console.log(thrownError);
          },
        })
      )
      .then(function () {
        // console.log('done with loading car makes...');
        self.applySelect2(make, {
          width: '100%',
          dir: tmm_l10n.is_rtl,
          language: tmm_l10n.any,
        });
        loader.hide();
      });
  },

  load_models(widget) {
    const self = this;
    var car_producer_id = widget.find(self.make).val(),
      car_model = widget.find(self.model),
      locations = widget.find(self.locs),
      car_location_id = widget.find(self.loc_0).val(),
      loader = widget.find('.form_load_area');

    //loader.show();
    car_model.attr('disabled', true);

    if (car_producer_id == 0) {
      self.clear_select(car_model);
      //loader.hide();
      return;
    }

    const regionDetails = self.getRegionDetails(locations);

    var data = {
      action: 'app_cardealer_draw_quicksearch_models',
      location_id: car_location_id,
      selected_region_id: regionDetails.selected_region_id,
      producer_id: car_producer_id,
      level: regionDetails.level,
    };

    jQuery
      .when(
        jQuery.ajax({
          type: 'POST',
          url: ajaxurl,
          data: data,
          beforeSend: function () {
            loader.show();
          },
          success: function (response) {
            self.clear_select(car_model);
            car_model.append(response).attr('disabled', false);
          },
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr);
            console.log(thrownError);
          },
        })
      )
      .then(function () {
        // console.log('done with loading models...');
        self.applySelect2(car_model, {
          width: '100%',
          dir: tmm_l10n.is_rtl,
          language: tmm_l10n.any,
        });
        loader.hide();
      });
  },

  load_locations(parent_id, level, widget) {
    //level 0 is top region
    const self = this;
    const loader = widget.find('.form_load_area');
    const locationSelectorClass = '.qs_carlocation' + (level + 1);
    const location = widget.find(locationSelectorClass);

    var data = {
      action: 'app_cardealer_draw_quicksearch_locations',
      parent_id: parent_id,
      level: level + 1,
    };

    jQuery
      .when(
        jQuery.ajax({
          type: 'POST',
          url: ajaxurl,
          data: data,
          beforeSend: function () {
            loader.show();
          },
          success: function (response) {
            self.clear_select(location);
            location.append(response).removeAttr('disabled');
          },
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr);
            console.log(thrownError);
          },
        })
      )
      .then(function () {
        // console.log('done with loading location level_' + level + '...');
        self.applySelect2(location, {
          width: '100%',
          dir: tmm_l10n.is_rtl,
          language: tmm_l10n.site_locale,
          minimumInputLength: level == 2 ? 3 : 0,
        });
        loader.hide();
      });

    self.load_producers(widget);
  },

  search(widget) {
    const self = this;
    const form = widget.find('.car_form_search');
    const action_link = form.attr('action');
    const loader = widget.find('.form_load_area');
    let $results = jQuery('#change-items');
    let $pager = jQuery('.wp-pagenavi.vehicle-pagination');
    const hasResultsContainer = $results.length > 0;
    const params = new URLSearchParams();

    const getFieldValue = function (selector) {
      const $field = widget.find(selector);
      return $field.length ? $field.val() : '0';
    };

    const main_params_object = {
      car_condition: getFieldValue('.qs_condition'),
      vehicle_type: getFieldValue('.qs_vehicle_type'),
      carlocation: '0',
      carproducer: getFieldValue(self.make),
      carmodels: getFieldValue(self.model),
      car_price_min: getFieldValue('[name=car_price_min]'),
      car_price_max: getFieldValue('[name=car_price_max]'),
      car_year_from: getFieldValue('[name=car_year_from]'),
      car_year_to: getFieldValue('[name=car_year_to]'),
      car_fuel_type: getFieldValue('[name=car_fuel_type]'),
      car_body: getFieldValue('[name=car_body]'),
      car_doors_count: getFieldValue('[name=car_doors_count]'),
      car_interrior_color: getFieldValue('[name=car_interrior_color]'),
      car_exterior_color: getFieldValue('[name=car_exterior_color]'),
      car_transmission: getFieldValue('[name=car_transmission]'),
      car_mileage_from: getFieldValue('[name=car_mileage_from]'),
      car_mileage_to: getFieldValue('[name=car_mileage_to]'),
    };

    const carlocations = [
      getFieldValue(self.loc_0),
      getFieldValue(self.loc_1),
      getFieldValue(self.loc_2),
    ];

    if (carlocations[0] !== '0') {
      main_params_object.carlocation = carlocations[0];
      if (carlocations[1] !== '0') {
        main_params_object.carlocation += ',' + carlocations[1];
        if (carlocations[2] !== '0') {
          main_params_object.carlocation += ',' + carlocations[2];
        }
      }
    }

    Object.keys(main_params_object).forEach(function (key) {
      if (main_params_object[key] !== '0' && main_params_object[key] !== '') {
        params.append(key, main_params_object[key]);
      }
    });

    // only treat the action page as the “results” page; elsewhere, do a full redirect
    var currentBase = tmmNormalizeBase(window.location.href);
    var actionBase = tmmNormalizeBase(action_link);
    var isOnActionPage = currentBase === actionBase;

    const fetchAndRender = function (url) {
      if (!hasResultsContainer || !isOnActionPage) {
        try {
          sessionStorage.setItem('tmm_qs_clean_url', actionBase);
        } catch (e) {}
        window.location = url;
        return;
      }

      loader.show();
      jQuery
        .get(url)
        .done(function (response) {
          const $html = jQuery('<div>').html(response);
          const $newItems = $html.find('#change-items');
          const $newPager = $html.find('.wp-pagenavi.vehicle-pagination');

          if ($newItems.length && $results.length) {
            $results.replaceWith($newItems);
            $results = $newItems;
          }

          if ($newPager.length) {
            if ($pager.length) {
              $pager.replaceWith($newPager);
              $pager = $newPager;
            } else if ($results.length) {
              $results.after($newPager);
              $pager = $newPager;
            }
          }
        })
        .fail(function () {
          // Fallback to full navigation if AJAX fails
          window.location = url;
        })
        .always(function () {
          loader.hide();
        });
    };

    const baseUrl =
      action_link.indexOf('?') === -1 ? action_link + '?' : action_link + '&';

    if (widget.find('.advanced_car_search_panel').length) {
      var data = {
        action: 'app_cardealer_process_advanced_search_params',
        advanced_search_params: widget
          .find('.advanced_car_search_panel')
          .serialize(),
      };
      jQuery.post(ajaxurl, data, function (response) {
        params.append('adv_params', response);
        fetchAndRender(baseUrl + params.toString());
      });
    } else {
      fetchAndRender(baseUrl + params.toString());
    }

    return true;
  },

  clear_select(select) {
    const o = this;

    select.each(function () {
      const $field = jQuery(this).val(0);

      if ($field.is(o.loc_0)) {
        $field.html('<option value="0">' + tmm_l10n.country + '</option>');
      } else if ($field.is(o.loc_1)) {
        $field.html('<option value="0">' + tmm_l10n.region + '</option>');
      } else if ($field.is(o.loc_2)) {
        $field.html('<option value="0">' + tmm_l10n.city + '</option>');
      } else {
        $field.html('<option value="0">' + tmm_l10n.any + '</option>');
      }
    });
  },

  applySelect2($element, options) {
    if (typeof jQuery.fn.select2 === 'function' && $element.is('select')) {
      $element.select2(options);
    }
  },

  getRegionDetails(locations) {
    let selected_region_id = 0;
    let level = 0;

    locations.each(function () {
      const $location = jQuery(this);
      const region_id =
        $location.attr('type') === 'hidden'
          ? $location.val()
          : $location.find('option:selected').val();

      if (region_id > 0) {
        level++;
        selected_region_id = region_id;
      }
    });

    return {
      selected_region_id: selected_region_id,
      level: level,
    };
  },
};
