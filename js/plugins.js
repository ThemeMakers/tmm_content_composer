var charcount = 512;
var widget_advanced_search = 1;
var menu_advanced_search = 1;

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

        var settings = $.extend({
            data: undefined,
			speedAddClass: 300,
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
			//t.one('appear', modifiedFn);

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



// Advanced search

(function($){
    var methods = {
        init: function(){
            var $this = this;  
                                  
            $this.searchInputMenu = $('input.advanced_search');
            $this.searchInWidget = $('.widget_search input');            
            $this.charcount = charcount;                  
           
            if (widget_advanced_search=='1'){
                $this.initKeyupEvent($this.searchInWidget);
            }
            if (menu_advanced_search=='1'){
                 $this.initKeyupEvent($this.searchInputMenu);
            }
            
            $this.ajaxNavi();
        },        
        initKeyupEvent: function(a){
            var $this = this;
            var form = a.parent().parent();          
            var spiner = $('<div id="circleG"><div id="circleG_1" class="circleG"></div><div id="circleG_2" class="circleG"></div><div id="circleG_3" class="circleG"></div></div>');
            
            a.bind('click keyup', function(e){
                
                if (a.val().length>=$this.charcount){           
                    
                    var results = form.find('.ajax_response');
                    if(!results.length) results = $('<div class="ajax_response"></div>').appendTo(form);                        
                    results.append(spiner);
                    
                    var data = {
                        action: 'advanced_search',
                        s: a.val()
                    };
                    $.post(ajaxurl, data, function(response){                 
                        
                        var height,
                        results = form.find('.ajax_response');                        
                        results.mCustomScrollbar("destroy");                        
                        if(response == 0) response = "";
                        results.html(response);                 
                        results.slideDown(300);                  
                        
                        results.mCustomScrollbar({
                            contentTouchScroll: true,                            
                            setHeight: '300px',
                            autoHideScrollbar: true,
                            axis:"y",                            
                            mouseWheel:{ enable: true, preventDefault: true }
                            
                        });    
                      
                        height = (results.attr('class').indexOf('mCS_no_scrollbar')!=-1) ? 'auto' : '300px';
                        results.css({
                             height: height
                        });                       
                      
                    });                   
                }
                
            });
            
            a.parent().parent().focusout(function(){
                setTimeout(function(){
                    $('.ajax_response').slideUp(400);    
                },600);                
            });
                       
        },
        
        animateElements: function () {
                if ($('.elementFade').length) {
                        $('.elementFade').appear({
                                accX: 0,
                                accY: -150,
                                data: 'elementFade',
                                speedAddClass: 0
                        });	
                }

                if ($('.slideUp').length) {
                        $('.slideUp').appear({
                                accX: 0,
                                accY: -150,
                                data: 'slideUp'
                        });	
                }

                if ($('.slideLeft').length) {
                        $('.slideLeft').appear({
                                accX: 0,
                                accY: -150,
                                data: 'slideLeft'
                        });	
                }

                if ($('.slideRight').length) {
                        $('.slideRight').appear({
                                accX: 0,
                                accY: -150,
                                data: 'slideRight'
                        });	
                }
                if ($('.slideDown').length) {
                        $('.slideDown').appear({
                                accX: 0,
                                accY: -150,
                                data: 'slideDown'
                        });	
                }

                if ($('.opacity').length) {
                        $('.opacity').appear({
                                accX: 0,
                                accY: 300,
                                data: 'opacity'
                        });	
                }

                if ($('.opacity2x').length) {
                        $('.opacity2x').appear({
                                accX: 0,
                                accY: 150,
                                data: 'opacity2x'
                        });	
                }

                if ($('.slideUp2x').length) {
                        $('.slideUp2x').appear({
                                accX: 0,
                                accY: 300,
                                data: 'slideUp2x',
                                speedAddClass: 200
                        });	
                }

                if ($('.scale').length) {
                        $('.scale').appear({
                                accX: 0,
                                accY: 150,
                                data: 'scale'
                        });	
                }

                if ($('.extraRadius').length) {
                        $('.extraRadius').appear({
                                accX: 0,
                                accY: -150,
                                data: 'extraRadius'
                        });	
                }
        },
        ajaxNavi:function(){
            var $this = this,
                nav = $('.advanced_search>a'),
                navi = $('.pagenavi.advanced_search'),
                post_ids = navi.data('posts'),               
                posts_per_page = navi.data('postsperpage');           
            
            nav.life('click', function(){                
                var current_page = $(this).text();
                if ($(this).attr('class').indexOf('next')!=-1){
                    current_page = +$('.current').text()+1;
                }
                if ($(this).attr('class').indexOf('prev')!=-1){
                    current_page = +$('.current').text()-1;
                }
                var data = {
                    action: 'ajax_search_navi',
                    post_ids: post_ids,
                    current_page: current_page,
                    posts_per_page:posts_per_page
                };
                jQuery.post(ajaxurl, data, function(response){
                    if (response){
                        var post_area = $('#post-area'),
                            apend_to = post_area.parent(),
                            pagenavbar = $('.pagenavbar'),                           
                            prev = $('<a class="prev page-numbers" href="#"></a>'),
                            next = $('<a class="next page-numbers" href="#"></a>');
                            
                        post_area.remove();
                        pagenavbar.remove();
                        apend_to.prepend(response); 
                        var navi = $('.pagenavbar').find('.advanced_search');                        
                        if ($('.page-numbers:last-child').attr('class').indexOf('current')!=-1){
                            navi.prepend(prev);                                                        
                        }
                        else if ($('.page-numbers:first-child').attr('class').indexOf('current')!=-1){
                            navi.append(next);                                                        
                        }
                        else{                            
                            navi.prepend(prev);
                            navi.append(next);                            
                        }
                         
                        $this.animateElements();
                      
                        if ($('article').find('.image-slider')){                                   
                                 $('.image-slider').owlCarousel(CONFIG.objImageSlider);
                        }
                        if ($('article').find('audio')) {
                                $('audio').mediaelementplayer({
                                        audioWidth: '100%',
                                        audioHeight: 45,
                                        videoWidth: '100%',
                                        videoHeight: '100%'
                                });
                        };
                        if ($('article').find('video').length) {
                            $('video').mediaelementplayer({                                                   
                                videoWidth: '',
                                videoHeight: ''
                            });
                        };
                        
                        $('#content').fitVids();
                                            
                        if ($('article').find('.slide-image').length) {
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
                    }
                });
                return false;
            });
        }
    };
    
    methods.init();
    
})(jQuery);