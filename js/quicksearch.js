const tmmNormalizeBase = function (url) {
  let base = url.split('#')[0].split('?')[0];
  base = base.replace(/\/+$/, '');
  if (base.slice(-1) !== '/') {
    base += '/';
  }
  return base;
};

const QS_SELECTORS = {
  make: '.qs_carproducer',
  model: '.qs_carmodel',
  locs: '.carlocations',
  loc_0: '.qs_carlocation0',
  loc_1: '.qs_carlocation1',
  loc_2: '.qs_carlocation2',
  btnSubmit: '.submit-search',
  searchContainer: '.quicksearch-container',
  advSearchBtn: '.car_adv_search_btn',
  advSearchPanel: '.car_adv_search',
};

const SELECT2_DEFAULTS = {
  width: '100%',
  dir: tmm_l10n.is_rtl,
  language: tmm_l10n.any,
};

function applySelect2WithDefaults($element, options) {
  if (typeof jQuery.fn.select2 === 'function' && $element.is('select')) {
    const mergedOptions = Object.assign({}, SELECT2_DEFAULTS, options);
    $element.select2(mergedOptions);
  }
}

jQuery(document).ready(function () {
  // If we just redirected to the results page, clean the address bar.
  try {
    const qsCleanKey = 'tmm_qs_clean_url';
    const pendingCleanUrl = sessionStorage.getItem(qsCleanKey);
    if (pendingCleanUrl) {
      const currentBase = tmmNormalizeBase(window.location.href);
      const targetBase = tmmNormalizeBase(pendingCleanUrl);
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
    const loc_0 = jQuery(QS_SELECTORS.loc_0);

    const widget = loc_0.closest(QS_SELECTORS.searchContainer);
    const loader = widget.eq(0).find('.form_load_area');

    if (loc_0.length) {
      const data = {
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
          applySelect2WithDefaults(loc_0, {});

          if (loc_0.is('select')) {
            loader.hide();
          }
        });
    }

    /* load locations 1 level */
    const loc_1 = jQuery(QS_SELECTORS.loc_1);

    if (loc_1.length && loc_1.eq(0).data('location0') > 0) {
      const data = {
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
          applySelect2WithDefaults(loc_1, {});

          if (!loc_0.is('select')) {
            loader.hide();
          }
        });
    }

    /* load locations 2 level */
    const loc_2 = jQuery(QS_SELECTORS.loc_2);

    if (loc_2.length && loc_2.eq(0).data('location1') > 0) {
      const data = {
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
          applySelect2WithDefaults(loc_2, {});

          if (!loc_0.is('select') || !loc_1.is('select')) {
            loader.hide();
          }
        });
    }

    /* load makes */
    const $make = jQuery(QS_SELECTORS.make);

    if ($make.length) {
      const data = {
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
          applySelect2WithDefaults($make, {});

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
    const $model = jQuery(QS_SELECTORS.model);

    if ($model.length && $model.eq(0).data('make') > 0) {
      const data = {
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
          applySelect2WithDefaults($model, {});
        });
    }

    /* apply select2 to year fields */
    applySelect2WithDefaults(yrFrom, {});
    applySelect2WithDefaults(yrTo, {});

    const app = new TmmQuickSearchApp();

    app.init();
  }
});

