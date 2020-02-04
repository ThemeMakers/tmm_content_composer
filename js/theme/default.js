(function ($) {

    $.fn.life = function(types, data, fn) {
        "use strict";
        $(this.context).on(types, this.selector, data, fn);
        return this;
    };

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

    $(function () {

        if (!Modernizr.touch) {

            $('.section-full-width, .post-list, .projects, .clients-items, .progress-bar, .team-member.type-1').waypoints({ offset: '74%' });

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
                    effect: 'translateEffect',
                    speed: 400
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


}(jQuery));

(function($){

    /* ---------------------------------------------------- */
    /*	FitVids												*/
    /* ---------------------------------------------------- */

    $.fn.fitVids = function(options) {
        var settings = {
            customSelector: null
        };

        if (!document.getElementById('fit-vids-style')) {

            var div = document.createElement('div'),
                ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0],
                cssStyles = '&shy;<style>.fluid-width-video-wrapper{width:100%; position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>';

            div.className = 'fit-vids-style';
            div.id = 'fit-vids-style';
            div.style.display = 'none';
            div.innerHTML = cssStyles;

            ref.parentNode.insertBefore(div, ref);

        }

        if (options) {
            $.extend(settings, options);
        }

        return this.each(function() {
            var selectors = [
                "iframe[src*='player.vimeo.com'].fitwidth",
                "iframe[src*='youtube.com'].fitwidth",
                "iframe[src*='youtube-nocookie.com'].fitwidth",
                "iframe[src*='kickstarter.com'][src*='video.html'].fitwidth",
                "object",
                "embed"
            ];

            if (settings.customSelector) {
                selectors.push(settings.customSelector);
            }

            var $allVideos = $(this).find(selectors.join(','));
            $allVideos = $allVideos.not("object object"); // SwfObj conflict patch


            $allVideos.each(function() {
                var $this = $(this);
                if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) {
                    return;
                }
                var height = (this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10)))) ? parseInt($this.attr('height'), 10) : $this.height(),
                    width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
                    aspectRatio = height / width;
                if (!$this.attr('id')) {
                    var videoID = 'fitvid' + Math.floor(Math.random() * 999999);
                    $this.attr('id', videoID);
                }
                $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100) + "%");
                $this.removeAttr('height').removeAttr('width');

            });
        });

    };


    /* ---------------------------------------------------- */
    /*	Masonry                                             */
    /* ---------------------------------------------------- */

    function masonry_reload() {

        $('div#masonryjaxloader').show();

        var test_post_key = 0,
            masonryjaxloader = $('#masonryjaxloader'),
            posts = masonryjaxloader.data('posts'),
            posts_per_load = masonryjaxloader.data('posts-per-load'),
            page_load = masonryjaxloader.data('page-load'),
            category = masonryjaxloader.data('category'),
            buttons = masonryjaxloader.data('buttons');

        if (posts) {
            posts = posts.split(',');
            for (var i = 0; i < posts.length; i++) {
                var post_key = posts[i];

                if ((post_key) && (test_post_key != post_key)) {

                    $('#infscr-loading').animate({opacity: 'show'}, 300);

                    var data = {
                        action: "folio_get_masonry_piece",
                        post_key: post_key,
                        category: category,
                        buttons: buttons,
                        posts_per_load: posts_per_load,
                        page_load: page_load

                    };
                    $.post(ajaxurl, data, function(response) {
                        response = $.parseJSON(response);
                        var post_key = response.key;
                        response = response.article;

                        test_post_key = post_key;

                        $('#masonryjaxloader').replaceWith(response);

                        if ($('#masonryjaxloader').data('posts') == '') {
                            $('.masonry_view_more_button').remove();
                        }

                        $("#post-area").imagesLoaded(function() {

                            var el = $('.masonry_piece_' + post_key);
                            $("#post-area").append(el).masonry('appended', el, true);
                            $('#post-area').masonry('reload');
                            $('#post-area .masonry_piece_' + post_key).css({'opacity': 0});

                            setTimeout(function() {
                                $('#post-area').masonry('reload');
                                $('.masonry_piece_' + post_key).animate({'opacity': 1}, 777);
                                $('#infscr-loading').animate({opacity: 'hide'}, 800);
                                $('#content').fitVids();
                            }, 200);

                            if ($('.slide-image').length) {
                                $('.slide-image').each(function() {

                                    var c = $(this).find('.curtain');
                                    if (c.length < 1) {
                                        $(this).append('\
                                            <div class="curtain">\n\
                                                    <div class="ch-curtain">\n\
                                                            <div class="ch-front"></div>\n\
                                                            <div class="ch-back"></div>\n\
                                                    </div>\n\
                                            </div>');
                                    }

                                });
                            }

                            if ($('.image-slider').length) {
                                $('.image-slider').owlCarousel(CONFIG.objImageSlider);
                            }

                            if ($('audio').length) {
                                $('audio').mediaelementplayer({
                                    audioWidth: '100%',
                                    audioHeight: 45
                                });
                            }

                            if ($('video').length) {
                                $('video').mediaelementplayer({
                                    videoWidth: '',
                                    videoHeight: ''
                                });
                            }

                            $("a.social-like").on('click', function() {

                                var heart = $(this);
                                var post_id = heart.data("post_id");

                                // Ajax call

                                $.ajax({
                                    type: "post",
                                    url: ajaxurl,
                                    data: "action=post-like&nonce=" + ajax_nonce + "&post_like=&post_id=" + post_id,
                                    success: function(count) {

                                        if (count != "already")
                                        {
                                            heart.addClass("voted");
                                            heart.find(".count").text(count);
                                        }

                                    }
                                });

                                return false;
                            });

                        });
                    });
                }
            }
        }
    }

    if ($('.masonry').length){
        var k;
        var more_button = $('.masonry_view_more_button');
        var load_by_scroll=more_button.data('loadbyscroll');

        if (more_button.length){
            if (load_by_scroll){
                $(window).scroll(function() {
                    var win_scroll = $(window).scrollTop();
                    var button_top = more_button.offset().top;
                    if (win_scroll > (button_top-800)) {
                        var posts_load = $('#masonryjaxloader').data('posts');
                        if (posts_load!=k){
                            masonry_reload();
                            k=posts_load;
                        }
                    }
                });
            }else{
                more_button.on('click', function(){
                    var posts_load = $('#masonryjaxloader').data('posts');
                    if (posts_load!=k){
                        masonry_reload();
                        k=posts_load;
                    }
                    return false;
                });
            }
        }
    }

    $.fn.init_masonry=function(columns, animation){
        var $container = jQuery('#post-area'),
            containerWidth = $container.width();

        $container.masonry({
            itemSelector: '.post-item',
            isAnimated: animation,
            isAnimatedFromBottom: true,
            columnWidth: containerWidth/columns

        });

        $container.animate({'opacity': 1}, 777, function() {
            jQuery('#infscr-loading').animate({opacity: 'hide'}, 333);
        });

    };

    /* ---------------------------------------------------- */
    /*	Tabs												*/
    /* ---------------------------------------------------- */

    if ($('.tabs-holder').length) {

        var $tabsHolder = $('.tabs-holder');

        $tabsHolder.each(function(i, val) {

            var $tabsNav = $('.tabs-nav', val),
                tabsNavLis = $tabsNav.children('li'),
                $tabsContainer = $('.tabs-container', val),
                eventtype = Modernizr.touch ? 'touchstart' : 'click';

            $tabsNav.each(function() {
                $(this).next().children('.tab-content').first().stop(true, true).show();
                $(this).children('li').first().addClass('active').stop(true, true).show();
            });

            $tabsNav.on(eventtype, 'a', function(e) {
                var $this = $(this).parent('li'),
                    $index = $this.index();
                $this.siblings().removeClass('active').end().addClass('active');
                $this.parent().next().children('.tab-content').stop(true, true).hide().eq($index).stop(true, true).fadeIn(250);
                e.preventDefault();
            });
        });
    }


    /*----------------------------------------------------*/
    /*	Accordion and Toggle							  */
    /*----------------------------------------------------*/

    if ($('.acc-box').length) {

        var $box = $('.acc-box');

        $box.each(function () {
            var $trigger = $('.acc-trigger', $(this)),
                eventtype = Modernizr.touch ? 'touchstart' : 'click';
            $trigger.on(eventtype, function() {
                var $this = $(this);
                if ($this.data('mode') === 'toggle') {
                    $this.toggleClass('active').next().stop(true, true).slideToggle(300);
                } else {
                    if ($this.next().is(':hidden')) {
                        $trigger.removeClass('active').next().slideUp(300);
                        $this.toggleClass('active').next().slideDown(300);
                    } else if ($this.hasClass('active')) {
                        $this.removeClass('active').next().slideUp(300);
                    }
                }
                return false;
            });
        });
    }

    /*----------------------------------------------------*/
    /*	Alert Boxes										  */
    /*----------------------------------------------------*/

    var $notifications = $('.error, .success, .info, .notice');

    if ($notifications.length) {
        $notifications.notifications({ speed: 300 });
    }

    /* ---------------------------------------------------- */
    /*	Curtain												*/
    /* ---------------------------------------------------- */

    if ($('.slide-image').length) {
        $('.slide-image').each(function () {
            $(this).append('\
						<div class="curtain">\n\
							<div class="ch-curtain">\n\
								<div class="ch-front"></div>\n\
								<div class="ch-back"></div>\n\
							</div>\n\
						</div>');
        });
    }


    /* ---------------------------------------------------- */
    /*	Google Map Expand				                    */
    /* ---------------------------------------------------- */

    if ($('.google_map_expand').length) {

        var $google_map_toggle = $('.google_map_toggle'),
            $google_map_close = $('.google_map_close'),
            map_height = $google_map_toggle.data('height');

        $google_map_toggle.on('click touchstart', function (e) {
            e.preventDefault();
            var $this = $(this);
            if (!$this.hasClass('expand')) {
                $this.addClass('expand');
                $google_map_close.addClass('active');
                $this.animate({
                    height: map_height+260
                });
            }
        });

        $google_map_close.on('click touchstart', function (e) {
            e.preventDefault();
            if ($google_map_toggle.hasClass('expand')) {
                $google_map_toggle.removeClass('expand');
                $(this).removeClass('active');
                $google_map_toggle.animate({
                    height: map_height
                });
            }
        });
    }

    /* ---------------------------------------------------- */
    /*	CountTo												*/
    /* ---------------------------------------------------- */

    if ($('.counter').length) {
        var counter = $('.counter');
        if (!Modernizr.touch) {
            counter.waypoint(function (direction) {
                if (direction == 'down') {
                    counter.countTo();
                }
            }, { offset: '64%'});
        } else { counter.countTo();	}
    }

    /* ---------------------------------------------------- */
    /*	Init Progress Bar				                    */
    /* ---------------------------------------------------- */

    if ($('.progress-bar').length) {
        $('.progress-bar').progressBar();
    }

    /* ---------------------------------------------------- */
    /*	OwlCarousel				                        	*/
    /* ---------------------------------------------------- */

    if ($('.image-slider').length){
        $('.image-slider').owlCarousel(CONFIG.objImageSlider);
    }

    /* ---------------------------------------------------- */
    /*	Textislide                                      */
    /* ---------------------------------------------------- */

    if ($('.slogan-group').length) {
        $('.slogan-group').textislide(CONFIG.objSloganGroup);
    }




}(jQuery));

// Contact form

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

// Google Map

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

