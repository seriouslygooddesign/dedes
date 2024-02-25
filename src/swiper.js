import "./scss/plugins/_swiper.scss";

import Swiper, { Navigation, Pagination } from "swiper";

const swiperPrefix = 'data-swiper';
const swiperSliders = document.querySelectorAll(`[${swiperPrefix}]`);
if (swiperSliders.length) {

  swiperSliders.forEach(swiperSlider => {
    const navigationOutsideWrapper = swiperSlider.closest('[data-swiper-navigation-parent]');

    const navigationEl = (direction = '', type = 'navigation') => {
      direction = direction ? `='${direction}'` : '';
      const navigationEl = `[${swiperPrefix}-navigation${direction}]`;
      const paginationEl = `[${swiperPrefix}-pagination]`;
      const selector = type == 'navigation' ? navigationEl : paginationEl;
      const output = navigationOutsideWrapper
        ? navigationOutsideWrapper.querySelector(selector)
        : swiperSlider.querySelector(selector);
        
      return output;
    };

    const defaultSwiperOptions = {
      modules: [Navigation, Pagination],
      spaceBetween: 20,
      pagination: {
        el: navigationEl(null, 'pagination'),
        type: 'fraction',
        clickable: true,
      },
      navigation: {
        nextEl: navigationEl('next'),
        prevEl: navigationEl('prev'),
      },
    };

    let customSwiperOptions = swiperSlider.getAttribute(swiperPrefix);
    customSwiperOptions = customSwiperOptions ? JSON.parse(customSwiperOptions) : null;

    const swiperOptions = customSwiperOptions ? {
      ...defaultSwiperOptions,
      ...customSwiperOptions
    } : defaultSwiperOptions;

    if (!navigationEl()) swiperOptions.navigation = false;
    if (!navigationEl(null, 'pagination')) swiperOptions.pagination = false;

    new Swiper(swiperSlider, swiperOptions);
  });
}
