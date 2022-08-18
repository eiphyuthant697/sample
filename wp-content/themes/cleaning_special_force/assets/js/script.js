$window.on('load', function() {
    new Swiper('.blog-slider', {
        loop: false,
        spaceBetween: 40,
        slidesPerView: 'auto',
        slidesPerColumn: 1,

        // If we need pagination
        pagination: {
            el: '.js-movieslider-pagenation',
            bulletClass: 'slidernavi-pagenation-item',
            bulletActiveClass: 'is-slidernavi-item-active',
            clickable: true
        },

        // Navigation arrows
        navigation: {
            nextEl: '.js-movieslider-button-next',
            prevEl: '.js-movieslider-button-prev',
            disabledClass: 'is-slidernavi-button-disabled',
            hiddenClass: 'is-slidernavi-button-hidden'
        },

        breakpoints: {
            // モバイル時
            768: {
                spaceBetween: 20
            }
        }

    });
});