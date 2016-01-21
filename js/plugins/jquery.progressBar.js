/*
 * progressBar
 * MIT licensed
 *
 */

(function ($) {

	$.fn.progressBar = function(options, callback) {

		var defaults = {
			speed: 600,
			easing: 'swing',
			total: false,
			percent: false
		}, o = $.extend({}, defaults, options);

		return this.each(function () {
			var el = $(this),
				elem = el.find('.progress-bar'),
				add = 0;

			methods = ({
				init: function () {
					this.touch = Modernizr.touch;
					this.processing();
				},
				getProgress: function (bar, number) {
					return bar.data('progress') * number;
				},
				setProgress: function (self) {
					if (o.total) {
						var size = elem.not('.total-score').size();
					}
					elem.not('.total-score').each(function (i, value) {
						var bar = $('.bar', $(value)),
							per = $('.progress-percent', $(value));

						if (o.total) {
							add += self.getProgress(bar, 1);
						}

						self.animFn(bar, per, self.getProgress(bar, 10), o);

					}).end().filter('.total-score').each(function (i, value) {
						if (o.total) {
							var bar = $('.bar', $(value)),
								per = $('.progress-percent', $(value)),
								average = (add / size).toFixed(1) * 10;
							self.animFn(bar, per, average, o, true);
						}
					});
				},
				animFn: function(bar, per, progress, options, total) {
					if(o.percent){
						bar.animate({ 'width': progress + '%' }, {
							duration: options.speed,
							easing: options.easing
						});

					}else{
						bar.animate({ 'width': progress + '%' }, {
							duration: options.speed,
							easing: options.easing,
							step: function (progress) {
								if (options.total && !total) {
									per.text((progress / 10).toFixed(0));
								} else {
									per.text((progress / 10).toFixed(1));
								}
							}
						});
					}

				},
				processing: function () {
					var self = this;

					if (self.touch) {
						self.setProgress(self);
					} else {

						el.appear({
							accX: 0,
							accY: -150,
							data: function () {
								self.setProgress(self);
							}
						});

						//self.setProgress(self);

					}
				}
			}).init();
		});
	};

})(jQuery);