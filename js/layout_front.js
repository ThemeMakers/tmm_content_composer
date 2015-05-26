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
					effect: 'translateEffect',
					speed: 200,
					beforeCall : function (el) {
						$(el).find('.box').addClass(this.effect);
					}
				})
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
			container.on('start', function () {
				elements.each(function (i) {
					var element = $(this);
					setTimeout(function () {
						o.getData ? element.addClass(o.effect + 'Run') : element.addClass(element.data('effect') + 'Run');
						setTimeout(function () {
							element.removeClass(o.effect);
						}, i * o.speed);
					}, (i * o.speed));
				});
			});
		});
	};
	
	/* end Effect */
	
}(jQuery));