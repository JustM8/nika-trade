import './bootstrap';

$(document).ready(function (e){
    if(window.FileReader){

        $('#images').change(function (){
            let counter = 0, file;
            let template = `<div class="col-12 d-flex justify-content-center align-items-center">
                                <img src="__url__" class="card-img-top" style="max-width: 50%; margin: 0 auto; display: block;"
                            </div>`;
            let text = `<div class="form-group row"><div class="col-md-6">
                            <input type="text" class="form-control" id="row___count__"  name="data[slider][__count__][row]">
                            <div class="slider_img-__count__"></div>
                        </div></div>`;
            $('images-wrapper').html('');
            let i = 0;
            while (file = this.files[counter++]){
                let reader = new FileReader();
                reader.onloadend = (() => function (){
                    console.log(i);
                    let img = template.replace('__url__',this.result);
                    let textBlock = text.replace('__count__',i);
                    let textBlock2 = textBlock.replace('__count__',i);
                    let textBlock3 = textBlock2.replace('__count__',i);
                    $('.images-wrapper').append(textBlock3);
                    $('.slider_img-'+i).append(img);
                    i++;
                })(file);
                reader.readAsDataURL(file);
            }
        });

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
