/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 *
 * Open source under the BSD License.
 *
 * Copyright � 2008 George McGinley Smith
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list
 * of conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 *
 * Neither the name of the author nor the names of contributors may be used to endorse
 * or promote products derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('h.i[\'1a\']=h.i[\'z\'];h.O(h.i,{y:\'D\',z:9(x,t,b,c,d){6 h.i[h.i.y](x,t,b,c,d)},17:9(x,t,b,c,d){6 c*(t/=d)*t+b},D:9(x,t,b,c,d){6-c*(t/=d)*(t-2)+b},13:9(x,t,b,c,d){e((t/=d/2)<1)6 c/2*t*t+b;6-c/2*((--t)*(t-2)-1)+b},X:9(x,t,b,c,d){6 c*(t/=d)*t*t+b},U:9(x,t,b,c,d){6 c*((t=t/d-1)*t*t+1)+b},R:9(x,t,b,c,d){e((t/=d/2)<1)6 c/2*t*t*t+b;6 c/2*((t-=2)*t*t+2)+b},N:9(x,t,b,c,d){6 c*(t/=d)*t*t*t+b},M:9(x,t,b,c,d){6-c*((t=t/d-1)*t*t*t-1)+b},L:9(x,t,b,c,d){e((t/=d/2)<1)6 c/2*t*t*t*t+b;6-c/2*((t-=2)*t*t*t-2)+b},K:9(x,t,b,c,d){6 c*(t/=d)*t*t*t*t+b},J:9(x,t,b,c,d){6 c*((t=t/d-1)*t*t*t*t+1)+b},I:9(x,t,b,c,d){e((t/=d/2)<1)6 c/2*t*t*t*t*t+b;6 c/2*((t-=2)*t*t*t*t+2)+b},G:9(x,t,b,c,d){6-c*8.C(t/d*(8.g/2))+c+b},15:9(x,t,b,c,d){6 c*8.n(t/d*(8.g/2))+b},12:9(x,t,b,c,d){6-c/2*(8.C(8.g*t/d)-1)+b},Z:9(x,t,b,c,d){6(t==0)?b:c*8.j(2,10*(t/d-1))+b},Y:9(x,t,b,c,d){6(t==d)?b+c:c*(-8.j(2,-10*t/d)+1)+b},W:9(x,t,b,c,d){e(t==0)6 b;e(t==d)6 b+c;e((t/=d/2)<1)6 c/2*8.j(2,10*(t-1))+b;6 c/2*(-8.j(2,-10*--t)+2)+b},V:9(x,t,b,c,d){6-c*(8.o(1-(t/=d)*t)-1)+b},S:9(x,t,b,c,d){6 c*8.o(1-(t=t/d-1)*t)+b},Q:9(x,t,b,c,d){e((t/=d/2)<1)6-c/2*(8.o(1-t*t)-1)+b;6 c/2*(8.o(1-(t-=2)*t)+1)+b},P:9(x,t,b,c,d){f s=1.l;f p=0;f a=c;e(t==0)6 b;e((t/=d)==1)6 b+c;e(!p)p=d*.3;e(a<8.w(c)){a=c;f s=p/4}m f s=p/(2*8.g)*8.r(c/a);6-(a*8.j(2,10*(t-=1))*8.n((t*d-s)*(2*8.g)/p))+b},H:9(x,t,b,c,d){f s=1.l;f p=0;f a=c;e(t==0)6 b;e((t/=d)==1)6 b+c;e(!p)p=d*.3;e(a<8.w(c)){a=c;f s=p/4}m f s=p/(2*8.g)*8.r(c/a);6 a*8.j(2,-10*t)*8.n((t*d-s)*(2*8.g)/p)+c+b},T:9(x,t,b,c,d){f s=1.l;f p=0;f a=c;e(t==0)6 b;e((t/=d/2)==2)6 b+c;e(!p)p=d*(.3*1.5);e(a<8.w(c)){a=c;f s=p/4}m f s=p/(2*8.g)*8.r(c/a);e(t<1)6-.5*(a*8.j(2,10*(t-=1))*8.n((t*d-s)*(2*8.g)/p))+b;6 a*8.j(2,-10*(t-=1))*8.n((t*d-s)*(2*8.g)/p)*.5+c+b},F:9(x,t,b,c,d,s){e(s==u)s=1.l;6 c*(t/=d)*t*((s+1)*t-s)+b},E:9(x,t,b,c,d,s){e(s==u)s=1.l;6 c*((t=t/d-1)*t*((s+1)*t+s)+1)+b},16:9(x,t,b,c,d,s){e(s==u)s=1.l;e((t/=d/2)<1)6 c/2*(t*t*(((s*=(1.B))+1)*t-s))+b;6 c/2*((t-=2)*t*(((s*=(1.B))+1)*t+s)+2)+b},A:9(x,t,b,c,d){6 c-h.i.v(x,d-t,0,c,d)+b},v:9(x,t,b,c,d){e((t/=d)<(1/2.k)){6 c*(7.q*t*t)+b}m e(t<(2/2.k)){6 c*(7.q*(t-=(1.5/2.k))*t+.k)+b}m e(t<(2.5/2.k)){6 c*(7.q*(t-=(2.14/2.k))*t+.11)+b}m{6 c*(7.q*(t-=(2.18/2.k))*t+.19)+b}},1b:9(x,t,b,c,d){e(t<d/2)6 h.i.A(x,t*2,0,c,d)*.5+b;6 h.i.v(x,t*2-d,0,c,d)*.5+c*.5+b}});',62,74,'||||||return||Math|function|||||if|var|PI|jQuery|easing|pow|75|70158|else|sin|sqrt||5625|asin|||undefined|easeOutBounce|abs||def|swing|easeInBounce|525|cos|easeOutQuad|easeOutBack|easeInBack|easeInSine|easeOutElastic|easeInOutQuint|easeOutQuint|easeInQuint|easeInOutQuart|easeOutQuart|easeInQuart|extend|easeInElastic|easeInOutCirc|easeInOutCubic|easeOutCirc|easeInOutElastic|easeOutCubic|easeInCirc|easeInOutExpo|easeInCubic|easeOutExpo|easeInExpo||9375|easeInOutSine|easeInOutQuad|25|easeOutSine|easeInOutBack|easeInQuad|625|984375|jswing|easeInOutBounce'.split('|'),0,{}));

/*
 * jQuery Touchswipe
 */
(function(a){a.fn.swipe=function(c){if(!this){return false}var k={fingers:1,threshold:75,timeThreshold:500,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,click:null,triggerOnTouchEnd:true,allowPageScroll:"auto"};var m="left";var l="right";var d="up";var s="down";var j="none";var v="horizontal";var q="vertical";var o="auto";var f="start";var i="move";var h="end";var n="cancel";var t="ontouchstart" in window,b=t?"touchstart":"mousedown",p=t?"touchmove":"mousemove",g=t?"touchend":"mouseup",r="touchcancel";var e="start";var u;if(c.allowPageScroll==undefined&&(c.swipe!=undefined||c.swipeStatus!=undefined)){c.allowPageScroll=j}if(c){a.extend(k,c)}return this.each(function(){var E=this;var I=a(this);var F=null;var J=0;var y={x:0,y:0};var B={x:0,y:0};var L={x:0,y:0};function A(P){var O=t?P.touches[0]:P;e=f;if(t){J=P.touches.length}distance=0;direction=null;if(J==k.fingers||!t){y.x=B.x=O.pageX;y.y=B.y=O.pageY;if(k.swipeStatus){z(P,e)}var N=new Date();u=N.getTime()}else{D(P)}E.addEventListener(p,K,false);E.addEventListener(g,M,false)}function K(Q){if(e==h||e==n){return}var P=t?Q.touches[0]:Q;B.x=P.pageX;B.y=P.pageY;direction=w();if(t){J=Q.touches.length}e=i;H(Q,direction);if(J==k.fingers||!t){distance=C();if(k.swipeStatus){z(Q,e,direction,distance)}if(!k.triggerOnTouchEnd){var O=new Date();var R=O.getTime();var N=R-u;if(distance>=k.threshold&&N<=k.timeThreshold){e=h;z(Q,e);D(Q)}}}else{e=n;z(Q,e);D(Q)}}function M(P){P.preventDefault();distance=C();direction=w();if(k.triggerOnTouchEnd){e=h;if((J==k.fingers||!t)&&B.x!=0){var O=new Date();var Q=O.getTime();var N=Q-u;if(distance>=k.threshold&&N<=k.timeThreshold){z(P,e);D(P)}else{e=n;z(P,e);D(P)}}else{e=n;z(P,e);D(P)}}else{if(e==i){e=n;z(P,e);D(P)}}E.removeEventListener(p,K,false);E.removeEventListener(g,M,false)}function D(N){J=0;y.x=0;y.y=0;B.x=0;B.y=0;L.x=0;L.y=0}function z(O,N){if(k.swipeStatus){k.swipeStatus.call(I,O,N,direction||null,distance||0)}if(N==n){if(k.click&&(J==1||!t)&&(isNaN(distance)||distance==0)){k.click.call(I,O,O.target)}}if(N==h){if(k.swipe){k.swipe.call(I,O,direction,distance)}switch(direction){case m:if(k.swipeLeft){k.swipeLeft.call(I,O,direction,distance)}break;case l:if(k.swipeRight){k.swipeRight.call(I,O,direction,distance)}break;case d:if(k.swipeUp){k.swipeUp.call(I,O,direction,distance)}break;case s:if(k.swipeDown){k.swipeDown.call(I,O,direction,distance)}break}}}function H(N,O){if(k.allowPageScroll==j){N.preventDefault()}else{var P=k.allowPageScroll==o;switch(O){case m:if((k.swipeLeft&&P)||(!P&&k.allowPageScroll!=v)){N.preventDefault()}break;case l:if((k.swipeRight&&P)||(!P&&k.allowPageScroll!=v)){N.preventDefault()}break;case d:if((k.swipeUp&&P)||(!P&&k.allowPageScroll!=q)){N.preventDefault()}break;case s:if((k.swipeDown&&P)||(!P&&k.allowPageScroll!=q)){N.preventDefault()}break}}}function C(){return Math.round(Math.sqrt(Math.pow(B.x-y.x,2)+Math.pow(B.y-y.y,2)))}function x(){var Q=y.x-B.x;var P=B.y-y.y;var N=Math.atan2(P,Q);var O=Math.round(N*180/Math.PI);if(O<0){O=360-Math.abs(O)}return O}function w(){var N=x();if((N<=45)&&(N>=0)){return m}else{if((N<=360)&&(N>=315)){return m}else{if((N>=135)&&(N<=225)){return l}else{if((N>45)&&(N<135)){return s}else{return d}}}}}try{this.addEventListener(b,A,false);this.addEventListener(r,D)}catch(G){}})}})(jQuery);

/*
 * jQuery Mousewheel
 *
 *! Copyright (c) 2013 Brandon Aaron (http://brandon.aaron.sh)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Version: 3.1.12
 *
 * Requires: jQuery 1.2.2+
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a:a(jQuery)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b),d=c["offsetParent"in a.fn?"offsetParent":"parent"]();return d.length||(d=a("body")),parseInt(d.css("fontSize"),10)||parseInt(c.css("fontSize"),10)||16},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})});

/*
 * malihu jquery custom scrollbar plugin
 * Version: 3.0.5,
 * License: MIT License (MIT)
 * Depends on jQuery Mousewheel
 */
