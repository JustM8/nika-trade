import Swiper from "swiper";

import { Navigation, Controller } from "swiper/modules";

import { getItemById } from "./getItemById";
import { galleryView, titleView } from "./slidersView";

Swiper.use([Navigation, Controller]);

const tabsListRef = document.querySelector(".tabs__list");
const slidersContainerRef = document.querySelector(".tabs__wrapper-sliders");

const titleContainerRef = document.querySelector(".tabs__info");

const handleOpenGallery = async (event) => {
    // event.preventDefault();
    const { target } = event;

    console.log(target);
    const tabRef = target.closest("[data-tab]");
    if (!tabRef) return;

    const id = +tabRef.dataset.id;
    try {
        const { data } = await getItemById(id);

        console.log(data);

        const gallery = galleryView({
            row_0: data.gallery.data.row_0,
            row_1: data.gallery.data.row_1,
            row_2: data.gallery.data.row_2,
            row_3: data.gallery.data.row_3,
            row_4: data.gallery.data.row_4,
            gallery: data.gallery.gallery,
        });

        slidersContainerRef.innerHTML = "";

        slidersContainerRef.insertAdjacentHTML("beforeend", gallery);

        setTimeout(() => {
            const swiperContainer =
                slidersContainerRef.querySelector(".tabs__swiper");
            if (!swiperContainer) {
                console.error("Swiper container not found");
                return;
            }

            new Swiper(swiperContainer, {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: false,
                speed: 1200,
                navigation: {
                    prevEl: swiperContainer.querySelector(
                        ".tabs__swiper-button-prev"
                    ),
                    nextEl: swiperContainer.querySelector(
                        ".tabs__swiper-button-next"
                    ),
                },
            });
        }, 0);

        const title = titleView(data.name, data.description);

        titleContainerRef.innerHTML = "";
        titleContainerRef.insertAdjacentHTML("beforeend", title); // Add the new title
    } catch (error) {
        console.warn(error);
    }
};

tabsListRef.addEventListener("click", handleOpenGallery);
const firstChild = tabsListRef.children[0];
if (firstChild) {
    handleOpenGallery({ target: firstChild });
}
