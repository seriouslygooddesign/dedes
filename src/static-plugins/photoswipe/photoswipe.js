import PhotoSwipeLightbox from "./photoswipe-lightbox.esm.js";
import PhotoSwipe from "./photoswipe.esm.js";

const lightbox = new PhotoSwipeLightbox({
  gallery: "[data-photoswipe]",
  children: "a",
  pswpModule: PhotoSwipe,
});
lightbox.init();