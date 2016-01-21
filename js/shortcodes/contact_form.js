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

