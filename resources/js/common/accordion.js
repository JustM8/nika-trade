export const accordion = (selector) => {
    const accordionRef =
        typeof selector === "string"
            ? document.querySelector(selector)
            : selector;

    const openAccordion = () => {
        accordionRef.classList.add("active");
    };

    const closeAccordion = () => {
        accordionRef.classList.remove("active");
    };

    const toggleAccordion = () => {
        accordionRef.classList.toggle("active");
        const nextSibling = accordionRef.nextElementSibling;
        if (nextSibling) {
            nextSibling.classList.toggle("active");
        }
    };

    accordionRef.addEventListener("click", (event) => {
        toggleAccordion();
    });

    return {
        accordionRef,
        openAccordion,
        closeAccordion,
        toggleAccordion,
    };
};
