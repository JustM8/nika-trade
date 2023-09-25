import './bootstrap';

$(document).on('click', '.add-to-cart', function (e){
    e.preventDefault();
    let $btn = $(this);

    $.ajax({
        url: $btn.data('route'),
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data){
            console.log('data',data);
            // $btn.parent().remove();

            const popupFactory = ref => ({
                open() {
                  this.element.classList.add('modal-open');
                },
                close() {
                  this.element.classList.remove('modal-open');
                },
                toggle() {
                  this.element.classList.toggleClass('modal-open');
                },
                element: ref,
              });
              

            const cartPopup = popupFactory(document.querySelector('.cart-overlay'));
            const closeBtnRef = document.querySelector('.cart-close');

            closeBtnRef.addEventListener('click', () => {
                cartPopup.close();
            });

            const openCartPopup = () => {
                const openBtnRef = document.querySelectorAll('.product-page-item-info__row-btn');
                openBtnRef.forEach(el => {
                  el.addEventListener('click', () => {
                    cartPopup.open();
                  });
                });
            };

            openCartPopup();
              
        },
        error: function (data){
            console.log('Error:',data);
        }
    })

});
