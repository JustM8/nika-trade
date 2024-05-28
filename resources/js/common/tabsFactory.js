export const tabsFactory = (ref) => ({
    open() {
        this.element.classList.add("tab-open");
    },
    close() {
        this.element.classList.remove("tab-open");
        s;
    },
    toggle() {
        this.element.classList.toggleClass("tab-open");
    },
    element: ref,
});
