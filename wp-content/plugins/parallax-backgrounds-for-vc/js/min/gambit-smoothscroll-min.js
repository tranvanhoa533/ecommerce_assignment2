"undefined"==typeof window.gambitScrollAmount&&(window.gambitScrollAmount=150),"undefined"==typeof window.gambitScrollSpeed&&(window.gambitScrollSpeed=900),!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports?module.exports=e:e(jQuery)}(function(e){function t(t){var l=t||window.event,s=a.call(arguments,1),u=0,c=0,f=0,h=0,m=0,p=0;if(t=e.event.fix(l),t.type="mousewheel","detail"in l&&(f=-1*l.detail),"wheelDelta"in l&&(f=l.wheelDelta),"wheelDeltaY"in l&&(f=l.wheelDeltaY),"wheelDeltaX"in l&&(c=-1*l.wheelDeltaX),"axis"in l&&l.axis===l.HORIZONTAL_AXIS&&(c=-1*f,f=0),u=0===f?c:f,"deltaY"in l&&(f=-1*l.deltaY,u=f),"deltaX"in l&&(c=l.deltaX,0===f&&(u=-1*c)),0!==f||0!==c){if(1===l.deltaMode){var g=e.data(this,"mousewheel-line-height");u*=g,f*=g,c*=g}else if(2===l.deltaMode){var w=e.data(this,"mousewheel-page-height");u*=w,f*=w,c*=w}if(h=Math.max(Math.abs(f),Math.abs(c)),(!r||r>h)&&(r=h,o(l,h)&&(r/=40)),o(l,h)&&(u/=40,c/=40,f/=40),u=Math[u>=1?"floor":"ceil"](u/r),c=Math[c>=1?"floor":"ceil"](c/r),f=Math[f>=1?"floor":"ceil"](f/r),d.settings.normalizeOffset&&this.getBoundingClientRect){var v=this.getBoundingClientRect();m=t.clientX-v.left,p=t.clientY-v.top}return t.deltaX=c,t.deltaY=f,t.deltaFactor=r,t.offsetX=m,t.offsetY=p,t.deltaMode=0,s.unshift(t,u,c,f),i&&clearTimeout(i),i=setTimeout(n,200),(e.event.dispatch||e.event.handle).apply(this,s)}}function n(){r=null}function o(e,t){return d.settings.adjustOldDeltas&&"mousewheel"===e.type&&t%120===0}var i,r,l=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],s="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],a=Array.prototype.slice;if(e.event.fixHooks)for(var u=l.length;u;)e.event.fixHooks[l[--u]]=e.event.mouseHooks;var d=e.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var n=s.length;n;)this.addEventListener(s[--n],t,!1);else this.onmousewheel=t;e.data(this,"mousewheel-line-height",d.getLineHeight(this)),e.data(this,"mousewheel-page-height",d.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var n=s.length;n;)this.removeEventListener(s[--n],t,!1);else this.onmousewheel=null;e.removeData(this,"mousewheel-line-height"),e.removeData(this,"mousewheel-page-height")},getLineHeight:function(t){var n=e(t),o=n["offsetParent"in e.fn?"offsetParent":"parent"]();return o.length||(o=e("body")),parseInt(o.css("fontSize"),10)||parseInt(n.css("fontSize"),10)||16},getPageHeight:function(t){return e(t).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};e.fn.extend({mousewheel:function(e){return e?this.bind("mousewheel",e):this.trigger("mousewheel")},unmousewheel:function(e){return this.unbind("mousewheel",e)}})}),"undefined"==typeof Modernizr&&(window.Modernizr=function(e,t,n){function o(e){h.cssText=e}function i(e,t){return o(g.join(e+";")+(t||""))}function r(e,t){return typeof e===t}function l(e,t){return!!~(""+e).indexOf(t)}function s(e,t,o){for(var i in e){var l=t[e[i]];if(l!==n)return o===!1?e[i]:r(l,"function")?l.bind(o||t):l}return!1}var a="2.8.3",u={},d=t.documentElement,c="modernizr",f=t.createElement(c),h=f.style,m,p={}.toString,g=" -webkit- -moz- -o- -ms- ".split(" "),w={},v={},y={},b=[],M=b.slice,S,O=function(e,n,o,i){var r,l,s,a,u=t.createElement("div"),f=t.body,h=f||t.createElement("body");if(parseInt(o,10))for(;o--;)s=t.createElement("div"),s.id=i?i[o]:c+(o+1),u.appendChild(s);return r=["&#173;",'<style id="s',c,'">',e,"</style>"].join(""),u.id=c,(f?u:h).innerHTML+=r,h.appendChild(u),f||(h.style.background="",h.style.overflow="hidden",a=d.style.overflow,d.style.overflow="hidden",d.appendChild(h)),l=n(u,e),f?u.parentNode.removeChild(u):(h.parentNode.removeChild(h),d.style.overflow=a),!!l},E={}.hasOwnProperty,H;H=r(E,"undefined")||r(E.call,"undefined")?function(e,t){return t in e&&r(e.constructor.prototype[t],"undefined")}:function(e,t){return E.call(e,t)},Function.prototype.bind||(Function.prototype.bind=function(e){var t=this;if("function"!=typeof t)throw new TypeError;var n=M.call(arguments,1),o=function(){if(this instanceof o){var i=function(){};i.prototype=t.prototype;var r=new i,l=t.apply(r,n.concat(M.call(arguments)));return Object(l)===l?l:r}return t.apply(e,n.concat(M.call(arguments)))};return o}),w.touch=function(){var n;return"ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch?n=!0:O(["@media (",g.join("touch-enabled),("),c,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(e){n=9===e.offsetTop}),n};for(var D in w)H(w,D)&&(S=D.toLowerCase(),u[S]=w[D](),b.push((u[S]?"":"no-")+S));return u.addTest=function(e,t){if("object"==typeof e)for(var o in e)H(e,o)&&u.addTest(o,e[o]);else{if(e=e.toLowerCase(),u[e]!==n)return u;t="function"==typeof t?t():t,"undefined"!=typeof enableClasses&&enableClasses&&(d.className+=" "+(t?"":"no-")+e),u[e]=t}return u},o(""),f=m=null,u._version=a,u._prefixes=g,u.testStyles=O,u}(this,this.document)),function($){"use strict";$.gambitSmoothscroll=function(e){var t=$.extend({step:55,speed:400,ease:"swing",target:$("body"),container:$(window)},e||{}),n=t.container,o=0,i=t.step,r=Math.max(document.body.scrollHeight,document.documentElement.scrollHeight,document.documentElement.offsetHeight,document.documentElement.offsetHeight,document.body.clientHeight,document.documentElement.clientHeight),l=!1,s;s="body"==t.target.selector?-1!==navigator.userAgent.indexOf("AppleWebKit")?t.target:$("html"):n,t.startDelta=0,t.target.on("mousewheel",function(e){return l=!0,0!==t.startDelta&&e.timeStamp-t.startDelta<70?(e.preventDefault(),!1):(t.startDelta=e.timeStamp,o=e.deltaY<0?o+i>r?r:o+i:0>=o?0:o-i,s.stop().animate({scrollTop:o},t.speed,t.ease,function(){l=!1}),!1)}),n.on("resize",function(e){r=Math.max(document.body.scrollHeight,document.documentElement.scrollHeight,document.documentElement.offsetHeight,document.documentElement.offsetHeight,document.body.clientHeight,document.documentElement.clientHeight)}).on("scroll",function(e){l||(o=n.scrollTop())})}}(jQuery),jQuery(document).ready(function($){Modernizr.touch&&window.screen.width<=1024||window.screen.width<=1281&&window.devicePixelRatio>1||("undefined"==typeof _GAMBIT_SMOOTH_SCROLLER_DONE||_GAMBIT_SMOOTH_SCROLLER_DONE!==!0)&&($.extend(jQuery.easing,{easeOutCubic:function(e,t,n,o,i){return o*((t=t/i-1)*t*t+1)+n}}),$.gambitSmoothscroll({step:window.gambitScrollAmount,speed:window.gambitScrollSpeed,ease:"easeOutCubic"}),_GAMBIT_SMOOTH_SCROLLER_DONE=!0)});var _GAMBIT_SMOOTH_SCROLLER_DONE=!1;