import simpleParallax from 'simple-parallax-js';

const SimpleParallax = () => {
  var images = document.querySelectorAll('.img-parallax');
  new simpleParallax(images, {
    scale: 1.5,
    orientation: 'down'
  });
};
export default SimpleParallax;