!function(e,t,o){!function(t){var a="function"==typeof define&&define.amd,n="https:"==o.location.protocol?"https:":"http:",r="cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.11/jquery.mousewheel.min.js";a||e.event.special.mousewheel||e("head").append(decodeURI("%3Cscript src="+n+"//"+r+"%3E%3C/script%3E")),t()}(function(){var a="mCustomScrollbar",n="mCS",r=".mCustomScrollbar",i={setWidth:!1,setHeight:!1,setTop:0,setLeft:0,axis:"y",scrollbarPosition:"inside",scrollInertia:950,autoDraggerLength:!0,autoHideScrollbar:!1,autoExpandScrollbar:!1,alwaysShowScrollbar:0,snapAmount:null,snapOffset:0,mouseWheel:{enable:!0,scrollAmount:"auto",axis:"y",preventDefault:!1,deltaFactor:"auto",normalizeDelta:!1,invert:!1,disableOver:["select","option","keygen","datalist","textarea"]},scrollButtons:{enable:!1,scrollType:"stepless",scrollAmount:"auto"},keyboard:{enable:!0,scrollType:"stepless",scrollAmount:"auto"},contentTouchScroll:25,advanced:{autoExpandHorizontalScroll:!1,autoScrollOnFocus:"input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",updateOnContentResize:!0,updateOnImageLoad:!0,updateOnSelectorChange:!1,releaseDraggableSelectors:!1},theme:"light",callbacks:{onInit:!1,onScrollStart:!1,onScroll:!1,onTotalScroll:!1,onTotalScrollBack:!1,whileScrolling:!1,onTotalScrollOffset:0,onTotalScrollBackOffset:0,alwaysTriggerOffsets:!0,onOverflowY:!1,onOverflowX:!1,onOverflowYNone:!1,onOverflowXNone:!1},live:!1,liveSelector:null},l=0,s={},c=function(e){s[e]&&(clearTimeout(s[e]),h._delete.call(null,s[e]))},d=t.attachEvent&&!t.addEventListener?1:0,u=!1,f={init:function(t){var t=e.extend(!0,{},i,t),o=h._selector.call(this);if(t.live){var a=t.liveSelector||this.selector||r,d=e(a);if("off"===t.live)return void c(a);s[a]=setTimeout(function(){d.mCustomScrollbar(t),"once"===t.live&&d.length&&c(a)},500)}else c(a);return t.setWidth=t.set_width?t.set_width:t.setWidth,t.setHeight=t.set_height?t.set_height:t.setHeight,t.axis=t.horizontalScroll?"x":h._findAxis.call(null,t.axis),t.scrollInertia=t.scrollInertia>0&&t.scrollInertia<17?17:t.scrollInertia,"object"!=typeof t.mouseWheel&&1==t.mouseWheel&&(t.mouseWheel={enable:!0,scrollAmount:"auto",axis:"y",preventDefault:!1,deltaFactor:"auto",normalizeDelta:!1,invert:!1}),t.mouseWheel.scrollAmount=t.mouseWheelPixels?t.mouseWheelPixels:t.mouseWheel.scrollAmount,t.mouseWheel.normalizeDelta=t.advanced.normalizeMouseWheelDelta?t.advanced.normalizeMouseWheelDelta:t.mouseWheel.normalizeDelta,t.scrollButtons.scrollType=h._findScrollButtonsType.call(null,t.scrollButtons.scrollType),h._theme.call(null,t),e(o).each(function(){var o=e(this);if(!o.data(n)){o.data(n,{idx:++l,opt:t,scrollRatio:{y:null,x:null},overflowed:null,contentReset:{y:null,x:null},bindEvents:!1,tweenRunning:!1,sequential:{},langDir:o.css("direction"),cbOffsets:null,trigger:null});var a=o.data(n).opt,r=o.data("mcs-axis"),i=o.data("mcs-scrollbar-position"),s=o.data("mcs-theme");r&&(a.axis=r),i&&(a.scrollbarPosition=i),s&&(a.theme=s,h._theme.call(null,a)),h._pluginMarkup.call(this),f.update.call(null,o)}})},update:function(t){var o=t||h._selector.call(this);return e(o).each(function(){var t=e(this);if(t.data(n)){var o=t.data(n),a=o.opt,r=e("#mCSB_"+o.idx+"_container"),i=[e("#mCSB_"+o.idx+"_dragger_vertical"),e("#mCSB_"+o.idx+"_dragger_horizontal")];if(!r.length)return;o.tweenRunning&&h._stop.call(null,t),t.hasClass("mCS_disabled")&&t.removeClass("mCS_disabled"),t.hasClass("mCS_destroyed")&&t.removeClass("mCS_destroyed"),h._maxHeight.call(this),h._expandContentHorizontally.call(this),"y"===a.axis||a.advanced.autoExpandHorizontalScroll||r.css("width",h._contentWidth(r.children())),o.overflowed=h._overflowed.call(this),h._scrollbarVisibility.call(this),a.autoDraggerLength&&h._setDraggerLength.call(this),h._scrollRatio.call(this),h._bindEvents.call(this);var l=[Math.abs(r[0].offsetTop),Math.abs(r[0].offsetLeft)];"x"!==a.axis&&(o.overflowed[0]?i[0].height()>i[0].parent().height()?h._resetContentPosition.call(this):(h._scrollTo.call(this,t,l[0].toString(),{dir:"y",dur:0,overwrite:"none"}),o.contentReset.y=null):(h._resetContentPosition.call(this),"y"===a.axis?h._unbindEvents.call(this):"yx"===a.axis&&o.overflowed[1]&&h._scrollTo.call(this,t,l[1].toString(),{dir:"x",dur:0,overwrite:"none"}))),"y"!==a.axis&&(o.overflowed[1]?i[1].width()>i[1].parent().width()?h._resetContentPosition.call(this):(h._scrollTo.call(this,t,l[1].toString(),{dir:"x",dur:0,overwrite:"none"}),o.contentReset.x=null):(h._resetContentPosition.call(this),"x"===a.axis?h._unbindEvents.call(this):"yx"===a.axis&&o.overflowed[0]&&h._scrollTo.call(this,t,l[0].toString(),{dir:"y",dur:0,overwrite:"none"}))),h._autoUpdate.call(this)}})},scrollTo:function(t,o){if("undefined"!=typeof t&&null!=t){var a=h._selector.call(this);return e(a).each(function(){var a=e(this);if(a.data(n)){var r=a.data(n),i=r.opt,l={trigger:"external",scrollInertia:i.scrollInertia,scrollEasing:"mcsEaseInOut",moveDragger:!1,timeout:60,callbacks:!0,onStart:!0,onUpdate:!0,onComplete:!0},s=e.extend(!0,{},l,o),c=h._arr.call(this,t),d=s.scrollInertia>0&&s.scrollInertia<17?17:s.scrollInertia;c[0]=h._to.call(this,c[0],"y"),c[1]=h._to.call(this,c[1],"x"),s.moveDragger&&(c[0]*=r.scrollRatio.y,c[1]*=r.scrollRatio.x),s.dur=d,setTimeout(function(){null!==c[0]&&"undefined"!=typeof c[0]&&"x"!==i.axis&&r.overflowed[0]&&(s.dir="y",s.overwrite="all",h._scrollTo.call(this,a,c[0].toString(),s)),null!==c[1]&&"undefined"!=typeof c[1]&&"y"!==i.axis&&r.overflowed[1]&&(s.dir="x",s.overwrite="none",h._scrollTo.call(this,a,c[1].toString(),s))},s.timeout)}})}},stop:function(){var t=h._selector.call(this);return e(t).each(function(){var t=e(this);t.data(n)&&h._stop.call(null,t)})},disable:function(t){var o=h._selector.call(this);return e(o).each(function(){var o=e(this);if(o.data(n)){{var a=o.data(n);a.opt}h._autoUpdate.call(this,"remove"),h._unbindEvents.call(this),t&&h._resetContentPosition.call(this),h._scrollbarVisibility.call(this,!0),o.addClass("mCS_disabled")}})},destroy:function(){var t=h._selector.call(this);return e(t).each(function(){var o=e(this);if(o.data(n)){var r=o.data(n),i=r.opt,l=e("#mCSB_"+r.idx),s=e("#mCSB_"+r.idx+"_container"),d=e(".mCSB_"+r.idx+"_scrollbar");i.live&&c(t),h._autoUpdate.call(this,"remove"),h._unbindEvents.call(this),h._resetContentPosition.call(this),o.removeData(n),h._delete.call(null,this.mcs),d.remove(),l.replaceWith(s.contents()),o.removeClass(a+" _"+n+"_"+r.idx+" mCS-autoHide mCS-dir-rtl mCS_no_scrollbar mCS_disabled").addClass("mCS_destroyed")}})}},h={_selector:function(){return"object"!=typeof e(this)||e(this).length<1?r:this},_theme:function(t){var o=["rounded","rounded-dark","rounded-dots","rounded-dots-dark"],a=["rounded-dots","rounded-dots-dark","3d","3d-dark","3d-thick","3d-thick-dark","inset","inset-dark","inset-2","inset-2-dark","inset-3","inset-3-dark"],n=["minimal","minimal-dark"],r=["minimal","minimal-dark"],i=["minimal","minimal-dark"];t.autoDraggerLength=e.inArray(t.theme,o)>-1?!1:t.autoDraggerLength,t.autoExpandScrollbar=e.inArray(t.theme,a)>-1?!1:t.autoExpandScrollbar,t.scrollButtons.enable=e.inArray(t.theme,n)>-1?!1:t.scrollButtons.enable,t.autoHideScrollbar=e.inArray(t.theme,r)>-1?!0:t.autoHideScrollbar,t.scrollbarPosition=e.inArray(t.theme,i)>-1?"outside":t.scrollbarPosition},_findAxis:function(e){return"yx"===e||"xy"===e||"auto"===e?"yx":"x"===e||"horizontal"===e?"x":"y"},_findScrollButtonsType:function(e){return"stepped"===e||"pixels"===e||"step"===e||"click"===e?"stepped":"stepless"},_pluginMarkup:function(){var t=e(this),o=t.data(n),r=o.opt,i=r.autoExpandScrollbar?" mCSB_scrollTools_onDrag_expand":"",l=["<div id='mCSB_"+o.idx+"_scrollbar_vertical' class='mCSB_scrollTools mCSB_"+o.idx+"_scrollbar mCS-"+r.theme+" mCSB_scrollTools_vertical"+i+"'><div class='mCSB_draggerContainer'><div id='mCSB_"+o.idx+"_dragger_vertical' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>","<div id='mCSB_"+o.idx+"_scrollbar_horizontal' class='mCSB_scrollTools mCSB_"+o.idx+"_scrollbar mCS-"+r.theme+" mCSB_scrollTools_horizontal"+i+"'><div class='mCSB_draggerContainer'><div id='mCSB_"+o.idx+"_dragger_horizontal' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>"],s="yx"===r.axis?"mCSB_vertical_horizontal":"x"===r.axis?"mCSB_horizontal":"mCSB_vertical",c="yx"===r.axis?l[0]+l[1]:"x"===r.axis?l[1]:l[0],d="yx"===r.axis?"<div id='mCSB_"+o.idx+"_container_wrapper' class='mCSB_container_wrapper' />":"",u=r.autoHideScrollbar?" mCS-autoHide":"",f="x"!==r.axis&&"rtl"===o.langDir?" mCS-dir-rtl":"";r.setWidth&&t.css("width",r.setWidth),r.setHeight&&t.css("height",r.setHeight),r.setLeft="y"!==r.axis&&"rtl"===o.langDir?"989999px":r.setLeft,t.addClass(a+" _"+n+"_"+o.idx+u+f).wrapInner("<div id='mCSB_"+o.idx+"' class='mCustomScrollBox mCS-"+r.theme+" "+s+"'><div id='mCSB_"+o.idx+"_container' class='mCSB_container' style='position:relative; top:"+r.setTop+"; left:"+r.setLeft+";' dir="+o.langDir+" /></div>");var _=e("#mCSB_"+o.idx),m=e("#mCSB_"+o.idx+"_container");"y"===r.axis||r.advanced.autoExpandHorizontalScroll||m.css("width",h._contentWidth(m.children())),"outside"===r.scrollbarPosition?("static"===t.css("position")&&t.css("position","relative"),t.css("overflow","visible"),_.addClass("mCSB_outside").after(c)):(_.addClass("mCSB_inside").append(c),m.wrap(d)),h._scrollButtons.call(this);var p=[e("#mCSB_"+o.idx+"_dragger_vertical"),e("#mCSB_"+o.idx+"_dragger_horizontal")];p[0].css("min-height",p[0].height()),p[1].css("min-width",p[1].width())},_contentWidth:function(t){return Math.max.apply(Math,t.map(function(){return e(this).outerWidth(!0)}).get())},_expandContentHorizontally:function(){var t=e(this),o=t.data(n),a=o.opt,r=e("#mCSB_"+o.idx+"_container");a.advanced.autoExpandHorizontalScroll&&"y"!==a.axis&&r.css({position:"absolute",width:"auto"}).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({width:Math.ceil(r[0].getBoundingClientRect().right+.4)-Math.floor(r[0].getBoundingClientRect().left),position:"relative"}).unwrap()},_scrollButtons:function(){var t=e(this),o=t.data(n),a=o.opt,r=e(".mCSB_"+o.idx+"_scrollbar:first"),i=["<a href='#' class='mCSB_buttonUp' oncontextmenu='return false;' />","<a href='#' class='mCSB_buttonDown' oncontextmenu='return false;' />","<a href='#' class='mCSB_buttonLeft' oncontextmenu='return false;' />","<a href='#' class='mCSB_buttonRight' oncontextmenu='return false;' />"],l=["x"===a.axis?i[2]:i[0],"x"===a.axis?i[3]:i[1],i[2],i[3]];a.scrollButtons.enable&&r.prepend(l[0]).append(l[1]).next(".mCSB_scrollTools").prepend(l[2]).append(l[3])},_maxHeight:function(){var t=e(this),o=t.data(n),a=(o.opt,e("#mCSB_"+o.idx)),r=t.css("max-height"),i=-1!==r.indexOf("%"),l=t.css("box-sizing");if("none"!==r){var s=i?t.parent().height()*parseInt(r)/100:parseInt(r);"border-box"===l&&(s-=t.innerHeight()-t.height()+(t.outerHeight()-t.innerHeight())),a.css("max-height",Math.round(s))}},_setDraggerLength:function(){var t=e(this),o=t.data(n),a=e("#mCSB_"+o.idx),r=e("#mCSB_"+o.idx+"_container"),i=[e("#mCSB_"+o.idx+"_dragger_vertical"),e("#mCSB_"+o.idx+"_dragger_horizontal")],l=[a.height()/r.outerHeight(!1),a.width()/r.outerWidth(!1)],s=[parseInt(i[0].css("min-height")),Math.round(l[0]*i[0].parent().height()),parseInt(i[1].css("min-width")),Math.round(l[1]*i[1].parent().width())],c=d&&s[1]<s[0]?s[0]:s[1],u=d&&s[3]<s[2]?s[2]:s[3];i[0].css({height:c,"max-height":i[0].parent().height()-10}).find(".mCSB_dragger_bar").css({"line-height":s[0]+"px"}),i[1].css({width:u,"max-width":i[1].parent().width()-10})},_scrollRatio:function(){var t=e(this),o=t.data(n),a=e("#mCSB_"+o.idx),r=e("#mCSB_"+o.idx+"_container"),i=[e("#mCSB_"+o.idx+"_dragger_vertical"),e("#mCSB_"+o.idx+"_dragger_horizontal")],l=[r.outerHeight(!1)-a.height(),r.outerWidth(!1)-a.width()],s=[l[0]/(i[0].parent().height()-i[0].height()),l[1]/(i[1].parent().width()-i[1].width())];o.scrollRatio={y:s[0],x:s[1]}},_onDragClasses:function(e,t,o){var a=o?"mCSB_dragger_onDrag_expanded":"",n=["mCSB_dragger_onDrag","mCSB_scrollTools_onDrag"],r=e.closest(".mCSB_scrollTools");"active"===t?(e.toggleClass(n[0]+" "+a),r.toggleClass(n[1]),e[0]._draggable=e[0]._draggable?0:1):e[0]._draggable||("hide"===t?(e.removeClass(n[0]),r.removeClass(n[1])):(e.addClass(n[0]),r.addClass(n[1])))},_overflowed:function(){var t=e(this),o=t.data(n),a=e("#mCSB_"+o.idx),r=e("#mCSB_"+o.idx+"_container"),i=null==o.overflowed?r.height():r.outerHeight(!1),l=null==o.overflowed?r.width():r.outerWidth(!1);return[i>a.height(),l>a.width()]},_resetContentPosition:function(){var t=e(this),o=t.data(n),a=o.opt,r=e("#mCSB_"+o.idx),i=e("#mCSB_"+o.idx+"_container"),l=[e("#mCSB_"+o.idx+"_dragger_vertical"),e("#mCSB_"+o.idx+"_dragger_horizontal")];if(h._stop(t),("x"!==a.axis&&!o.overflowed[0]||"y"===a.axis&&o.overflowed[0])&&(l[0].add(i).css("top",0),h._scrollTo(t,"_resetY")),"y"!==a.axis&&!o.overflowed[1]||"x"===a.axis&&o.overflowed[1]){var s=dx=0;"rtl"===o.langDir&&(s=r.width()-i.outerWidth(!1),dx=Math.abs(s/o.scrollRatio.x)),i.css("left",s),l[1].css("left",dx),h._scrollTo(t,"_resetX")}},_bindEvents:function(){function t(){i=setTimeout(function(){e.event.special.mousewheel?(clearTimeout(i),h._mousewheel.call(o[0])):t()},1e3)}var o=e(this),a=o.data(n),r=a.opt;if(!a.bindEvents){if(h._draggable.call(this),r.contentTouchScroll&&h._contentDraggable.call(this),r.mouseWheel.enable){var i;t()}h._draggerRail.call(this),h._wrapperScroll.call(this),r.advanced.autoScrollOnFocus&&h._focus.call(this),r.scrollButtons.enable&&h._buttons.call(this),r.keyboard.enable&&h._keyboard.call(this),a.bindEvents=!0}},_unbindEvents:function(){var t=e(this),a=t.data(n),r=a.opt,i=n+"_"+a.idx,l=".mCSB_"+a.idx+"_scrollbar",s=e("#mCSB_"+a.idx+",#mCSB_"+a.idx+"_container,#mCSB_"+a.idx+"_container_wrapper,"+l+" .mCSB_draggerContainer,#mCSB_"+a.idx+"_dragger_vertical,#mCSB_"+a.idx+"_dragger_horizontal,"+l+">a"),c=e("#mCSB_"+a.idx+"_container");r.advanced.releaseDraggableSelectors&&s.add(e(r.advanced.releaseDraggableSelectors)),a.bindEvents&&(e(o).unbind("."+i),s.each(function(){e(this).unbind("."+i)}),clearTimeout(t[0]._focusTimeout),h._delete.call(null,t[0]._focusTimeout),clearTimeout(a.sequential.step),h._delete.call(null,a.sequential.step),clearTimeout(c[0].onCompleteTimeout),h._delete.call(null,c[0].onCompleteTimeout),a.bindEvents=!1)},_scrollbarVisibility:function(t){var o=e(this),a=o.data(n),r=a.opt,i=e("#mCSB_"+a.idx+"_container_wrapper"),l=i.length?i:e("#mCSB_"+a.idx+"_container"),s=[e("#mCSB_"+a.idx+"_scrollbar_vertical"),e("#mCSB_"+a.idx+"_scrollbar_horizontal")],c=[s[0].find(".mCSB_dragger"),s[1].find(".mCSB_dragger")];"x"!==r.axis&&(a.overflowed[0]&&!t?(s[0].add(c[0]).add(s[0].children("a")).css("display","block"),l.removeClass("mCS_no_scrollbar_y mCS_y_hidden")):(r.alwaysShowScrollbar?(2!==r.alwaysShowScrollbar&&c[0].add(s[0].children("a")).css("display","none"),l.removeClass("mCS_y_hidden")):(s[0].css("display","none"),l.addClass("mCS_y_hidden")),l.addClass("mCS_no_scrollbar_y"))),"y"!==r.axis&&(a.overflowed[1]&&!t?(s[1].add(c[1]).add(s[1].children("a")).css("display","block"),l.removeClass("mCS_no_scrollbar_x mCS_x_hidden")):(r.alwaysShowScrollbar?(2!==r.alwaysShowScrollbar&&c[1].add(s[1].children("a")).css("display","none"),l.removeClass("mCS_x_hidden")):(s[1].css("display","none"),l.addClass("mCS_x_hidden")),l.addClass("mCS_no_scrollbar_x"))),a.overflowed[0]||a.overflowed[1]?o.removeClass("mCS_no_scrollbar"):o.addClass("mCS_no_scrollbar")},_coordinates:function(e){var t=e.type;switch(t){case"pointerdown":case"MSPointerDown":case"pointermove":case"MSPointerMove":case"pointerup":case"MSPointerUp":return[e.originalEvent.pageY,e.originalEvent.pageX,!1];case"touchstart":case"touchmove":case"touchend":var o=e.originalEvent.touches[0]||e.originalEvent.changedTouches[0],a=e.originalEvent.touches.length||e.originalEvent.changedTouches.length;return[o.pageY,o.pageX,a>1];default:return[e.pageY,e.pageX,!1]}},_draggable:function(){function t(e){var t=p.find("iframe");if(t.length){var o=e?"auto":"none";t.css("pointer-events",o)}}function a(e,t,o,a){if(p[0].idleTimer=f.scrollInertia<233?250:0,r.attr("id")===m[1])var n="x",i=(r[0].offsetLeft-t+a)*c.scrollRatio.x;else var n="y",i=(r[0].offsetTop-e+o)*c.scrollRatio.y;h._scrollTo(s,i.toString(),{dir:n,drag:!0})}var r,i,l,s=e(this),c=s.data(n),f=c.opt,_=n+"_"+c.idx,m=["mCSB_"+c.idx+"_dragger_vertical","mCSB_"+c.idx+"_dragger_horizontal"],p=e("#mCSB_"+c.idx+"_container"),g=e("#"+m[0]+",#"+m[1]),v=f.advanced.releaseDraggableSelectors?g.add(e(f.advanced.releaseDraggableSelectors)):g;g.bind("mousedown."+_+" touchstart."+_+" pointerdown."+_+" MSPointerDown."+_,function(a){if(a.stopImmediatePropagation(),a.preventDefault(),h._mouseBtnLeft(a)){u=!0,d&&(o.onselectstart=function(){return!1}),t(!1),h._stop(s),r=e(this);var n=r.offset(),c=h._coordinates(a)[0]-n.top,_=h._coordinates(a)[1]-n.left,m=r.height()+n.top,p=r.width()+n.left;m>c&&c>0&&p>_&&_>0&&(i=c,l=_),h._onDragClasses(r,"active",f.autoExpandScrollbar)}}).bind("touchmove."+_,function(e){e.stopImmediatePropagation(),e.preventDefault();var t=r.offset(),o=h._coordinates(e)[0]-t.top,n=h._coordinates(e)[1]-t.left;a(i,l,o,n)}),e(o).bind("mousemove."+_+" pointermove."+_+" MSPointerMove."+_,function(e){if(r){var t=r.offset(),o=h._coordinates(e)[0]-t.top,n=h._coordinates(e)[1]-t.left;if(i===o)return;a(i,l,o,n)}}).add(v).bind("mouseup."+_+" touchend."+_+" pointerup."+_+" MSPointerUp."+_,function(){r&&(h._onDragClasses(r,"active",f.autoExpandScrollbar),r=null),u=!1,d&&(o.onselectstart=null),t(!0)})},_contentDraggable:function(){function t(e,t){var o=[1.5*t,2*t,t/1.5,t/2];return e>90?t>4?o[0]:o[3]:e>60?t>3?o[3]:o[2]:e>30?t>8?o[1]:t>6?o[0]:t>4?t:o[2]:t>8?t:o[3]}function o(e,t,o,a,n,r){e&&h._scrollTo(g,e.toString(),{dur:t,scrollEasing:o,dir:a,overwrite:n,drag:r})}var a,r,i,l,s,c,d,f,_,m,p,g=e(this),v=g.data(n),x=v.opt,S=n+"_"+v.idx,C=e("#mCSB_"+v.idx),b=e("#mCSB_"+v.idx+"_container"),w=[e("#mCSB_"+v.idx+"_dragger_vertical"),e("#mCSB_"+v.idx+"_dragger_horizontal")],y=[],B=[],T=0,M="yx"===x.axis?"none":"all",k=[];b.bind("touchstart."+S+" pointerdown."+S+" MSPointerDown."+S,function(e){if(h._pointerTouch(e)&&!u&&!h._coordinates(e)[2]){var t=b.offset();a=h._coordinates(e)[0]-t.top,r=h._coordinates(e)[1]-t.left,k=[h._coordinates(e)[0],h._coordinates(e)[1]]}}).bind("touchmove."+S+" pointermove."+S+" MSPointerMove."+S,function(e){if(h._pointerTouch(e)&&!u&&!h._coordinates(e)[2]){e.stopImmediatePropagation(),c=h._getTime();var t=C.offset(),n=h._coordinates(e)[0]-t.top,i=h._coordinates(e)[1]-t.left,l="mcsLinearOut";if(y.push(n),B.push(i),k[2]=Math.abs(h._coordinates(e)[0]-k[0]),k[3]=Math.abs(h._coordinates(e)[1]-k[1]),v.overflowed[0])var s=w[0].parent().height()-w[0].height(),d=a-n>0&&n-a>-(s*v.scrollRatio.y)&&(2*k[3]<k[2]||"yx"===x.axis);if(v.overflowed[1])var f=w[1].parent().width()-w[1].width(),_=r-i>0&&i-r>-(f*v.scrollRatio.x)&&(2*k[2]<k[3]||"yx"===x.axis);(d||_)&&e.preventDefault(),m="yx"===x.axis?[a-n,r-i]:"x"===x.axis?[null,r-i]:[a-n,null],b[0].idleTimer=250,v.overflowed[0]&&o(m[0],T,l,"y","all",!0),v.overflowed[1]&&o(m[1],T,l,"x",M,!0)}}),C.bind("touchstart."+S+" pointerdown."+S+" MSPointerDown."+S,function(e){if(h._pointerTouch(e)&&!u&&!h._coordinates(e)[2]){e.stopImmediatePropagation(),h._stop(g),s=h._getTime();var t=C.offset();i=h._coordinates(e)[0]-t.top,l=h._coordinates(e)[1]-t.left,y=[],B=[]}}).bind("touchend."+S+" pointerup."+S+" MSPointerUp."+S,function(e){if(h._pointerTouch(e)&&!u&&!h._coordinates(e)[2]){e.stopImmediatePropagation(),d=h._getTime();var a=C.offset(),n=h._coordinates(e)[0]-a.top,r=h._coordinates(e)[1]-a.left;if(!(d-c>30)){_=1e3/(d-s);var g="mcsEaseOut",S=2.5>_,w=S?[y[y.length-2],B[B.length-2]]:[0,0];f=S?[n-w[0],r-w[1]]:[n-i,r-l];var T=[Math.abs(f[0]),Math.abs(f[1])];_=S?[Math.abs(f[0]/4),Math.abs(f[1]/4)]:[_,_];var k=[Math.abs(b[0].offsetTop)-f[0]*t(T[0]/_[0],_[0]),Math.abs(b[0].offsetLeft)-f[1]*t(T[1]/_[1],_[1])];m="yx"===x.axis?[k[0],k[1]]:"x"===x.axis?[null,k[1]]:[k[0],null],p=[4*T[0]+x.scrollInertia,4*T[1]+x.scrollInertia];var O=parseInt(x.contentTouchScroll)||0;m[0]=T[0]>O?m[0]:0,m[1]=T[1]>O?m[1]:0,v.overflowed[0]&&o(m[0],p[0],g,"y",M,!1),v.overflowed[1]&&o(m[1],p[1],g,"x",M,!1)}}})},_mousewheel:function(){function t(e){var t=null;try{var o=e.contentDocument||e.contentWindow.document;t=o.body.innerHTML}catch(a){}return null!==t}var o=e(this),a=o.data(n);if(a){var r=a.opt,i=n+"_"+a.idx,l=e("#mCSB_"+a.idx),s=[e("#mCSB_"+a.idx+"_dragger_vertical"),e("#mCSB_"+a.idx+"_dragger_horizontal")],c=e("#mCSB_"+a.idx+"_container").find("iframe"),u=l;c.length&&c.each(function(){var o=this;t(o)&&(u=u.add(e(o).contents().find("body")))}),u.bind("mousewheel."+i,function(t,n){if(h._stop(o),!h._disableMousewheel(o,t.target)){var i="auto"!==r.mouseWheel.deltaFactor?parseInt(r.mouseWheel.deltaFactor):d&&t.deltaFactor<100?100:t.deltaFactor||100;if("x"===r.axis||"x"===r.mouseWheel.axis)var c="x",u=[Math.round(i*a.scrollRatio.x),parseInt(r.mouseWheel.scrollAmount)],f="auto"!==r.mouseWheel.scrollAmount?u[1]:u[0]>=l.width()?.9*l.width():u[0],_=Math.abs(e("#mCSB_"+a.idx+"_container")[0].offsetLeft),m=s[1][0].offsetLeft,p=s[1].parent().width()-s[1].width(),g=t.deltaX||t.deltaY||n;else var c="y",u=[Math.round(i*a.scrollRatio.y),parseInt(r.mouseWheel.scrollAmount)],f="auto"!==r.mouseWheel.scrollAmount?u[1]:u[0]>=l.height()?.9*l.height():u[0],_=Math.abs(e("#mCSB_"+a.idx+"_container")[0].offsetTop),m=s[0][0].offsetTop,p=s[0].parent().height()-s[0].height(),g=t.deltaY||n;"y"===c&&!a.overflowed[0]||"x"===c&&!a.overflowed[1]||(r.mouseWheel.invert&&(g=-g),r.mouseWheel.normalizeDelta&&(g=0>g?-1:1),(g>0&&0!==m||0>g&&m!==p||r.mouseWheel.preventDefault)&&(t.stopImmediatePropagation(),t.preventDefault()),h._scrollTo(o,(_-g*f).toString(),{dir:c}))}})}},_disableMousewheel:function(t,o){var a=o.nodeName.toLowerCase(),r=t.data(n).opt.mouseWheel.disableOver,i=["select","textarea"];return e.inArray(a,r)>-1&&!(e.inArray(a,i)>-1&&!e(o).is(":focus"))},_draggerRail:function(){var t=e(this),o=t.data(n),a=n+"_"+o.idx,r=e("#mCSB_"+o.idx+"_container"),i=r.parent(),l=e(".mCSB_"+o.idx+"_scrollbar .mCSB_draggerContainer");l.bind("touchstart."+a+" pointerdown."+a+" MSPointerDown."+a,function(){u=!0}).bind("touchend."+a+" pointerup."+a+" MSPointerUp."+a,function(){u=!1}).bind("click."+a,function(a){if(e(a.target).hasClass("mCSB_draggerContainer")||e(a.target).hasClass("mCSB_draggerRail")){h._stop(t);var n=e(this),l=n.find(".mCSB_dragger");if(n.parent(".mCSB_scrollTools_horizontal").length>0){if(!o.overflowed[1])return;var s="x",c=a.pageX>l.offset().left?-1:1,d=Math.abs(r[0].offsetLeft)-.9*c*i.width()}else{if(!o.overflowed[0])return;var s="y",c=a.pageY>l.offset().top?-1:1,d=Math.abs(r[0].offsetTop)-.9*c*i.height()}h._scrollTo(t,d.toString(),{dir:s,scrollEasing:"mcsEaseInOut"})}})},_focus:function(){var t=e(this),a=t.data(n),r=a.opt,i=n+"_"+a.idx,l=e("#mCSB_"+a.idx+"_container"),s=l.parent();l.bind("focusin."+i,function(){var a=e(o.activeElement),n=l.find(".mCustomScrollBox").length,i=0;a.is(r.advanced.autoScrollOnFocus)&&(h._stop(t),clearTimeout(t[0]._focusTimeout),t[0]._focusTimer=n?(i+17)*n:0,t[0]._focusTimeout=setTimeout(function(){var e=[a.offset().top-l.offset().top,a.offset().left-l.offset().left],o=[l[0].offsetTop,l[0].offsetLeft],n=[o[0]+e[0]>=0&&o[0]+e[0]<s.height()-a.outerHeight(!1),o[1]+e[1]>=0&&o[0]+e[1]<s.width()-a.outerWidth(!1)],c="yx"!==r.axis||n[0]||n[1]?"all":"none";"x"===r.axis||n[0]||h._scrollTo(t,e[0].toString(),{dir:"y",scrollEasing:"mcsEaseInOut",overwrite:c,dur:i}),"y"===r.axis||n[1]||h._scrollTo(t,e[1].toString(),{dir:"x",scrollEasing:"mcsEaseInOut",overwrite:c,dur:i})},t[0]._focusTimer))})},_wrapperScroll:function(){var t=e(this),o=t.data(n),a=n+"_"+o.idx,r=e("#mCSB_"+o.idx+"_container").parent();r.bind("scroll."+a,function(){(0!==r.scrollTop()||0!==r.scrollLeft())&&e(".mCSB_"+o.idx+"_scrollbar").css("visibility","hidden")})},_buttons:function(){var t=e(this),o=t.data(n),a=o.opt,r=o.sequential,i=n+"_"+o.idx,l=(e("#mCSB_"+o.idx+"_container"),".mCSB_"+o.idx+"_scrollbar"),s=e(l+">a");s.bind("mousedown."+i+" touchstart."+i+" pointerdown."+i+" MSPointerDown."+i+" mouseup."+i+" touchend."+i+" pointerup."+i+" MSPointerUp."+i+" mouseout."+i+" pointerout."+i+" MSPointerOut."+i+" click."+i,function(n){function i(e,o){r.scrollAmount=a.snapAmount||a.scrollButtons.scrollAmount,h._sequentialScroll.call(this,t,e,o)}if(n.preventDefault(),h._mouseBtnLeft(n)){var l=e(this).attr("class");switch(r.type=a.scrollButtons.scrollType,n.type){case"mousedown":case"touchstart":case"pointerdown":case"MSPointerDown":if("stepped"===r.type)return;u=!0,o.tweenRunning=!1,i("on",l);break;case"mouseup":case"touchend":case"pointerup":case"MSPointerUp":case"mouseout":case"pointerout":case"MSPointerOut":if("stepped"===r.type)return;u=!1,r.dir&&i("off",l);break;case"click":if("stepped"!==r.type||o.tweenRunning)return;i("on",l)}}})},_keyboard:function(){var t=e(this),a=t.data(n),r=a.opt,i=a.sequential,l=n+"_"+a.idx,s=e("#mCSB_"+a.idx),c=e("#mCSB_"+a.idx+"_container"),d=c.parent(),u="input,textarea,select,datalist,keygen,[contenteditable='true']";s.attr("tabindex","0").bind("blur."+l+" keydown."+l+" keyup."+l,function(n){function l(e,o){i.type=r.keyboard.scrollType,i.scrollAmount=r.snapAmount||r.keyboard.scrollAmount,"stepped"===i.type&&a.tweenRunning||h._sequentialScroll.call(this,t,e,o)}switch(n.type){case"blur":a.tweenRunning&&i.dir&&l("off",null);break;case"keydown":case"keyup":var s=n.keyCode?n.keyCode:n.which,f="on";if("x"!==r.axis&&(38===s||40===s)||"y"!==r.axis&&(37===s||39===s)){if((38===s||40===s)&&!a.overflowed[0]||(37===s||39===s)&&!a.overflowed[1])return;"keyup"===n.type&&(f="off"),e(o.activeElement).is(u)||(n.preventDefault(),n.stopImmediatePropagation(),l(f,s))}else if(33===s||34===s){if((a.overflowed[0]||a.overflowed[1])&&(n.preventDefault(),n.stopImmediatePropagation()),"keyup"===n.type){h._stop(t);var _=34===s?-1:1;if("x"===r.axis||"yx"===r.axis&&a.overflowed[1]&&!a.overflowed[0])var m="x",p=Math.abs(c[0].offsetLeft)-.9*_*d.width();else var m="y",p=Math.abs(c[0].offsetTop)-.9*_*d.height();h._scrollTo(t,p.toString(),{dir:m,scrollEasing:"mcsEaseInOut"})}}else if((35===s||36===s)&&!e(o.activeElement).is(u)&&((a.overflowed[0]||a.overflowed[1])&&(n.preventDefault(),n.stopImmediatePropagation()),"keyup"===n.type)){if("x"===r.axis||"yx"===r.axis&&a.overflowed[1]&&!a.overflowed[0])var m="x",p=35===s?Math.abs(d.width()-c.outerWidth(!1)):0;else var m="y",p=35===s?Math.abs(d.height()-c.outerHeight(!1)):0;h._scrollTo(t,p.toString(),{dir:m,scrollEasing:"mcsEaseInOut"})}}})},_sequentialScroll:function(t,o,a){function r(e){var o="stepped"!==c.type,a=e?o?s.scrollInertia/1.5:s.scrollInertia:1e3/60,n=e?o?7.5:40:2.5,i=[Math.abs(d[0].offsetTop),Math.abs(d[0].offsetLeft)],u=[l.scrollRatio.y>10?10:l.scrollRatio.y,l.scrollRatio.x>10?10:l.scrollRatio.x],f="x"===c.dir[0]?i[1]+c.dir[1]*u[1]*n:i[0]+c.dir[1]*u[0]*n,_="x"===c.dir[0]?i[1]+c.dir[1]*parseInt(c.scrollAmount):i[0]+c.dir[1]*parseInt(c.scrollAmount),m="auto"!==c.scrollAmount?_:f,p=e?o?"mcsLinearOut":"mcsEaseInOut":"mcsLinear",g=e?!0:!1;return e&&17>a&&(m="x"===c.dir[0]?i[1]:i[0]),h._scrollTo(t,m.toString(),{dir:c.dir[0],scrollEasing:p,dur:a,onComplete:g}),e?void(c.dir=!1):(clearTimeout(c.step),void(c.step=setTimeout(function(){r()},a)))}function i(){clearTimeout(c.step),h._stop(t)}var l=t.data(n),s=l.opt,c=l.sequential,d=e("#mCSB_"+l.idx+"_container"),u="stepped"===c.type?!0:!1;switch(o){case"on":if(c.dir=["mCSB_buttonRight"===a||"mCSB_buttonLeft"===a||39===a||37===a?"x":"y","mCSB_buttonUp"===a||"mCSB_buttonLeft"===a||38===a||37===a?-1:1],h._stop(t),h._isNumeric(a)&&"stepped"===c.type)return;r(u);break;case"off":i(),(u||l.tweenRunning&&c.dir)&&r(!0)}},_arr:function(t){var o=e(this).data(n).opt,a=[];return"function"==typeof t&&(t=t()),t instanceof Array?a=t.length>1?[t[0],t[1]]:"x"===o.axis?[null,t[0]]:[t[0],null]:(a[0]=t.y?t.y:t.x||"x"===o.axis?null:t,a[1]=t.x?t.x:t.y||"y"===o.axis?null:t),"function"==typeof a[0]&&(a[0]=a[0]()),"function"==typeof a[1]&&(a[1]=a[1]()),a},_to:function(t,o){if(null!=t&&"undefined"!=typeof t){var a=e(this),r=a.data(n),i=r.opt,l=e("#mCSB_"+r.idx+"_container"),s=l.parent(),c=typeof t;o||(o="x"===i.axis?"x":"y");var d="x"===o?l.outerWidth(!1):l.outerHeight(!1),u="x"===o?l.offset().left:l.offset().top,_="x"===o?l[0].offsetLeft:l[0].offsetTop,m="x"===o?"left":"top";switch(c){case"function":return t();case"object":if(t.nodeType)var p="x"===o?e(t).offset().left:e(t).offset().top;else if(t.jquery){if(!t.length)return;var p="x"===o?t.offset().left:t.offset().top}return p-u;case"string":case"number":if(h._isNumeric.call(null,t))return Math.abs(t);if(-1!==t.indexOf("%"))return Math.abs(d*parseInt(t)/100);if(-1!==t.indexOf("-="))return Math.abs(_-parseInt(t.split("-=")[1]));if(-1!==t.indexOf("+=")){var g=_+parseInt(t.split("+=")[1]);return g>=0?0:Math.abs(g)}if(-1!==t.indexOf("px")&&h._isNumeric.call(null,t.split("px")[0]))return Math.abs(t.split("px")[0]);if("top"===t||"left"===t)return 0;if("bottom"===t)return Math.abs(s.height()-l.outerHeight(!1));if("right"===t)return Math.abs(s.width()-l.outerWidth(!1));if("first"===t||"last"===t){var v=l.find(":"+t),p="x"===o?e(v).offset().left:e(v).offset().top;return p-u}if(e(t).length){var p="x"===o?e(t).offset().left:e(t).offset().top;return p-u}return l.css(m,t),void f.update.call(null,a[0])}}},_autoUpdate:function(t){function o(){clearTimeout(u[0].autoUpdate),u[0].autoUpdate=setTimeout(function(){return d.advanced.updateOnSelectorChange&&(_=i(),_!==S)?(l(),void(S=_)):(d.advanced.updateOnContentResize&&(m=[u.outerHeight(!1),u.outerWidth(!1),g.height(),g.width(),x()[0],x()[1]],(m[0]!==C[0]||m[1]!==C[1]||m[2]!==C[2]||m[3]!==C[3]||m[4]!==C[4]||m[5]!==C[5])&&(l(),C=m)),d.advanced.updateOnImageLoad&&(p=a(),p!==b&&(u.find("img").each(function(){r(this.src)}),b=p)),void((d.advanced.updateOnSelectorChange||d.advanced.updateOnContentResize||d.advanced.updateOnImageLoad)&&o()))},60)}function a(){var e=0;return d.advanced.updateOnImageLoad&&(e=u.find("img").length),e}function r(e){function t(e,t){return function(){return t.apply(e,arguments)}}function o(){this.onload=null,l()}var a=new Image;a.onload=t(a,o),a.src=e}function i(){d.advanced.updateOnSelectorChange===!0&&(d.advanced.updateOnSelectorChange="*");var t=0,o=u.find(d.advanced.updateOnSelectorChange);return d.advanced.updateOnSelectorChange&&o.length>0&&o.each(function(){t+=e(this).height()+e(this).width()}),t}function l(){clearTimeout(u[0].autoUpdate),f.update.call(null,s[0])}var s=e(this),c=s.data(n),d=c.opt,u=e("#mCSB_"+c.idx+"_container");if(t)return clearTimeout(u[0].autoUpdate),void h._delete.call(null,u[0].autoUpdate);var _,m,p,g=u.parent(),v=[e("#mCSB_"+c.idx+"_scrollbar_vertical"),e("#mCSB_"+c.idx+"_scrollbar_horizontal")],x=function(){return[v[0].is(":visible")?v[0].outerHeight(!0):0,v[1].is(":visible")?v[1].outerWidth(!0):0]},S=i(),C=[u.outerHeight(!1),u.outerWidth(!1),g.height(),g.width(),x()[0],x()[1]],b=a();o()},_snapAmount:function(e,t,o){return Math.round(e/t)*t-o},_stop:function(t){var o=t.data(n),a=e("#mCSB_"+o.idx+"_container,#mCSB_"+o.idx+"_container_wrapper,#mCSB_"+o.idx+"_dragger_vertical,#mCSB_"+o.idx+"_dragger_horizontal");a.each(function(){h._stopTween.call(this)})},_scrollTo:function(t,o,a){function r(e){return s&&c.callbacks[e]&&"function"==typeof c.callbacks[e]}function i(){return[c.callbacks.alwaysTriggerOffsets||S>=C[0]+w,c.callbacks.alwaysTriggerOffsets||-y>=S]}function l(){var e=[_[0].offsetTop,_[0].offsetLeft],o=[v[0].offsetTop,v[0].offsetLeft],n=[_.outerHeight(!1),_.outerWidth(!1)],r=[f.height(),f.width()];t[0].mcs={content:_,top:e[0],left:e[1],draggerTop:o[0],draggerLeft:o[1],topPct:Math.round(100*Math.abs(e[0])/(Math.abs(n[0])-r[0])),leftPct:Math.round(100*Math.abs(e[1])/(Math.abs(n[1])-r[1])),direction:a.dir}}var s=t.data(n),c=s.opt,d={trigger:"internal",dir:"y",scrollEasing:"mcsEaseOut",drag:!1,dur:c.scrollInertia,overwrite:"all",callbacks:!0,onStart:!0,onUpdate:!0,onComplete:!0},a=e.extend(d,a),u=[a.dur,a.drag?0:a.dur],f=e("#mCSB_"+s.idx),_=e("#mCSB_"+s.idx+"_container"),m=_.parent(),p=c.callbacks.onTotalScrollOffset?h._arr.call(t,c.callbacks.onTotalScrollOffset):[0,0],g=c.callbacks.onTotalScrollBackOffset?h._arr.call(t,c.callbacks.onTotalScrollBackOffset):[0,0];
	if(s.trigger=a.trigger,(0!==m.scrollTop()||0!==m.scrollLeft())&&(e(".mCSB_"+s.idx+"_scrollbar").css("visibility","visible"),m.scrollTop(0).scrollLeft(0)),"_resetY"!==o||s.contentReset.y||(r("onOverflowYNone")&&c.callbacks.onOverflowYNone.call(t[0]),s.contentReset.y=1),"_resetX"!==o||s.contentReset.x||(r("onOverflowXNone")&&c.callbacks.onOverflowXNone.call(t[0]),s.contentReset.x=1),"_resetY"!==o&&"_resetX"!==o){switch(!s.contentReset.y&&t[0].mcs||!s.overflowed[0]||(r("onOverflowY")&&c.callbacks.onOverflowY.call(t[0]),s.contentReset.x=null),!s.contentReset.x&&t[0].mcs||!s.overflowed[1]||(r("onOverflowX")&&c.callbacks.onOverflowX.call(t[0]),s.contentReset.x=null),c.snapAmount&&(o=h._snapAmount(o,c.snapAmount,c.snapOffset)),a.dir){case"x":var v=e("#mCSB_"+s.idx+"_dragger_horizontal"),x="left",S=_[0].offsetLeft,C=[f.width()-_.outerWidth(!1),v.parent().width()-v.width()],b=[o,0===o?0:o/s.scrollRatio.x],w=p[1],y=g[1],B=w>0?w/s.scrollRatio.x:0,T=y>0?y/s.scrollRatio.x:0;break;case"y":var v=e("#mCSB_"+s.idx+"_dragger_vertical"),x="top",S=_[0].offsetTop,C=[f.height()-_.outerHeight(!1),v.parent().height()-v.height()],b=[o,0===o?0:o/s.scrollRatio.y],w=p[0],y=g[0],B=w>0?w/s.scrollRatio.y:0,T=y>0?y/s.scrollRatio.y:0}b[1]<0||0===b[0]&&0===b[1]?b=[0,0]:b[1]>=C[1]?b=[C[0],C[1]]:b[0]=-b[0],t[0].mcs||(l(),r("onInit")&&c.callbacks.onInit.call(t[0])),clearTimeout(_[0].onCompleteTimeout),(s.tweenRunning||!(0===S&&b[0]>=0||S===C[0]&&b[0]<=C[0]))&&(h._tweenTo.call(null,v[0],x,Math.round(b[1]),u[1],a.scrollEasing),h._tweenTo.call(null,_[0],x,Math.round(b[0]),u[0],a.scrollEasing,a.overwrite,{onStart:function(){a.callbacks&&a.onStart&&!s.tweenRunning&&(r("onScrollStart")&&(l(),c.callbacks.onScrollStart.call(t[0])),s.tweenRunning=!0,h._onDragClasses(v),s.cbOffsets=i())},onUpdate:function(){a.callbacks&&a.onUpdate&&r("whileScrolling")&&(l(),c.callbacks.whileScrolling.call(t[0]))},onComplete:function(){if(a.callbacks&&a.onComplete){"yx"===c.axis&&clearTimeout(_[0].onCompleteTimeout);var e=_[0].idleTimer||0;_[0].onCompleteTimeout=setTimeout(function(){r("onScroll")&&(l(),c.callbacks.onScroll.call(t[0])),r("onTotalScroll")&&b[1]>=C[1]-B&&s.cbOffsets[0]&&(l(),c.callbacks.onTotalScroll.call(t[0])),r("onTotalScrollBack")&&b[1]<=T&&s.cbOffsets[1]&&(l(),c.callbacks.onTotalScrollBack.call(t[0])),s.tweenRunning=!1,_[0].idleTimer=0,h._onDragClasses(v,"hide")},e)}}}))}},_tweenTo:function(e,o,a,n,r,i,l){function s(){w.stop||(S||p.call(),S=h._getTime()-x,c(),S>=w.time&&(w.time=S>w.time?S+_-(S-w.time):S+_-1,w.time<S+1&&(w.time=S+1)),w.time<n?w.id=m(s):v.call())}function c(){n>0?(w.currVal=f(w.time,C,y,n,r),b[o]=Math.round(w.currVal)+"px"):b[o]=a+"px",g.call()}function d(){_=1e3/60,w.time=S+_,m=t.requestAnimationFrame?t.requestAnimationFrame:function(e){return c(),setTimeout(e,.01)},w.id=m(s)}function u(){null!=w.id&&(t.requestAnimationFrame?t.cancelAnimationFrame(w.id):clearTimeout(w.id),w.id=null)}function f(e,t,o,a,n){switch(n){case"linear":case"mcsLinear":return o*e/a+t;case"mcsLinearOut":return e/=a,e--,o*Math.sqrt(1-e*e)+t;case"easeInOutSmooth":return e/=a/2,1>e?o/2*e*e+t:(e--,-o/2*(e*(e-2)-1)+t);case"easeInOutStrong":return e/=a/2,1>e?o/2*Math.pow(2,10*(e-1))+t:(e--,o/2*(-Math.pow(2,-10*e)+2)+t);case"easeInOut":case"mcsEaseInOut":return e/=a/2,1>e?o/2*e*e*e+t:(e-=2,o/2*(e*e*e+2)+t);case"easeOutSmooth":return e/=a,e--,-o*(e*e*e*e-1)+t;case"easeOutStrong":return o*(-Math.pow(2,-10*e/a)+1)+t;case"easeOut":case"mcsEaseOut":default:var r=(e/=a)*e,i=r*e;return t+o*(.499999999999997*i*r+-2.5*r*r+5.5*i+-6.5*r+4*e)}}e._malihuTween||(e._malihuTween={top:{},left:{}});var _,m,l=l||{},p=l.onStart||function(){},g=l.onUpdate||function(){},v=l.onComplete||function(){},x=h._getTime(),S=0,C=e.offsetTop,b=e.style,w=e._malihuTween[o];"left"===o&&(C=e.offsetLeft);var y=a-C;w.stop=0,"none"!==i&&u(),d()},_getTime:function(){return t.performance&&t.performance.now?t.performance.now():t.performance&&t.performance.webkitNow?t.performance.webkitNow():Date.now?Date.now():(new Date).getTime()},_stopTween:function(){var e=this;e._malihuTween||(e._malihuTween={top:{},left:{}}),e._malihuTween.top.id&&(t.requestAnimationFrame?t.cancelAnimationFrame(e._malihuTween.top.id):clearTimeout(e._malihuTween.top.id),e._malihuTween.top.id=null,e._malihuTween.top.stop=1),e._malihuTween.left.id&&(t.requestAnimationFrame?t.cancelAnimationFrame(e._malihuTween.left.id):clearTimeout(e._malihuTween.left.id),e._malihuTween.left.id=null,e._malihuTween.left.stop=1)},_delete:function(e){try{delete e}catch(t){e=null}},_mouseBtnLeft:function(e){return!(e.which&&1!==e.which)},_pointerTouch:function(e){var t=e.originalEvent.pointerType;return!(t&&"touch"!==t&&2!==t)},_isNumeric:function(e){return!isNaN(parseFloat(e))&&isFinite(e)}};e.fn[a]=function(t){return f[t]?f[t].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof t&&t?void e.error("Method "+t+" does not exist"):f.init.apply(this,arguments)},e[a]=function(t){return f[t]?f[t].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof t&&t?void e.error("Method "+t+" does not exist"):f.init.apply(this,arguments)},e[a].defaults=i,t[a]=!0,e(t).load(function(){e(r)[a]()})})}(jQuery,window,document);

