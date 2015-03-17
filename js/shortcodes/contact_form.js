jQuery(document).ready(function() {
	
	jQuery('.contact-form').submit(function() {		
            contact_form_submit(this, []);
		return false;
	});

	jQuery( '.tmm-country-select' ).on('change', function(){
		var country = jQuery(this).val();
		var stateSelect = jQuery(this).parents( '.contact-form' ).first().find( '.tmm-state-select' ).parents( 'p' ).first();
		var countyInput = jQuery(this).parents( '.contact-form' ).first().find( '.tmm-county-input' );
		var countyInputWrapper = countyInput.parents( 'p' ).first();

		if ( country == 'US' ) {
			stateSelect.show();
			countyInput.attr('type', 'hidden');
			countyInputWrapper.hide();
		} else {
			stateSelect.hide();
			countyInput.attr('type', 'text');
			countyInputWrapper.show();
		}
	});

});


function contact_form_submit(_this, contact_form_attachments) {

	$response = jQuery(_this).find(jQuery(".contact_form_responce"));
	$response.find("ul").html("");
	$response.find("ul").removeClass();

	var form_self = _this;
	var data = {
		action: "contact_form_request",
		attachments: contact_form_attachments,
		values: jQuery(_this).serialize()
	};
	jQuery.post(ajaxurl, data, function(response) {		
		response = jQuery.parseJSON(response);
		if (response.is_errors) {

			jQuery(form_self).find(".contact_form_responce ul").addClass("error type-2");
			jQuery.each(response.info, function(input_name, input_label) {
				jQuery(form_self).find("[name=" + input_name + "]").addClass("wrong-data");
				jQuery(form_self).find(".contact_form_responce ul").append('<li>' + lang_enter_correctly + ' "' + input_label + '"!</li>');
			});

			$response.show(450);

		} else {

			jQuery(form_self).find(".contact_form_responce ul").addClass("success type-2");

			if (response.info == 'succsess') {
				jQuery(form_self).find(".contact_form_responce ul").append('<li>' + lang_sended_succsessfully + '!</li>');
				$response.show(450).delay(1800).hide(400);
			}

			if (response.info == 'server_fail') {
				jQuery(form_self).find(".contact_form_responce ul").append('<li>' + lang_server_failed + '!</li>');
			}

			jQuery(form_self).find("[type=text],[type=email],[type=url],textarea").val("");
			jQuery(form_self).find("[type=checkbox],[type=radio]").prop("checked", false);
			jQuery(form_self).find("select").not('.tmm-state-select, .tmm-country-select').val("").find('option').first().prop("selected", true);
			jQuery(form_self).find('.contact_form_attach_list').html('');
		}

		jQuery(form_self).find(".contact_form_responce").show();

		// Scroll to bottom of the form to show respond message
		var bottomPosition = jQuery(form_self).offset().top + jQuery(form_self).outerHeight() - jQuery(window).height();

		if (jQuery(document).scrollTop() < bottomPosition) {
			jQuery('html, body').animate({
				scrollTop: bottomPosition
			});
		}

		update_capcha(form_self, response.hash);
	});
}

function update_capcha(form_object, hash) {
	jQuery(form_object).find("[name=verify]").val("");
	jQuery(form_object).find("[name=verify_code]").val(hash);
	jQuery(form_object).find(".contact_form_capcha").attr('src', capcha_image_url + '?hash=' + hash);
}
