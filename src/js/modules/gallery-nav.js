const GalleryNav = () => {
    const els = document.querySelectorAll('.galleries');

    els.forEach(el => {
        const buttons = el.querySelectorAll('.button');
        const galleries = el.querySelectorAll('.gallery');
        buttons.forEach(button => {
            const galleryName = button.innerHTML.toLowerCase().replace(' ', '-');
            button.addEventListener('click', function (e) {
                if (!e.target.classList.contains('active')) {
                    buttons.forEach(button => button.classList.remove('active'));
                    this.classList.add('active');
                    galleries.forEach(gallery => {
                        if (gallery.getAttribute('data-gallery-name') === galleryName) {
                            gallery.classList.add('active');
                        } else {
                            gallery.classList.remove('active');
                        }
                    });
                }
            });
        });
    })
};

export default GalleryNav;