/*! Magnific Popup - v0.9.9 - 2013-12-27
 * http://dimsemenov.com/plugins/magnific-popup/
 * Copyright (c) 2013 Dmitry Semenov; */
(function(e){var t,n,i,o,r,a,s,l="Close",c="BeforeClose",d="AfterClose",u="BeforeAppend",p="MarkupParse",f="Open",m="Change",g="mfp",h="."+g,v="mfp-ready",C="mfp-removing",y="mfp-prevent-close",w=function(){},b=!!window.jQuery,I=e(window),x=function(e,n){t.ev.on(g+e+h,n)},k=function(t,n,i,o){var r=document.createElement("div");return r.className="mfp-"+t,i&&(r.innerHTML=i),o?n&&n.appendChild(r):(r=e(r),n&&r.appendTo(n)),r},T=function(n,i){t.ev.triggerHandler(g+n,i),t.st.callbacks&&(n=n.charAt(0).toLowerCase()+n.slice(1),t.st.callbacks[n]&&t.st.callbacks[n].apply(t,e.isArray(i)?i:[i]))},E=function(n){return n===s&&t.currTemplate.closeBtn||(t.currTemplate.closeBtn=e(t.st.closeMarkup.replace("%title%",t.st.tClose)),s=n),t.currTemplate.closeBtn},_=function(){e.magnificPopup.instance||(t=new w,t.init(),e.magnificPopup.instance=t)},S=function(){var e=document.createElement("p").style,t=["ms","O","Moz","Webkit"];if(void 0!==e.transition)return!0;for(;t.length;)if(t.pop()+"Transition"in e)return!0;return!1};w.prototype={constructor:w,init:function(){var n=navigator.appVersion;t.isIE7=-1!==n.indexOf("MSIE 7."),t.isIE8=-1!==n.indexOf("MSIE 8."),t.isLowIE=t.isIE7||t.isIE8,t.isAndroid=/android/gi.test(n),t.isIOS=/iphone|ipad|ipod/gi.test(n),t.supportsTransition=S(),t.probablyMobile=t.isAndroid||t.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),o=e(document),t.popupsCache={}},open:function(n){i||(i=e(document.body));var r;if(n.isObj===!1){t.items=n.items.toArray(),t.index=0;var s,l=n.items;for(r=0;l.length>r;r++)if(s=l[r],s.parsed&&(s=s.el[0]),s===n.el[0]){t.index=r;break}}else t.items=e.isArray(n.items)?n.items:[n.items],t.index=n.index||0;if(t.isOpen)return t.updateItemHTML(),void 0;t.types=[],a="",t.ev=n.mainEl&&n.mainEl.length?n.mainEl.eq(0):o,n.key?(t.popupsCache[n.key]||(t.popupsCache[n.key]={}),t.currTemplate=t.popupsCache[n.key]):t.currTemplate={},t.st=e.extend(!0,{},e.magnificPopup.defaults,n),t.fixedContentPos="auto"===t.st.fixedContentPos?!t.probablyMobile:t.st.fixedContentPos,t.st.modal&&(t.st.closeOnContentClick=!1,t.st.closeOnBgClick=!1,t.st.showCloseBtn=!1,t.st.enableEscapeKey=!1),t.bgOverlay||(t.bgOverlay=k("bg").on("click"+h,function(){t.close()}),t.wrap=k("wrap").attr("tabindex",-1).on("click"+h,function(e){t._checkIfClose(e.target)&&t.close()}),t.container=k("container",t.wrap)),t.contentContainer=k("content"),t.st.preloader&&(t.preloader=k("preloader",t.container,t.st.tLoading));var c=e.magnificPopup.modules;for(r=0;c.length>r;r++){var d=c[r];d=d.charAt(0).toUpperCase()+d.slice(1),t["init"+d].call(t)}T("BeforeOpen"),t.st.showCloseBtn&&(t.st.closeBtnInside?(x(p,function(e,t,n,i){n.close_replaceWith=E(i.type)}),a+=" mfp-close-btn-in"):t.wrap.append(E())),t.st.alignTop&&(a+=" mfp-align-top"),t.fixedContentPos?t.wrap.css({overflow:t.st.overflowY,overflowX:"hidden",overflowY:t.st.overflowY}):t.wrap.css({top:I.scrollTop(),position:"absolute"}),(t.st.fixedBgPos===!1||"auto"===t.st.fixedBgPos&&!t.fixedContentPos)&&t.bgOverlay.css({height:o.height(),position:"absolute"}),t.st.enableEscapeKey&&o.on("keyup"+h,function(e){27===e.keyCode&&t.close()}),I.on("resize"+h,function(){t.updateSize()}),t.st.closeOnContentClick||(a+=" mfp-auto-cursor"),a&&t.wrap.addClass(a);var u=t.wH=I.height(),m={};if(t.fixedContentPos&&t._hasScrollBar(u)){var g=t._getScrollbarSize();g&&(m.marginRight=g)}t.fixedContentPos&&(t.isIE7?e("body, html").css("overflow","hidden"):m.overflow="hidden");var C=t.st.mainClass;return t.isIE7&&(C+=" mfp-ie7"),C&&t._addClassToMFP(C),t.updateItemHTML(),T("BuildControls"),e("html").css(m),t.bgOverlay.add(t.wrap).prependTo(t.st.prependTo||i),t._lastFocusedEl=document.activeElement,setTimeout(function(){t.content?(t._addClassToMFP(v),t._setFocus()):t.bgOverlay.addClass(v),o.on("focusin"+h,t._onFocusIn)},16),t.isOpen=!0,t.updateSize(u),T(f),n},close:function(){t.isOpen&&(T(c),t.isOpen=!1,t.st.removalDelay&&!t.isLowIE&&t.supportsTransition?(t._addClassToMFP(C),setTimeout(function(){t._close()},t.st.removalDelay)):t._close())},_close:function(){T(l);var n=C+" "+v+" ";if(t.bgOverlay.detach(),t.wrap.detach(),t.container.empty(),t.st.mainClass&&(n+=t.st.mainClass+" "),t._removeClassFromMFP(n),t.fixedContentPos){var i={marginRight:""};t.isIE7?e("body, html").css("overflow",""):i.overflow="",e("html").css(i)}o.off("keyup"+h+" focusin"+h),t.ev.off(h),t.wrap.attr("class","mfp-wrap").removeAttr("style"),t.bgOverlay.attr("class","mfp-bg"),t.container.attr("class","mfp-container"),!t.st.showCloseBtn||t.st.closeBtnInside&&t.currTemplate[t.currItem.type]!==!0||t.currTemplate.closeBtn&&t.currTemplate.closeBtn.detach(),t._lastFocusedEl&&e(t._lastFocusedEl).focus(),t.currItem=null,t.content=null,t.currTemplate=null,t.prevHeight=0,T(d)},updateSize:function(e){if(t.isIOS){var n=document.documentElement.clientWidth/window.innerWidth,i=window.innerHeight*n;t.wrap.css("height",i),t.wH=i}else t.wH=e||I.height();t.fixedContentPos||t.wrap.css("height",t.wH),T("Resize")},updateItemHTML:function(){var n=t.items[t.index];t.contentContainer.detach(),t.content&&t.content.detach(),n.parsed||(n=t.parseEl(t.index));var i=n.type;if(T("BeforeChange",[t.currItem?t.currItem.type:"",i]),t.currItem=n,!t.currTemplate[i]){var o=t.st[i]?t.st[i].markup:!1;T("FirstMarkupParse",o),t.currTemplate[i]=o?e(o):!0}r&&r!==n.type&&t.container.removeClass("mfp-"+r+"-holder");var a=t["get"+i.charAt(0).toUpperCase()+i.slice(1)](n,t.currTemplate[i]);t.appendContent(a,i),n.preloaded=!0,T(m,n),r=n.type,t.container.prepend(t.contentContainer),T("AfterChange")},appendContent:function(e,n){t.content=e,e?t.st.showCloseBtn&&t.st.closeBtnInside&&t.currTemplate[n]===!0?t.content.find(".mfp-close").length||t.content.append(E()):t.content=e:t.content="",T(u),t.container.addClass("mfp-"+n+"-holder"),t.contentContainer.append(t.content)},parseEl:function(n){var i,o=t.items[n];if(o.tagName?o={el:e(o)}:(i=o.type,o={data:o,src:o.src}),o.el){for(var r=t.types,a=0;r.length>a;a++)if(o.el.hasClass("mfp-"+r[a])){i=r[a];break}o.src=o.el.attr("data-mfp-src"),o.src||(o.src=o.el.attr("href"))}return o.type=i||t.st.type||"inline",o.index=n,o.parsed=!0,t.items[n]=o,T("ElementParse",o),t.items[n]},addGroup:function(e,n){var i=function(i){i.mfpEl=this,t._openClick(i,e,n)};n||(n={});var o="click.magnificPopup";n.mainEl=e,n.items?(n.isObj=!0,e.off(o).on(o,i)):(n.isObj=!1,n.delegate?e.off(o).on(o,n.delegate,i):(n.items=e,e.off(o).on(o,i)))},_openClick:function(n,i,o){var r=void 0!==o.midClick?o.midClick:e.magnificPopup.defaults.midClick;if(r||2!==n.which&&!n.ctrlKey&&!n.metaKey){var a=void 0!==o.disableOn?o.disableOn:e.magnificPopup.defaults.disableOn;if(a)if(e.isFunction(a)){if(!a.call(t))return!0}else if(a>I.width())return!0;n.type&&(n.preventDefault(),t.isOpen&&n.stopPropagation()),o.el=e(n.mfpEl),o.delegate&&(o.items=i.find(o.delegate)),t.open(o)}},updateStatus:function(e,i){if(t.preloader){n!==e&&t.container.removeClass("mfp-s-"+n),i||"loading"!==e||(i=t.st.tLoading);var o={status:e,text:i};T("UpdateStatus",o),e=o.status,i=o.text,t.preloader.html(i),t.preloader.find("a").on("click",function(e){e.stopImmediatePropagation()}),t.container.addClass("mfp-s-"+e),n=e}},_checkIfClose:function(n){if(!e(n).hasClass(y)){var i=t.st.closeOnContentClick,o=t.st.closeOnBgClick;if(i&&o)return!0;if(!t.content||e(n).hasClass("mfp-close")||t.preloader&&n===t.preloader[0])return!0;if(n===t.content[0]||e.contains(t.content[0],n)){if(i)return!0}else if(o&&e.contains(document,n))return!0;return!1}},_addClassToMFP:function(e){t.bgOverlay.addClass(e),t.wrap.addClass(e)},_removeClassFromMFP:function(e){this.bgOverlay.removeClass(e),t.wrap.removeClass(e)},_hasScrollBar:function(e){return(t.isIE7?o.height():document.body.scrollHeight)>(e||I.height())},_setFocus:function(){(t.st.focus?t.content.find(t.st.focus).eq(0):t.wrap).focus()},_onFocusIn:function(n){return n.target===t.wrap[0]||e.contains(t.wrap[0],n.target)?void 0:(t._setFocus(),!1)},_parseMarkup:function(t,n,i){var o;i.data&&(n=e.extend(i.data,n)),T(p,[t,n,i]),e.each(n,function(e,n){if(void 0===n||n===!1)return!0;if(o=e.split("_"),o.length>1){var i=t.find(h+"-"+o[0]);if(i.length>0){var r=o[1];"replaceWith"===r?i[0]!==n[0]&&i.replaceWith(n):"img"===r?i.is("img")?i.attr("src",n):i.replaceWith('<img src="'+n+'" class="'+i.attr("class")+'" />'):i.attr(o[1],n)}}else t.find(h+"-"+e).html(n)})},_getScrollbarSize:function(){if(void 0===t.scrollbarSize){var e=document.createElement("div");e.id="mfp-sbm",e.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(e),t.scrollbarSize=e.offsetWidth-e.clientWidth,document.body.removeChild(e)}return t.scrollbarSize}},e.magnificPopup={instance:null,proto:w.prototype,modules:[],open:function(t,n){return _(),t=t?e.extend(!0,{},t):{},t.isObj=!0,t.index=n||0,this.instance.open(t)},close:function(){return e.magnificPopup.instance&&e.magnificPopup.instance.close()},registerModule:function(t,n){n.options&&(e.magnificPopup.defaults[t]=n.options),e.extend(this.proto,n.proto),this.modules.push(t)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&times;</button>',tClose:"Close (Esc)",tLoading:"Loading..."}},e.fn.magnificPopup=function(n){_();var i=e(this);if("string"==typeof n)if("open"===n){var o,r=b?i.data("magnificPopup"):i[0].magnificPopup,a=parseInt(arguments[1],10)||0;r.items?o=r.items[a]:(o=i,r.delegate&&(o=o.find(r.delegate)),o=o.eq(a)),t._openClick({mfpEl:o},i,r)}else t.isOpen&&t[n].apply(t,Array.prototype.slice.call(arguments,1));else n=e.extend(!0,{},n),b?i.data("magnificPopup",n):i[0].magnificPopup=n,t.addGroup(i,n);return i};var P,O,z,M="inline",B=function(){z&&(O.after(z.addClass(P)).detach(),z=null)};e.magnificPopup.registerModule(M,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){t.types.push(M),x(l+"."+M,function(){B()})},getInline:function(n,i){if(B(),n.src){var o=t.st.inline,r=e(n.src);if(r.length){var a=r[0].parentNode;a&&a.tagName&&(O||(P=o.hiddenClass,O=k(P),P="mfp-"+P),z=r.after(O).detach().removeClass(P)),t.updateStatus("ready")}else t.updateStatus("error",o.tNotFound),r=e("<div>");return n.inlineElement=r,r}return t.updateStatus("ready"),t._parseMarkup(i,{},n),i}}});var F,H="ajax",L=function(){F&&i.removeClass(F)},A=function(){L(),t.req&&t.req.abort()};e.magnificPopup.registerModule(H,{options:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},proto:{initAjax:function(){t.types.push(H),F=t.st.ajax.cursor,x(l+"."+H,A),x("BeforeChange."+H,A)},getAjax:function(n){F&&i.addClass(F),t.updateStatus("loading");var o=e.extend({url:n.src,success:function(i,o,r){var a={data:i,xhr:r};T("ParseAjax",a),t.appendContent(e(a.data),H),n.finished=!0,L(),t._setFocus(),setTimeout(function(){t.wrap.addClass(v)},16),t.updateStatus("ready"),T("AjaxContentAdded")},error:function(){L(),n.finished=n.loadError=!0,t.updateStatus("error",t.st.ajax.tError.replace("%url%",n.src))}},t.st.ajax.settings);return t.req=e.ajax(o),""}}});var j,N=function(n){if(n.data&&void 0!==n.data.title)return n.data.title;var i=t.st.image.titleSrc;if(i){if(e.isFunction(i))return i.call(t,n);if(n.el)return n.el.attr(i)||""}return""};e.magnificPopup.registerModule("image",{options:{markup:'<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',cursor:"mfp-zoom-out-cur",titleSrc:"title",verticalFit:!0,tError:'<a href="%url%">The image</a> could not be loaded.'},proto:{initImage:function(){var e=t.st.image,n=".image";t.types.push("image"),x(f+n,function(){"image"===t.currItem.type&&e.cursor&&i.addClass(e.cursor)}),x(l+n,function(){e.cursor&&i.removeClass(e.cursor),I.off("resize"+h)}),x("Resize"+n,t.resizeImage),t.isLowIE&&x("AfterChange",t.resizeImage)},resizeImage:function(){var e=t.currItem;if(e&&e.img&&t.st.image.verticalFit){var n=0;t.isLowIE&&(n=parseInt(e.img.css("padding-top"),10)+parseInt(e.img.css("padding-bottom"),10)),e.img.css("max-height",t.wH-n)}},_onImageHasSize:function(e){e.img&&(e.hasSize=!0,j&&clearInterval(j),e.isCheckingImgSize=!1,T("ImageHasSize",e),e.imgHidden&&(t.content&&t.content.removeClass("mfp-loading"),e.imgHidden=!1))},findImageSize:function(e){var n=0,i=e.img[0],o=function(r){j&&clearInterval(j),j=setInterval(function(){return i.naturalWidth>0?(t._onImageHasSize(e),void 0):(n>200&&clearInterval(j),n++,3===n?o(10):40===n?o(50):100===n&&o(500),void 0)},r)};o(1)},getImage:function(n,i){var o=0,r=function(){n&&(n.img[0].complete?(n.img.off(".mfploader"),n===t.currItem&&(t._onImageHasSize(n),t.updateStatus("ready")),n.hasSize=!0,n.loaded=!0,T("ImageLoadComplete")):(o++,200>o?setTimeout(r,100):a()))},a=function(){n&&(n.img.off(".mfploader"),n===t.currItem&&(t._onImageHasSize(n),t.updateStatus("error",s.tError.replace("%url%",n.src))),n.hasSize=!0,n.loaded=!0,n.loadError=!0)},s=t.st.image,l=i.find(".mfp-img");if(l.length){var c=document.createElement("img");c.className="mfp-img",n.img=e(c).on("load.mfploader",r).on("error.mfploader",a),c.src=n.src,l.is("img")&&(n.img=n.img.clone()),c=n.img[0],c.naturalWidth>0?n.hasSize=!0:c.width||(n.hasSize=!1)}return t._parseMarkup(i,{title:N(n),img_replaceWith:n.img},n),t.resizeImage(),n.hasSize?(j&&clearInterval(j),n.loadError?(i.addClass("mfp-loading"),t.updateStatus("error",s.tError.replace("%url%",n.src))):(i.removeClass("mfp-loading"),t.updateStatus("ready")),i):(t.updateStatus("loading"),n.loading=!0,n.hasSize||(n.imgHidden=!0,i.addClass("mfp-loading"),t.findImageSize(n)),i)}}});var W,R=function(){return void 0===W&&(W=void 0!==document.createElement("p").style.MozTransform),W};e.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(e){return e.is("img")?e:e.find("img")}},proto:{initZoom:function(){var e,n=t.st.zoom,i=".zoom";if(n.enabled&&t.supportsTransition){var o,r,a=n.duration,s=function(e){var t=e.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),i="all "+n.duration/1e3+"s "+n.easing,o={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},r="transition";return o["-webkit-"+r]=o["-moz-"+r]=o["-o-"+r]=o[r]=i,t.css(o),t},d=function(){t.content.css("visibility","visible")};x("BuildControls"+i,function(){if(t._allowZoom()){if(clearTimeout(o),t.content.css("visibility","hidden"),e=t._getItemToZoom(),!e)return d(),void 0;r=s(e),r.css(t._getOffset()),t.wrap.append(r),o=setTimeout(function(){r.css(t._getOffset(!0)),o=setTimeout(function(){d(),setTimeout(function(){r.remove(),e=r=null,T("ZoomAnimationEnded")},16)},a)},16)}}),x(c+i,function(){if(t._allowZoom()){if(clearTimeout(o),t.st.removalDelay=a,!e){if(e=t._getItemToZoom(),!e)return;r=s(e)}r.css(t._getOffset(!0)),t.wrap.append(r),t.content.css("visibility","hidden"),setTimeout(function(){r.css(t._getOffset())},16)}}),x(l+i,function(){t._allowZoom()&&(d(),r&&r.remove(),e=null)})}},_allowZoom:function(){return"image"===t.currItem.type},_getItemToZoom:function(){return t.currItem.hasSize?t.currItem.img:!1},_getOffset:function(n){var i;i=n?t.currItem.img:t.st.zoom.opener(t.currItem.el||t.currItem);var o=i.offset(),r=parseInt(i.css("padding-top"),10),a=parseInt(i.css("padding-bottom"),10);o.top-=e(window).scrollTop()-r;var s={width:i.width(),height:(b?i.innerHeight():i[0].offsetHeight)-a-r};return R()?s["-moz-transform"]=s.transform="translate("+o.left+"px,"+o.top+"px)":(s.left=o.left,s.top=o.top),s}}});var Z="iframe",q="//about:blank",D=function(e){if(t.currTemplate[Z]){var n=t.currTemplate[Z].find("iframe");n.length&&(e||(n[0].src=q),t.isIE8&&n.css("display",e?"block":"none"))}};e.magnificPopup.registerModule(Z,{options:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',srcAction:"iframe_src",patterns:{youtube:{index:"youtube.com",id:"v=",src:"//www.youtube.com/embed/%id%?autoplay=1"},vimeo:{index:"vimeo.com/",id:"/",src:"//player.vimeo.com/video/%id%?autoplay=1"},gmaps:{index:"//maps.google.",src:"%id%&output=embed"}}},proto:{initIframe:function(){t.types.push(Z),x("BeforeChange",function(e,t,n){t!==n&&(t===Z?D():n===Z&&D(!0))}),x(l+"."+Z,function(){D()})},getIframe:function(n,i){var o=n.src,r=t.st.iframe;e.each(r.patterns,function(){return o.indexOf(this.index)>-1?(this.id&&(o="string"==typeof this.id?o.substr(o.lastIndexOf(this.id)+this.id.length,o.length):this.id.call(this,o)),o=this.src.replace("%id%",o),!1):void 0});var a={};return r.srcAction&&(a[r.srcAction]=o),t._parseMarkup(i,a,n),t.updateStatus("ready"),i}}});var K=function(e){var n=t.items.length;return e>n-1?e-n:0>e?n+e:e},Y=function(e,t,n){return e.replace(/%curr%/gi,t+1).replace(/%total%/gi,n)};e.magnificPopup.registerModule("gallery",{options:{enabled:!1,arrowMarkup:'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',preload:[0,2],navigateByImgClick:!0,arrows:!0,tPrev:"Previous (Left arrow key)",tNext:"Next (Right arrow key)",tCounter:"%curr% of %total%"},proto:{initGallery:function(){var n=t.st.gallery,i=".mfp-gallery",r=Boolean(e.fn.mfpFastClick);return t.direction=!0,n&&n.enabled?(a+=" mfp-gallery",x(f+i,function(){n.navigateByImgClick&&t.wrap.on("click"+i,".mfp-img",function(){return t.items.length>1?(t.next(),!1):void 0}),o.on("keydown"+i,function(e){37===e.keyCode?t.prev():39===e.keyCode&&t.next()})}),x("UpdateStatus"+i,function(e,n){n.text&&(n.text=Y(n.text,t.currItem.index,t.items.length))}),x(p+i,function(e,i,o,r){var a=t.items.length;o.counter=a>1?Y(n.tCounter,r.index,a):""}),x("BuildControls"+i,function(){if(t.items.length>1&&n.arrows&&!t.arrowLeft){var i=n.arrowMarkup,o=t.arrowLeft=e(i.replace(/%title%/gi,n.tPrev).replace(/%dir%/gi,"left")).addClass(y),a=t.arrowRight=e(i.replace(/%title%/gi,n.tNext).replace(/%dir%/gi,"right")).addClass(y),s=r?"mfpFastClick":"click";o[s](function(){t.prev()}),a[s](function(){t.next()}),t.isIE7&&(k("b",o[0],!1,!0),k("a",o[0],!1,!0),k("b",a[0],!1,!0),k("a",a[0],!1,!0)),t.container.append(o.add(a))}}),x(m+i,function(){t._preloadTimeout&&clearTimeout(t._preloadTimeout),t._preloadTimeout=setTimeout(function(){t.preloadNearbyImages(),t._preloadTimeout=null},16)}),x(l+i,function(){o.off(i),t.wrap.off("click"+i),t.arrowLeft&&r&&t.arrowLeft.add(t.arrowRight).destroyMfpFastClick(),t.arrowRight=t.arrowLeft=null}),void 0):!1},next:function(){t.direction=!0,t.index=K(t.index+1),t.updateItemHTML()},prev:function(){t.direction=!1,t.index=K(t.index-1),t.updateItemHTML()},goTo:function(e){t.direction=e>=t.index,t.index=e,t.updateItemHTML()},preloadNearbyImages:function(){var e,n=t.st.gallery.preload,i=Math.min(n[0],t.items.length),o=Math.min(n[1],t.items.length);for(e=1;(t.direction?o:i)>=e;e++)t._preloadItem(t.index+e);for(e=1;(t.direction?i:o)>=e;e++)t._preloadItem(t.index-e)},_preloadItem:function(n){if(n=K(n),!t.items[n].preloaded){var i=t.items[n];i.parsed||(i=t.parseEl(n)),T("LazyLoad",i),"image"===i.type&&(i.img=e('<img class="mfp-img" />').on("load.mfploader",function(){i.hasSize=!0}).on("error.mfploader",function(){i.hasSize=!0,i.loadError=!0,T("LazyLoadError",i)}).attr("src",i.src)),i.preloaded=!0}}}});var U="retina";e.magnificPopup.registerModule(U,{options:{replaceSrc:function(e){return e.src.replace(/\.\w+$/,function(e){return"@2x"+e})},ratio:1},proto:{initRetina:function(){if(window.devicePixelRatio>1){var e=t.st.retina,n=e.ratio;n=isNaN(n)?n():n,n>1&&(x("ImageHasSize."+U,function(e,t){t.img.css({"max-width":t.img[0].naturalWidth/n,width:"100%"})}),x("ElementParse."+U,function(t,i){i.src=e.replaceSrc(i,n)}))}}}}),function(){var t=1e3,n="ontouchstart"in window,i=function(){I.off("touchmove"+r+" touchend"+r)},o="mfpFastClick",r="."+o;e.fn.mfpFastClick=function(o){return e(this).each(function(){var a,s=e(this);if(n){var l,c,d,u,p,f;s.on("touchstart"+r,function(e){u=!1,f=1,p=e.originalEvent?e.originalEvent.touches[0]:e.touches[0],c=p.clientX,d=p.clientY,I.on("touchmove"+r,function(e){p=e.originalEvent?e.originalEvent.touches:e.touches,f=p.length,p=p[0],(Math.abs(p.clientX-c)>10||Math.abs(p.clientY-d)>10)&&(u=!0,i())}).on("touchend"+r,function(e){i(),u||f>1||(a=!0,e.preventDefault(),clearTimeout(l),l=setTimeout(function(){a=!1},t),o())})})}s.on("click"+r,function(){a||o()})})},e.fn.destroyMfpFastClick=function(){e(this).off("touchstart"+r+" click"+r),n&&I.off("touchmove"+r+" touchend"+r)}}(),_()})(window.jQuery||window.Zepto);

