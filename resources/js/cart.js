import "bootstrap";

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

const cartPopup = popupFactory(document.querySelector(".cart-overlay"));

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
            updateCartPopup();
            cartPopup.open();
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
});

const closeBtnRef = document.querySelectorAll("[data-cart-close]");

closeBtnRef.forEach(el => {
    el.addEventListener("click", (e) => {
        e.preventDefault;
        cartPopup.close();
    });

})

$(document).on("click", ".cart-list-item-delete__input", function (e) {
    e.preventDefault();
    let $form = $(this).closest("form");

    $.ajax({
        url: $form.data("route"),
        type: "POST",
        data: $form.serialize(),
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            updateCartPopup();
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
});

function updateQuantity($input) {
    let $btn = $input;

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
                updateCartPopup();
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
}

function decrementQuantity($input) {
    let currentValue = parseInt($input.val()) || 0;
    if (currentValue > 0) {
        $input.val(currentValue - 1);
    }
}
$(document)
    .on(
        "keydown",
        'input[type="text"].cart-list-item-descr__quantity-container__input-value',
        function (e) {
            if (e.which === 13) {
                e.preventDefault();
                const $input = $(this);
                const value = $input.val().replace(/[^0-9]/g, "");
                $input.val(value);
                updateQuantity($input);
            } else if (
                e.which === 8 ||   // Backspace
                e.which === 46 ||  // Delete
                (e.which >= 48 && e.which <= 57) ||  // 0-9 (top row)
                (e.which >= 96 && e.which <= 105)    // 0-9 (Num Lock)
            ) {
                // Allow valid keys
            } else {
                e.preventDefault();
            }
        }
    )
    .on(
        "input change",
        'input[type="text"].cart-list-item-descr__quantity-container__input-value',
        function () {
            const $input = $(this);
            let value = $input.val().replace(/[^0-9]/g, "");
            $input.val(value);
        }
    )
    .on(
        "blur",
        'input[type="text"].cart-list-item-descr__quantity-container__input-value',
        function () {
            const $input = $(this);
            const value = $input.val();
            if (value !== $input.data("previous-value")) {
                $input.data("previous-value", value);
                updateQuantity($input);
            }
        }
    )
    .each(function () {
        $(this).data("previous-value", $(this).val());
    });


$(document).on("click", ".cart-increment-btn", function (e) {
    e.preventDefault();
    let $input = $(this)
        .closest(".cart-list-item-descr__quantity-container")
        .find(".cart-list-item-descr__quantity-container__input-value");
    incrementQuantity($input);
    updateQuantity($input);
});

$(document).on("click", ".cart-decrement-btn", function (e) {
    e.preventDefault();
    let $input = $(this)
        .closest(".cart-list-item-descr__quantity-container")
        .find(".cart-list-item-descr__quantity-container__input-value");
    decrementQuantity($input);
    updateQuantity($input);
});

$(document).on("submit", "form", function (e) {
    e.preventDefault();
});

function updateCartPopup() {
    $.ajax({
        url: "/ajax/cart/popup",
        type: "GET",
        
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            document.querySelector("#cart-popup").innerHTML = data.html;
            document.querySelector("#cart-total").innerHTML = data.total;
            document.querySelector("#cart-amount").innerHTML = data.count;
        },
        error: function (data) {

            console.log("Error:", data);
        },
    });
}