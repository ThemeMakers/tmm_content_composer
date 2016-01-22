/**
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2014
 */

;(function ($, window) {

    'use strict';

    function gallery3d(el, options) {
        this.el = el;
        this.options = $.extend({}, gallery3d.options, options);
        this.init();
    }

    gallery3d.options = {
        directionNav: false,
        showSelectFx: false,
        defaultFx: 'fxRotateSoftly',
        selectFxOptions: {
            fxCorner: 'Corner scale',
            fxVScale: 'Vertical scale',
            fxFall: 'Fall',
            fxFPulse: 'Forward pulse',
            fxRPulse: 'Rotate pulse',
            fxHearbeat: 'Hearbeat',
            fxCoverflow: 'Coverflow',
            fxRotateSoftly: 'Rotate me softly',
            fxDeal: 'Deal \'em',
            fxFerris: 'Ferris wheel',
            fxShinkansen: 'Shinkansen',
            fxSnake: 'Snake',
            fxVacuum: 'Vacuum'
        }
    }

    gallery3d.prototype = {
        init: function () {
            var self = this;

            self.docElem = window.document.documentElement;

            var sectionWrapper = self.el.parent('.section');

            self.body = $('body').add(sectionWrapper).addClass('gallery3d');

            self.gridWrap = self.el.children('.grid-wrap');
            self.grid = self.gridWrap.children('.grid');
            self.gridItems = self.grid.children('figure');

            self.itemSize = {
                width : self.gridItems.width(),
                height : self.gridItems.height()
            };

            self.contentEl = self.el.children('.content-grid');
            self.items = self.contentEl.children('.grid-item');
            self.extraCell = self.items.children('.extra-cell');

            self.current = 0;
            self.itemsCount = self.items.length;

            self.isAnimate = false;

            self.close = self.contentEl.children('.close-content');
            self.loader = self.contentEl.children('.loading');

            self.touch = Modernizr.touch;
            self.support = Modernizr.pointerevents &&
            Modernizr.csstransitions &&
            Modernizr.csstransforms3d;

            if (self.options.directionNav) {
                self.directionNav.init(self);
            }

            if (self.options.showSelectFx) {
                self.showSelect.init(self);
            }
            self.initEvents();
        },
        initEvents: function () {
            var self = this;

            self.gridItems.on('click', function (ev) {
                ev.preventDefault();
                var index = $(this).index();
                self._showContent(index);
            });

            self.close.on('click', function (ev) {
                ev.preventDefault();
                self._hideContent();
            });

            self.extraCell.on('click', function () {
                self.close.trigger('click');
            });

            if (self.support) {
                $(window).on('resize', function () {
                    self._resizeHandler();
                });
                $(window).on('scroll', function () {
                    if (self.isAnimating) {
                        window.scrollTo(self.scrollPosition ? self.scrollPosition.x : 0, self.scrollPosition ? self.scrollPosition.y : 0);
                    } else {
                        self.scrollPosition = { x: window.pageXOffset || self.docElem.scrollLeft, y: window.pageYOffset || self.docElem.scrollTop };
                        self._scrollHandler();
                    }
                });
            }

        },
        navigate: function (dir) {
            var self = this;

            if (self.isAnimate) return false;
            self.isAnimate = true;

            var cntAnims = 0,
                currentItem = self.items.eq(self.current),
                current = self.current;

            if (dir === 'next') {
                self.current = self.current < self.itemsCount - 1 ? self.current + 1 : 0;
            } else if (dir === 'prev') {
                self.current = self.current > 0 ? self.current - 1 : self.itemsCount - 1;
            }

            var currentPosition = self.current,
                nextItem = self.items.eq(currentPosition);

            var onEndAnimationCurrentItem = function () {
                $(this).removeClass('current');
                self.gridItems.eq(current).removeClass('active');

                $(this).removeClass(dir === 'next' ? 'navOutNext' : 'navOutPrev');
                ++cntAnims;
                if (cntAnims === 2) {
                    self.isAnimate = false;
                }
            }

            var onEndAnimationNextItem = function () {
                $(this).addClass('current');
                self.gridItems.eq(self.current).addClass('active');

                $(this).removeClass(dir === 'next' ? 'navInNext' : 'navInPrev');
                ++cntAnims;
                if (cntAnims === 2) {
                    self.isAnimate = false;
                }
            }

            if (self.support) {
                currentItem.one(self.animEndEventNames(), onEndAnimationCurrentItem);
                nextItem.one(self.animEndEventNames(), onEndAnimationNextItem);
            } else {
                onEndAnimationCurrentItem();
                onEndAnimationNextItem();
            }
            currentItem.addClass(dir === 'next' ? 'navOutNext' : 'navOutPrev');
            nextItem.addClass(dir === 'next' ? 'navInNext' : 'navInPrev');

            self.replaceContent(currentPosition);
        },
        _showContent: function (pos) {
            if (this.isAnimating) {
                return false;
            }
            this.isAnimating = true;

            var self = this,
                loadContent = function () {

                    setTimeout(function () {
                        self.loader.removeClass('show');
                        if (self.options.directionNav !== false) {
                            self.nav.removeClass('show');
                        }
                        if (self.options.showSelectFx !== false) {
                            self.customSelect.removeClass('show');
                        }
                        self.items.eq(pos).addClass('current');
                    }, 1000);

                    self.contentEl.addClass('show');
                    self.loader.addClass('show');
                    if (self.options.directionNav !== false) {
                        self.nav.addClass('show');
                    }
                    if (self.options.showSelectFx !== false) {
                        self.customSelect.addClass('show');
                    }
                    self.body.addClass('noscroll');

                    self.isAnimating = false;
                };

            if (!self.support) {
                loadContent();
                return false;
            }

            self.current = pos;

            var currentItem = this.gridItems.eq(pos),
                content = self.returnContent(currentItem);

            this.placeholder = this.createPlaceholder(currentItem, content);

            this.placeholder.appendTo(this.grid);

            var animFn = function () {
                currentItem.addClass('active');
                self.gridWrap.addClass('view-full');
                self._resizePlaceholder();
                self.resizeImage();

                var onEndTransitionFn = function () {
                    $(this).off(self.transEndEventName(), onEndTransitionFn);
                    loadContent();
                };
                self.placeholder.on(self.transEndEventName(), onEndTransitionFn);
            };
            setTimeout(animFn, 25);
        },
        returnContent: function (currentItem) {
            return currentItem.find('img').clone();
        },
        replaceContent: function (pos) {
            var currentItem = this.gridItems.eq(pos);
            this.front.html(this.returnContent(currentItem));
        },
        _hideContent: function () {
            var self = this,
                contentItem = self.contentEl.children('.current'),
                currentItem = self.gridItems.eq(contentItem.index());

            contentItem.removeClass('current');
            self.contentEl.removeClass('show');

            setTimeout(function () {
                self.body.removeClass('noscroll');
            }, 25);

            if (!self.support) return false;

            self.gridWrap.removeClass('view-full');

            self.placeholder.css({
                left: currentItem.get(0).offsetLeft,
                top: currentItem.get(0).offsetTop,
                width: self.itemSize.width,
                height: self.itemSize.height
            });

            var onEndPlaceholderTransFn = function () {
                self.placeholder.remove();
                currentItem.removeClass('active');
            };
            self.placeholder.one(self.transEndEventName(), onEndPlaceholderTransFn);
        },
        directionNav: {
            init: function (self) {
                var me = this;
                me.createNav(self);
                me.addListener(self);
            },
            createNav: function (self) {
                self.nav = $('<nav/>', {
                    'class': 'direction-nav'
                });
                self.navPrev = $('<a/>', {
                    'class': 'prev-item',
                    html: 'Previous item',
                    href: '#'
                });
                self.navNext = $('<a/>', {
                    'class': 'next-item',
                    html: 'Next item',
                    href: '#'
                });
                self.nav.append(self.navPrev.add(self.navNext));
                self.contentEl.append(self.nav);
            },
            addListener: function (self) {
                self.navPrev.on('click', function (ev) {
                    ev.preventDefault();
                    self.navigate('prev');
                });
                self.navNext.on('click', function (ev) {
                    ev.preventDefault();
                    self.navigate('next');
                });
            }
        },
        showSelect: {
            init: function (self) {
                var me = this;
                me.show.call(self);
                me.addListener.call(self);
            },
            addListener: function () {
                var self = this;
                self.selectFx.on('change', function () {
                    var $this = $(this),
                        $val = $this.val();
                    self.el.removeClass();
                    if ($val !== '-1') {
                        self.el.addClass($val);
                    }
                });
            },
            show: function () {
                var self = this;

                self.selectFx = $('<select/>', { id: 'fxselect' });
                self.customSelect = $('<div class="custom-select"/>').append(self.selectFx);

                if (self.options.selectFxOptions) {
                    var options = '<option value="-1" selected>Choose an effect...</option>';
                    $.each(self.options.selectFxOptions, function (fx, name) {
                        options += '<option value="' + fx + '">' + name + '</option>';
                    });
                    self.selectFx.append(options);
                }
                self.contentEl.append(self.customSelect);
            }
        },
        scrollX: function () {
            return window.pageXOffset || this.docElem.scrollLeft;
        },
        scrollY: function () {
            return window.pageYOffset || this.docElem.scrollTop;
        },
        getViewportW: function () {
            var client = this.docElem['clientWidth'],
                inner = window['innerWidth'];
            if (client < inner) {
                return inner;
            } else {
                return client;
            }
        },
        getViewportH: function () {
            var client = this.docElem['clientHeight'],
                inner = window['innerHeight'];
            if (client < inner) {
                return inner;
            } else {
                return client;
            }
        },
        transEndEventName: function () {
            var transEndEventNames = {
                'WebkitTransition': 'webkitTransitionEnd',
                'MozTransition': 'transitionend',
                'OTransition': 'oTransitionEnd',
                'msTransition': 'MSTransitionEnd',
                'transition': 'transitionend'
            };
            return transEndEventNames[Modernizr.prefixed('transition')];
        },
        animEndEventNames: function () {
            var animEndEventNames = {
                'WebkitAnimation' : 'webkitAnimationEnd',
                'OAnimation' : 'oAnimationEnd',
                'msAnimation' : 'MSAnimationEnd',
                'animation' : 'animationend'
            };
            return animEndEventNames[Modernizr.prefixed('animation')];
        },
        createPlaceholder: function (currentItem, content) {

            var self = this;
            self.front = $('<div/>', {
                'class': 'front',
                html: content
            });
            var	back = $('<div/>', {
                    'class': 'back',
                    html: '&nbsp;'
                }),
                placeholder = $('<div/>', {
                    'class': 'placeholder'
                }).append(self.front).append(back);
            placeholder.css({
                left: currentItem.position().left,
                top: currentItem.position().top,
                width: self.itemSize.width,
                height: self.itemSize.height
            });
            return placeholder;
        },
        _scrollPage: function () {
            var perspY = this.scrollY() + this.getViewportH() / 2;

            this.gridWrap.css({
                WebkitPerspectiveOrigin: '50%' + perspY + 'px',
                MozPerspectiveOrigin: '50%' + perspY + 'px',
                perspectiveOrigin: '50%' + perspY + 'px'
            });
            this.didScroll = false;
        },
        _resizeHandler: function () {
            var self = this;

            self.resizeImage();

            function delayed() {
                self._resizePlaceholder();
                self._scrollPage();
                self._resizeTimeout = null;
            }

            if (this._resizeTimeout) {
                clearTimeout(this._resizeTimeout);
            }
            this._resizeTimeout = setTimeout(delayed, 50);
        },
        _resizePlaceholder: function () {
            this.itemSize = { width: this.gridItems.width(), height: this.gridItems.height() };

            if (this.placeholder) {
                this.placeholder.css({
                    left: Number(-1 * (this.grid.position().left - this.scrollX())) + 'px',
                    top: Number(-1 * (this.grid.position().top - this.scrollY())) + 'px',
                    width: this.getViewportW() + 'px',
                    height: this.getViewportH() + 'px'
                });
            }
        },
        resizeImage: function () {
            var self = this,
                item = self.items.find('img');
            if (!item) { return; }
            if (self.touch) {
                var zoomLevel = document.documentElement.clientWidth / window.innerWidth;
                var height = window.innerHeight * zoomLevel;
                self.wH = height;
            } else {
                self.wH = $(window).height();
            }
            var decr = parseInt(item.css('padding-top'), 10) + parseInt(item.css('padding-bottom'),10);

            item.css('max-height', self.wH - decr);
        },
        _scrollHandler: function () {
            var self = this;
            if (!this.didScroll) {
                this.didScroll = true;
                setTimeout(function () {
                    self._scrollPage();
                }, 60);
            }
        }
    };

    window.gallery3d = gallery3d;

})(jQuery, window);