/*
 *  jQuery OwlCarousel v1.3.3
 *
 *  Copyright (c) 2013 Bartosz Wojciechowski
 *  http://www.owlgraphic.com/owlcarousel/
 *
 *  Licensed under MIT
 *
 */

/*JS Lint helpers: */
/*global dragMove: false, dragEnd: false, $, jQuery, alert, window, document */
/*jslint nomen: true, continue:true */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('7(A 3c.3q!=="9"){3c.3q=9(e){9 t(){}t.5S=e;p 5R t}}(9(e,t,n){h r={1N:9(t,n){h r=c;r.$k=e(n);r.6=e.4M({},e.37.2B.6,r.$k.v(),t);r.2A=t;r.4L()},4L:9(){9 r(e){h n,r="";7(A t.6.33==="9"){t.6.33.R(c,[e])}l{1A(n 38 e.d){7(e.d.5M(n)){r+=e.d[n].1K}}t.$k.2y(r)}t.3t()}h t=c,n;7(A t.6.2H==="9"){t.6.2H.R(c,[t.$k])}7(A t.6.2O==="2Y"){n=t.6.2O;e.5K(n,r)}l{t.3t()}},3t:9(){h e=c;e.$k.v("d-4I",e.$k.2x("2w")).v("d-4F",e.$k.2x("H"));e.$k.z({2u:0});e.2t=e.6.q;e.4E();e.5v=0;e.1X=14;e.23()},23:9(){h e=c;7(e.$k.25().N===0){p b}e.1M();e.4C();e.$S=e.$k.25();e.E=e.$S.N;e.4B();e.$G=e.$k.17(".d-1K");e.$K=e.$k.17(".d-1p");e.3u="U";e.13=0;e.26=[0];e.m=0;e.4A();e.4z()},4z:9(){h e=c;e.2V();e.2W();e.4t();e.30();e.4r();e.4q();e.2p();e.4o();7(e.6.2o!==b){e.4n(e.6.2o)}7(e.6.O===j){e.6.O=4Q}e.19();e.$k.17(".d-1p").z("4i","4h");7(!e.$k.2m(":3n")){e.3o()}l{e.$k.z("2u",1)}e.5O=b;e.2l();7(A e.6.3s==="9"){e.6.3s.R(c,[e.$k])}},2l:9(){h e=c;7(e.6.1Z===j){e.1Z()}7(e.6.1B===j){e.1B()}e.4g();7(A e.6.3w==="9"){e.6.3w.R(c,[e.$k])}},3x:9(){h e=c;7(A e.6.3B==="9"){e.6.3B.R(c,[e.$k])}e.3o();e.2V();e.2W();e.4f();e.30();e.2l();7(A e.6.3D==="9"){e.6.3D.R(c,[e.$k])}},3F:9(){h e=c;t.1c(9(){e.3x()},0)},3o:9(){h e=c;7(e.$k.2m(":3n")===b){e.$k.z({2u:0});t.18(e.1C);t.18(e.1X)}l{p b}e.1X=t.4d(9(){7(e.$k.2m(":3n")){e.3F();e.$k.4b({2u:1},2M);t.18(e.1X)}},5x)},4B:9(){h e=c;e.$S.5n(\'<L H="d-1p">\').4a(\'<L H="d-1K"></L>\');e.$k.17(".d-1p").4a(\'<L H="d-1p-49">\');e.1H=e.$k.17(".d-1p-49");e.$k.z("4i","4h")},1M:9(){h e=c,t=e.$k.1I(e.6.1M),n=e.$k.1I(e.6.2i);7(!t){e.$k.I(e.6.1M)}7(!n){e.$k.I(e.6.2i)}},2V:9(){h t=c,n,r;7(t.6.2Z===b){p b}7(t.6.48===j){t.6.q=t.2t=1;t.6.1h=b;t.6.1s=b;t.6.1O=b;t.6.22=b;t.6.1Q=b;t.6.1R=b;p b}n=e(t.6.47).1f();7(n>(t.6.1s[0]||t.2t)){t.6.q=t.2t}7(t.6.1h!==b){t.6.1h.5g(9(e,t){p e[0]-t[0]});1A(r=0;r<t.6.1h.N;r+=1){7(t.6.1h[r][0]<=n){t.6.q=t.6.1h[r][1]}}}l{7(n<=t.6.1s[0]&&t.6.1s!==b){t.6.q=t.6.1s[1]}7(n<=t.6.1O[0]&&t.6.1O!==b){t.6.q=t.6.1O[1]}7(n<=t.6.22[0]&&t.6.22!==b){t.6.q=t.6.22[1]}7(n<=t.6.1Q[0]&&t.6.1Q!==b){t.6.q=t.6.1Q[1]}7(n<=t.6.1R[0]&&t.6.1R!==b){t.6.q=t.6.1R[1]}}7(t.6.q>t.E&&t.6.46===j){t.6.q=t.E}},4r:9(){h n=c,r,i;7(n.6.2Z!==j){p b}i=e(t).1f();n.3d=9(){7(e(t).1f()!==i){7(n.6.O!==b){t.18(n.1C)}t.5d(r);r=t.1c(9(){i=e(t).1f();n.3x()},n.6.45)}};e(t).44(n.3d)},4f:9(){h e=c;e.2g(e.m);7(e.6.O!==b){e.3j()}},43:9(){h t=c,n=0,r=t.E-t.6.q;t.$G.2f(9(i){h s=e(c);s.z({1f:t.M}).v("d-1K",3p(i));7(i%t.6.q===0||i===r){7(!(i>r)){n+=1}}s.v("d-24",n)})},42:9(){h e=c,t=e.$G.N*e.M;e.$K.z({1f:t*2,T:0});e.43()},2W:9(){h e=c;e.40();e.42();e.3Z();e.3v()},40:9(){h e=c;e.M=1F.4O(e.$k.1f()/e.6.q)},3v:9(){h e=c,t=(e.E*e.M-e.6.q*e.M)*-1;7(e.6.q>e.E){e.D=0;t=0;e.3z=0}l{e.D=e.E-e.6.q;e.3z=t}p t},3Y:9(){p 0},3Z:9(){h t=c,n=0,r=0,i,s,o;t.J=[0];t.3E=[];1A(i=0;i<t.E;i+=1){r+=t.M;t.J.2D(-r);7(t.6.12===j){s=e(t.$G[i]);o=s.v("d-24");7(o!==n){t.3E[n]=t.J[i];n=o}}}},4t:9(){h t=c;7(t.6.2a===j||t.6.1v===j){t.B=e(\'<L H="d-5A"/>\').5m("5l",!t.F.15).5c(t.$k)}7(t.6.1v===j){t.3T()}7(t.6.2a===j){t.3S()}},3S:9(){h t=c,n=e(\'<L H="d-4U"/>\');t.B.1o(n);t.1u=e("<L/>",{"H":"d-1n",2y:t.6.2U[0]||""});t.1q=e("<L/>",{"H":"d-U",2y:t.6.2U[1]||""});n.1o(t.1u).1o(t.1q);n.w("2X.B 21.B",\'L[H^="d"]\',9(e){e.1l()});n.w("2n.B 28.B",\'L[H^="d"]\',9(n){n.1l();7(e(c).1I("d-U")){t.U()}l{t.1n()}})},3T:9(){h t=c;t.1k=e(\'<L H="d-1v"/>\');t.B.1o(t.1k);t.1k.w("2n.B 28.B",".d-1j",9(n){n.1l();7(3p(e(c).v("d-1j"))!==t.m){t.1g(3p(e(c).v("d-1j")),j)}})},3P:9(){h t=c,n,r,i,s,o,u;7(t.6.1v===b){p b}t.1k.2y("");n=0;r=t.E-t.E%t.6.q;1A(s=0;s<t.E;s+=1){7(s%t.6.q===0){n+=1;7(r===s){i=t.E-t.6.q}o=e("<L/>",{"H":"d-1j"});u=e("<3N></3N>",{4R:t.6.39===j?n:"","H":t.6.39===j?"d-59":""});o.1o(u);o.v("d-1j",r===s?i:s);o.v("d-24",n);t.1k.1o(o)}}t.35()},35:9(){h t=c;7(t.6.1v===b){p b}t.1k.17(".d-1j").2f(9(){7(e(c).v("d-24")===e(t.$G[t.m]).v("d-24")){t.1k.17(".d-1j").Z("2d");e(c).I("2d")}})},3e:9(){h e=c;7(e.6.2a===b){p b}7(e.6.2e===b){7(e.m===0&&e.D===0){e.1u.I("1b");e.1q.I("1b")}l 7(e.m===0&&e.D!==0){e.1u.I("1b");e.1q.Z("1b")}l 7(e.m===e.D){e.1u.Z("1b");e.1q.I("1b")}l 7(e.m!==0&&e.m!==e.D){e.1u.Z("1b");e.1q.Z("1b")}}},30:9(){h e=c;e.3P();e.3e();7(e.B){7(e.6.q>=e.E){e.B.3K()}l{e.B.3J()}}},55:9(){h e=c;7(e.B){e.B.3k()}},U:9(e){h t=c;7(t.1E){p b}t.m+=t.6.12===j?t.6.q:1;7(t.m>t.D+(t.6.12===j?t.6.q-1:0)){7(t.6.2e===j){t.m=0;e="2k"}l{t.m=t.D;p b}}t.1g(t.m,e)},1n:9(e){h t=c;7(t.1E){p b}7(t.6.12===j&&t.m>0&&t.m<t.6.q){t.m=0}l{t.m-=t.6.12===j?t.6.q:1}7(t.m<0){7(t.6.2e===j){t.m=t.D;e="2k"}l{t.m=0;p b}}t.1g(t.m,e)},1g:9(e,n,r){h i=c,s;7(i.1E){p b}7(A i.6.1Y==="9"){i.6.1Y.R(c,[i.$k])}7(e>=i.D){e=i.D}l 7(e<=0){e=0}i.m=i.d.m=e;7(i.6.2o!==b&&r!=="4e"&&i.6.q===1&&i.F.1x===j){i.1t(0);7(i.F.1x===j){i.1L(i.J[e])}l{i.1r(i.J[e],1)}i.2r();i.4l();p b}s=i.J[e];7(i.F.1x===j){i.1T=b;7(n===j){i.1t("1w");t.1c(9(){i.1T=j},i.6.1w)}l 7(n==="2k"){i.1t(i.6.2v);t.1c(9(){i.1T=j},i.6.2v)}l{i.1t("1m");t.1c(9(){i.1T=j},i.6.1m)}i.1L(s)}l{7(n===j){i.1r(s,i.6.1w)}l 7(n==="2k"){i.1r(s,i.6.2v)}l{i.1r(s,i.6.1m)}}i.2r()},2g:9(e){h t=c;7(A t.6.1Y==="9"){t.6.1Y.R(c,[t.$k])}7(e>=t.D||e===-1){e=t.D}l 7(e<=0){e=0}t.1t(0);7(t.F.1x===j){t.1L(t.J[e])}l{t.1r(t.J[e],1)}t.m=t.d.m=e;t.2r()},2r:9(){h e=c;e.26.2D(e.m);e.13=e.d.13=e.26[e.26.N-2];e.26.5f(0);7(e.13!==e.m){e.35();e.3e();e.2l();7(e.6.O!==b){e.3j()}}7(A e.6.3y==="9"&&e.13!==e.m){e.6.3y.R(c,[e.$k])}},X:9(){h e=c;e.3A="X";t.18(e.1C)},3j:9(){h e=c;7(e.3A!=="X"){e.19()}},19:9(){h e=c;e.3A="19";7(e.6.O===b){p b}t.18(e.1C);e.1C=t.4d(9(){e.U(j)},e.6.O)},1t:9(e){h t=c;7(e==="1m"){t.$K.z(t.2z(t.6.1m))}l 7(e==="1w"){t.$K.z(t.2z(t.6.1w))}l 7(A e!=="2Y"){t.$K.z(t.2z(e))}},2z:9(e){p{"-1G-1a":"2C "+e+"1z 2s","-1W-1a":"2C "+e+"1z 2s","-o-1a":"2C "+e+"1z 2s",1a:"2C "+e+"1z 2s"}},3H:9(){p{"-1G-1a":"","-1W-1a":"","-o-1a":"",1a:""}},3I:9(e){p{"-1G-P":"1i("+e+"V, C, C)","-1W-P":"1i("+e+"V, C, C)","-o-P":"1i("+e+"V, C, C)","-1z-P":"1i("+e+"V, C, C)",P:"1i("+e+"V, C,C)"}},1L:9(e){h t=c;t.$K.z(t.3I(e))},3L:9(e){h t=c;t.$K.z({T:e})},1r:9(e,t){h n=c;n.29=b;n.$K.X(j,j).4b({T:e},{54:t||n.6.1m,3M:9(){n.29=j}})},4E:9(){h e=c,r="1i(C, C, C)",i=n.56("L"),s,o,u,a;i.2w.3O="  -1W-P:"+r+"; -1z-P:"+r+"; -o-P:"+r+"; -1G-P:"+r+"; P:"+r;s=/1i\\(C, C, C\\)/g;o=i.2w.3O.5i(s);u=o!==14&&o.N!==0;a="5z"38 t||t.5Q.4P;e.F={1x:u,15:a}},4q:9(){h e=c;7(e.6.27!==b||e.6.1U!==b){e.3Q();e.3R()}},4C:9(){h e=c,t=["s","e","x"];e.16={};7(e.6.27===j&&e.6.1U===j){t=["2X.d 21.d","2N.d 3U.d","2n.d 3V.d 28.d"]}l 7(e.6.27===b&&e.6.1U===j){t=["2X.d","2N.d","2n.d 3V.d"]}l 7(e.6.27===j&&e.6.1U===b){t=["21.d","3U.d","28.d"]}e.16.3W=t[0];e.16.2K=t[1];e.16.2J=t[2]},3R:9(){h t=c;t.$k.w("5y.d",9(e){e.1l()});t.$k.w("21.3X",9(t){p e(t.1d).2m("5C, 5E, 5F, 5N")})},3Q:9(){9 s(e){7(e.2b!==W){p{x:e.2b[0].2c,y:e.2b[0].41}}7(e.2b===W){7(e.2c!==W){p{x:e.2c,y:e.41}}7(e.2c===W){p{x:e.52,y:e.53}}}}9 o(t){7(t==="w"){e(n).w(r.16.2K,a);e(n).w(r.16.2J,f)}l 7(t==="Q"){e(n).Q(r.16.2K);e(n).Q(r.16.2J)}}9 u(n){h u=n.3h||n||t.3g,a;7(u.5a===3){p b}7(r.E<=r.6.q){p}7(r.29===b&&!r.6.3f){p b}7(r.1T===b&&!r.6.3f){p b}7(r.6.O!==b){t.18(r.1C)}7(r.F.15!==j&&!r.$K.1I("3b")){r.$K.I("3b")}r.11=0;r.Y=0;e(c).z(r.3H());a=e(c).2h();i.2S=a.T;i.2R=s(u).x-a.T;i.2P=s(u).y-a.5o;o("w");i.2j=b;i.2L=u.1d||u.4c}9 a(o){h u=o.3h||o||t.3g,a,f;r.11=s(u).x-i.2R;r.2I=s(u).y-i.2P;r.Y=r.11-i.2S;7(A r.6.2E==="9"&&i.3C!==j&&r.Y!==0){i.3C=j;r.6.2E.R(r,[r.$k])}7((r.Y>8||r.Y<-8)&&r.F.15===j){7(u.1l!==W){u.1l()}l{u.5L=b}i.2j=j}7((r.2I>10||r.2I<-10)&&i.2j===b){e(n).Q("2N.d")}a=9(){p r.Y/5};f=9(){p r.3z+r.Y/5};r.11=1F.3v(1F.3Y(r.11,a()),f());7(r.F.1x===j){r.1L(r.11)}l{r.3L(r.11)}}9 f(n){h s=n.3h||n||t.3g,u,a,f;s.1d=s.1d||s.4c;i.3C=b;7(r.F.15!==j){r.$K.Z("3b")}7(r.Y<0){r.1y=r.d.1y="T"}l{r.1y=r.d.1y="3i"}7(r.Y!==0){u=r.4j();r.1g(u,b,"4e");7(i.2L===s.1d&&r.F.15!==j){e(s.1d).w("3a.4k",9(t){t.4S();t.4T();t.1l();e(t.1d).Q("3a.4k")});a=e.4N(s.1d,"4V").3a;f=a.4W();a.4X(0,0,f)}}o("Q")}h r=c,i={2R:0,2P:0,4Y:0,2S:0,2h:14,4Z:14,50:14,2j:14,51:14,2L:14};r.29=j;r.$k.w(r.16.3W,".d-1p",u)},4j:9(){h e=c,t=e.4m();7(t>e.D){e.m=e.D;t=e.D}l 7(e.11>=0){t=0;e.m=0}p t},4m:9(){h t=c,n=t.6.12===j?t.3E:t.J,r=t.11,i=14;e.2f(n,9(s,o){7(r-t.M/20>n[s+1]&&r-t.M/20<o&&t.34()==="T"){i=o;7(t.6.12===j){t.m=e.4p(i,t.J)}l{t.m=s}}l 7(r+t.M/20<o&&r+t.M/20>(n[s+1]||n[s]-t.M)&&t.34()==="3i"){7(t.6.12===j){i=n[s+1]||n[n.N-1];t.m=e.4p(i,t.J)}l{i=n[s+1];t.m=s+1}}});p t.m},34:9(){h e=c,t;7(e.Y<0){t="3i";e.3u="U"}l{t="T";e.3u="1n"}p t},4A:9(){h e=c;e.$k.w("d.U",9(){e.U()});e.$k.w("d.1n",9(){e.1n()});e.$k.w("d.19",9(t,n){e.6.O=n;e.19();e.32="19"});e.$k.w("d.X",9(){e.X();e.32="X"});e.$k.w("d.1g",9(t,n){e.1g(n)});e.$k.w("d.2g",9(t,n){e.2g(n)})},2p:9(){h e=c;7(e.6.2p===j&&e.F.15!==j&&e.6.O!==b){e.$k.w("57",9(){e.X()});e.$k.w("58",9(){7(e.32!=="X"){e.19()}})}},1Z:9(){h t=c,n,r,i,s,o;7(t.6.1Z===b){p b}1A(n=0;n<t.E;n+=1){r=e(t.$G[n]);7(r.v("d-1e")==="1e"){4s}i=r.v("d-1K");s=r.17(".5b");7(A s.v("1J")!=="2Y"){r.v("d-1e","1e");4s}7(r.v("d-1e")===W){s.3K();r.I("4u").v("d-1e","5e")}7(t.6.4v===j){o=i>=t.m}l{o=j}7(o&&i<t.m+t.6.q&&s.N){t.4w(r,s)}}},4w:9(e,n){9 o(){e.v("d-1e","1e").Z("4u");n.5h("v-1J");7(r.6.4x==="4y"){n.5j(5k)}l{n.3J()}7(A r.6.2T==="9"){r.6.2T.R(c,[r.$k])}}9 u(){i+=1;7(r.2Q(n.3l(0))||s===j){o()}l 7(i<=2q){t.1c(u,2q)}l{o()}}h r=c,i=0,s;7(n.5p("5q")==="5r"){n.z("5s-5t","5u("+n.v("1J")+")");s=j}l{n[0].1J=n.v("1J")}u()},1B:9(){9 s(){h r=e(n.$G[n.m]).2G();n.1H.z("2G",r+"V");7(!n.1H.1I("1B")){t.1c(9(){n.1H.I("1B")},0)}}9 o(){i+=1;7(n.2Q(r.3l(0))){s()}l 7(i<=2q){t.1c(o,2q)}l{n.1H.z("2G","")}}h n=c,r=e(n.$G[n.m]).17("5w"),i;7(r.3l(0)!==W){i=0;o()}l{s()}},2Q:9(e){h t;7(!e.3M){p b}t=A e.4D;7(t!=="W"&&e.4D===0){p b}p j},4g:9(){h t=c,n;7(t.6.2F===j){t.$G.Z("2d")}t.1D=[];1A(n=t.m;n<t.m+t.6.q;n+=1){t.1D.2D(n);7(t.6.2F===j){e(t.$G[n]).I("2d")}}t.d.1D=t.1D},4n:9(e){h t=c;t.4G="d-"+e+"-5B";t.4H="d-"+e+"-38"},4l:9(){9 a(e){p{2h:"5D",T:e+"V"}}h e=c,t=e.4G,n=e.4H,r=e.$G.1S(e.m),i=e.$G.1S(e.13),s=1F.4J(e.J[e.m])+e.J[e.13],o=1F.4J(e.J[e.m])+e.M/2,u="5G 5H 5I 5J";e.1E=j;e.$K.I("d-1P").z({"-1G-P-1P":o+"V","-1W-4K-1P":o+"V","4K-1P":o+"V"});i.z(a(s,10)).I(t).w(u,9(){e.3m=j;i.Q(u);e.31(i,t)});r.I(n).w(u,9(){e.36=j;r.Q(u);e.31(r,n)})},31:9(e,t){h n=c;e.z({2h:"",T:""}).Z(t);7(n.3m&&n.36){n.$K.Z("d-1P");n.3m=b;n.36=b;n.1E=b}},4o:9(){h e=c;e.d={2A:e.2A,5P:e.$k,S:e.$S,G:e.$G,m:e.m,13:e.13,1D:e.1D,15:e.F.15,F:e.F,1y:e.1y}},3G:9(){h r=c;r.$k.Q(".d d 21.3X");e(n).Q(".d d");e(t).Q("44",r.3d)},1V:9(){h e=c;7(e.$k.25().N!==0){e.$K.3r();e.$S.3r().3r();7(e.B){e.B.3k()}}e.3G();e.$k.2x("2w",e.$k.v("d-4I")||"").2x("H",e.$k.v("d-4F"))},5T:9(){h e=c;e.X();t.18(e.1X);e.1V();e.$k.5U()},5V:9(t){h n=c,r=e.4M({},n.2A,t);n.1V();n.1N(r,n.$k)},5W:9(e,t){h n=c,r;7(!e){p b}7(n.$k.25().N===0){n.$k.1o(e);n.23();p b}n.1V();7(t===W||t===-1){r=-1}l{r=t}7(r>=n.$S.N||r===-1){n.$S.1S(-1).5X(e)}l{n.$S.1S(r).5Y(e)}n.23()},5Z:9(e){h t=c,n;7(t.$k.25().N===0){p b}7(e===W||e===-1){n=-1}l{n=e}t.1V();t.$S.1S(n).3k();t.23()}};e.37.2B=9(t){p c.2f(9(){7(e(c).v("d-1N")===j){p b}e(c).v("d-1N",j);h n=3c.3q(r);n.1N(t,c);e.v(c,"2B",n)})};e.37.2B.6={q:5,1h:b,1s:[60,4],1O:[61,3],22:[62,2],1Q:b,1R:[63,1],48:b,46:b,1m:2M,1w:64,2v:65,O:b,2p:b,2a:b,2U:["1n","U"],2e:j,12:b,1v:j,39:b,2Z:j,45:2M,47:t,1M:"d-66",2i:"d-2i",1Z:b,4v:j,4x:"4y",1B:b,2O:b,33:b,3f:j,27:j,1U:j,2F:b,2o:b,3B:b,3D:b,2H:b,3s:b,1Y:b,3y:b,3w:b,2E:b,2T:b}})(67,68,69)',62,382,'||||||options|if||function||false|this|owl||||var||true|elem|else|currentItem|||return|items|||||data|on|||css|typeof|owlControls|0px|maximumItem|itemsAmount|browser|owlItems|class|addClass|positionsInArray|owlWrapper|div|itemWidth|length|autoPlay|transform|off|apply|userItems|left|next|px|undefined|stop|newRelativeX|removeClass||newPosX|scrollPerPage|prevItem|null|isTouch|ev_types|find|clearInterval|play|transition|disabled|setTimeout|target|loaded|width|goTo|itemsCustom|translate3d|page|paginationWrapper|preventDefault|slideSpeed|prev|append|wrapper|buttonNext|css2slide|itemsDesktop|swapSpeed|buttonPrev|pagination|paginationSpeed|support3d|dragDirection|ms|for|autoHeight|autoPlayInterval|visibleItems|isTransition|Math|webkit|wrapperOuter|hasClass|src|item|transition3d|baseClass|init|itemsDesktopSmall|origin|itemsTabletSmall|itemsMobile|eq|isCss3Finish|touchDrag|unWrap|moz|checkVisible|beforeMove|lazyLoad||mousedown|itemsTablet|setVars|roundPages|children|prevArr|mouseDrag|mouseup|isCssFinish|navigation|touches|pageX|active|rewindNav|each|jumpTo|position|theme|sliding|rewind|eachMoveUpdate|is|touchend|transitionStyle|stopOnHover|100|afterGo|ease|orignalItems|opacity|rewindSpeed|style|attr|html|addCssSpeed|userOptions|owlCarousel|all|push|startDragging|addClassActive|height|beforeInit|newPosY|end|move|targetElement|200|touchmove|jsonPath|offsetY|completeImg|offsetX|relativePos|afterLazyLoad|navigationText|updateItems|calculateAll|touchstart|string|responsive|updateControls|clearTransStyle|hoverStatus|jsonSuccess|moveDirection|checkPagination|endCurrent|fn|in|paginationNumbers|click|grabbing|Object|resizer|checkNavigation|dragBeforeAnimFinish|event|originalEvent|right|checkAp|remove|get|endPrev|visible|watchVisibility|Number|create|unwrap|afterInit|logIn|playDirection|max|afterAction|updateVars|afterMove|maximumPixels|apStatus|beforeUpdate|dragging|afterUpdate|pagesInArray|reload|clearEvents|removeTransition|doTranslate|show|hide|css2move|complete|span|cssText|updatePagination|gestures|disabledEvents|buildButtons|buildPagination|mousemove|touchcancel|start|disableTextSelect|min|loops|calculateWidth|pageY|appendWrapperSizes|appendItemsSizes|resize|responsiveRefreshRate|itemsScaleUp|responsiveBaseWidth|singleItem|outer|wrap|animate|srcElement|setInterval|drag|updatePosition|onVisibleItems|block|display|getNewPosition|disable|singleItemTransition|closestItem|transitionTypes|owlStatus|inArray|moveEvents|response|continue|buildControls|loading|lazyFollow|lazyPreload|lazyEffect|fade|onStartup|customEvents|wrapItems|eventTypes|naturalWidth|checkBrowser|originalClasses|outClass|inClass|originalStyles|abs|perspective|loadContent|extend|_data|round|msMaxTouchPoints|5e3|text|stopImmediatePropagation|stopPropagation|buttons|events|pop|splice|baseElWidth|minSwipe|maxSwipe|dargging|clientX|clientY|duration|destroyControls|createElement|mouseover|mouseout|numbers|which|lazyOwl|appendTo|clearTimeout|checked|shift|sort|removeAttr|match|fadeIn|400|clickable|toggleClass|wrapAll|top|prop|tagName|DIV|background|image|url|wrapperWidth|img|500|dragstart|ontouchstart|controls|out|input|relative|textarea|select|webkitAnimationEnd|oAnimationEnd|MSAnimationEnd|animationend|getJSON|returnValue|hasOwnProperty|option|onstartup|baseElement|navigator|new|prototype|destroy|removeData|reinit|addItem|after|before|removeItem|1199|979|768|479|800|1e3|carousel|jQuery|window|document'.split('|'),0,{}));

