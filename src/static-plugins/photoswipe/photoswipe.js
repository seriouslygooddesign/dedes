import PhotoSwipeLightbox from "./photoswipe-lightbox.esm.js";
import PhotoSwipe from "./photoswipe.esm.js";

const lightbox = new PhotoSwipeLightbox({
  gallery: ".gallery, .swiper",
  children: "a",
  pswpModule: PhotoSwipe,
});
lightbox.init();