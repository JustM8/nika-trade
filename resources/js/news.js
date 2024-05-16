import "./news/index";

$(document).ready(function () {
    var offset = 5;
    var limit = 5;

    $(document).on("click", "#load-more-btn", function (e) {
        e.preventDefault();
        let $btn = $(this);

        $.ajax({
            url: $btn.data("route"),
            method: "GET",
            data: { offset: offset },
            success: function (response) {
                if (response.length > 0) {
                    response.forEach(function (html) {
                        // Додаємо HTML-рядок до контейнера новин
                        $("#news-container").append(html);
                    });

                    // Оновлюємо змінну зміщення (offset) для наступного запиту
                    offset += limit;
                } else {
                    // Якщо не було отримано нових новин, сховати кнопку "Завантажити ще новини"
                    $("#load-more-btn").hide();
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    });
});