/*
 jQuery Waypoints - v2.0.3
 Copyright (c) 2011-2013 Caleb Troughton
 Dual licensed under the MIT license and GPL license.
 https://github.com/imakewebthings/jquery-waypoints/blob/master/licenses.txt
 */
(function(){var t=[].indexOf||function(t){for(var e=0,n=this.length;e<n;e++){if(e in this&&this[e]===t)return e}return-1},e=[].slice;(function(t,e){if(typeof define==="function"&&define.amd){return define("waypoints",["jquery"],function(n){return e(n,t)})}else{return e(t.jQuery,t)}})(this,function(n,r){var i,o,l,s,f,u,a,c,h,d,p,y,v,w,g,m;i=n(r);c=t.call(r,"ontouchstart")>=0;s={horizontal:{},vertical:{}};f=1;a={};u="waypoints-context-id";p="resize.waypoints";y="scroll.waypoints";v=1;w="waypoints-waypoint-ids";g="waypoint";m="waypoints";o=function(){function t(t){var e=this;this.$element=t;this.element=t[0];this.didResize=false;this.didScroll=false;this.id="context"+f++;this.oldScroll={x:t.scrollLeft(),y:t.scrollTop()};this.waypoints={horizontal:{},vertical:{}};t.data(u,this.id);a[this.id]=this;t.bind(y,function(){var t;if(!(e.didScroll||c)){e.didScroll=true;t=function(){e.doScroll();return e.didScroll=false};return r.setTimeout(t,n[m].settings.scrollThrottle)}});t.bind(p,function(){var t;if(!e.didResize){e.didResize=true;t=function(){n[m]("refresh");return e.didResize=false};return r.setTimeout(t,n[m].settings.resizeThrottle)}})}t.prototype.doScroll=function(){var t,e=this;t={horizontal:{newScroll:this.$element.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.$element.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};if(c&&(!t.vertical.oldScroll||!t.vertical.newScroll)){n[m]("refresh")}n.each(t,function(t,r){var i,o,l;l=[];o=r.newScroll>r.oldScroll;i=o?r.forward:r.backward;n.each(e.waypoints[t],function(t,e){var n,i;if(r.oldScroll<(n=e.offset)&&n<=r.newScroll){return l.push(e)}else if(r.newScroll<(i=e.offset)&&i<=r.oldScroll){return l.push(e)}});l.sort(function(t,e){return t.offset-e.offset});if(!o){l.reverse()}return n.each(l,function(t,e){if(e.options.continuous||t===l.length-1){return e.trigger([i])}})});return this.oldScroll={x:t.horizontal.newScroll,y:t.vertical.newScroll}};t.prototype.refresh=function(){var t,e,r,i=this;r=n.isWindow(this.element);e=this.$element.offset();this.doScroll();t={horizontal:{contextOffset:r?0:e.left,contextScroll:r?0:this.oldScroll.x,contextDimension:this.$element.width(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:r?0:e.top,contextScroll:r?0:this.oldScroll.y,contextDimension:r?n[m]("viewportHeight"):this.$element.height(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};return n.each(t,function(t,e){return n.each(i.waypoints[t],function(t,r){var i,o,l,s,f;i=r.options.offset;l=r.offset;o=n.isWindow(r.element)?0:r.$element.offset()[e.offsetProp];if(n.isFunction(i)){i=i.apply(r.element)}else if(typeof i==="string"){i=parseFloat(i);if(r.options.offset.indexOf("%")>-1){i=Math.ceil(e.contextDimension*i/100)}}r.offset=o-e.contextOffset+e.contextScroll-i;if(r.options.onlyOnScroll&&l!=null||!r.enabled){return}if(l!==null&&l<(s=e.oldScroll)&&s<=r.offset){return r.trigger([e.backward])}else if(l!==null&&l>(f=e.oldScroll)&&f>=r.offset){return r.trigger([e.forward])}else if(l===null&&e.oldScroll>=r.offset){return r.trigger([e.forward])}})})};t.prototype.checkEmpty=function(){if(n.isEmptyObject(this.waypoints.horizontal)&&n.isEmptyObject(this.waypoints.vertical)){this.$element.unbind([p,y].join(" "));return delete a[this.id]}};return t}();l=function(){function t(t,e,r){var i,o;r=n.extend({},n.fn[g].defaults,r);if(r.offset==="bottom-in-view"){r.offset=function(){var t;t=n[m]("viewportHeight");if(!n.isWindow(e.element)){t=e.$element.height()}return t-n(this).outerHeight()}}this.$element=t;this.element=t[0];this.axis=r.horizontal?"horizontal":"vertical";this.callback=r.handler;this.context=e;this.enabled=r.enabled;this.id="waypoints"+v++;this.offset=null;this.options=r;e.waypoints[this.axis][this.id]=this;s[this.axis][this.id]=this;i=(o=t.data(w))!=null?o:[];i.push(this.id);t.data(w,i)}t.prototype.trigger=function(t){if(!this.enabled){return}if(this.callback!=null){this.callback.apply(this.element,t)}if(this.options.triggerOnce){return this.destroy()}};t.prototype.disable=function(){return this.enabled=false};t.prototype.enable=function(){this.context.refresh();return this.enabled=true};t.prototype.destroy=function(){delete s[this.axis][this.id];delete this.context.waypoints[this.axis][this.id];return this.context.checkEmpty()};t.getWaypointsByElement=function(t){var e,r;r=n(t).data(w);if(!r){return[]}e=n.extend({},s.horizontal,s.vertical);return n.map(r,function(t){return e[t]})};return t}();d={init:function(t,e){var r;if(e==null){e={}}if((r=e.handler)==null){e.handler=t}this.each(function(){var t,r,i,s;t=n(this);i=(s=e.context)!=null?s:n.fn[g].defaults.context;if(!n.isWindow(i)){i=t.closest(i)}i=n(i);r=a[i.data(u)];if(!r){r=new o(i)}return new l(t,r,e)});n[m]("refresh");return this},disable:function(){return d._invoke(this,"disable")},enable:function(){return d._invoke(this,"enable")},destroy:function(){return d._invoke(this,"destroy")},prev:function(t,e){return d._traverse.call(this,t,e,function(t,e,n){if(e>0){return t.push(n[e-1])}})},next:function(t,e){return d._traverse.call(this,t,e,function(t,e,n){if(e<n.length-1){return t.push(n[e+1])}})},_traverse:function(t,e,i){var o,l;if(t==null){t="vertical"}if(e==null){e=r}l=h.aggregate(e);o=[];this.each(function(){var e;e=n.inArray(this,l[t]);return i(o,e,l[t])});return this.pushStack(o)},_invoke:function(t,e){t.each(function(){var t;t=l.getWaypointsByElement(this);return n.each(t,function(t,n){n[e]();return true})});return this}};n.fn[g]=function(){var t,r;r=arguments[0],t=2<=arguments.length?e.call(arguments,1):[];if(d[r]){return d[r].apply(this,t)}else if(n.isFunction(r)){return d.init.apply(this,arguments)}else if(n.isPlainObject(r)){return d.init.apply(this,[null,r])}else if(!r){return n.error("jQuery Waypoints needs a callback function or handler option.")}else{return n.error("The "+r+" method does not exist in jQuery Waypoints.")}};n.fn[g].defaults={context:r,continuous:true,enabled:true,horizontal:false,offset:0,triggerOnce:false};h={refresh:function(){return n.each(a,function(t,e){return e.refresh()})},viewportHeight:function(){var t;return(t=r.innerHeight)!=null?t:i.height()},aggregate:function(t){var e,r,i;e=s;if(t){e=(i=a[n(t).data(u)])!=null?i.waypoints:void 0}if(!e){return[]}r={horizontal:[],vertical:[]};n.each(r,function(t,i){n.each(e[t],function(t,e){return i.push(e)});i.sort(function(t,e){return t.offset-e.offset});r[t]=n.map(i,function(t){return t.element});return r[t]=n.unique(r[t])});return r},above:function(t){if(t==null){t=r}return h._filter(t,"vertical",function(t,e){return e.offset<=t.oldScroll.y})},below:function(t){if(t==null){t=r}return h._filter(t,"vertical",function(t,e){return e.offset>t.oldScroll.y})},left:function(t){if(t==null){t=r}return h._filter(t,"horizontal",function(t,e){return e.offset<=t.oldScroll.x})},right:function(t){if(t==null){t=r}return h._filter(t,"horizontal",function(t,e){return e.offset>t.oldScroll.x})},enable:function(){return h._invoke("enable")},disable:function(){return h._invoke("disable")},destroy:function(){return h._invoke("destroy")},extendFn:function(t,e){return d[t]=e},_invoke:function(t){var e;e=n.extend({},s.vertical,s.horizontal);return n.each(e,function(e,n){n[t]();return true})},_filter:function(t,e,r){var i,o;i=a[n(t).data(u)];if(!i){return[]}o=[];n.each(i.waypoints[e],function(t,e){if(r(i,e)){return o.push(e)}});o.sort(function(t,e){return t.offset-e.offset});return n.map(o,function(t){return t.element})}};n[m]=function(){var t,n;n=arguments[0],t=2<=arguments.length?e.call(arguments,1):[];if(h[n]){return h[n].apply(null,t)}else{return h.aggregate.call(null,n)}};n[m].settings={resizeThrottle:100,scrollThrottle:30};return i.load(function(){return n[m]("refresh")})})}).call(this);

/*
 * jQuery Flickr
 * Copyright (C) 2009 Joel Sutherland
 * Licenced under the MIT license
 * http://www.newmediacampaigns.com/page/jquery-flickr-plugin
 *
 * Available tags for templates:
 * title, link, date_taken, description, published, author, author_id, tags, image*
 */
(function($){$.fn.jflickrfeed=function(settings,callback){settings=$.extend(true,{flickrbase:'http://api.flickr.com/services/feeds/',feedapi:'photos_public.gne',limit:20,qstrings:{lang:'en-us',format:'json',jsoncallback:'?'},cleanDescription:true,useTemplate:true,itemTemplate:'',itemCallback:function(){}},settings);var url=settings.flickrbase+settings.feedapi+'?';var first=true;for(var key in settings.qstrings){if(!first)
	url+='&';url+=key+'='+settings.qstrings[key];first=false;}
	return $(this).each(function(){var $container=$(this);var container=this;$.getJSON(url,function(data){$.each(data.items,function(i,item){if(i<settings.limit){if(settings.cleanDescription){var regex=/<p>(.*?)<\/p>/g;var input=item.description;if(regex.test(input)){item.description=input.match(regex)[2]
		if(item.description!=undefined)
			item.description=item.description.replace('<p>','').replace('</p>','');}}
		item['image_s']=item.media.m.replace('_m','_s');item['image_t']=item.media.m.replace('_m','_t');item['image_m']=item.media.m.replace('_m','_m');item['image']=item.media.m.replace('_m','');item['image_b']=item.media.m.replace('_m','_b');delete item.media;if(settings.useTemplate){var template=settings.itemTemplate;for(var key in item){var rgx=new RegExp('{{'+key+'}}','g');template=template.replace(rgx,item[key]);}
			$container.append(template)}
		settings.itemCallback.call(container,item);}});if($.isFunction(callback)){callback.call(container,data);}});});}})(jQuery);

/*
 * Twitter Fetcher
 *
 * ### HOW TO CREATE A VALID ID TO USE: ###
 * Go to www.twitter.com and sign in as normal, go to your settings page.
 * Go to "Widgets" on the left hand side.
 * Create a new widget for what you need eg "user timeline" or "search" etc.
 * Feel free to check "exclude replies" if you dont want replies in results.
 * Now go back to settings page, and then go back to widgets page, you should
 * see the widget you just created. Click edit.
 * Now look at the URL in your web browser, you will see a long number like this:
 * 345735908357048478
 * Use this as your ID below instead!
 */
var twitterFetcher=function(){function t(d){return d.replace(/<b[^>]*>(.*?)<\/b>/gi,function(c,d){return d}).replace(/class=".*?"|data-query-source=".*?"|dir=".*?"|rel=".*?"/gi,"")}function m(d,c){for(var f=[],e=RegExp("(^| )"+c+"( |$)"),g=d.getElementsByTagName("*"),b=0,a=g.length;b<a;b++)e.test(g[b].className)&&f.push(g[b]);return f}var u="",j=20,n=!0,h=[],p=!1,k=!0,l=!0,q=null,r=!0;return{fetch:function(d,c,f,e,g,b,a){void 0===f&&(f=20);void 0===e&&(n=!0);void 0===g&&(g=!0);void 0===b&&(b=!0);
	void 0===a&&(a="default");p?h.push({id:d,domId:c,maxTweets:f,enableLinks:e,showUser:g,showTime:b,dateFunction:a}):(p=!0,u=c,j=f,n=e,l=g,k=b,q=a,c=document.createElement("script"),c.type="text/javascript",c.src="//cdn.syndication.twimg.com/widgets/timelines/"+d+"?&lang=en&callback=twitterFetcher.callback&suppress_response_codes=true&rnd="+Math.random(),document.getElementsByTagName("head")[0].appendChild(c))},callback:function(d){var c=document.createElement("div");c.innerHTML=d.body;"undefined"===
typeof c.getElementsByClassName&&(r=!1);var f=d=null,e=null;r?(d=c.getElementsByClassName("e-entry-title"),f=c.getElementsByClassName("p-author"),e=c.getElementsByClassName("dt-updated")):(d=m(c,"e-entry-title"),f=m(c,"p-author"),e=m(c,"dt-updated"));for(var c=[],g=d.length,b=0;b<g;){if("string"!==typeof q){var a=new Date(e[b].getAttribute("datetime").replace(/-/g,"/").replace("T"," ").split("+")[0]),a=q(a);e[b].setAttribute("aria-label",a);if(d[b].innerText)if(r)e[b].innerText=a;else{var s=document.createElement("p"),
	v=document.createTextNode(a);s.appendChild(v);s.setAttribute("aria-label",a);e[b]=s}else e[b].textContent=a}n?(a="",l&&(a+='<div class="user">'+"</div>"),a+='<p class="tweet">'+t(d[b].innerHTML)+"</p>",k&&(a+='<p class="timePosted">'+e[b].getAttribute("aria-label")+"</p>")):d[b].innerText?(a="",l&&(a+='<p class="user">'+f[b].innerText+"</p>"),a+='<p class="tweet">'+d[b].innerText+"</p>",k&&(a+='<p class="timePosted">'+e[b].innerText+"</p>")):(a="",l&&(a+='<p class="user">'+f[b].textContent+
"</p>"),a+='<p class="tweet">'+d[b].textContent+"</p>",k&&(a+='<p class="timePosted">'+e[b].textContent+"</p>"));c.push(a);b++}c.length>j&&c.splice(j,c.length-j);d=c.length;f=0;e=document.getElementById(u);for(g="<ul>";f<d;)g+="<li>"+c[f]+"</li>",f++;e.innerHTML=g+"</ul>";p=!1;0<h.length&&(twitterFetcher.fetch(h[0].id,h[0].domId,h[0].maxTweets,h[0].enableLinks,h[0].showUser,h[0].showTime,h[0].dateFunction),h.splice(0,1))}}}();

/*
 Plugin Name: 	BrowserSelector
 Written by: 	Crivos - (http://www.crivos.com)
 Version: 		0.1
 */
(function($, navigator) {
	$.extend({

		browserSelector: function() {

			var u = navigator.userAgent,
				ua = u.toLowerCase(),
				is = function (t) {
					return ua.indexOf(t) > -1;
				},
				g = 'gecko',
				w = 'webkit',
				s = 'safari',
				o = 'opera',
				h = document.documentElement,
				b = [(!(/opera|webtv/i.test(ua)) && /msie\s(\d)/.test(ua)) ? ('ie ie' + parseFloat(navigator.appVersion.split("MSIE")[1])) : is('firefox/2') ? g + ' ff2' : is('firefox/3.5') ? g + ' ff3 ff3_5' : is('firefox/3') ? g + ' ff3' : is('gecko/') ? g : is('opera') ? o + (/version\/(\d+)/.test(ua) ? ' ' + o + RegExp.jQuery1 : (/opera(\s|\/)(\d+)/.test(ua) ? ' ' + o + RegExp.jQuery2 : '')) : is('konqueror') ? 'konqueror' : is('chrome') ? w + ' chrome' : is('iron') ? w + ' iron' : is('applewebkit/') ? w + ' ' + s + (/version\/(\d+)/.test(ua) ? ' ' + s + RegExp.jQuery1 : '') : is('mozilla/') ? g : '', is('j2me') ? 'mobile' : is('iphone') ? 'iphone' : is('ipod') ? 'ipod' : is('mac') ? 'mac' : is('darwin') ? 'mac' : is('webtv') ? 'webtv' : is('win') ? 'win' : is('freebsd') ? 'freebsd' : (is('x11') || is('linux')) ? 'linux' : '', 'js'];

			c = b.join(' ');
			h.className += ' ' + c;

		}

	});
})(jQuery, navigator);

/*
 Plugin Name: 	smoothScroll for jQuery.
 Written by: 	Crivos - (http://www.crivos.com)
 Version: 		0.1

 Based on:

 SmoothScroll v1.2.1
 Licensed under the terms of the MIT license.

 People involved
 - Balazs Galambosi (maintainer)
 - Patrick Brunner  (original idea)
 - Michael Herf     (Pulse Algorithm)

 */
(function($) {
	$.extend({

		smoothScroll: function() {

			// Scroll Variables (tweakable)
			var defaultOptions = {

				// Scrolling Core
				frameRate        : 150, // [Hz]
				animationTime    : 700, // [px]
				stepSize         : 80, // [px]

				// Pulse (less tweakable)
				// ratio of "tail" to "acceleration"
				pulseAlgorithm   : true,
				pulseScale       : 8,
				pulseNormalize   : 1,

				// Acceleration
				accelerationDelta : 20,  // 20
				accelerationMax   : 1,   // 1

				// Keyboard Settings
				keyboardSupport   : true,  // option
				arrowScroll       : 50,     // [px]

				// Other
				touchpadSupport   : true,
				fixedBackground   : true,
				excluded          : ""
			};

			var options = defaultOptions;

			// Other Variables
			var isExcluded = false;
			var isFrame = false;
			var direction = { x: 0, y: 0 };
			var initDone  = false;
			var root = document.documentElement;
			var activeElement;
			var observer;
			var deltaBuffer = [ 120, 120, 120 ];

			var key = { left: 37, up: 38, right: 39, down: 40, spacebar: 32,
				pageup: 33, pagedown: 34, end: 35, home: 36 };


			/***********************************************
			 * INITIALIZE
			 ***********************************************/

			/**
			 * Tests if smooth scrolling is allowed. Shuts down everything if not.
			 */
			function initTest() {

				var disableKeyboard = false;

				// disable keys for google reader (spacebar conflict)
				if (document.URL.indexOf("google.com/reader/view") > -1) {
					disableKeyboard = true;
				}

				// disable everything if the page is blacklisted
				if (options.excluded) {
					var domains = options.excluded.split(/[,\n] ?/);
					domains.push("mail.google.com"); // exclude Gmail for now
					for (var i = domains.length; i--;) {
						if (document.URL.indexOf(domains[i]) > -1) {
							observer && observer.disconnect();
							removeEvent("mousewheel", wheel);
							disableKeyboard = true;
							isExcluded = true;
							break;
						}
					}
				}

				// disable keyboard support if anything above requested it
				if (disableKeyboard) {
					removeEvent("keydown", keydown);
				}

				if (options.keyboardSupport && !disableKeyboard) {
					addEvent("keydown", keydown);
				}
			}

			/**
			 * Sets up scrolls array, determines if frames are involved.
			 */
			function init() {

				if (!document.body) return;

				var body = document.body;
				var html = document.documentElement;
				var windowHeight = window.innerHeight;
				var scrollHeight = body.scrollHeight;

				// check compat mode for root element
				root = (document.compatMode.indexOf('CSS') >= 0) ? html : body;
				activeElement = body;

				initTest();
				initDone = true;

				// Checks if this script is running in a frame
				if (top != self) {
					isFrame = true;
				}

				/**
				 * This fixes a bug where the areas left and right to
				 * the content does not trigger the onmousewheel event
				 * on some pages. e.g.: html, body { height: 100% }
				 */
				else if (scrollHeight > windowHeight &&
					(body.offsetHeight <= windowHeight ||
					html.offsetHeight <= windowHeight)) {

					// DOMChange (throttle): fix height
					var pending = false;
					var refresh = function () {
						if (!pending && html.scrollHeight != document.height) {
							pending = true; // add a new pending action
							setTimeout(function () {
								html.style.height = document.height + 'px';
								pending = false;
							}, 500); // act rarely to stay fast
						}
					};
					html.style.height = 'auto';
					setTimeout(refresh, 10);

					var config = {
						attributes: true,
						childList: true,
						characterData: false
					};

					observer = new MutationObserver(refresh);
					observer.observe(body, config);

					// clearfix
					if (root.offsetHeight <= windowHeight) {
						var underlay = document.createElement("div");
						underlay.style.clear = "both";
						body.appendChild(underlay);
					}
				}

				// gmail performance fix
				if (document.URL.indexOf("mail.google.com") > -1) {
					var s = document.createElement("style");
					s.innerHTML = ".iu { visibility: hidden }";
					(document.getElementsByTagName("head")[0] || html).appendChild(s);
				}
				// facebook better home timeline performance
				// all the HTML resized images make rendering CPU intensive
				else if (document.URL.indexOf("www.facebook.com") > -1) {
					var home_stream = document.getElementById("home_stream");
					home_stream && (home_stream.style.webkitTransform = "translateZ(0)");
				}
				// disable fixed background
				if (!options.fixedBackground && !isExcluded) {
					body.style.backgroundAttachment = "scroll";
					html.style.backgroundAttachment = "scroll";
				}
			}


			/************************************************
			 * SCROLLING
			 ************************************************/

			var que = [];
			var pending = false;
			var lastScroll = +new Date;

			/**
			 * Pushes scroll actions to the scrolling queue.
			 */
			function scrollArray(elem, left, top, delay) {

				delay || (delay = 1000);
				directionCheck(left, top);

				if (options.accelerationMax != 1) {
					var now = +new Date;
					var elapsed = now - lastScroll;
					if (elapsed < options.accelerationDelta) {
						var factor = (1 + (30 / elapsed)) / 2;
						if (factor > 1) {
							factor = Math.min(factor, options.accelerationMax);
							left *= factor;
							top  *= factor;
						}
					}
					lastScroll = +new Date;
				}

				// push a scroll command
				que.push({
					x: left,
					y: top,
					lastX: (left < 0) ? 0.99 : -0.99,
					lastY: (top  < 0) ? 0.99 : -0.99,
					start: +new Date
				});

				// don't act if there's a pending queue
				if (pending) {
					return;
				}

				var scrollWindow = (elem === document.body);

				var step = function (time) {

					var now = +new Date;
					var scrollX = 0;
					var scrollY = 0;

					for (var i = 0; i < que.length; i++) {

						var item = que[i];
						var elapsed  = now - item.start;
						var finished = (elapsed >= options.animationTime);

						// scroll position: [0, 1]
						var position = (finished) ? 1 : elapsed / options.animationTime;

						// easing [optional]
						if (options.pulseAlgorithm) {
							position = pulse(position);
						}

						// only need the difference
						var x = (item.x * position - item.lastX) >> 0;
						var y = (item.y * position - item.lastY) >> 0;

						// add this to the total scrolling
						scrollX += x;
						scrollY += y;

						// update last values
						item.lastX += x;
						item.lastY += y;

						// delete and step back if it's over
						if (finished) {
							que.splice(i, 1); i--;
						}
					}

					// scroll left and top
					if (scrollWindow) {
						window.scrollBy(scrollX, scrollY);
					}
					else {
						if (scrollX) elem.scrollLeft += scrollX;
						if (scrollY) elem.scrollTop  += scrollY;
					}

					// clean up if there's nothing left to do
					if (!left && !top) {
						que = [];
					}

					if (que.length) {
						requestFrame(step, elem, (delay / options.frameRate + 1));
					} else {
						pending = false;
					}
				};

				// start a new queue of actions
				requestFrame(step, elem, 0);
				pending = true;
			}

			/***********************************************
			 * EVENTS
			 ***********************************************/

			/**
			 * Mouse wheel handler.
			 * @param {Object} event
			 */
			function wheel(event) {

				if (!initDone) {
					init();
				}

				var target = event.target;
				var overflowing = overflowingAncestor(target);

				// use default if there's no overflowing
				// element or default action is prevented
				if (!overflowing || event.defaultPrevented ||
					isNodeName(activeElement, "embed") ||
					(isNodeName(target, "embed") && /\.pdf/i.test(target.src))) {
					return true;
				}

				var deltaX = event.wheelDeltaX || 0;
				var deltaY = event.wheelDeltaY || 0;

				// use wheelDelta if deltaX/Y is not available
				if (!deltaX && !deltaY) {
					deltaY = event.wheelDelta || 0;
				}

				// check if it's a touchpad scroll that should be ignored
				if (!options.touchpadSupport && isTouchpad(deltaY)) {
					return true;
				}

				// scale by step size
				// delta is 120 most of the time
				// synaptics seems to send 1 sometimes
				if (Math.abs(deltaX) > 1.2) {
					deltaX *= options.stepSize / 120;
				}
				if (Math.abs(deltaY) > 1.2) {
					deltaY *= options.stepSize / 120;
				}

				scrollArray(overflowing, -deltaX, -deltaY);
				event.preventDefault();
			}

			/**
			 * Keydown event handler.
			 * @param {Object} event
			 */
			function keydown(event) {

				var target   = event.target;
				var modifier = event.ctrlKey || event.altKey || event.metaKey ||
					(event.shiftKey && event.keyCode !== key.spacebar);

				// do nothing if user is editing text
				// or using a modifier key (except shift)
				// or in a dropdown
				if ( /input|textarea|select|embed/i.test(target.nodeName) ||
					target.isContentEditable ||
					event.defaultPrevented   ||
					modifier ) {
					return true;
				}
				// spacebar should trigger button press
				if (isNodeName(target, "button") &&
					event.keyCode === key.spacebar) {
					return true;
				}

				var shift, x = 0, y = 0;
				var elem = overflowingAncestor(activeElement);
				var clientHeight = elem.clientHeight;

				if (elem == document.body) {
					clientHeight = window.innerHeight;
				}

				switch (event.keyCode) {
					case key.up:
						y = -options.arrowScroll;
						break;
					case key.down:
						y = options.arrowScroll;
						break;
					case key.spacebar: // (+ shift)
						shift = event.shiftKey ? 1 : -1;
						y = -shift * clientHeight * 0.9;
						break;
					case key.pageup:
						y = -clientHeight * 0.9;
						break;
					case key.pagedown:
						y = clientHeight * 0.9;
						break;
					case key.home:
						y = -elem.scrollTop;
						break;
					case key.end:
						var damt = elem.scrollHeight - elem.scrollTop - clientHeight;
						y = (damt > 0) ? damt+10 : 0;
						break;
					case key.left:
						x = -options.arrowScroll;
						break;
					case key.right:
						x = options.arrowScroll;
						break;
					default:
						return true; // a key we don't care about
				}

				scrollArray(elem, x, y);
				event.preventDefault();
			}

			/**
			 * Mousedown event only for updating activeElement
			 */
			function mousedown(event) {
				activeElement = event.target;
			}


			/***********************************************
			 * OVERFLOW
			 ***********************************************/

			var cache = {}; // cleared out every once in while
			setInterval(function () { cache = {}; }, 10 * 1000);

			var uniqueID = (function () {
				var i = 0;
				return function (el) {
					return el.uniqueID || (el.uniqueID = i++);
				};
			})();

			function setCache(elems, overflowing) {
				for (var i = elems.length; i--;)
					cache[uniqueID(elems[i])] = overflowing;
				return overflowing;
			}

			function overflowingAncestor(el) {
				var elems = [];
				var rootScrollHeight = root.scrollHeight;
				do {
					var cached = cache[uniqueID(el)];
					if (cached) {
						return setCache(elems, cached);
					}
					elems.push(el);
					if (rootScrollHeight === el.scrollHeight) {
						if (!isFrame || root.clientHeight + 10 < rootScrollHeight) {
							return setCache(elems, document.body); // scrolling root in WebKit
						}
					} else if (el.clientHeight + 10 < el.scrollHeight) {
						overflow = getComputedStyle(el, "").getPropertyValue("overflow-y");
						if (overflow === "scroll" || overflow === "auto") {
							return setCache(elems, el);
						}
					}
				} while (el = el.parentNode);
			}


			/***********************************************
			 * HELPERS
			 ***********************************************/

			function addEvent(type, fn, bubble) {
				window.addEventListener(type, fn, (bubble||false));
			}

			function removeEvent(type, fn, bubble) {
				window.removeEventListener(type, fn, (bubble||false));
			}

			function isNodeName(el, tag) {
				return (el.nodeName||"").toLowerCase() === tag.toLowerCase();
			}

			function directionCheck(x, y) {
				x = (x > 0) ? 1 : -1;
				y = (y > 0) ? 1 : -1;
				if (direction.x !== x || direction.y !== y) {
					direction.x = x;
					direction.y = y;
					que = [];
					lastScroll = 0;
				}
			}

			var deltaBufferTimer;

			function isTouchpad(deltaY) {
				if (!deltaY) return;
				deltaY = Math.abs(deltaY)
				deltaBuffer.push(deltaY);
				deltaBuffer.shift();
				clearTimeout(deltaBufferTimer);
				var allEquals    = (deltaBuffer[0] == deltaBuffer[1] &&
				deltaBuffer[1] == deltaBuffer[2]);
				var allDivisable = (isDivisible(deltaBuffer[0], 120) &&
				isDivisible(deltaBuffer[1], 120) &&
				isDivisible(deltaBuffer[2], 120));
				return !(allEquals || allDivisable);
			}

			function isDivisible(n, divisor) {
				return (Math.floor(n / divisor) == n / divisor);
			}

			var requestFrame = (function () {
				return  window.requestAnimationFrame       ||
				window.webkitRequestAnimationFrame ||
				function (callback, element, delay) {
					window.setTimeout(callback, delay || (1000/60));
				};
			})();

			var MutationObserver = window.MutationObserver || window.WebKitMutationObserver;


			/***********************************************
			 * PULSE
			 ***********************************************/

			/**
			 * Viscous fluid with a pulse for part and decay for the rest.
			 * - Applies a fixed force over an interval (a damped acceleration), and
			 * - Lets the exponential bleed away the velocity over a longer interval
			 * - Michael Herf, http://stereopsis.com/stopping/
			 */
			function pulse_(x) {
				var val, start, expx;
				// test
				x = x * options.pulseScale;
				if (x < 1) { // acceleartion
					val = x - (1 - Math.exp(-x));
				} else {     // tail
					// the previous animation ended here:
					start = Math.exp(-1);
					// simple viscous drag
					x -= 1;
					expx = 1 - Math.exp(-x);
					val = start + (expx * (1 - start));
				}
				return val * options.pulseNormalize;
			}

			function pulse(x) {
				if (x >= 1) return 1;
				if (x <= 0) return 0;

				if (options.pulseNormalize == 1) {
					options.pulseNormalize /= pulse_(1);
				}
				return pulse_(x);
			}

			addEvent("mousedown", mousedown);
			addEvent("mousewheel", wheel);
			addEvent("load", init);

		}

	});
})(jQuery);

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

/*
 * SlideFade
 * MIT licensed
 *
 */
(function ($) {

	$.fn.slideFade = function (options) {

		if (!this.length) { return this; }

		var opts = $.extend(true, {}, $.fn.slideFade.defaults, options),
			round = Math.round, atan2 = Math.atan2,
			aniProp = [{ top: 0 }, { left: 0 }, { top: 0 }, { left: 0 }];

		var getDirection = function(ev, obj) {
			var o = obj.offset(),
				w = obj.outerWidth(),
				h = obj.outerHeight(),
				x = (ev.pageX - o.left - (w / 2) * (w > h ? (h / w) : 1)),
				y = (ev.pageY - o.top - (h / 2) * (h > w ? (w / h) : 1)),
				d = round(atan2(y, x) / 1.57079633 + 5) % 4;
			return d;
		};

		this.each(function (id, value) {
			if ($.data(this, 'css')) { return; }

			var $this = $(value),
				w = $this.width(),
				h = $this.height();
			$.data(this, 'css', {
				w: w,
				h: h,
				wm: w > h + 1 ? (h / w) : 1,
				hm: h > w + 1 ? (w / h) : 1,
				reset: [{
					left: 0,
					top: '-100%',
					display: 'block'
				}, {
					left: '100%',
					top: 0,
					display: 'block'
				}, {
					left: 0,
					top: '100%',
					display: 'block'
				}, {
					left: '-100%',
					top: 0,
					display: 'block'
				}]
			});
		});
		this.on('mouseenter.slidefade mouseleave.slidefade', function (event) {
			var $this = $(this), css = $.data(this, 'css'),
				$inner = ('find' in opts) ? $this.find(opts.find) : $this.children(opts.selector);

			if (event.type === 'mouseenter') {
				$inner
					.stop(true, true)
					.css(css.reset[getDirection(event, $this)])
					.stop(true, true)
					.animate({ top: 0, left: 0 }, opts.slide.duration);
			} else {
				$inner.fadeOut(opts.fade.duration, function () {
					$(this).stop(true, true).css(css.reset[0]);
				});
			}
		});
		return this;
	};

	$.fn.slideFade.defaults = {
		selector: 'a',
		slide: {
			duration: 200,
			easing: 'swing'
		},
		fade: {
			duration: 650,
			easing: 'swing'
		}
	};

})(jQuery);

/*
 * countTo
 * MIT licensed
 *
 */
(function ($) {

	$.fn.countTo = function (options) {

		options = options || {};

		return $(this).each(function () {

			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from: $(this).data('from'),
				to: $(this).data('to'),
				speed: $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals: $(this).data('decimals')
			}, options);

			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;

			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};

			$self.data('countTo', data);

			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);

			// initialize the element with the starting value
			render(value);

			function updateTimer() {
				value += increment;
				loopCount++;

				render(value);

				if (loopCount >= loops) {

					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
				}
			}

			function render(value) {
				var formattedValue = value.toFixed(settings.decimals);
				$self.children('.count').html(formattedValue);
			}


		});
	};

	$.fn.countTo.defaults = {
		from: 0, // the number the element should start at
		to: 0, // the number the element should end at
		speed: 1000, // how long it should take to count between the target numbers
		refreshInterval: 10, // how often the element should be updated
		decimals: 0
	};

})(jQuery);

