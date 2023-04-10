/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scss/style.scss":
/*!*****************************!*\
  !*** ./src/scss/style.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/js/modules/accordion.js":
/*!*************************************!*\
  !*** ./src/js/modules/accordion.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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

/***/ "./src/js/modules/mobile-menu.js":
/*!***************************************!*\
  !*** ./src/js/modules/mobile-menu.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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

/***/ "./src/js/modules/slide.js":
/*!*********************************!*\
  !*** ./src/js/modules/slide.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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

/***/ "./src/js/script.js":
/*!**************************!*\
  !*** ./src/js/script.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_accordion__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/accordion */ "./src/js/modules/accordion.js");
/* harmony import */ var _modules_tabs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/tabs */ "./src/js/modules/tabs.js");
/* harmony import */ var _modules_mobile_menu__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/mobile-menu */ "./src/js/modules/mobile-menu.js");
/* harmony import */ var _modules_animate__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/animate */ "./src/js/modules/animate.js");





//Accordion
(0,_modules_accordion__WEBPACK_IMPORTED_MODULE_0__["default"])();

//Tabs
(0,_modules_tabs__WEBPACK_IMPORTED_MODULE_1__["default"])();

//Mobile menu
(0,_modules_mobile_menu__WEBPACK_IMPORTED_MODULE_2__["default"])();

//Animate
(0,_modules_animate__WEBPACK_IMPORTED_MODULE_3__["default"])();


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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
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