function TmmQuickSearchApp() {
  this.body = jQuery(document.body);
  this.make = QS_SELECTORS.make;
  this.model = QS_SELECTORS.model;
  this.locs = QS_SELECTORS.locs;
  this.loc_0 = QS_SELECTORS.loc_0;
  this.loc_1 = QS_SELECTORS.loc_1;
  this.loc_2 = QS_SELECTORS.loc_2;
  this.btnSubmit = QS_SELECTORS.btnSubmit;
  this.searchContainer = QS_SELECTORS.searchContainer;
  this.advSearchBtn = QS_SELECTORS.advSearchBtn;
  this.advSearchPanel = QS_SELECTORS.advSearchPanel;
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
      const widget = jQuery(this).closest(self.searchContainer);

      self.load_producers(widget);
    });

    if (jQuery(self.loc_1).val() !== '0') {
      jQuery(self.loc_2).attr('disabled', false).parent().removeClass('active');
    }

    body.on('change', self.make, function () {
      const widget = jQuery(this).closest(self.searchContainer);
      self.load_models(widget);
    });

    body.on('click', self.advSearchBtn, function () {
      const button = jQuery(this);
      const widget = button.closest(self.searchContainer);
      const advSearch = widget.find(self.advSearchPanel);

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
      const widget = jQuery(this).closest(self.searchContainer);
      self.search(widget);
      return false;
    });
  },

  load_producers(widget) {
    const self = this;

    const make = widget.find(self.make);
    const model = widget.find(self.model);
    const locations = widget.find(self.locs);
    const car_location = widget.find(self.loc_0);
    const car_location_id = car_location.val();
    const loader = widget.find('.form_load_area');

    //loader.show();
    self.clear_select(model);
    make.attr('disabled', true);
    model.attr('disabled', true);

    const regionDetails = self.getRegionDetails(locations);

    const data = {
      action: 'app_cardealer_draw_quicksearch_producers',
      location_id: car_location_id,
      selected_region_id: regionDetails.selected_region_id,
      level: regionDetails.level,
    };

    self.withLoader(loader, function () {
      return jQuery
        .when(
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
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
          self.applySelect2(make, {});
        });
    });
  },

  load_models(widget) {
    const self = this;
    const car_producer_id = widget.find(self.make).val();
    const car_model = widget.find(self.model);
    const locations = widget.find(self.locs);
    const car_location_id = widget.find(self.loc_0).val();
    const loader = widget.find('.form_load_area');

    //loader.show();
    car_model.attr('disabled', true);

    if (car_producer_id == 0) {
      self.clear_select(car_model);
      //loader.hide();
      return;
    }

    const regionDetails = self.getRegionDetails(locations);

    const data = {
      action: 'app_cardealer_draw_quicksearch_models',
      location_id: car_location_id,
      selected_region_id: regionDetails.selected_region_id,
      producer_id: car_producer_id,
      level: regionDetails.level,
    };

    self.withLoader(loader, function () {
      return jQuery
        .when(
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
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
          self.applySelect2(car_model, {});
        });
    });
  },

  load_locations(parent_id, level, widget) {
    //level 0 is top region
    const self = this;
    const loader = widget.find('.form_load_area');
    const locationSelectorClass = '.qs_carlocation' + (level + 1);
    const location = widget.find(locationSelectorClass);

    const data = {
      action: 'app_cardealer_draw_quicksearch_locations',
      parent_id: parent_id,
      level: level + 1,
    };

    self.withLoader(loader, function () {
      return jQuery
        .when(
          jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
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
            language: tmm_l10n.site_locale,
            minimumInputLength: level == 2 ? 3 : 0,
          });
        });
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

    const main_params_object = {
      car_condition: self.getFieldValue(widget, '.qs_condition'),
      vehicle_type: self.getFieldValue(widget, '.qs_vehicle_type'),
      carlocation: '0',
      carproducer: self.getFieldValue(widget, self.make),
      carmodels: self.getFieldValue(widget, self.model),
      car_price_min: self.getFieldValue(widget, '[name=car_price_min]'),
      car_price_max: self.getFieldValue(widget, '[name=car_price_max]'),
      car_year_from: self.getFieldValue(widget, '[name=car_year_from]'),
      car_year_to: self.getFieldValue(widget, '[name=car_year_to]'),
      car_fuel_type: self.getFieldValue(widget, '[name=car_fuel_type]'),
      car_body: self.getFieldValue(widget, '[name=car_body]'),
      car_doors_count: self.getFieldValue(widget, '[name=car_doors_count]'),
      car_interrior_color: self.getFieldValue(
        widget,
        '[name=car_interrior_color]'
      ),
      car_exterior_color: self.getFieldValue(
        widget,
        '[name=car_exterior_color]'
      ),
      car_transmission: self.getFieldValue(widget, '[name=car_transmission]'),
      car_mileage_from: self.getFieldValue(widget, '[name=car_mileage_from]'),
      car_mileage_to: self.getFieldValue(widget, '[name=car_mileage_to]'),
    };

    const carlocations = [
      self.getFieldValue(widget, self.loc_0),
      self.getFieldValue(widget, self.loc_1),
      self.getFieldValue(widget, self.loc_2),
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
    const currentBase = tmmNormalizeBase(window.location.href);
    const actionBase = tmmNormalizeBase(action_link);
    const isOnActionPage = currentBase === actionBase;

    const state = { $results: $results, $pager: $pager };

    const baseUrl =
      action_link.indexOf('?') === -1 ? action_link + '?' : action_link + '&';

    if (widget.find('.advanced_car_search_panel').length) {
      const data = {
        action: 'app_cardealer_process_advanced_search_params',
        advanced_search_params: widget
          .find('.advanced_car_search_panel')
          .serialize(),
      };
      jQuery.post(ajaxurl, data, function (response) {
        params.append('adv_params', response);
        self.fetchAndRender({
          url: baseUrl + params.toString(),
          loader: loader,
          hasResultsContainer: hasResultsContainer,
          isOnActionPage: isOnActionPage,
          actionBase: actionBase,
          state: state,
        });
      });
    } else {
      self.fetchAndRender({
        url: baseUrl + params.toString(),
        loader: loader,
        hasResultsContainer: hasResultsContainer,
        isOnActionPage: isOnActionPage,
        actionBase: actionBase,
        state: state,
      });
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

  withLoader(loader, promiseFactory) {
    loader.show();
    const promise = promiseFactory();

    if (promise && typeof promise.always === 'function') {
      promise.always(function () {
        loader.hide();
      });
    } else if (promise && typeof promise.finally === 'function') {
      promise.finally(function () {
        loader.hide();
      });
    } else {
      loader.hide();
    }

    return promise;
  },

  applySelect2($element, options) {
    applySelect2WithDefaults($element, options);
  },

  getFieldValue(widget, selector) {
    const $field = widget.find(selector);
    return $field.length ? $field.val() : '0';
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

  fetchAndRender(config) {
    const {
      url,
      loader,
      hasResultsContainer,
      isOnActionPage,
      actionBase,
      state,
    } = config;

    let { $results, $pager } = state;

    if (!hasResultsContainer || !isOnActionPage) {
      try {
        sessionStorage.setItem('tmm_qs_clean_url', actionBase);
      } catch (e) {}
      window.location = url;
      return state;
    }

    this.withLoader(loader, function () {
      return jQuery
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

          state.$results = $results;
          state.$pager = $pager;
        })
        .fail(function () {
          // Fallback to full navigation if AJAX fails
          window.location = url;
        });
    });

    return state;
  },
};