/*
 * progressBar
 * MIT licensed
 *
 */
(function ($) {

	$.fn.progressBar = function(options, callback) {

		var defaults = {
			speed: 600,
			easing: 'swing'
		}, o = $.extend({}, defaults, options);

		return this.each(function() {

			var elem = $(this), methods = {};

			methods = {
				init: function () {
					this.touch = Modernizr.touch ? true : false;
					this.refreshElements();
					this.processing();
				},
				elements: {
					'.bar': 'bar',
					'.percent': 'per'
				},
				$: function(selector) { return $(selector, elem); },
				refreshElements: function () {
					for (var key in this.elements) {
						this[this.elements[key]] = this.$(key);
					}
				},
				getProgress: function() { return this.bar.data('progress'); },
				setProgress: function(self) {
					self.bar.animate({'width': self.getProgress() + '%'}, {
						duration: o.speed,
						easing: o.easing,
						step: function(progress) {
							self.per.text(Math.ceil(progress) + '%');
						},
						complete: function(scope, i, elem) {
							if (callback) {
								callback.call(this, i, elem);
							}
						}
					});
				},
				processing: function() {
					var self = this;
					if (self.touch) {
						self.setProgress(self);
					} else {
						elem.waypoint(function(direction) {
							if (direction == 'down') {
								self.setProgress(self);
							}
						}, { offset: '64%'});
					}
				}
			};
			methods.init();
		});
	};

})(jQuery);

