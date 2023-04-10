import Slide, { settings } from "./slide";

const MobileMenu = () => {
  function toggleSiteMenu() {
    const menuVisibleClass = "overlay-menu--visible";
    const menuChangingClass = "overlay-menu--changing";

    const menu = document.querySelector(".overlay-menu");
    const menuOverlay = document.querySelector(".curtain--menu");

    document.documentElement.classList.toggle("is-locked");
    menu.classList.toggle(menuVisibleClass);
    menu.classList.add(menuChangingClass);

    menu.addEventListener("transitionend", function () {
      menu.classList.remove(menuChangingClass);
    });

    menuOverlay.classList.toggle("curtain--visible");
  }

  for (const element of document.querySelectorAll(
    "[data-overlay-menu-toggle], .curtain--menu"
  )) {
    element.addEventListener("click", function () {
      toggleSiteMenu();
    });
  }

  //Mobile submenu toggle
  for (const element of document.querySelectorAll(".dropdown-toggle")) {
    element.addEventListener("click", function () {
      const subMenu = element.nextElementSibling;
      if (subMenu.classList.contains(settings.classes.collapsing)) {
        return;
      }
      element.classList.toggle("dropdown-toggle--active");
      Slide(element.nextElementSibling);
    });
  }
};
export default MobileMenu;
