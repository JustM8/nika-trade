import { gsap, ScrollTrigger } from "gsap/all";
import axios from "axios";
import SplitType from "split-type";
import imagesLoaded from "imagesloaded";
import "./common/header";
import "./common/footer";
import "./common/lenisScroll";
import "./common/paralaxImages";
import { preloader } from "./common/loader";

window.gsap = gsap;
window.axios = axios;

// window.addEventListener('load', () => {
//   setTimeout(() => {
//     preloader.remove();
//   }, 100);
// });
