/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scss/style.scss":
/*!*****************************!*\
  !*** ./src/scss/style.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./node_modules/simple-parallax-js/dist/simpleParallax.min.js":
/*!********************************************************************!*\
  !*** ./node_modules/simple-parallax-js/dist/simpleParallax.min.js ***!
  \********************************************************************/
/***/ ((module) => {

/*!
 * simpleParallax.min - simpleParallax is a simple JavaScript library that gives your website parallax animations on any images or videos, 
 * @date: 20-08-2020 14:0:14, 
 * @version: 5.6.2,
 * @link: https://simpleparallax.com/
 */
!function(t,e){ true?module.exports=e():0}(window,(function(){return function(t){var e={};function n(i){if(e[i])return e[i].exports;var r=e[i]={i:i,l:!1,exports:{}};return t[i].call(r.exports,r,r.exports,n),r.l=!0,r.exports}return n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)n.d(i,r,function(e){return t[e]}.bind(null,r));return i},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=0)}([function(t,e,n){"use strict";n.r(e),n.d(e,"default",(function(){return x}));var i=function(){return Element.prototype.closest&&"IntersectionObserver"in window};function r(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var s=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.positions={top:0,bottom:0,height:0}}var e,n,i;return e=t,(n=[{key:"setViewportTop",value:function(t){return this.positions.top=t?t.scrollTop:window.pageYOffset,this.positions}},{key:"setViewportBottom",value:function(){return this.positions.bottom=this.positions.top+this.positions.height,this.positions}},{key:"setViewportAll",value:function(t){return this.positions.top=t?t.scrollTop:window.pageYOffset,this.positions.height=t?t.clientHeight:document.documentElement.clientHeight,this.positions.bottom=this.positions.top+this.positions.height,this.positions}}])&&r(e.prototype,n),i&&r(e,i),t}()),o=function(t){return NodeList.prototype.isPrototypeOf(t)||HTMLCollection.prototype.isPrototypeOf(t)?Array.from(t):"string"==typeof t||t instanceof String?document.querySelectorAll(t):[t]},a=function(){for(var t,e="transform webkitTransform mozTransform oTransform msTransform".split(" "),n=0;void 0===t;)t=void 0!==document.createElement("div").style[e[n]]?e[n]:void 0,n+=1;return t}(),l=function(t){return"img"!==t.tagName.toLowerCase()&&"picture"!==t.tagName.toLowerCase()||!!t&&(!!t.complete&&(void 0===t.naturalWidth||0!==t.naturalWidth))};function u(t){return function(t){if(Array.isArray(t))return c(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return c(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return c(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function c(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,i=new Array(e);n<e;n++)i[n]=t[n];return i}function h(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var f=function(){function t(e,n){var i=this;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.element=e,this.elementContainer=e,this.settings=n,this.isVisible=!0,this.isInit=!1,this.oldTranslateValue=-1,this.init=this.init.bind(this),this.customWrapper=this.settings.customWrapper&&this.element.closest(this.settings.customWrapper)?this.element.closest(this.settings.customWrapper):null,l(e)?this.init():this.element.addEventListener("load",(function(){setTimeout((function(){i.init(!0)}),50)}))}var e,n,i;return e=t,(n=[{key:"init",value:function(t){var e=this;this.isInit||(t&&(this.rangeMax=null),this.element.closest(".simpleParallax")||(!1===this.settings.overflow&&this.wrapElement(this.element),this.setTransformCSS(),this.getElementOffset(),this.intersectionObserver(),this.getTranslateValue(),this.animate(),this.settings.delay>0?setTimeout((function(){e.setTransitionCSS(),e.elementContainer.classList.add("simple-parallax-initialized")}),10):this.elementContainer.classList.add("simple-parallax-initialized"),this.isInit=!0))}},{key:"wrapElement",value:function(){var t=this.element.closest("picture")||this.element,e=this.customWrapper||document.createElement("div");e.classList.add("simpleParallax"),e.style.overflow="hidden",this.customWrapper||(t.parentNode.insertBefore(e,t),e.appendChild(t)),this.elementContainer=e}},{key:"unWrapElement",value:function(){var t=this.elementContainer;this.customWrapper?(t.classList.remove("simpleParallax"),t.style.overflow=""):t.replaceWith.apply(t,u(t.childNodes))}},{key:"setTransformCSS",value:function(){!1===this.settings.overflow&&(this.element.style[a]="scale(".concat(this.settings.scale,")")),this.element.style.willChange="transform"}},{key:"setTransitionCSS",value:function(){this.element.style.transition="transform ".concat(this.settings.delay,"s ").concat(this.settings.transition)}},{key:"unSetStyle",value:function(){this.element.style.willChange="",this.element.style[a]="",this.element.style.transition=""}},{key:"getElementOffset",value:function(){var t=this.elementContainer.getBoundingClientRect();if(this.elementHeight=t.height,this.elementTop=t.top+s.positions.top,this.settings.customContainer){var e=this.settings.customContainer.getBoundingClientRect();this.elementTop=t.top-e.top+s.positions.top}this.elementBottom=this.elementHeight+this.elementTop}},{key:"buildThresholdList",value:function(){for(var t=[],e=1;e<=this.elementHeight;e++){var n=e/this.elementHeight;t.push(n)}return t}},{key:"intersectionObserver",value:function(){var t={root:null,threshold:this.buildThresholdList()};this.observer=new IntersectionObserver(this.intersectionObserverCallback.bind(this),t),this.observer.observe(this.element)}},{key:"intersectionObserverCallback",value:function(t){var e=this;t.forEach((function(t){t.isIntersecting?e.isVisible=!0:e.isVisible=!1}))}},{key:"checkIfVisible",value:function(){return this.elementBottom>s.positions.top&&this.elementTop<s.positions.bottom}},{key:"getRangeMax",value:function(){var t=this.element.clientHeight;this.rangeMax=t*this.settings.scale-t}},{key:"getTranslateValue",value:function(){var t=((s.positions.bottom-this.elementTop)/((s.positions.height+this.elementHeight)/100)).toFixed(1);return t=Math.min(100,Math.max(0,t)),0!==this.settings.maxTransition&&t>this.settings.maxTransition&&(t=this.settings.maxTransition),this.oldPercentage!==t&&(this.rangeMax||this.getRangeMax(),this.translateValue=(t/100*this.rangeMax-this.rangeMax/2).toFixed(0),this.oldTranslateValue!==this.translateValue&&(this.oldPercentage=t,this.oldTranslateValue=this.translateValue,!0))}},{key:"animate",value:function(){var t,e=0,n=0;(this.settings.orientation.includes("left")||this.settings.orientation.includes("right"))&&(n="".concat(this.settings.orientation.includes("left")?-1*this.translateValue:this.translateValue,"px")),(this.settings.orientation.includes("up")||this.settings.orientation.includes("down"))&&(e="".concat(this.settings.orientation.includes("up")?-1*this.translateValue:this.translateValue,"px")),t=!1===this.settings.overflow?"translate3d(".concat(n,", ").concat(e,", 0) scale(").concat(this.settings.scale,")"):"translate3d(".concat(n,", ").concat(e,", 0)"),this.element.style[a]=t}}])&&h(e.prototype,n),i&&h(e,i),t}();function m(t){return function(t){if(Array.isArray(t))return y(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||d(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function p(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){if("undefined"==typeof Symbol||!(Symbol.iterator in Object(t)))return;var n=[],i=!0,r=!1,s=void 0;try{for(var o,a=t[Symbol.iterator]();!(i=(o=a.next()).done)&&(n.push(o.value),!e||n.length!==e);i=!0);}catch(t){r=!0,s=t}finally{try{i||null==a.return||a.return()}finally{if(r)throw s}}return n}(t,e)||d(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function d(t,e){if(t){if("string"==typeof t)return y(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?y(t,e):void 0}}function y(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,i=new Array(e);n<e;n++)i[n]=t[n];return i}function v(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var g,b,w=!1,T=[],x=function(){function t(e,n){if(function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),e&&i()){if(this.elements=o(e),this.defaults={delay:0,orientation:"up",scale:1.3,overflow:!1,transition:"cubic-bezier(0,0,0,1)",customContainer:"",customWrapper:"",maxTransition:0},this.settings=Object.assign(this.defaults,n),this.settings.customContainer){var r=p(o(this.settings.customContainer),1);this.customContainer=r[0]}this.lastPosition=-1,this.resizeIsDone=this.resizeIsDone.bind(this),this.refresh=this.refresh.bind(this),this.proceedRequestAnimationFrame=this.proceedRequestAnimationFrame.bind(this),this.init()}}var e,n,r;return e=t,(n=[{key:"init",value:function(){var t=this;s.setViewportAll(this.customContainer),T=[].concat(m(this.elements.map((function(e){return new f(e,t.settings)}))),m(T)),w||(this.proceedRequestAnimationFrame(),window.addEventListener("resize",this.resizeIsDone),w=!0)}},{key:"resizeIsDone",value:function(){clearTimeout(b),b=setTimeout(this.refresh,200)}},{key:"proceedRequestAnimationFrame",value:function(){var t=this;s.setViewportTop(this.customContainer),this.lastPosition!==s.positions.top?(s.setViewportBottom(),T.forEach((function(e){t.proceedElement(e)})),g=window.requestAnimationFrame(this.proceedRequestAnimationFrame),this.lastPosition=s.positions.top):g=window.requestAnimationFrame(this.proceedRequestAnimationFrame)}},{key:"proceedElement",value:function(t){(this.customContainer?t.checkIfVisible():t.isVisible)&&t.getTranslateValue()&&t.animate()}},{key:"refresh",value:function(){s.setViewportAll(this.customContainer),T.forEach((function(t){t.getElementOffset(),t.getRangeMax()})),this.lastPosition=-1}},{key:"destroy",value:function(){var t=this,e=[];T=T.filter((function(n){return t.elements.includes(n.element)?(e.push(n),!1):n})),e.forEach((function(e){e.unSetStyle(),!1===t.settings.overflow&&e.unWrapElement()})),T.length||(window.cancelAnimationFrame(g),window.removeEventListener("resize",this.refresh),w=!1)}}])&&v(e.prototype,n),r&&v(e,r),t}()}]).default}));

/***/ }),

/***/ "./src/js/modules/accordion.js":
/*!*************************************!*\
  !*** ./src/js/modules/accordion.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _slide__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./slide */ "./src/js/modules/slide.js");

const Accordion = () => {
  class Accordion {
    constructor(domNode) {
      this.rootEl = domNode;
      this.buttonEl = this.rootEl.querySelector(".accordion__button");

      const controlsId = this.buttonEl.getAttribute("aria-controls");
      this.contentEl = document.getElementById(controlsId);

      this.open = this.buttonEl.getAttribute("aria-expanded") === "true";

      // add event listeners
      this.buttonEl.addEventListener("click", this.onButtonClick.bind(this));
    }

    onButtonClick() {
      if (this.contentEl.classList.contains(_slide__WEBPACK_IMPORTED_MODULE_0__.settings.classes.collapsing)) {
        return;
      }
      this.toggle(!this.open);
    }

    toggle(open) {
      // don't do anything if the open state doesn't change
      if (open === this.open) {
        return;
      }

      // update the internal state
      this.open = open;

      // handle DOM updates
      this.buttonEl.setAttribute("aria-expanded", `${open}`);
      (0,_slide__WEBPACK_IMPORTED_MODULE_0__["default"])(this.contentEl);
    }

    // Add public open and close methods for convenience
    open() {
      this.toggle(true);
    }

    close() {
      this.toggle(false);
    }
  }

  // init accordions
  const accordions = document.querySelectorAll(".accordion__title");
  accordions.forEach((accordionEl) => {
    new Accordion(accordionEl);
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Accordion);


/***/ }),

/***/ "./src/js/modules/animate.js":
/*!***********************************!*\
  !*** ./src/js/modules/animate.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const Animate = () => {
  const els = document.querySelectorAll("[data-animate]");
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animate-show");
        }
      });
    },
    {
      rootMargin: "-30px",
    }
  );
  els.forEach((el) => {
    observer.observe(el);
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Animate);


/***/ }),

/***/ "./src/js/modules/gallery-nav.js":
/*!***************************************!*\
  !*** ./src/js/modules/gallery-nav.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const GalleryNav = () => {
    const els = document.querySelectorAll('.galleries');

    els.forEach(el => {
        const buttons = el.querySelectorAll('.button');
        const galleries = el.querySelectorAll('.gallery');
        buttons.forEach(button => {
            const galleryName = button.innerHTML.toLowerCase().replace(' ', '-');
            button.addEventListener('click', function (e) {
                if (!e.target.classList.contains('active')) {
                    buttons.forEach(button => button.classList.remove('active'));
                    this.classList.add('active');
                    galleries.forEach(gallery => {
                        if (gallery.getAttribute('data-gallery-name') === galleryName) {
                            gallery.classList.add('active');
                        } else {
                            gallery.classList.remove('active');
                        }
                    });
                }
            });
        });
    })
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (GalleryNav);


/***/ }),

