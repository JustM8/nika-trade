// Importing jQuery
import "jquery-legacy"; // Import everything from jquery-legacy

import "bootstrap-legacy";
import Popper from "popper.js";
import "summernote/dist/summernote.min.js";

window.Popper = Popper;

// Attach jQuery to the global scope
window.$ = window.jQuery = $;

console.log("jQuery version:", $.fn.jquery);
// Check if Bootstrap is loaded
if (typeof $.fn.modal === "function") {
    console.log("Bootstrap is loaded.");
} else {
    console.log("Bootstrap is not loaded.");
}

// Check if Popper.js is loaded
if (typeof Popper !== "undefined") {
    console.log("Popper.js is loaded:", Popper);
} else {
    console.log("Popper.js is not loaded.");
}

// Check if Summernote is loaded
if (typeof $.fn.summernote === "function") {
    console.log("Summernote is loaded:", $.fn.summernote);
} else {
    console.log("Summernote is not loaded.");
}

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
