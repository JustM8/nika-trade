import Swiper from "swiper";

import { Navigation, Controller, Autoplay } from "swiper/modules";

Swiper.use([Navigation, Controller, Autoplay]);
const breakpoint = window.matchMedia("(max-width:768px)");
// keep track of swiper instances to destroy later
let clientsSwiper;

const breakpointChecker = function () {
    // if larger viewport and multi-row layout needed
    if (breakpoint.matches === true) {
        // clean up old instances and inline styles when available
        if (clientsSwiper !== undefined) clientsSwiper.destroy(true, true);
        // or/and do nothing
        return;
        // else if a small viewport and single column layout needed
    } else if (breakpoint.matches === false) {
        // fire small viewport version of swiper
        return enableSwiper();
    }
};

const enableSwiper = function () {
    clientsSwiper = new Swiper(".clients-swiper", {
        keyboard: true,
        spaceBetween: 116,
        initialSlide: 0,
        observer: true,
        observeParents: true,
        slidesPerView: 5,
        preloadImages: false,
        lazy: true,
        speed: 1500,
        navigation: {
            nextEl: ".clients-swiper-button-next",
            prevEl: ".clients-swiper-button-prev",
        },

        breakpoints: {
            // when window width is >= 320px
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            // when window width is >= 480px
            1366: {
                slidesPerView: 5,
                spaceBetween: 85,
            },
            // when window width is >= 1920px
            1920: {
                spaceBetween: 116,
            },
        },
    });
};

breakpoint.addListener(breakpointChecker);

breakpointChecker();
