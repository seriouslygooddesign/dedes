const TargetContent = () => {
    const selectBoxContainers = document.querySelectorAll('.select-box');
    const header = document.querySelector('.site-header');

    selectBoxContainers.forEach((container) => {
        const selectBoxButton = container.querySelector('.select-box__button');
        const selectBoxLinks = container.querySelectorAll('.select-box__link');
        const inputText = selectBoxButton.querySelector('.select-box__text');

        selectBoxLinks.forEach((link, e) => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                inputText.innerHTML = this.innerHTML;
                const headerHeight = header.getBoundingClientRect().height;
                const target = document.querySelector(this.getAttribute('href'));
                const targetPosition = target.getBoundingClientRect().top + window.scrollY;
                window.scrollTo({
                    top: targetPosition - headerHeight * 2 + 2
                });
                removeActiveClass()
            });
        });

        function removeActiveClass() {
            selectBoxButton.classList.remove('active');
        }

        selectBoxButton.addEventListener('click', function () {
            this.classList.toggle('active');
        });

        document.addEventListener('click', function (event) {
            if (!container.contains(event.target)) {
                removeActiveClass();
            }
        });
    })

}
export default TargetContent;