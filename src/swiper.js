import "./scss/plugins/_swiper.scss";

import Swiper, { Navigation, Pagination } from "swiper";

const siteSliders = document.querySelectorAll("[data-swiper-slider]");
if (siteSliders.length) {
  siteSliders.forEach((slider) => {
    const slidesPerView = Number(slider.getAttribute("data-slides-per-view"));
    let slidesPerViewTablet = slidesPerView > 1 ? 2 : 1;
    if (slidesPerView >= 3) {
      slidesPerViewTablet = Math.round(slidesPerView / 2);
    }
    const slidesPerViewMobile = slidesPerView > 4 ? 2 : 1;
    const siteSlider = new Swiper(slider, {
      modules: [Navigation, Pagination],
      slidesPerView: slidesPerViewMobile,
      spaceBetween: 14,
      autoHeight: true,
      pagination: {
        el: "[data-swiper-pagination]",
        type: "fraction",
      },
      navigation: {
        nextEl: "[data-swiper-button-next]",
        prevEl: "[data-swiper-button-prev]",
      },
      breakpoints: {
        576: {
          slidesPerView: slidesPerViewTablet,

        },
        992: {
          slidesPerView: slidesPerView,
        },
      },
    });
  });
}


const sliderIds = document.querySelectorAll('[data-swiper-id]')
sliderIds.forEach(slider => {
  const swiperId = slider.getAttribute('data-swiper-id');
  initSwiper(
    {
      selector: `[data-swiper-id="${swiperId}"] [data-swiper-posts]`,
      pagination: {
        el: `[data-swiper-id="${swiperId}"] [data-swiper-pagination]`,
        type: "fraction",
      },
      navigation: {
        nextEl: `[data-swiper-id="${swiperId}"] [data-swiper-button-next]`,
        prevEl: `[data-swiper-id="${swiperId}"] [data-swiper-button-prev]`,
      },
      loop: false,
    })
})


function initSwiper(options) {
  const defaultOptions = {
    modules: [Navigation, Pagination],
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoHeight: false,
    pagination: {
      el: "[data-swiper-pagination]",
      type: "fraction",
    },
    navigation: {
      nextEl: "[data-swiper-button-next]",
      prevEl: "[data-swiper-button-prev]",
    },
  }

  const config = { ...defaultOptions, ...options }

  const sliders = document.querySelectorAll(config.selector);
  if (sliders.length) {
    sliders.forEach((slider) => {
      new Swiper(slider, {
        ...config,
      });
    });
  }
}