/***/ "./src/js/modules/mobile-menu.js":
/*!***************************************!*\
  !*** ./src/js/modules/mobile-menu.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _slide__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./slide */ "./src/js/modules/slide.js");


const MobileMenu = () => {
  function toggleSiteMenu() {
    const menuVisibleClass = "overlay-menu--visible";
    const menuChangingClass = "overlay-menu--changing";

    const menu = document.querySelector(".overlay-menu");
    const menuOverlay = document.querySelector(".curtain--menu");

    document.documentElement.classList.toggle("is-locked");
    menu.classList.toggle(menuVisibleClass);
    menu.classList.add(menuChangingClass);

    menu.addEventListener("transitionend", function () {
      menu.classList.remove(menuChangingClass);
    });

    menuOverlay.classList.toggle("curtain--visible");
  }

  for (const element of document.querySelectorAll(
    "[data-overlay-menu-toggle], .curtain--menu"
  )) {
    element.addEventListener("click", function () {
      toggleSiteMenu();
    });
  }

  //Mobile submenu toggle
  for (const element of document.querySelectorAll(".dropdown-toggle")) {
    element.addEventListener("click", function () {
      const subMenu = element.nextElementSibling;
      if (subMenu.classList.contains(_slide__WEBPACK_IMPORTED_MODULE_0__.settings.classes.collapsing)) {
        return;
      }
      element.classList.toggle("dropdown-toggle--active");
      (0,_slide__WEBPACK_IMPORTED_MODULE_0__["default"])(element.nextElementSibling);
    });
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MobileMenu);


/***/ }),

