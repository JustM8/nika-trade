const infoContainerRef = document.querySelector('.product-page-info-wrap');
const infoToShowRef = document.querySelectorAll('.product-page-info');
const switchButtons = document.querySelectorAll('.product-page-info-switch-item');

infoContainerRef.addEventListener('click', event => {
  const target = event.target;
  const switchItem = target.closest('.product-page-info-switch-item');

  if (switchItem) {
    const selectedAttr = switchItem.getAttribute('data-info');

    if (selectedAttr) {
      infoToShowRef.forEach(element => {
        const infoAttr = element.getAttribute('data-info');

        if (infoAttr === selectedAttr) {
          element.classList.add('active');
        } else {
          element.classList.remove('active');
        }
      });

      switchButtons.forEach(element => {
        if (element === switchItem) {
          element.classList.add('active');
        } else {
          element.classList.remove('active');
        }
      });
    }
  }
});
