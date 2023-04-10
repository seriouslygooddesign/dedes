import Slide, { settings } from "./slide";

const Tabs = () => {
  function tabHandler(element) {
    const tabActiveClass = "tab--active";

    let dataRelActive = element.dataset.tabRel;

    const parent = element.closest(".tabs");

    const visibleContent = parent.querySelector("." + settings.classes.show);
    const currentContent = parent.querySelector(
      "[data-tab-id='" + dataRelActive + "']"
    );

    if (
      element.classList.contains(tabActiveClass) ||
      currentContent.classList.contains(settings.classes.collapsing)
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

    Slide(visibleContent);
    Slide(currentContent);
  }

  const buttons = document.querySelectorAll(".tab");
  for (const button of buttons) {
    button.addEventListener("click", function () {
      tabHandler(button);
    });
  }
};
export default Tabs;
