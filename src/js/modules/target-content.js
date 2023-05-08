const TargetContent = () => {
    const targetContents = document.querySelectorAll('.target-content');
    
    targetContents.forEach(targetContent => {
        const menu = targetContent.querySelector('.target-content__buttons');
        const buttons = targetContent.querySelectorAll('.button');
        const contents = targetContent.querySelectorAll('.target-content__content');
        const header = document.querySelector('header');

        var scrollDisable = true;

        function setActiveButton() {
            const menuBottom = menu.getBoundingClientRect().bottom + window.pageYOffset;
            contents.forEach(content => {
                const contentTop = content.getBoundingClientRect().top + window.pageYOffset;
                const contentBottom = content.getBoundingClientRect().bottom + window.pageYOffset;
                const activeButton = targetContent.querySelector(`.target-content__buttons .button[href="#${content.id}"]`);
                if (contentTop - 50 <= menuBottom && contentBottom >= menuBottom && scrollDisable && activeButton) {
                    toggleActive(activeButton);
                }
            });
        }

        function addClickHandlers() {
            buttons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const content = targetContent.querySelector(e.target.hash);
                    if (content) {
                        const contentTop = content.getBoundingClientRect().top + window.pageYOffset;
                        const menuHeight = menu.getBoundingClientRect().height;
                        const headerHeight = header.getBoundingClientRect().height;
                        window.scrollTo({
                            top: contentTop - menuHeight - headerHeight
                        });
                    }
                    toggleActive(e.target);
                    scrollDisable = false;
                    let isScrolling;
                    window.addEventListener('scroll', function () {
                        window.clearTimeout(isScrolling);
                        isScrolling = setTimeout(function () {
                            scrollDisable = true
                        }, 50);
                    });
                });
            });
        }

        function toggleActive(el) {
            buttons.forEach(button => button.classList.remove('active'));
            el.classList.add('active');
        }

        window.addEventListener('scroll', setActiveButton);
        addClickHandlers();
    })
}

export default TargetContent;