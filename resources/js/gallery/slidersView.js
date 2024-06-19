export const galleryView = ({
    row_0,
    row_1,
    row_2,
    row_3,
    row_4,
    gallery,
    thumbnail,
}) => {
    const slides = gallery
        .map(
            (image, index) => `
        <div class="swiper-slide" data-swiper-slide-index="${index}" style="background-image: url(${image})">
            <img src="${image}">
        </div>
    `
        )
        .join("");

    return `
    <div class="tabs__swiper">
        <div class="tabs__info-shop">
            <div class="tabs__info-shop-name">${row_4}</div>
            <div class="tabs__info-shop-item"> ${row_0}</div>
            <div class="tabs__info-shop-item"> <span>Адреса: </span>${row_1}</div>
            <div class="tabs__info-shop-item"> <span>Рік: </span>${row_2}</div>
            <div class="tabs__info-shop-item"> <span>Система: </span>${row_3}</div>
        </div>
        <div class="swiper-wrapper">
            ${slides}
        </div>
        <div class="tabs__swiper-button tabs__swiper-button-prev round-btn round-btn--black">
            <svg class="icon--arrow" role="presentation">
                <use xlink:href="#icon-arrow"></use>
            </svg>
        </div>
        <div class="tabs__swiper-button tabs__swiper-button-next round-btn round-btn-next round-btn--black">
            <svg class="icon--arrow" role="presentation">
                <use xlink:href="#icon-arrow"></use>
            </svg>
        </div>
    </div>
    `;
};

export const titleView = (name, description) => {
    return ` 
    <div class="tabs__name">${name}</div>
    <div class="tabs__description">${description}</div>`;
};
