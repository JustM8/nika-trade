import { accordion } from "../common/accordion";

const accordionsRef = document.querySelectorAll(
    ".contacts-page-list-item-title-wrap"
);

const accordions = [...accordionsRef].map(accordion);
