import { contactForm } from '../common/contactForm';
import { contactPopup } from '../common/contactPopup';

contactForm(document.querySelector('[data-contact-popup]'));

const contactRequestFormRef = document.querySelectorAll('.contacts-page-list-item__btn');

contactRequestFormRef.forEach(el => {
  el.addEventListener('click', e => {
    e.preventDefault();
    contactPopup.open();
  });
});
