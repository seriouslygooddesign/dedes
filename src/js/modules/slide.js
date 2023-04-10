const prefix = "element-";

export const settings = {
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
export default Slide;
