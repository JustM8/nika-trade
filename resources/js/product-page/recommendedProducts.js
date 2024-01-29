import Swiper from "swiper";

import { Navigation, Controller } from "swiper/modules";

Swiper.use([Navigation, Controller]);

const recommendedProductsSwiper = new Swiper(".recommended-products-swiper", {
    keyboard: true,
    spaceBetween: 40,
    initialSlide: 0,
    observer: true,
    observeParents: true,
    slidesPerView: 4,
    preloadImages: false,
    lazy: true,
    speed: 1500,
    navigation: {
        nextEl: ".recommended-products-button-next",
        prevEl: ".recommended-products-button-prev",
    },

    breakpoints: {
        360: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1366: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1920: {
            slidesPerView: 5,
            spaceBetween: 30,
        },
    },
});