/*
 * parallax
 * MIT licensed
 *
 */
(function ($) {

	$.fn.parallax = function(xpos, speed) {
		var firstTop, pos;
		return this.each(function (idx, value) {

			var $this = $(value);
			if (arguments.length < 1 || xpos === null)  { xpos = "50%"; }
			if (arguments.length < 2 || speed === null) { speed = 0.4; }

			return ({
				update: function() {
					firstTop = $this.offset().top;
					pos = $(window).scrollTop();
					$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speed) + "px");
				},
				init: function() {
					var self = this;
					self.update();
					$(window).on('scroll', self.update);
				}
			}.init());
		});

	};

})(jQuery);

/*
 * Notifications
 * MIT licensed
 *
 */
(function ($) {

	$.fn.notifications = function (options) {

		var defaults = { speed: 200 },
			o = $.extend({}, defaults, options);

		return this.each(function () {

			var closeBtn = $('<a class="alert-close" href="#"></a>'),
				closeButton = $(this).append(closeBtn).find('> .alert-close');

			function fadeItSlideIt(object) {
				object.fadeTo(o.speed, 0, function () {
					object.slideUp(o.speed);
				});
			}
			closeButton.click(function () {
				fadeItSlideIt($(this).parent());
				return false;
			});
		});
	};

})(jQuery);