/***/ "./src/js/modules/simple-parallax.js":
/*!*******************************************!*\
  !*** ./src/js/modules/simple-parallax.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var simple_parallax_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! simple-parallax-js */ "./node_modules/simple-parallax-js/dist/simpleParallax.min.js");
/* harmony import */ var simple_parallax_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(simple_parallax_js__WEBPACK_IMPORTED_MODULE_0__);


const SimpleParallax = () => {
  var images = document.querySelectorAll('.img-parallax');
  new (simple_parallax_js__WEBPACK_IMPORTED_MODULE_0___default())(images, {
    scale: 1.5,
    orientation: 'down'
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SimpleParallax);


/***/ }),

/***/ "./src/js/modules/slide.js":
/*!*********************************!*\
  !*** ./src/js/modules/slide.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   "settings": () => (/* binding */ settings)
/* harmony export */ });
const prefix = "element-";

const settings = {
  transitionDuration:
    Number(
      getComputedStyle(document.documentElement).getPropertyValue(
        "--transition-duration-value"
      )
    ) ?? 300,
  transitionEasing:
    getComputedStyle(document.documentElement).getPropertyValue(
      "--transition-timing-function"
    ) ?? "ease",
  classes: {
    show: prefix + "show",
    collapse: prefix + "collapse",
    collapsing: prefix + "collapsing",
  },
};

