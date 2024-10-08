/*! For license information please see main.19c107e7d2e565973979.js.LICENSE.txt */
(()=>{var t={102:t=>{window,t.exports=function(t){var e={};function n(i){if(e[i])return e[i].exports;var s=e[i]={i,l:!1,exports:{}};return t[i].call(s.exports,s,s.exports,n),s.l=!0,s.exports}return n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var s in t)n.d(i,s,function(e){return t[e]}.bind(null,s));return i},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=0)}([function(t,e,n){"use strict";n.r(e),n.d(e,"default",(function(){return y}));function i(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var s=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.positions={top:0,bottom:0,height:0}}var e,n;return e=t,(n=[{key:"setViewportTop",value:function(t){return this.positions.top=t?t.scrollTop:window.pageYOffset,this.positions}},{key:"setViewportBottom",value:function(){return this.positions.bottom=this.positions.top+this.positions.height,this.positions}},{key:"setViewportAll",value:function(t){return this.positions.top=t?t.scrollTop:window.pageYOffset,this.positions.height=t?t.clientHeight:document.documentElement.clientHeight,this.positions.bottom=this.positions.top+this.positions.height,this.positions}}])&&i(e.prototype,n),t}()),o=function(t){return NodeList.prototype.isPrototypeOf(t)||HTMLCollection.prototype.isPrototypeOf(t)?Array.from(t):"string"==typeof t||t instanceof String?document.querySelectorAll(t):[t]},r=function(){for(var t,e="transform webkitTransform mozTransform oTransform msTransform".split(" "),n=0;void 0===t;)t=void 0!==document.createElement("div").style[e[n]]?e[n]:void 0,n+=1;return t}();function a(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,i=new Array(e);n<e;n++)i[n]=t[n];return i}function l(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var c=function(){function t(e,n){var i=this;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.element=e,this.elementContainer=e,this.settings=n,this.isVisible=!0,this.isInit=!1,this.oldTranslateValue=-1,this.init=this.init.bind(this),this.customWrapper=this.settings.customWrapper&&this.element.closest(this.settings.customWrapper)?this.element.closest(this.settings.customWrapper):null,function(t){return"img"!==t.tagName.toLowerCase()&&"picture"!==t.tagName.toLowerCase()||!!t&&!!t.complete&&(void 0===t.naturalWidth||0!==t.naturalWidth)}(e)?this.init():this.element.addEventListener("load",(function(){setTimeout((function(){i.init(!0)}),50)}))}var e,n;return e=t,(n=[{key:"init",value:function(t){var e=this;this.isInit||(t&&(this.rangeMax=null),this.element.closest(".simpleParallax")||(!1===this.settings.overflow&&this.wrapElement(this.element),this.setTransformCSS(),this.getElementOffset(),this.intersectionObserver(),this.getTranslateValue(),this.animate(),this.settings.delay>0?setTimeout((function(){e.setTransitionCSS(),e.elementContainer.classList.add("simple-parallax-initialized")}),10):this.elementContainer.classList.add("simple-parallax-initialized"),this.isInit=!0))}},{key:"wrapElement",value:function(){var t=this.element.closest("picture")||this.element,e=this.customWrapper||document.createElement("div");e.classList.add("simpleParallax"),e.style.overflow="hidden",this.customWrapper||(t.parentNode.insertBefore(e,t),e.appendChild(t)),this.elementContainer=e}},{key:"unWrapElement",value:function(){var t=this.elementContainer;this.customWrapper?(t.classList.remove("simpleParallax"),t.style.overflow=""):t.replaceWith.apply(t,function(t){return function(t){if(Array.isArray(t))return a(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(t){if("string"==typeof t)return a(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?a(t,e):void 0}}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}(t.childNodes))}},{key:"setTransformCSS",value:function(){!1===this.settings.overflow&&(this.element.style[r]="scale(".concat(this.settings.scale,")")),this.element.style.willChange="transform"}},{key:"setTransitionCSS",value:function(){this.element.style.transition="transform ".concat(this.settings.delay,"s ").concat(this.settings.transition)}},{key:"unSetStyle",value:function(){this.element.style.willChange="",this.element.style[r]="",this.element.style.transition=""}},{key:"getElementOffset",value:function(){var t=this.elementContainer.getBoundingClientRect();if(this.elementHeight=t.height,this.elementTop=t.top+s.positions.top,this.settings.customContainer){var e=this.settings.customContainer.getBoundingClientRect();this.elementTop=t.top-e.top+s.positions.top}this.elementBottom=this.elementHeight+this.elementTop}},{key:"buildThresholdList",value:function(){for(var t=[],e=1;e<=this.elementHeight;e++){var n=e/this.elementHeight;t.push(n)}return t}},{key:"intersectionObserver",value:function(){var t={root:null,threshold:this.buildThresholdList()};this.observer=new IntersectionObserver(this.intersectionObserverCallback.bind(this),t),this.observer.observe(this.element)}},{key:"intersectionObserverCallback",value:function(t){var e=this;t.forEach((function(t){t.isIntersecting?e.isVisible=!0:e.isVisible=!1}))}},{key:"checkIfVisible",value:function(){return this.elementBottom>s.positions.top&&this.elementTop<s.positions.bottom}},{key:"getRangeMax",value:function(){var t=this.element.clientHeight;this.rangeMax=t*this.settings.scale-t}},{key:"getTranslateValue",value:function(){var t=((s.positions.bottom-this.elementTop)/((s.positions.height+this.elementHeight)/100)).toFixed(1);return t=Math.min(100,Math.max(0,t)),0!==this.settings.maxTransition&&t>this.settings.maxTransition&&(t=this.settings.maxTransition),this.oldPercentage!==t&&(this.rangeMax||this.getRangeMax(),this.translateValue=(t/100*this.rangeMax-this.rangeMax/2).toFixed(0),this.oldTranslateValue!==this.translateValue&&(this.oldPercentage=t,this.oldTranslateValue=this.translateValue,!0))}},{key:"animate",value:function(){var t,e=0,n=0;(this.settings.orientation.includes("left")||this.settings.orientation.includes("right"))&&(n="".concat(this.settings.orientation.includes("left")?-1*this.translateValue:this.translateValue,"px")),(this.settings.orientation.includes("up")||this.settings.orientation.includes("down"))&&(e="".concat(this.settings.orientation.includes("up")?-1*this.translateValue:this.translateValue,"px")),t=!1===this.settings.overflow?"translate3d(".concat(n,", ").concat(e,", 0) scale(").concat(this.settings.scale,")"):"translate3d(".concat(n,", ").concat(e,", 0)"),this.element.style[r]=t}}])&&l(e.prototype,n),t}();function u(t){return function(t){if(Array.isArray(t))return m(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||h(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function h(t,e){if(t){if("string"==typeof t)return m(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?m(t,e):void 0}}function m(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,i=new Array(e);n<e;n++)i[n]=t[n];return i}function f(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var d,p,g=!1,v=[],y=function(){function t(e,n){if(function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),e&&Element.prototype.closest&&"IntersectionObserver"in window){if(this.elements=o(e),this.defaults={delay:0,orientation:"up",scale:1.3,overflow:!1,transition:"cubic-bezier(0,0,0,1)",customContainer:"",customWrapper:"",maxTransition:0},this.settings=Object.assign(this.defaults,n),this.settings.customContainer){var i=function(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t)){var n=[],i=!0,s=!1,o=void 0;try{for(var r,a=t[Symbol.iterator]();!(i=(r=a.next()).done)&&(n.push(r.value),!e||n.length!==e);i=!0);}catch(t){s=!0,o=t}finally{try{i||null==a.return||a.return()}finally{if(s)throw o}}return n}}(t,e)||h(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}(o(this.settings.customContainer),1);this.customContainer=i[0]}this.lastPosition=-1,this.resizeIsDone=this.resizeIsDone.bind(this),this.refresh=this.refresh.bind(this),this.proceedRequestAnimationFrame=this.proceedRequestAnimationFrame.bind(this),this.init()}}var e,n;return e=t,(n=[{key:"init",value:function(){var t=this;s.setViewportAll(this.customContainer),v=[].concat(u(this.elements.map((function(e){return new c(e,t.settings)}))),u(v)),g||(this.proceedRequestAnimationFrame(),window.addEventListener("resize",this.resizeIsDone),g=!0)}},{key:"resizeIsDone",value:function(){clearTimeout(p),p=setTimeout(this.refresh,200)}},{key:"proceedRequestAnimationFrame",value:function(){var t=this;s.setViewportTop(this.customContainer),this.lastPosition!==s.positions.top?(s.setViewportBottom(),v.forEach((function(e){t.proceedElement(e)})),d=window.requestAnimationFrame(this.proceedRequestAnimationFrame),this.lastPosition=s.positions.top):d=window.requestAnimationFrame(this.proceedRequestAnimationFrame)}},{key:"proceedElement",value:function(t){(this.customContainer?t.checkIfVisible():t.isVisible)&&t.getTranslateValue()&&t.animate()}},{key:"refresh",value:function(){s.setViewportAll(this.customContainer),v.forEach((function(t){t.getElementOffset(),t.getRangeMax()})),this.lastPosition=-1}},{key:"destroy",value:function(){var t=this,e=[];v=v.filter((function(n){return t.elements.includes(n.element)?(e.push(n),!1):n})),e.forEach((function(e){e.unSetStyle(),!1===t.settings.overflow&&e.unWrapElement()})),v.length||(window.cancelAnimationFrame(d),window.removeEventListener("resize",this.refresh),g=!1)}}])&&f(e.prototype,n),t}()}]).default}},e={};function n(i){var s=e[i];if(void 0!==s)return s.exports;var o=e[i]={exports:{}};return t[i](o,o.exports,n),o.exports}n.n=t=>{var e=t&&t.__esModule?()=>t.default:()=>t;return n.d(e,{a:e}),e},n.d=(t,e)=>{for(var i in e)n.o(e,i)&&!n.o(t,i)&&Object.defineProperty(t,i,{enumerable:!0,get:e[i]})},n.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),(()=>{"use strict";const t="element-",e={transitionDuration:Number(getComputedStyle(document.documentElement).getPropertyValue("--transition-duration-value"))??300,transitionEasing:getComputedStyle(document.documentElement).getPropertyValue("--transition-timing-function")??"ease",classes:{show:t+"show",collapse:t+"collapse",collapsing:t+"collapsing"}},i=t=>{t.classList.contains(e.classes.show)?(t.classList.remove(e.classes.collapse,e.classes.show),t.classList.add(e.classes.collapsing),t.animate([{height:t.scrollHeight+"px"},{height:0}],{duration:e.transitionDuration,iterations:1,easing:e.transitionEasing}),setTimeout((function(){t.classList.remove(e.classes.collapsing),t.classList.add(e.classes.collapse)}),e.transitionDuration)):(t.classList.add(e.classes.show,e.classes.collapsing),t.style.height=t.scrollHeight+"px",t.addEventListener("transitionend",(()=>{t.classList.remove(e.classes.collapsing),t.removeAttribute("style")})))};var s=n(102),o=n.n(s);(()=>{class t{constructor(t){this.rootEl=t,this.buttonEl=this.rootEl.querySelector(".accordion__button");const e=this.buttonEl.getAttribute("aria-controls");this.contentEl=document.getElementById(e),this.open="true"===this.buttonEl.getAttribute("aria-expanded"),this.buttonEl.addEventListener("click",this.onButtonClick.bind(this))}onButtonClick(){this.contentEl.classList.contains(e.classes.collapsing)||this.toggle(!this.open)}toggle(t){t!==this.open&&(this.open=t,this.buttonEl.setAttribute("aria-expanded",`${t}`),i(this.contentEl))}open(){this.toggle(!0)}close(){this.toggle(!1)}}document.querySelectorAll(".accordion__title").forEach((e=>{new t(e)}))})(),(()=>{function t(t){const n="tab--active";let s=t.dataset.tabRel;const o=t.closest(".tabs"),r=o.querySelector("."+e.classes.show),a=o.querySelector("[data-tab-id='"+s+"']");if(t.classList.contains(n)||a.classList.contains(e.classes.collapsing))return;const l=o.querySelectorAll(".tab--active");for(const t of l)t.classList.remove(n);const c=o.querySelectorAll("[data-tab-rel='"+s+"']");for(const t of c)t.classList.add(n);i(r),i(a)}const n=document.querySelectorAll(".tab");for(const e of n)e.addEventListener("click",(function(){t(e)}))})(),(()=>{function t(){const t="overlay-menu--changing",e=document.querySelector(".overlay-menu"),n=document.querySelector(".curtain--menu");document.documentElement.classList.toggle("is-locked"),e.classList.toggle("overlay-menu--visible"),e.classList.add(t),e.addEventListener("transitionend",(function(){e.classList.remove(t)})),n.classList.toggle("curtain--visible")}for(const e of document.querySelectorAll("[data-overlay-menu-toggle], .curtain--menu"))e.addEventListener("click",(function(){t()}));for(const t of document.querySelectorAll(".dropdown-toggle"))t.addEventListener("click",(function(){t.nextElementSibling.classList.contains(e.classes.collapsing)||(t.classList.toggle("dropdown-toggle--active"),i(t.nextElementSibling))}))})(),(()=>{const t=document.querySelectorAll("[data-animate]"),e=new IntersectionObserver((t=>{t.forEach((t=>{t.isIntersecting&&t.target.classList.add("animate-show")}))}),{rootMargin:"-30px"});t.forEach((t=>{e.observe(t)}))})(),document.querySelectorAll(".galleries").forEach((t=>{const e=t.querySelectorAll(".button"),n=t.querySelectorAll(".gallery");e.forEach((t=>{const i=t.innerHTML.toLowerCase().replace(" ","-");t.addEventListener("click",(function(t){t.target.classList.contains("active")||(e.forEach((t=>t.classList.remove("active"))),this.classList.add("active"),n.forEach((t=>{t.getAttribute("data-gallery-name")===i?t.classList.add("active"):t.classList.remove("active")})))}))}))})),(()=>{const t=document.querySelectorAll(".select-box"),e=document.querySelector(".site-header");t.forEach((t=>{const n=t.querySelector(".select-box__button"),i=t.querySelectorAll(".select-box__link"),s=n.querySelector(".select-box__text");function o(){n.classList.remove("active")}i.forEach(((t,n)=>{t.addEventListener("click",(function(t){t.preventDefault(),s.innerHTML=this.innerHTML;const n=e.getBoundingClientRect().height,i=document.querySelector(this.getAttribute("href")).getBoundingClientRect().top+window.scrollY;window.scrollTo({top:i-2*n+2}),o()}))})),n.addEventListener("click",(function(){this.classList.toggle("active")})),document.addEventListener("click",(function(e){t.contains(e.target)||o()}))}))})(),(()=>{const t=document.querySelectorAll(".img-parallax");new(o())(t,{scale:1.25,orientation:"down"})})(),(()=>{const t=document.querySelectorAll("source");t.length&&t.forEach((t=>{t.dataset.src&&(t.src=t.dataset.src,t.parentElement.load())}))})()})()})();
//# sourceMappingURL=main.19c107e7d2e565973979.js.map