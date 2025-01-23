const Popup = () => {
	class MainPopup {
		constructor(popup) {
			this.popup = popup;
			this.popupData = JSON.parse(this.popup.dataset.popup);
			this.main = this.popup.querySelector("[data-popup-main]");
			this.togglerOpenSelectors = this.popupData.selector || false;
			this.togglersOpen =
				this.togglerOpenSelectors && this.isValidSelector(this.togglerOpenSelectors)
					? document.querySelectorAll(this.togglerOpenSelectors)
					: [];
			this.togglersClose = this.popup.querySelectorAll("[data-popup-toggler-close]");
			this.focusableElements = this.getFocusableElements();
			this.firstFocusableElement = this.focusableElements[0];
			this.lastFocusableElement = this.focusableElements[this.focusableElements.length - 1];
			this.activeClass = "active";
			this.popupOpenedBy = undefined;

			this.autoOpen = this.popupData.autoOpen || false;
			this.autoOpenCookieName = this.popup.id || "";
			this.autoOpenCookieValue = this.autoOpen.key || "";
			this.autoOpenExpires = this.autoOpen.expires || 0; //days
			this.autoOpenDelay = this.autoOpen.delay || 0; //milliseconds

			if (this.autoOpen && !this.isCookieExists()) {
				setTimeout(() => {
					this.popupShow();
				}, this.autoOpenDelay);
			}

			const windowLocationHash = window.location.hash;
			if (windowLocationHash) {
				this.togglersOpen.forEach((toggler) => {
					const togglerHash = toggler.hash;
					if (togglerHash && togglerHash === windowLocationHash) {
						this.popupShow();
					}
				});
			}

			if (this.togglersOpen.length) {
				this.togglersOpen.forEach((togglerOpen) => {
					togglerOpen.addEventListener("click", (e) => {
						e.preventDefault();
						this.popupShow();
						this.popupOpenedBy = togglerOpen;
					});
				});
			}

			if (this.togglersClose.length) {
				this.togglersClose.forEach((togglerClose) => {
					togglerClose.addEventListener("click", (e) => {
						e.preventDefault();
						this.popupClose();
					});
				});
			}

			document.addEventListener("keydown", (e) => {
				if (e.key === "Escape") {
					this.popupClose();
				}
			});

			this.popup.addEventListener("click", () => {
				this.popupClose();
			});

			this.main.addEventListener("click", (e) => {
				e.stopPropagation();
			});
		}

		isValidSelector(selector) {
			try {
				document.querySelectorAll(selector);
			} catch (e) {
				if (e instanceof DOMException) {
					return false;
				}
			}
			return true;
		}

		isActive() {
			return this.popup.classList.contains(this.activeClass) ? true : false;
		}

		focusTrap() {
			this.popup.addEventListener("keydown", (event) => {
				if (event.key === "Tab" || event.keyCode === 9) {
					if (event.shiftKey) {
						// if shift key pressed for shift + tab combination
						if (document.activeElement === this.firstFocusableElement) {
							event.preventDefault();
							this.lastFocusableElement.focus();
						}
					} else {
						// if tab key is pressed
						if (document.activeElement === this.lastFocusableElement) {
							event.preventDefault();
							this.firstFocusableElement.focus();
						}
					}
				}
			});
		}

		getFocusableElements() {
			return Array.from(
				this.popup.querySelectorAll(
					'a[href], button, input, textarea, select, details, [tabindex]:not([tabindex="-1"])'
				)
			).filter((el) => !el.hasAttribute("disabled") && !el.getAttribute("aria-hidden") && el.type !== "hidden");
		}

		popupShow() {
			if (!this.isActive()) {
				this.popup.classList.add(this.activeClass);
				this.popup.scrollTo(0, 0);
				this.popup.addEventListener("transitionend", (event) => {
					if (event.target === this.popup && this.isActive()) {
						this.firstFocusableElement.focus();
					}
				});
				this.focusTrap();
			}
		}

		popupClose() {
			if (this.isActive()) {
				this.popup.classList.remove(this.activeClass);
				this.popupOpenedBy?.focus({
					preventScroll: true,
				});
				if (this.autoOpen && !this.isCookieExists()) {
					this.setCookie(this.autoOpenCookieName, this.autoOpenCookieValue, this.autoOpenExpires);
				}
			}
		}

		setCookie(name, value, expires) {
			if (!name || !value) return;
			let expiresValue = "";
			if (expires) {
				const date = new Date();
				date.setTime(date.getTime() + expires * 24 * 60 * 60 * 1000);
				expiresValue = date.toUTCString();
			}
			document.cookie = `${name}=${value};expires=${expiresValue};path=/`;
		}

		getCookie(name) {
			const cookieArray = document.cookie.split(";");
			for (let i = 0; i < cookieArray.length; i++) {
				const cookie = cookieArray[i].trim();
				if (cookie.startsWith(`${name}=`)) {
					return cookie.substring(name.length + 1);
				}
			}
			return null;
		}

		isCookieExists() {
			return this.getCookie(this.autoOpenCookieName) === this.autoOpenCookieValue;
		}
	}

	const popups = document.querySelectorAll("[data-popup]");

	popups.forEach((popup) => {
		new MainPopup(popup);
		popup.removeAttribute("hidden");
	});
};

export default Popup;
