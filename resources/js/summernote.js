// Importing jQuery
import "jquery-legacy"; // Import everything from jquery-legacy

import "bootstrap-legacy";
import Popper from "popper.js";
import "summernote/dist/summernote.min.js";

window.Popper = Popper;

// Attach jQuery to the global scope
window.$ = window.jQuery = $;

{
    $(document).ready(function () {
        $(
            "#description_top, #description_bottom, #post_title, #description, #description_l, #description_r"
        ).summernote({
            tabsize: 2,
            height: 250,
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline", "clear"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["table", ["table"]],
                ["insert", ["link", "picture", "video"]],
                ["view", ["fullscreen", "codeview", "help"]],
            ],
        });
    });
}