/*
 * SearchBox
 * MIT licensed
 *
 */
(function ($) {

	$.searchBox = function (el, options) {
		this.el = $(el);
		this.init(options);
	}

	$.searchBox.DEFAULTS = {
		timerDelay: 50,
		event: 'click',
		selector: '.search-icon',
		parent: '.search-box'
	}

	$.searchBox.prototype = {
		init: function (options) {
			var self = this;
			this.o = $.extend({}, $.searchBox.DEFAULTS, options);
			this.body   = $('body');
			this.tooltip = $('.inner-tooltip', this.el);
			this.active = false;
			this.timer = false;
			this.bind();
		},
		bind: function () {
			this.body.on(this.o.event + ' mouseleave', this.o.selector, $.proxy(this.start_countdown, this));
		},
		start_countdown: function (e) {
			var $target = $(e.target),
				type = e.type;

			clearTimeout(this.timer);

			if (type == this.o.event) {
				if ($target.is('.search-icon')) {
					e.preventDefault();
					if (this.tooltip.is(':hidden')) {
						this.timer = setTimeout($.proxy( this.display_tooltip, this, e), this.o.timerDelay);
					} else {
						this.timer = setTimeout($.proxy( this.hide_tooltip, this, e), this.o.timerDelay);
					}
				}
				e.preventDefault();
			} else if (type == 'mouseleave') {
				this.timer = this.body.on('mousedown', $.proxy( this.hide_tooltip, this) );
			}
		},
		display_tooltip: function (e) {
			if (this.tooltip.is(':animated:visible')) return this;

			if (!this.active && this.tooltip.is(':hidden')) {
				this.tooltip.css({ opacity: 0, display: 'block' }).stop().addClass('active').animate({
					opacity: 1
				}, 300);
				this.active = true;
			}
			this.tooltip.find('input').focus();
			if (this.tooltip.find('.ajax_response .entry').length){
				this.tooltip.find('.ajax_response').slideDown(300);
			}
		},
		hide_tooltip: function (e) {
			var el = $(e.target).not(this.o.selector);
			if (this.active && this.tooltip.is(':visible') && el.parents(this.o.parent).length == 0) {
				this.tooltip.stop(true, false).fadeOut(500, function () {
					$(this).removeClass('active');
				});
				this.active = false;
			}
		}
	}

	$.fn.extend({
		searchBox: function (option) {

			if (!this.length) return this;

			return this.each(function () {
				var $this = $(this), data = $this.data('searchBox'),
					options = typeof option == 'object' && option;
				if (!data) {
					$this.data('searchBox', new $.searchBox(this, options));
				}
			});
		}
	});

})(jQuery);

/*global jQuery */
/*!
 * Lettering.JS 0.6.1
 *
 * Copyright 2010, Dave Rupert http://daverupert.com
 * Released under the WTFPL license
 * http://sam.zoy.org/wtfpl/
 *
 * Thanks to Paul Irish - http://paulirish.com - for the feedback.
 *
 * Date: Mon Sep 20 17:14:00 2010 -0600
 */
(function($){

	function injector(t, splitter, klass, after) {
		var a = t.text().split(splitter),
			inject = '', regExp = /<br>/;

		if (a.length) {
			$(a).each(function(i, item) {
				if (regExp.test(item)) {
					inject += item;
				} else {
					if (item !== "") {
						inject += '<span class="' + klass + ( i+1 ) + '">' + item + '</span>' + after;
					}
				}
			});
			t.empty().append(inject);
		}
	}
	var methods = {
		init : function() {
			return this.each(function() {
				injector($(this), '', 'char', '');
			});
		},
		words : function() {
			return this.each(function() {
				injector($(this), ' ', 'word', ' ');
			});
		}
	};

	$.fn.lettering = function( method ) {
		// Method calling logic

		if ( method && methods[method] ) {
			return methods[ method ].apply( this, [].slice.call( arguments, 1 ));
		} else if ( method === 'letters' || ! method ) {
			return methods.init.apply( this, [].slice.call( arguments, 0 ) ); // always pass an array
		}
		$.error( 'Method ' +  method + ' does not exist on jQuery.lettering' );
		return this;
	};

})(jQuery);

/*
 * Textislide.js.custom
 * MIT licensed
 */
(function($, window) {

	function Textislide (element, options) {
		var base = this;

		base.el = $(element);
		base.slides = base.el.children();
		base.items = base.slides.find('.item');
		base.itemsAmount = base.items.length;
		base.maximumItem = base.itemsAmount - 1;

		base.options = $.extend({}, $.fn.textislide.defaults, options);
		base.loadContent(options);
	}

	Textislide.prototype = {
		loadContent: function (options) {
			var base = this;
			base.checkBrowser();
			base.setVars(options);
		},

		setVars: function (options) {
			var base = this;

			base.wrapItems();
			base.slideItems = base.el.find('.slide-item');
			base.wrapper = base.el.find('.slide-wrapper');
			base.prevItem = 0;
			base.prevArr = [0];
			base.currentItem = 0;

			if (base.browser.supportCSS3 === true) {
				base.setData(options);
			}
			base.onStart();
		},

		setData: function (options) {
			var base = this;

			base.slideItems.each(function () {
				var $item = $(this),
					$elements = $item.find(':header');

				$elements.each(function (id, value) {
					var $element = $(value), $text, $current,
						elementData = $.extend(true, {}, options.headlinesSettings[id], base.getData($element[0]));

					$text = $('<div class="text">' + $element.html() + '</div>').hide();
					$element.html($text);
					$current = $('<span>').text($text.html()).prependTo($element);

					$element.data({
						data: elementData,
						text: {
							'text': $text,
							'current': $current
						}
					});
				});
			});
		},

		onStart: function () {
			var base = this;

			base.calculateAll();
			base.buildControls();
			base.updateControls();
			base.stopOnHover();
			base.response();

			base.el.css('opacity', 0);
			base.play();
			base.el.css('opacity', 1);

			if (base.options.autoPlay === true) {
				base.options.autoPlay = 5000;
			}
			if (base.options.autoStart === true && base.browser.supportCSS3 === true) {
				base.from(base.slideItems.eq(base.currentItem));
			}
			if (base.options.autoHeight === true) {
				base.autoHeight();
			}

		},

		wrapItems : function () {
			var base = this;
			base.items
				.wrapAll('<div class="slide-wrapper">')
				.wrap('<div class="slide-item"></div>');
			base.el.find('.slide-wrapper').wrap('<div class="wrapper-outer">');
			base.outer = base.el.find(".wrapper-outer");
			base.el.css("display", "block");
		},

		updateVars: function () {
			var base = this;
			base.calculateAll();
			if (base.options.autoHeight === true) {
				base.autoHeight();
			}
		},

		response: function () {
			var base = this,
				smallDelay,
				lastWindowWidth;

			lastWindowWidth = $(window).width();

			base.resizer = function () {
				if ($(window).width() !== lastWindowWidth) {
					if (base.options.autoPlay !== false) {
						window.clearInterval(base.autoPlayInterval);
					}
					window.clearTimeout(smallDelay);
					smallDelay = window.setTimeout(function () {
						lastWindowWidth = $(window).width();
						base.updateVars();
					}, 200);
				}
			};
			$(window).resize(base.resizer);
		},

		appendItemsSizes: function () {
			var base = this,
				roundPages = 0,
				lastItem = base.itemsAmount - 1;

			base.slideItems.each(function (index) {
				var $this = $(this);
				$this.css({ "width": base.itemWidth });
				if (index % 1 === 0 || index === lastItem) {
					if (!(index > lastItem)) {
						roundPages += 1;
					}
				}
				$this.data("roundPages", roundPages);
			});
		},

		appendWrapperSizes: function () {
			var base = this,
				width = base.items.length * base.itemWidth;
			base.wrapper.css({
				"width": width * 2
			});
			base.appendItemsSizes();
		},

		calculateAll: function () {
			var base = this;
			base.calculateWidth();
			base.appendWrapperSizes();
			base.loops();
		},

		calculateWidth: function () {
			var base = this;
			base.itemWidth = Math.round(base.el.width());
		},

		buildControls: function () {
			var base = this;

			if (base.options.pagination === true) {
				base.Controls = $('<div class="controls" />').appendTo(base.slides);
			}
			if (base.options.pagination === true) {
				base.buildPagination();
			}
		},

		buildPagination: function () {
			var base = this;

			base.paginationWrapper = $('<div class="control-nav"></div>');
			base.Controls.append(base.paginationWrapper);

			base.paginationWrapper.on("touchend.Controls mouseup.Controls", ".page", function (e) {
				e.preventDefault();
				if (Number($(this).data("page")) !== base.currentItem) {
					base.goTo(Number($(this).data('page')), true);
				}
			});
		},

		updateControls: function () {
			var base = this;
			base.updatePagination();
		},

		updatePagination: function () {
			var base = this,
				counter = 0,
				lastPage,
				lastItem,
				i,
				paginationButton,
				paginationButtonInner;

			if (base.options.pagination === false) { return false; }

			base.paginationWrapper.html("");

			lastPage = base.itemsAmount - base.itemsAmount % 1;

			for (i = 0; i < base.itemsAmount; i += 1) {
				counter += 1;

				if (lastPage === i) {
					lastItem = base.itemsAmount - 1;
				}
				paginationButton = $("<div/>", { "class" : "page" });
				paginationButtonInner = $("<span/>", { "text": counter });
				paginationButton.append(paginationButtonInner);

				paginationButton.data('page', lastPage === i ? lastItem : i);
				paginationButton.data('roundPages', counter);

				base.paginationWrapper.append(paginationButton);
			}
			base.checkPagination();
		},

		checkPagination: function () {
			var base = this;
			if (base.options.pagination === false) {
				return false;
			}
			base.paginationWrapper.find('.page').each(function () {
				var $this = $(this);
				if ($this.data('roundPages') === $(base.slideItems[base.currentItem]).data('roundPages')) {
					$this.siblings().removeClass('active').end().addClass('active');
				}
			});
		},

		goTo: function (position) {
			var base = this;
			if (base.isTransition) { return false;  }
			base.currentItem = position;
			if (base.browser.supportCSS3 === true) {
				base.transition3d(base.positionsInArray[position]);
				base.afterGo();
				base.singleItemTransition();
			} else {
				base.css2slide(base.positionsInArray[position], 1000);
				base.afterGo();
			}
			return false;
		},

		afterGo: function () {
			var base = this;
			base.prevArr.push(base.currentItem);
			base.prevItem = base.prevArr[base.prevArr.length - 2];

			var $prevItem = base.slideItems.eq(base.prevItem);
			base.slideItems.eq(base.prevItem);

			if (base.browser.supportCSS3 === true) {
				base.to($prevItem);
			}
			if (base.prevItem !== base.currentItem) {
				base.checkPagination();
				if (base.options.autoHeight === true) {
					base.autoHeight();
				}
				if (base.options.autoPlay !== false) {
					base.checkAp();
				}
			}
		},

		checkAp: function () {
			var base = this;
			if (base.apStatus !== "stop") {
				base.play();
			}
		},

		play: function () {
			var base = this;
			base.apStatus = "play";
			if (base.options.autoPlay === false) {
				return false;
			}
			window.clearInterval(base.autoPlayInterval);
			base.autoPlayInterval = window.setInterval(function () {
				base.next();
			}, base.options.autoPlay);
		},

		stop: function () {
			var base = this;
			base.apStatus = "stop";
			window.clearInterval(base.autoPlayInterval);
		},

		stopOnHover: function () {
			var base = this;
			if (base.options.autoPlay !== false) {
				base.el.on("mouseover", function () {
					base.stop();
				}).on("mouseout", function () {
					base.play();
				});
			}
		},

		autoHeight: function () {
			var base = this;

			function addHeight() {
				var $currentItem = $(base.slideItems[base.currentItem]).height();
				base.outer.css('height', $currentItem + 'px');
				if (!base.outer.hasClass('autoHeight')) {
					window.setTimeout(function () {
						base.outer.addClass('autoHeight');
					}, 0);
				}
			}
			addHeight();
		},

		next: function () {
			var base = this;

			if (base.isTransition) { return false; }

			base.currentItem += 1;
			if (base.currentItem > base.maximumItem) {
				base.currentItem = 0;
			}
			base.goTo(base.currentItem);
		},

		singleItemTransition: function () {
			var base = this,
				outClass = 'text-fade-out',
				inClass = 'text-fade-in',
				$currentItem = base.slideItems.eq(base.currentItem),
				$prevItem = base.slideItems.eq(base.prevItem),
				prevPos = Math.abs(base.positionsInArray[base.currentItem]) + base.positionsInArray[base.prevItem],
				animEnd = base.animEndName();

			base.isTransition = true;

			base.from($currentItem);

			function transStyles(prevPos) {
				return {
					"position" : "relative",
					"left" : prevPos + "px"
				};
			}

			$prevItem.css(transStyles(prevPos)).addClass(outClass)
				.on(animEnd, function () {
					base.endPrev = true;
					$prevItem.off(animEnd);
					base.clearTransStyle($prevItem, outClass);
				});

			$currentItem.addClass(inClass)
				.on(animEnd, function () {
					base.endCurrent = true;
					$currentItem.off(animEnd);
					base.clearTransStyle($currentItem, inClass);
				});
		},

		animEndName: function () {
			var animEndEventNames = {
				'WebkitAnimation' : 'webkitAnimationEnd',
				'OAnimation' : 'oAnimationEnd',
				'msAnimation' : 'MSAnimationEnd',
				'animation' : 'animationend'
			};
			return animEndEventNames[Modernizr.prefixed('animation')];
		},

		clearTransStyle: function (item, classToRemove) {
			var base = this;
			item.css({
				"position" : "",
				"left" : ""
			}).removeClass(classToRemove);

			if (base.endPrev && base.endCurrent) {
				base.endPrev = false;
				base.endCurrent = false;
				base.isTransition = false;
			}
		},

		loops: function () {
			var base = this,
				prev = 0,
				elWidth = 0,
				i,
				item,
				roundPageNum;

			base.positionsInArray = [0];
			base.pagesInArray = [];

			for (i = 0; i < base.itemsAmount; i += 1) {
				elWidth += base.itemWidth;
				base.positionsInArray.push(-elWidth);

				item = $(base.slideItems[i]);
				roundPageNum = item.data("roundPages");
				if (roundPageNum !== prev) {
					base.pagesInArray[prev] = base.positionsInArray[i];
					prev = roundPageNum;
				}
			}
		},

		doTranslate: function (pixels) {
			return {
				"-webkit-transform": "translateX(" + pixels + "px)",
				"-moz-transform": "translateX(" + pixels + "px)",
				"-o-transform": "translateX(" + pixels + "px)",
				"-ms-transform": "translateX(" + pixels + "px)",
				"transform": "translateX(" + pixels + "px)"
			};
		},

		transition3d: function (value) {
			var base = this;
			base.wrapper.css(base.doTranslate(value));
		},

		css2slide: function (value, speed) {
			var base = this;
			base.wrapper.stop(true, true).animate({
				"left" : value
			}, {
				duration : speed
			});
		},

		checkBrowser: function () {
			var base = this;
			base.browser = {
				"supportCSS3" : Modernizr.cssanimations && Modernizr.csstransitions,
				"touch" : Modernizr.touch
			};
		},

		from: function (element, cb) {
			var base = this;

			element.each(function () {
				var $item = $(this),
					$elements = $item.find(':header');

				$elements.each(function (idx, value) {
					var $element = $(value),
						elementData = $element.data('data'),
						textData = $element.data('text') || {},
						$current = textData.current,
						$elem = textData.text, $chars;

					$current.text($elem.html()).lettering('words');
					$chars = $current.find('[class^="word"]');

					if (base.isInEffect(elementData.from.effect)) {
						$chars.css('visibility', 'hidden');
					} else if (base.isOutEffect(elementData.from.effect)) {
						$chars.css('visibility', 'visible');
					}

					base.animateChars($chars, elementData.from, function () {
						if (cb) {
							cb(base);
						}
					});
				});
			});

		},

		to: function (element, cb) {
			var base = this;

			element.each(function () {
				var $item = $(this),
					$elements = $item.find(':header');

				$elements.each(function (idx, value) {
					var $element = $(value),
						elementData = $element.data('data'),
						textData = $element.data('text') || {},
						$current = textData.current,
						$elem = textData.text, $chars;

					$current.text($elem.html()).lettering('words');
					$chars = $current.find('[class^="word"]');

					base.animateChars($chars, elementData.to, function () {
						if (cb) {
							cb(base);
						}
					});
				});
			});
		},

		animateChars: function ($chars, options, cb) {
			var base = this,
				count = $chars.length;

			if (!count) {
				cb && cb();
				return;
			}

			$.each($chars, function (i, c) {
				var $char = $(c);

				function complete() {
					if (base.isInEffect(options.effect)) {
						$char.css('visibility', 'visible');
					} else if (base.isOutEffect(options.effect)) {
						$char.css('visibility', 'hidden');
					}
					count -= 1;
					if (!count && cb) {
						cb();
					}
				}
				var delay = options.sync ? options.delay : options.delay * i;
				$char.text() ? setTimeout(function() { base.animate($char, options.effect, complete) }, delay) : complete();
			});
		},

		isInEffect: function  (effect) {
			return /In/.test(effect);
		},
		isOutEffect: function (effect) {
			return /Out/.test(effect);
		},

		getData: function (node) {
			var attrs = node.attributes || [], data = {};

			if (!attrs.length) { return data; }
			$.each(attrs, function (i, attr) {
				if (/^data-from-*/.test(attr.nodeName)) {
					data.from = {};
					data.from[attr.nodeName.replace(/data-from-/, '')] = attr.nodeValue;
				} else if (/^data-to-*/.test(attr.nodeName)) {
					data.to = {};
					data.to[attr.nodeName.replace(/data-to-/, '')] = attr.nodeValue;
				} else if (/^data-*/.test(attr.nodeName)) {
					data[attr.nodeName] = attr.nodeValue;
				}
			});
			return data;
		},

		animate: function ($c, effect, cb) {
			$c.addClass('animate ' + effect).css('visibility', 'visible').show();
			$c.one('animationend webkitAnimationEnd oAnimationEnd', function () {
				$c.removeClass('animate ' + effect);
				cb && cb();
			});
		}
	}

	$.fn.textislide = function (option) {
		return this.each(function () {
			var $this = $(this),
				data = $this.data('textislide'),
				options = typeof option == 'object' && option;
			if (!data) {
				$this.data('textislide', new Textislide(this, options));
			}
		});
	};

	$.fn.textislide.defaults = {
		pagination: true,
		autoStart: false,
		autoPlay: false,
		autoHeight: false
	};

}(jQuery, window));
