import Lenis from "@studio-freight/lenis";
export const popupFactory = (ref) => ({
    open() {
        this.element.classList.add("modal-open");
        Lenis.stop();
    },
    close() {
        this.element.classList.remove("modal-open");
        Lenis.start();
    },
    toggle() {
        this.element.classList.toggleClass("modal-open");
    },
    element: ref,
});