const Slide = (element) => {
  if (!element.classList.contains(settings.classes.show)) {
    element.classList.add(settings.classes.show, settings.classes.collapsing);
    element.style.height = element.scrollHeight + "px";
    element.addEventListener("transitionend", () => {
      element.classList.remove(settings.classes.collapsing);
      element.removeAttribute("style");
    });
  } else {
    element.classList.remove(settings.classes.collapse, settings.classes.show);
    element.classList.add(settings.classes.collapsing);

    element.animate([{ height: element.scrollHeight + "px" }, { height: 0 }], {
      duration: settings.transitionDuration,
      iterations: 1,
      easing: settings.transitionEasing,
    });
    setTimeout(function () {
      element.classList.remove(settings.classes.collapsing);
      element.classList.add(settings.classes.collapse);
    }, settings.transitionDuration);
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Slide);


/***/ }),

/***/ "./src/js/modules/tabs.js":
/*!********************************!*\
  !*** ./src/js/modules/tabs.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _slide__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./slide */ "./src/js/modules/slide.js");


const Tabs = () => {
  function tabHandler(element) {
    const tabActiveClass = "tab--active";

    let dataRelActive = element.dataset.tabRel;

    const parent = element.closest(".tabs");

    const visibleContent = parent.querySelector("." + _slide__WEBPACK_IMPORTED_MODULE_0__.settings.classes.show);
    const currentContent = parent.querySelector(
      "[data-tab-id='" + dataRelActive + "']"
    );

    if (
      element.classList.contains(tabActiveClass) ||
      currentContent.classList.contains(_slide__WEBPACK_IMPORTED_MODULE_0__.settings.classes.collapsing)
    ) {
      return;
    }

    const tabActive = parent.querySelectorAll("." + tabActiveClass);

    for (const element of tabActive) {
      element.classList.remove(tabActiveClass);
    }

    const tabCurrent = parent.querySelectorAll(
      "[data-tab-rel='" + dataRelActive + "']"
    );
    for (const element of tabCurrent) {
      element.classList.add(tabActiveClass);
    }

    (0,_slide__WEBPACK_IMPORTED_MODULE_0__["default"])(visibleContent);
    (0,_slide__WEBPACK_IMPORTED_MODULE_0__["default"])(currentContent);
  }

  const buttons = document.querySelectorAll(".tab");
  for (const button of buttons) {
    button.addEventListener("click", function () {
      tabHandler(button);
    });
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Tabs);


/***/ }),

