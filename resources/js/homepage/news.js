import Swiper from "swiper";

import { Navigation, Controller } from "swiper/modules";

Swiper.use([Navigation, Controller]);

const newsSwiper = new Swiper(".news-gallery-swiper", {
    keyboard: true,
    spaceBetween: 60,
    initialSlide: 0,
    observer: true,
    observeParents: true,
    slidesPerView: 1,
    preloadImages: false,
    lazy: true,
    speed: 1500,
    navigation: {
        nextEl: ".news-swiper-button-next",
        prevEl: ".news-swiper-button-prev",
    },

    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 60,
        },
    },
});
