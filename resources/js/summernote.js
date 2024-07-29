import './bootstrap';
import 'jquery';
import 'summernote';
import 'summernote/dist/summernote-lite.min.js';


    $('#description_top, #description_bottom, #post_title, #description, #description_l, #description_r').summernote({
        tabsize: 2,
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

