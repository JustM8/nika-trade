import './bootstrap';

$(document).ready(function (e){
    if(window.FileReader){
        $('#thumbnail').change(function (){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#thumbnail-preview').attr('src', e.target.result)
            }

            reader.readAsDataURL(this.files[0]);
        });
    }
   // alert('test');
});
