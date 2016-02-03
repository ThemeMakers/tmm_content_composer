jQuery(document).ready(function() {

	/* ---------------------------------------------------------------------- */
	/*	Form
	 /* ---------------------------------------------------------------------- */

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
					jQuery($response).find("ul").append('<li>' + lang_enter_correctly + ' "' + input_label + '"!</li>');
				});

				$response.show(450);

			} else {

				jQuery($response).find("ul").addClass("success type-2");

				if (response.info == 'succsess') {
					jQuery($response).find("ul").append('<li>' + lang_sended_succsessfully + '!</li>');
					$response.show(450).delay(1800).hide(400);
				}

				if (response.info == 'server_fail') {
					jQuery($response).find("ul").append('<li>' + lang_server_failed + '!</li>');
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
	jQuery(form_object).find(".contact_form_capcha").attr('src', capcha_image_url + '?hash=' + hash);
}

/* Google map */

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
