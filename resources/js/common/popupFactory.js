import lenis from "./lenisScroll";
export const popupFactory = (ref) => ({
    open() {
        this.element.classList.add("modal-open");
        lenis.stop();
    },
    close() {
        this.element.classList.remove("modal-open");
        lenis.start();
    },
    toggle() {
        this.element.classList.toggleClass("modal-open");
    },
    element: ref,
});
