import { contactForm } from '../common/contactForm';
import { contactPopup } from '../common/contactPopup';

contactForm(document.querySelector('[data-contact-popup]'));

const contactRequestFormRef = document.querySelectorAll('.catalog-btn');

contactRequestFormRef.forEach(el => {
  el.addEventListener('click', e => {
    e.preventDefault();
    contactPopup.open();
  });
});
