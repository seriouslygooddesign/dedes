import "./scss/plugins/_swiper.scss";

import Swiper, { Navigation, Pagination } from "swiper";

const swiper = new Swiper("[data-swiper-gallery]", {
  modules: [Navigation, Pagination],
  spaceBetween: 30,
  autoHeight: true,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 3,
    },
  },
});
