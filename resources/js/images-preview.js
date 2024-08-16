import "bootstrap";

$(document).ready(function () {
    if (window.FileReader) {
        $("#images").change(function () {
            $(".images-wrapper").html("");

            for (const file of this.files) {
                const reader = new FileReader();

                reader.onloadend = function () {
                    const img = `<div class="col-12 d-flex justify-content-center align-items-center">
                                    <img src="${reader.result}" class="card-img-top" style="max-width: 50%; margin: 0 auto; display: block;">
                                </div>`;
                    $(".images-wrapper").append(img);
                };

                reader.readAsDataURL(file);
            }
        });

        $("#thumbnail").change(function () {
            const reader = new FileReader();
            reader.onload = (e) => {
                console.log(e.target.result);
                $("#thumbnail-preview").attr("src", e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });
    }
});
