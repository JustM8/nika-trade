import "./bootstrap";

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

const closeBtnRef = document.querySelector(".cart-close");

closeBtnRef.addEventListener("click", () => {
    cartPopup.close();
});

$(document).on("click", ".cart-list-item-delete__input", function (e) {
    e.preventDefault();
    let $form = $(this).closest("form"); // Find the parent form

    $.ajax({
        url: $form.data("route"),
        type: "POST",
        data: $form.serialize(),
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            updateCartPopup();
            // Handle success, if needed
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
});

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
                updateCartPopup();
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
$(document).on("keyup", 'input[type="number"]', function () {
    updateQuantity($(this));
});

// Handle increment and decrement buttons
$(document).on("click", ".cart-increment-btn", function (e) {
    e.preventDefault();
    let $input = $(this)
        .closest(".cart-list-item-descr__quantity-container")
        .find(".cart-list-item-descr__quantity-container__input-value");
    incrementQuantity($input);
});

$(document).on("click", ".cart-decrement-btn", function (e) {
    e.preventDefault();
    let $input = $(this)
        .closest(".cart-list-item-descr__quantity-container")
        .find(".cart-list-item-descr__quantity-container__input-value");
    decrementQuantity($input);
});

function updateCartPopup() {
    $.ajax({
        url: "/ajax/cart/popup",
        type: "get", // Змінено метод на POST, якщо ви хочете передати дані на сервер
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            // Оновіть вміст popup з отриманим HTML
            document.querySelector("#cart-popup").innerHTML = data.html;
            document.querySelector("#cart-total").innerHTML = data.total;
            document.querySelector("#cart-amount").innerHTML = data.count;
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
}

// $(document).on("click", "[data-btn-submit]", function (e) {
//     e.preventDefault();

//     let $btn = $(this);

//     $.ajax({
//         url: $btn.data("action"),
//         type: "POST",
//         dataType: "json",
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (data) {
//             console.log('request', data)

//         },
//         error: function (data) {
//             console.log("Error:", data);
//         },
//     });
// });
