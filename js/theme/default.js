(function ($) {

    $(function () {

        if (!Modernizr.touch) {

            $('.section-full-width, .container, .projects, .masonry, .clients-items, .progress-bar, .team-member.type-1').waypoints({ offset: '74%' });

            if ($('.opacityEffect').length) {
                $('.section-full-width').effect({ effect: 'opacityEffect' });
            }

            if ($('.scaleEffect').length) {
                $('.section-full-width').effect({ effect: 'scaleEffect' });
            }

            if ($('.rotateEffect').length) {
                $('.section-full-width').effect({ effect: 'rotateEffect' });
            }

            if ($('.slideRightEffect').length) {
                $('.section-full-width').effect({ effect: 'slideRightEffect' });
            }

            if ($('.slideLeftEffect').length) {
                $('.section-full-width').effect({ effect: 'slideLeftEffect' });
            }

            if ($('.slideDownEffect').length) {
                $('.section-full-width').effect({ effect: 'slideDownEffect' });
            }

            if ($('.slideUpEffect').length) {
                $('.section-full-width').effect({ effect: 'slideUpEffect' });
            }

            if ($('.projects').length) {
                $('.projects').effect({
                    effect : 'translateEffect',
                    speed: 200,
                    beforeCall : function (el) {
                        $(el).find('article').addClass(this.effect);
                    }
                });
            }

            if ($('.masonry').length) {

                $('.masonry').effect({
                    effect: 'swipeDownEffect',
                    speed: 200,
                    beforeCall : function (el) {
                        $(el).find('.cover').addClass(this.effect);
                    }
                });

                $('.masonry').effect({
                    effect: 'showMeEffect',
                    speed: 200,
                    beforeCall : function (el) {
                        $(el).find('article').addClass(this.effect).addClass('shown');
                    }
                });
            }

            if ($('.clients-items').length) {
                $('.clients-items').effect({
                    effect : 'translateEffect',
                    speed: 200,
                    beforeCall : function (el) {
                        $(el).find('li').addClass(this.effect);
                    }
                });
            }

            if ($('.team-member.type-1').length) {
                $('.team-member.type-1').effect({
                    effect : 'scaleEffect',
                    speed: 200,
                    beforeCall : function (el) {
                        $(el).find('article').addClass(this.effect);
                    }
                });
            }

            if ($('.ca-shortcode').length) {
                $('.section-full-width').effect({
                    effect: 'scaleEffect',
                    speed: 200,
                    beforeCall : function (el) {
                        $(el).find('.ca-icon').addClass(this.effect);
                    }
                })
            }

            // For ShortCode Image
            if ($('.animate-image').length) {
                $('.container, .section-full-width').effect({
                    getData : false
                });
            }

        }

    });

    /* ---------------------------------------------------- */
    /*	Waypoints											*/
    /* ---------------------------------------------------- */

    $.fn.waypoints = function (options) {
        var defaults = {
            offset: 'viewportHeight', //bottom-in-view
            triggerOnce: true
        }, o = $.extend({}, defaults, options);
        return this.each(function () {
            var element = $(this);
            setTimeout(function () {
                element.waypoint(function (direction) {
                    $(this).trigger('start');
                }, o);
            }, 100);
        });
    };

    /* end Waypoints */

    /* ---------------------------------------------------- */
    /*	Effect												*/
    /* ---------------------------------------------------- */

    $.fn.effect = function (options) {

        var defaults = {
            effect : 'scaleEffect',
            speed: 350,
            getData : true,
            delay: 0,
            beforeCall : function() {}
        }, o = $.extend({}, defaults, options);

        return this.each(function () {
            var container = $(this), elements;
            o.beforeCall(container);
            o.getData ? elements = container.find('.' + o.effect) : elements = container.find('[data-effect]');
            //container.on('start', function () {
            elements.each(function (i) {
                var element = $(this);
                setTimeout(function () {
                    o.getData ? element.addClass(o.effect + 'Run') : element.addClass(element.data('effect') + 'Run');
                    setTimeout(function () {
                        element.removeClass(o.effect);
                    }, i * o.speed);
                }, (i * o.speed));
            });
            //});
        });
    };

    /* end Effect */

}(jQuery));


/* Ajax Navigation */

jQuery(function() {
    jQuery('.ajax_navigation_link').life('click', function() {
        jQuery('.ajax-content').show();
        jQuery('.ajax-navigation-content > li').hide();
        jQuery('.ajax_navigation_content_' + jQuery(this).data('page-id')).show(333);
        jQuery(this).parent().parent().find('li').removeClass('current');
        jQuery(this).parent().addClass('current');
        return false;
    });

    jQuery('.ajax-nav').find('.ajax_navigation_link').eq(0).trigger('click');
});


/* Contact Form */

jQuery(document).ready(function() {

    jQuery('.contact-form').submit(function() {
        contact_form_submit(this, []);
        return false;
    });

    jQuery(".contact_form_option_checkbox").life('click', function() {
        if (jQuery(this).is(":checked")) {
            jQuery(this).val(1);
        } else {
            jQuery(this).val(0);
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

            jQuery(form_self).find("[type=text],[type=email],textarea,checkbox").val("");
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


/* Google Map */

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
