import Slide, { settings } from "./slide";
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
			if (this.contentEl.classList.contains(settings.classes.collapsing)) {
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
			Slide(this.contentEl);
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
export default Accordion;
