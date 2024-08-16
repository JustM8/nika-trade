import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { contactForm } from "./contactForm";
import { contactPopup } from "./contactPopup";

{
    const headerRef = document.querySelector(".header");
   
    const phoneBtnRef = document.querySelector(".header-call--mobile");
    const callsListRef =document.querySelector('.header-menu-calls--mobile')
    const closeCallsRef = document.querySelector('[data-close-calls]')
    const headerBurgerRef = document.querySelector("[header-burger--mobile]")
    const menuMobRef = document.querySelector('.header-menu--mobile')
    const closeMenuRef = document.querySelector('[data-close-menu]')
    const langBtnRef = document.querySelector(".header-lang-wrap");

    gsap.registerPlugin(ScrollTrigger);
    window.addEventListener("scroll", (evt) => {
        scrollFunction();
    });
    function scrollFunction() {
        if (
            document.body.scrollTop > 50 ||
            document.documentElement.scrollTop > 50
        ) {
            headerRef.classList.add("bg-header");
            //   headerRef.classList.remove('on');
            //   toggleBtnRef.classList.remove('on');
        } else {
            headerRef.classList.remove("bg-header");
        }
    }

    const togglePhoneMob = () => {
        callsListRef.classList.toggle("active");
        headerRef.classList.toggle("active");
    };

    phoneBtnRef.addEventListener("click", togglePhoneMob);
    closeCallsRef.addEventListener("click", togglePhoneMob);

    const toggleMenuMob = () => {
        headerBurgerRef.classList.toggle("active");
        menuMobRef.classList.toggle("active");
    };
    headerBurgerRef.addEventListener('click', toggleMenuMob)
    closeMenuRef.addEventListener('click', toggleMenuMob)

    const toggleLangMob = () => {
        langBtnRef.classList.toggle("active");
        headerRef.classList.toggle("active");
    };
    langBtnRef.addEventListener("click", toggleLangMob);

    contactForm(document.querySelector("[data-contact-popup]"));

    const requestFormRef = document.querySelector(".header-callback-wrap");

    requestFormRef.addEventListener("click", (e) => {
        e.preventDefault();
        contactPopup.open();
    });

    document.addEventListener("DOMContentLoaded", function () {
        const cities = document.getElementById("cities");
        const addressDivs = document.querySelectorAll(".address");

        function showAddressForCity(city) {
            addressDivs.forEach(function (addressDiv) {
                if (addressDiv.getAttribute("data-" + city) === null) {
                    addressDiv.style.display = "none";
                } else {
                    addressDiv.style.display = "block";
                }
            });
        }

        // Initialize by showing the address for the first city
        showAddressForCity(cities.value);

        cities.addEventListener("change", function () {
            showAddressForCity(cities.value);
        });
    });
}
