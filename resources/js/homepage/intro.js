import Swiper from "swiper";

import { Navigation, Controller, Autoplay } from "swiper/modules";
function initSwiper() {
    Swiper.use([Navigation, Controller, Autoplay]);

    const galleryTop = new Swiper(".intro-swiper", {
        loop: true,
        keyboard: true,
        autoplay: {
            delay: 4,
            disableOnInteraction: false,
        },
        spaceBetween: 0,
        initialSlide: 0,
        observer: true,
        observeParents: true,
        slidesPerView: 1,
        preloadImages: false,
        lazy: true,
        speed: 1200,
        // navigation: {
        //   nextEl: '.intro-swiper-button-next',
        //   prevEl: '.intro-swiper-button-prev',
        // },
    });
}
initSwiper();
