/*
 * jQuery.appear
 * https://github.com/bas2k/jquery.appear/
 *
 * Copyright (c) 2012-2014 Alexander Brovikov
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 */
(function ($) {
	$.fn.appear = function (options) {

		var transEndEventNames = {
				'WebkitTransition': 'webkitTransitionEnd',
				'MozTransition': 'transitionend',
				'OTransition': 'oTransitionEnd',
				'msTransition': 'MSTransitionEnd',
				'transition': 'transitionend'
			},
			transEndEventName = transEndEventNames[ Modernizr.prefixed('transition') ];

		appearingSpeed = tmm_l10n.appearing_speed ? tmm_l10n.appearing_speed : 50;

		var settings = $.extend({
			data: undefined,
			speedAddClass: appearingSpeed,
			speedRemoveClass: 100,
			// X & Y accuracy
			accX: 0,
			accY: 0
		}, options);

		return this.each(function (id) {

			var t = $(this);

			//whether the element is currently visible
			t.appeared = false;

			var w = $(window),
				check = function () {

					//is the element hidden?
					if (!t.is(':visible')) {

						//it became hidden
						t.appeared = false;
						return;
					}

					//is the element inside the visible window?
					var a = w.scrollLeft(),
						b = w.scrollTop(),
						o = t.offset(),
						x = o.left,
						y = o.top,

						ax = settings.accX,
						ay = settings.accY,
						th = t.height(),
						wh = w.height(),
						tw = t.width(),
						ww = w.width();

					if (y + th + ay >= b &&
						y <= b + wh + ay &&
						x + tw + ax >= a &&
						x <= a + ww + ax) {

						//trigger the custom event
						if (!t.appeared) t.trigger('appear', settings.data);

					} else {

						//it scrolled out of view
						t.appeared = false;
					}
				};

			var fn = function (e) {
				if (e.data) {

					id = !id ? 1 : id;

					setTimeout(function() {
						$(e.currentTarget).addClass(e.data + 'Run').one(transEndEventName, function () {
							$(this).removeClass(e.data);
						});
					}, id * settings.speedAddClass);
				}
			}

			//create a modified fn with some additional logic
			var modifiedFn = function () {

				//mark the element as visible
				t.appeared = true;

				//trigger the original fn
				fn.apply(this, arguments);
			};

			//bind the modified fn to the element
			t.bind('appear', settings.data, modifiedFn);

			//check whenever the window scrolls
			w.scroll(check);

			//check whenever the dom changes
			$.fn.appear.checks.push(check);

			//check now
			(check)();
		});
	};

	//keep a queue of appearance checks
	$.extend($.fn.appear, {

		checks: [],
		timeout: null,

		//process the queue
		checkAll: function() {
			var length = $.fn.appear.checks.length;
			if (length > 0) while (length--) ($.fn.appear.checks[length])();
		},

		//check the queue asynchronously
		run: function() {
			if ($.fn.appear.timeout) clearTimeout($.fn.appear.timeout);
			$.fn.appear.timeout = setTimeout($.fn.appear.checkAll, 20);
		}
	});

	//run checks when these methods are called
	$.each(['append', 'prepend', 'after', 'before', 'attr',
		'removeAttr', 'addClass', 'removeClass', 'toggleClass',
		'remove', 'css', 'show', 'hide'], function(i, n) {
		var old = $.fn[n];

		if (old) {
			$.fn[n] = function() {
				var r = old.apply(this, arguments);
				$.fn.appear.run();
				return r;
			}
		}
	});

})(jQuery);

/**
 * Layout effects
 */
(function ($) {

	$(function () {

		if ($('.swipeDownEffect').length) {
			$('.swipeDownEffect').appear({
				accX: 0,
				accY: -150,
				data: 'swipeDownEffect'
			});
		}

		if ($('.showMeEffect').length) {
			$('.showMeEffect').appear({
				accX: 0,
				accY: -150,
				data: 'showMeEffect'
			});
		}

		if ($('.opacityEffect').length) {
			$('.opacityEffect').appear({
				accX: 0,
				accY: 300,
				data: 'opacityEffect'
			});
		}

		if ($('.scaleEffect').length) {
			$('.scaleEffect').appear({
				accX: 0,
				accY: 300,
				data: 'scaleEffect'
			});
		}

		if ($('.rotateEffect').length) {
			$('.rotateEffect').appear({
				accX: 0,
				accY: 300,
				data: 'rotateEffect'
			});
		}

		if ($('.slideRightEffect').length) {
			$('.slideRightEffect').appear({
				accX: 0,
				accY: -150,
				data: 'slideRightEffect'
			});
		}

		if ($('.slideLeftEffect').length) {
			$('.slideLeftEffect').appear({
				accX: 0,
				accY: -150,
				data: 'slideLeftEffect'
			});
		}

		if ($('.slideDownEffect').length) {
			$('.slideDownEffect').appear({
				accX: 0,
				accY: -150,
				data: 'slideDownEffect'
			});
		}

		if ($('.slideUpEffect').length) {
			$('.slideUpEffect').appear({
				accX: 0,
				accY: 300,
				data: 'slideUpEffect'
			});
		}

		if ($('.slideUp').length) {
			$('.slideUp').appear({
				accX: 0,
				accY: 300,
				data: 'slideUp',
				speedAddClass: 200
			});
		}

		if ($('.translateEffect').length) {
			$('.translateEffect').appear({
				accX: 0,
				accY: 300,
				data: 'translateEffect',
				speedAddClass: 200
			});
		}


	});

}(jQuery));

