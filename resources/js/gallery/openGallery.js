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

        const galleries = data.galleries;
        console.log(data);

        slidersContainerRef.innerHTML = "";

        galleries.forEach((galleryData, index) => {
            const galleryHTML = galleryView({
                row_0: galleryData.data.row_0,
                row_1: galleryData.data.row_1,
                row_2: galleryData.data.row_2,
                row_3: galleryData.data.row_3,
                row_4: galleryData.data.row_4,
                gallery: galleryData.gallery,
            });

            slidersContainerRef.insertAdjacentHTML("beforeend", galleryHTML);

            // Initialize Swiper for each gallery
            const swiperContainer = slidersContainerRef.querySelector(
                `.tabs__swiper:nth-child(${index + 1})`
            );
            if (swiperContainer) {
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
            } else {
                console.error(
                    `Swiper container not found for gallery ${index}`
                );
            }
        });

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
