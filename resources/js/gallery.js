import Swiper from "swiper";

import { Navigation, Controller } from "swiper/modules";

Swiper.use([Navigation, Controller]);

const tabs = document.querySelector(".tabs") || null;

if (tabs) {
    const tabButtons = tabs.querySelectorAll('[role="tab"]');
    const tabPanels = Array.from(tabs.querySelectorAll('[role="tabpanel"]'));
    const handleClick = (e) => {
        tabPanels.forEach((panel) => panel.setAttribute("hidden", true));
        tabButtons.forEach((tab) => tab.setAttribute("aria-selected", false));
        e.currentTarget.setAttribute("aria-selected", true);
        const tabPanel = tabPanels.find(
            (panel) =>
                panel.getAttribute("aria-labelledby") == e.currentTarget.id
        );
        tabPanel.setAttribute("hidden", false);
    };

    tabButtons.forEach((button) =>
        button.addEventListener("click", handleClick)
    );

    document.querySelectorAll(".tabs__swiper").forEach((swiperElement) => {
        new Swiper(swiperElement, {
            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: swiperElement.querySelector(
                    ".tabs__swiper-button-next"
                ),
                prevEl: swiperElement.querySelector(
                    ".tabs__swiper-button-prev"
                ),
            },
        });
    });
}
