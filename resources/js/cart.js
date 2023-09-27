import "./bootstrap";

$(document).on("click", ".add-to-cart", function (e) {
    e.preventDefault();
    let $btn = $(this);

    $.ajax({
        url: $btn.data("route"),
        type: "POST",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            const popupFactory = (ref) => ({
                open() {
                    this.element.classList.add("modal-open");
                },
                close() {
                    this.element.classList.remove("modal-open");
                },
                toggle() {
                    this.element.classList.toggleClass("modal-open");
                },
                element: ref,
            });

            const cartPopup = popupFactory(
                document.querySelector(".cart-overlay")
            );
            const closeBtnRef = document.querySelector(".cart-close");

            closeBtnRef.addEventListener("click", () => {
                cartPopup.close();
            });

            const openCartPopup = () => {
                const openBtnRef = document.querySelectorAll(".add-to-cart");
                openBtnRef.forEach((el) => {
                    el.addEventListener("click", () => {
                        cartPopup.open();
                    });
                });
            };

            openCartPopup();
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
});

// let itemsCount = $(":input");

// itemsCount.bind("keyup mouseup", function () {
//     let $btn = $(this);

//     console.log($btn.val(), $btn.parent().data("row-id"));

//     $.ajax({
//         url: $btn.parent().data("route"),
//         type: "POST",
//         dataType: "json",
//         data: { count: $btn.val(), rowId: $btn.parent().data("row-id") },
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (data) {
//             console.log("data", data);
//         },
//         error: function (data) {
//             console.log("Error:", data);
//         },
//     });
// });

function updateQuantity($input) {
    let $btn = $input;

    console.log($btn.val(), $btn.parent().data("row-id"));

    if ($btn.val() !== undefined && $btn.val() !== null && $btn.val() !== 0) {
        $.ajax({
            url: $btn.parent().data("route"),
            type: "POST",
            dataType: "json",
            data: { count: $btn.val(), rowId: $btn.parent().data("row-id") },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                console.log("data", data);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    } else {
        console.log("0");
    }
}

function incrementQuantity($input) {
    let currentValue = parseInt($input.val()) || 0;
    $input.val(currentValue + 1);
    updateQuantity($input);
}

function decrementQuantity($input) {
    let currentValue = parseInt($input.val()) || 0;
    if (currentValue > 0) {
        $input.val(currentValue - 1);
        updateQuantity($input);
    }
}

// Bind keyup and mouseup events to inputs
$(document).on("keyup mouseup", ":input", function () {
    updateQuantity($(this));
});

// Handle increment and decrement buttons
$(document).on("click", ".cart-increment-btn", function (e) {
    e.preventDefault();
    let $input = $(".cart-list-item-descr__quantity-container__input-value");
    incrementQuantity($input);
});

$(document).on("click", ".cart-decrement-btn", function (e) {
    let $input = $(".cart-list-item-descr__quantity-container__input-value");
    decrementQuantity($input);
});

// $('input[type="number"]').on('keyup ', function() {
//   let $btn = $(this);

//   console.log($btn.val(),$btn.parent().data('row-id'))

//     $.ajax({
//         url: $btn.parent().data('route'),
//         type: 'POST',
//         dataType: 'json',
//         data: {count:$btn.val(),rowId:$btn.parent().data('row-id')},
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function (data){
//             console.log('data',data);
//         },
//         error: function (data){
//             console.log('Error:',data);
//         }
//     })
// });
