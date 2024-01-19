import { cartForm } from './cartForm';
import { cartFormKyiv } from './cartFormKyiv';
import { cartFormUkraine } from './cartFormUkraine';

function handleCheckboxChange(checkbox) {
  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  const allUkraineRef = document.getElementById('PostalDelivery');

  const kyivRef = document.getElementById('Kyiv');
  const formKyivDeliveryRef = document.querySelector('.cart-page-delivery-city');
  const formAllUkraineDeliveryRef = document.querySelector('.cart-page-delivery-ukraine');

  if (checkbox.checked) {
    checkboxes.forEach(checkboxItem => {
      if (checkboxItem !== checkbox) {
        checkboxItem.disabled = true;
        checkboxItem.parentElement.classList.add('disabled');

        if (checkboxItem == allUkraineRef) {
          formAllUkraineDeliveryRef.classList.add('disabled');
        }

        if (checkboxItem == kyivRef) {
          formKyivDeliveryRef.classList.add('disabled');
        }
      }
    });
  } else {
    checkboxes.forEach(checkboxItem => {
      checkboxItem.disabled = false;
      checkboxItem.parentElement.classList.remove('disabled');
      if (checkboxItem == allUkraineRef) {
        formAllUkraineDeliveryRef.classList.remove('disabled');
      }
      if (checkboxItem == kyivRef) {
        formKyivDeliveryRef.classList.remove('disabled');
      }
    });
  }
}

const formContainers = document.querySelectorAll('.cart-page-card-form-container');
const allUkraineCheckbox = document.getElementById('PostalDelivery');
const kyivCheckbox = document.getElementById('Kyiv');
const formUkraineContainer = document.querySelector('.cart-page-delivery-ukraine');
const formKyivContainer = document.querySelector('.cart-page-delivery-city');
const cartPopup = document.querySelector('[data-cart-popup]');

// Приховує всі форми за замовчуванням
formContainers.forEach(form => {
  form.classList.add('hidden');
});

// Функція для обробки змін у чекбоксах
function handleCheckboxForm() {
  // Перевіряємо стан чекбоксів
  const isAllUkraineChecked = allUkraineCheckbox.checked;
  const isKyivChecked = kyivCheckbox.checked;

  // Приховуємо всі форми за замовчуванням
  formContainers.forEach(form => {
    form.classList.add('hidden');
  });

  // Показуємо відповідні форми
  if (isAllUkraineChecked) {
    formUkraineContainer.classList.remove('hidden');
    cartFormUkraine(cartPopup);
  }
  if (isKyivChecked) {
    formKyivContainer.classList.remove('hidden');
    cartFormKyiv(cartPopup);
  }

  // Якщо нічого не вибрано, використовуємо загальну функцію
  if (!isAllUkraineChecked && !isKyivChecked) {
    cartForm(cartPopup);
  }
}

// Додаємо обробник подій для кожного чекбоксу
const allCheckboxes = document.querySelectorAll('input[type="checkbox"]');
allCheckboxes.forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    handleCheckboxChange(checkbox);
    handleCheckboxForm();
  });
});
