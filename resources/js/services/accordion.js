import { accordion } from "../common/accordion";

const accordionsRef = document.querySelectorAll(".services-item__title-wrap");

const accordions = [...accordionsRef].map(accordion);
