/**
    Hide swiper controls based on the number of pagination items.
    @param {Swiper} swiperInstance - The Swiper instance.
    */

export function hideSwiperControls(swiperInstance) {
    // Get the pagination total element
    const paginationTotal = swiperInstance.el.querySelector('[data-swiper-pagination] .swiper-pagination-total')

    // Find the closest swiper controls element
    const swiperControls = paginationTotal.closest('[data-swiper-controls]')

    // Check if there is only one pagination item
    if (paginationTotal.innerHTML == 1 && swiperControls) {

        // Hide the swiper controls
        swiperControls.style.display = 'none'
    }
    else {
        swiperControls.style.display = null
    }
}