/**
 * Contact form
 */

jQuery(document).ready(function() {

	var $form = jQuery('.contact-form');

	$form.submit(function() {

		$response = jQuery(this).next(jQuery(".contact_form_responce"));
		$response.find("ul").html("");
		$response.find("ul").removeClass();

		var data = {
			action: "contact_form_request",
			values: jQuery(this).serialize()
		};

		var form_self = this;
		//send data to server
		jQuery.post(ajaxurl, data, function(response) {

			response = jQuery.parseJSON(response);
			jQuery(form_self).find(".wrong-data").removeClass("wrong-data");

			if (response.is_errors) {

				jQuery($response).find("ul").addClass("error type-2");
				jQuery.each(response.info, function(input_name, input_label) {
					jQuery(form_self).find("[name=" + input_name + "]").addClass("wrong-data");
					jQuery($response).find("ul").append('<li>' + tmm_mail_l10n.wrong_field_value + ' "' + input_label + '"!</li>');
				});

				$response.show(450);

			} else {

				jQuery($response).find("ul").addClass("success type-2");

				if (response.info == 'succsess') {
					jQuery($response).find("ul").append('<li>' + tmm_mail_l10n.success + '!</li>');
					$response.show(450).delay(1800).hide(400);
				}

				if (response.info == 'server_fail') {
					jQuery($response).find("ul").append('<li>' + tmm_mail_l10n.fail + '!</li>');
				}

				jQuery(form_self).find("[type=text],[type=email],textarea").val("");

			}

			// Scroll to bottom of the form to show respond message
			var bottomPosition = jQuery(form_self).offset().top + jQuery(form_self).outerHeight() - jQuery(window).height();

			if (jQuery(document).scrollTop() < bottomPosition) {
				jQuery('html, body').animate({
					scrollTop: bottomPosition
				});
			}

			update_capcha(form_self, response.hash);
		});
		return false;
	});

});

function update_capcha(form_object, hash) {
	jQuery(form_object).find("[name=verify]").val("");
	jQuery(form_object).find("[name=verify_code]").val(hash);
	jQuery(form_object).find(".contact_form_capcha").attr('src', tmm_mail_l10n.captcha_image_url + '?hash=' + hash);
}

/**
 * Google map
 */

function gmt_init_map(Lat, Lng, map_canvas_id, zoom, maptype, info, show_marker, show_popup, scrollwheel, custom_controls, marker_is_draggable) {
	var latLng = new google.maps.LatLng(Lat, Lng);
	var homeLatLng = new google.maps.LatLng(Lat, Lng);

	switch (maptype) {
		case "SATELLITE":
			maptype = google.maps.MapTypeId.SATELLITE;
			break;

		case "HYBRID":
			maptype = google.maps.MapTypeId.HYBRID;
			break;

		case "TERRAIN":
			maptype = google.maps.MapTypeId.TERRAIN;
			break;

		default:
			maptype = google.maps.MapTypeId.ROADMAP;
			break;

	}

	scrollwheel = parseInt(scrollwheel, 10);
	var map;
	if (custom_controls.length > 0) {

		var options = merge_objects_options({
			zoom: zoom,
			center: latLng,
			mapTypeId: maptype,
			scrollwheel: scrollwheel,
			disableDefaultUI: true
		}, custom_controls);

		map = new google.maps.Map(document.getElementById(map_canvas_id), options);
	} else {
		map = new google.maps.Map(document.getElementById(map_canvas_id), {
			zoom: zoom,
			center: latLng,
			mapTypeId: maptype,
			scrollwheel: scrollwheel
		});
	}

	show_marker = parseInt(show_marker, 10);
	if (show_marker) {
		var marker = new google.maps.Marker({
			position: homeLatLng,
			draggable: (parseInt(marker_is_draggable) == 1 ? true : false),
			map: map
		});


		if (show_popup && info != "") {
			google.maps.event.addListener(marker, "click", function(e) {
				iw.open(map, marker);
			});
			var iw = new google.maps.InfoWindow({
				content: info
			});
		}
	}

}

function merge_objects_options(obj1, obj2) {
	var obj3 = {};
	for (var attrname in obj1) {
		obj3[attrname] = obj1[attrname];
	}
	for (var attrname in obj2) {
		obj3[attrname] = obj2[attrname];
	}
	return obj3;
}

/**
 * Section background parallax
 */
jQuery(window).on('scroll', function(){
	bg_parallax();
});

bg_parallax();

function bg_parallax(el) {
	jQuery('.bg-scroll').each(function( i ) {
		// checks if the element is vertically visible
		var isVisible = ( window.innerHeight + window.scrollY > this.offsetTop ) && (window.scrollY < this.offsetTop + this.offsetHeight );

		if(isVisible) {
			this.style.backgroundPosition = '50% ' + ( this.offsetTop - window.scrollY ) / 3 + 'px';
		}
	});
}

/**
 * Services shortcode (touch event handler for mobiles)
 */

(function ($) {

	$(function () {

		var content_boxes = $('content-boxes');

		if (content_boxes.length) {

			if (Modernizr.touch) {

				content_boxes.on('touchstart', 'li', function (e) {
					e.preventDefault();

					if ($(this).hasClass('active')) {
						$(this).removeClass('active');
					} else {
						$(this).siblings('li').removeClass('active').end().addClass('active');
					}
				});

			}
		}

	});

}(jQuery));
