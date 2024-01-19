import * as yup from "yup";
import i18next from "i18next";
import { gsap, ScrollTrigger } from "gsap/all";
import SexyInput from "./input";
import FormMonster from "./form";
import { contactPopup } from "./contactPopup";

gsap.registerPlugin(ScrollTrigger);

const footer = document.querySelector("footer");

const initFooter = () => {
    const footerUpRef = document.querySelector(".footer-up");

    // External footer link scroll animation
    gsap.from(".footer-up", {
        scrollTrigger: {
            trigger: ".footer",
            scrub: 2,
            start: "50% 100%", // position of trigger meets the scroller position
            end: "0% 0%",
        },
        y: 150,
        ease: "sine",
    });

    function scrollToTop(e) {
        // Scroll to top logic
        e.preventDefault();
        window.scrollTo({
            behavior: "smooth",
            top: 0,
        });
    }

    footerUpRef.addEventListener("click", scrollToTop);
};

if (footer) {
    initFooter();
}
