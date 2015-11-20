/**
 * Smoothens scrolling for the whole webpage.
 *
 * Instructions: Just include this script in your head tag and it's good to go
 * <script type='text/javascript' src='gambit-smoothscroll.js'></script>
 *
 * @package	Gambit Smooth Scroll script
 * @author	Benjamin Intal, Gambit
 * @url		http://gambit.ph
 * @version	2.0.1
 */


// Changeable settings
if ( typeof window.gambitScrollAmount === 'undefined' ) {
	window.gambitScrollAmount = 150;
}
if ( typeof window.gambitScrollSpeed === 'undefined' ) {
	window.gambitScrollSpeed = 900;
}

//---------------------------------- DO NOT EDIT STUFF BELOW ----------------------------------//



/*! Copyright (c) 2013 Brandon Aaron (http://brandon.aaron.sh)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * https://github.com/jquery/jquery-mousewheel
 * Version: 3.1.12
 *
 * Requires: jQuery 1.2.2+
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a:a(jQuery)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b),d=c["offsetParent"in a.fn?"offsetParent":"parent"]();return d.length||(d=a("body")),parseInt(d.css("fontSize"),10)||parseInt(c.css("fontSize"),10)||16},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})});




/*
 * Modernizr touch detection only
 */
if ( typeof( Modernizr ) === 'undefined' ) {
	;window.Modernizr=function(a,b,c){function v(a){i.cssText=a}function w(a,b){return v(l.join(a+";")+(b||""))}function x(a,b){return typeof a===b}function y(a,b){return!!~(""+a).indexOf(b)}function z(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:x(f,"function")?f.bind(d||b):f}return!1}var d="2.8.3",e={},f=b.documentElement,g="modernizr",h=b.createElement(g),i=h.style,j,k={}.toString,l=" -webkit- -moz- -o- -ms- ".split(" "),m={},n={},o={},p=[],q=p.slice,r,s=function(a,c,d,e){var h,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:g+(d+1),l.appendChild(j);return h=["&#173;",'<style id="s',g,'">',a,"</style>"].join(""),l.id=g,(m?l:n).innerHTML+=h,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=f.style.overflow,f.style.overflow="hidden",f.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),f.style.overflow=k),!!i},t={}.hasOwnProperty,u;!x(t,"undefined")&&!x(t.call,"undefined")?u=function(a,b){return t.call(a,b)}:u=function(a,b){return b in a&&x(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=q.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(q.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(q.call(arguments)))};return e}),m.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:s(["@media (",l.join("touch-enabled),("),g,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c};for(var A in m)u(m,A)&&(r=A.toLowerCase(),e[r]=m[A](),p.push((e[r]?"":"no-")+r));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)u(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof enableClasses!="undefined"&&enableClasses&&(f.className+=" "+(b?"":"no-")+a),e[a]=b}return e},v(""),h=j=null,e._version=d,e._prefixes=l,e.testStyles=s,e}(this,this.document);
}



/**
 * Originally from jquery.simplr.smoothscroll
 * Modified by Benjamin Intal - Gambit
 *
 * version 1.0
 * copyright (c) 2012 https://github.com/simov/simplr-smoothscroll
 * licensed under MIT
 * requires jquery.mousewheel - https://github.com/brandonaaron/jquery-mousewheel/
 */

;(function ($) {
  'use strict'
  
  $.gambitSmoothscroll = function (options) {
  
    var self = $.extend({
      step: 55,
      speed: 400,
      ease: 'swing',
      target: $('body'),
      container: $(window)
    }, options || {})

    // private fields & init
    var container = self.container
      , top = 0
      , step = self.step
      , viewport = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight)
      , wheel = false

    var target
    if (self.target.selector == 'body') {
      target = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? self.target : $('html')
    } else {
      target = container
    }

    self.startDelta = 0;
    self.target.on('mousewheel', function(event) {

      wheel = true;
      
	  // Don't allow very fast scrolling (e.g. from trackpads)
      if ( self.startDelta !== 0 ) {
        if ( event.timeStamp - self.startDelta < 70 ) {
          event.preventDefault();
          return false;
        }
      }
      self.startDelta = event.timeStamp;
      

      if (event.deltaY < 0) // down
        // top = (top+viewport) >= self.target.outerHeight(true) ? top : top+=step
        top = top + step > viewport ? viewport : top + step

      else // up
        top = top <= 0 ? 0 : top - step

      target.stop().animate({scrollTop: top}, self.speed, self.ease, function () {
        wheel = false
      })

      return false
    });
    
    
    container
      .on('resize', function (e) {
        viewport = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight)
      })
      .on('scroll', function (e) {
        if (!wheel)
          top = container.scrollTop()
      })
  
  }
})(jQuery);


jQuery(document).ready(function($) {
	
	// Don't smoothen in mobile touch devices
	if ( ( Modernizr.touch && window.screen.width <= 1024 ) || // touch device estimate
	 	 ( window.screen.width <= 1281 && window.devicePixelRatio > 1 ) ) { // device size estimate
		return;
	}

	// _GAMBIT_SMOOTH_SCROLLER will be defined if smooth scrolling here was already performed,
	// This is mainly here just incase our other items use this smooth scroller also
	if ( typeof _GAMBIT_SMOOTH_SCROLLER_DONE !== 'undefined' && _GAMBIT_SMOOTH_SCROLLER_DONE === true ) {
		return;
	}
	
	// Add the easing the we like for the smooth scroll
	$.extend(jQuery.easing, {
		easeOutCubic: function (x, t, b, c, d) {
	        return c*((t=t/d-1)*t*t + 1) + b;
	    }
	});
	
	// Initialize smooth scroll
	$.gambitSmoothscroll({
	    step: window.gambitScrollAmount,
	    speed: window.gambitScrollSpeed,
	    ease: 'easeOutCubic'
	});
  
	_GAMBIT_SMOOTH_SCROLLER_DONE = true;
});


// Define _GAMBIT_SMOOTH_SCROLLER to indicate that smooth scrolling was already performed,
// This is mainly here just incase our other items use this smooth scroller also
// and that smooth scrolling can only be bound/applied once.
var _GAMBIT_SMOOTH_SCROLLER_DONE = false;