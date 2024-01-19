document.addEventListener('change', function(event) {
  const switchCheckbox = event.target;
  if (switchCheckbox.classList.contains('product-page__switch')) {
    const productPageImageWrap = switchCheckbox.closest('.product-page-item-img-wrap');
    const productImageElements = productPageImageWrap.querySelectorAll('.product-page-image');
    productImageElements.forEach(element => {
      element.classList.toggle('hidden');
    });
  }
});