/***/ "./src/js/modules/target-content.js":
/*!******************************************!*\
  !*** ./src/js/modules/target-content.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const TargetContent = () => {
    const targetContents = document.querySelectorAll('.target-content');
    
    targetContents.forEach(targetContent => {
        const menu = targetContent.querySelector('.target-content__buttons');
        const buttons = targetContent.querySelectorAll('.button');
        const contents = targetContent.querySelectorAll('.target-content__content');
        const header = document.querySelector('header');

        var scrollDisable = true;

        function setActiveButton() {
            const menuBottom = menu.getBoundingClientRect().bottom + window.pageYOffset;
            contents.forEach(content => {
                const contentTop = content.getBoundingClientRect().top + window.pageYOffset;
                const contentBottom = content.getBoundingClientRect().bottom + window.pageYOffset;
                const activeButton = targetContent.querySelector(`.target-content__buttons .button[href="#${content.id}"]`);
                if (contentTop - 50 <= menuBottom && contentBottom >= menuBottom && scrollDisable && activeButton) {
                    toggleActive(activeButton);
                }
            });
        }

        function addClickHandlers() {
            buttons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const content = targetContent.querySelector(e.target.hash);
                    if (content) {
                        const contentTop = content.getBoundingClientRect().top + window.pageYOffset;
                        const menuHeight = menu.getBoundingClientRect().height;
                        const headerHeight = header.getBoundingClientRect().height;
                        window.scrollTo({
                            top: contentTop - menuHeight - headerHeight
                        });
                    }
                    toggleActive(e.target);
                    scrollDisable = false;
                    let isScrolling;
                    window.addEventListener('scroll', function () {
                        window.clearTimeout(isScrolling);
                        isScrolling = setTimeout(function () {
                            scrollDisable = true
                        }, 50);
                    });
                });
            });
        }

        function toggleActive(el) {
            buttons.forEach(button => button.classList.remove('active'));
            el.classList.add('active');
        }

        window.addEventListener('scroll', setActiveButton);
        addClickHandlers();
    })
}

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TargetContent);

/***/ }),

/***/ "./src/js/script.js":
/*!**************************!*\
  !*** ./src/js/script.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_accordion__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/accordion */ "./src/js/modules/accordion.js");
/* harmony import */ var _modules_tabs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/tabs */ "./src/js/modules/tabs.js");
/* harmony import */ var _modules_mobile_menu__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/mobile-menu */ "./src/js/modules/mobile-menu.js");
/* harmony import */ var _modules_animate__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/animate */ "./src/js/modules/animate.js");
/* harmony import */ var _modules_gallery_nav__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./modules/gallery-nav */ "./src/js/modules/gallery-nav.js");
/* harmony import */ var _modules_target_content__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./modules/target-content */ "./src/js/modules/target-content.js");
/* harmony import */ var _modules_simple_parallax__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./modules/simple-parallax */ "./src/js/modules/simple-parallax.js");









//Accordion
(0,_modules_accordion__WEBPACK_IMPORTED_MODULE_0__["default"])();

//Tabs
(0,_modules_tabs__WEBPACK_IMPORTED_MODULE_1__["default"])();

//Mobile menu
(0,_modules_mobile_menu__WEBPACK_IMPORTED_MODULE_2__["default"])();

//Animate
(0,_modules_animate__WEBPACK_IMPORTED_MODULE_3__["default"])();

//GalleryNav
(0,_modules_gallery_nav__WEBPACK_IMPORTED_MODULE_4__["default"])()

//TargetContent
;(0,_modules_target_content__WEBPACK_IMPORTED_MODULE_5__["default"])()

// SimpleParallax
;(0,_modules_simple_parallax__WEBPACK_IMPORTED_MODULE_6__["default"])()


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!*********************!*\
  !*** ./src/main.js ***!
  \*********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scss_style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scss/style.scss */ "./src/scss/style.scss");
/* harmony import */ var _js_script_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/script.js */ "./src/js/script.js");



})();

/******/ })()
;
//# sourceMappingURL=main.js.map