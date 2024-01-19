import Swiper from "swiper";

import { Navigation, Controller } from "swiper/modules";

Swiper.use([Navigation, Controller]);

const newsSwiper = new Swiper(".contacts-page-list-swiper", {
    keyboard: true,
    spaceBetween: 60,
    initialSlide: 0,
    observer: true,
    observeParents: true,
    slidesPerView: 4,
    preloadImages: false,
    lazy: true,
    speed: 1500,
    loop: false,
    navigation: {
        nextEl: ".contacts-page-list-item-content-column-swiper-nav__next",
        prevEl: ".contacts-page-list-item-content-column-swiper-nav__prev",
    },
});
