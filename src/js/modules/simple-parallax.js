import simpleParallax from "simple-parallax-js";

const SimpleParallax = () => {
	const images = document.querySelectorAll(".img-parallax");
	new simpleParallax(images, {
		scale: 1.25,
		orientation: "down",
	});
};
export default SimpleParallax;
