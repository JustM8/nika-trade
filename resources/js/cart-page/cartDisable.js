import { cartForm } from "./cartForm";
import { cartFormKyiv } from "./cartFormKyiv";
import { cartFormUkraine } from "./cartFormUkraine";

const checkboxes = document.querySelectorAll('input[type="checkbox"]');
const allUkraineRef = document.getElementById("PostalDelivery");
const pickUpRef = document.getElementById("Mikhailivka");
const kyivRef = document.getElementById("Kyiv");
const formKyivDeliveryRef = document.querySelector(".cart-page-delivery-city");
const formAllUkraineDeliveryRef = document.querySelector(
    ".cart-page-delivery-ukraine"
);
const cartPopup = document.querySelector("[data-cart-popup]");

const allUkraineCheckbox = document.getElementById("PostalDelivery");
const kyivCheckbox = document.getElementById("Kyiv");
const formUkraineContainer = document.querySelector(
    ".cart-page-delivery-ukraine"
);
const formKyivContainer = document.querySelector(".cart-page-delivery-city");

function handleCheckboxChange(checkbox) {
    checkboxes.forEach((checkboxItem) => {
        if (checkboxItem !== checkbox) {
            checkboxItem.checked = false; // Забираємо відміченість у всіх інших чекбоксів
        }
        checkboxItem.disabled = false; // Робимо всі чекбокси активними
        checkboxItem.parentElement.classList.remove("disabled");
    });

    if (checkbox.checked) {
        checkbox.disabled = false; // Залишаємо відміченим тільки поточний чекбокс
        checkbox.parentElement.classList.remove("disabled");

        if (checkbox == allUkraineRef) {
            formKyivDeliveryRef.classList.add("disabled");
            formAllUkraineDeliveryRef.classList.remove("disabled");
        }

        if (checkbox == kyivRef) {
            formAllUkraineDeliveryRef.classList.add("disabled");
            formKyivDeliveryRef.classList.remove("disabled");
        }
    } else {
        formAllUkraineDeliveryRef.classList.remove("disabled");
        formKyivDeliveryRef.classList.remove("disabled");
    }
}

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
        handleCheckboxChange(checkbox);
        handleCheckboxForm();
    });
});

const formContainers = document.querySelectorAll(
    ".cart-page-card-form-container"
);
formContainers.forEach((form) => {
    form.classList.add("hidden");
});

function handleCheckboxForm() {
    const isAllUkraineChecked = allUkraineRef.checked;
    const isKyivChecked = kyivRef.checked;

    formContainers.forEach((form) => {
        form.classList.add("hidden");
    });

    if (isAllUkraineChecked) {
        formUkraineContainer.classList.remove("hidden");
        cartFormUkraine(cartPopup);
    }
    if (isKyivChecked) {
        formKyivContainer.classList.remove("hidden");
        cartFormKyiv(cartPopup);
    }
    if (!isAllUkraineChecked && !isKyivChecked) {
        cartForm(cartPopup);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    pickUpRef.checked = true; // Встановлюємо чекбокс 'pickUpRef' в обраний стан

    handleCheckboxChange(pickUpRef);
    handleCheckboxForm();
});
