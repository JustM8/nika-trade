@extends('layouts.admin')
@section('title') {{' - Admin - Create News'}} @endsection
@section('content')
    {{ App::currentLocale() }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('Create news') }}</h3>
                <hr>
            </div>
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   name="slug"
                                   value="{{ old('slug') }}"
                                   autocomplete="title"
                                   autofocus
                                   required
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{ old('title') }}"
                                   autocomplete="title"
                                   autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subtitle_1" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle 1') }}</label>
                        <div class="col-md-6">
                            <input id="subtitle_1"
                                   type="text"
                                   class="form-control @error('subtitle_1') is-invalid @enderror"
                                   name="subtitle_1"
                                   value="{{ old('subtitle_1') }}"
                                   autocomplete="subtitle_1"
                                   autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subtitle_2" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle 2') }}</label>
                        <div class="col-md-6">
                            <input id="subtitle_2"
                                   type="text"
                                   class="form-control @error('subtitle_2') is-invalid @enderror"
                                   name="subtitle_2"
                                   value="{{ old('subtitle_2') }}"
                                   autocomplete="subtitle_2"
                                   autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>
                        <div class="col-md-6">
                            <input id="priority"
                                   type="number"
                                   class="form-control @error('priority') is-invalid @enderror"
                                   name="priority"
                                   value="{{ old('priority') }}"
                                   autocomplete="priority"
                                   autofocus
                                   min="0"
                                   step="1"
                            >
                        </div>
                    </div>

{{--                    <div class="container1">--}}
{{--                        <button class="btn btn-primary add_form_field ">Add New Field--}}
{{--                            <span style="font-size:16px; font-weight:bold;">+</span>--}}
{{--                        </button>--}}
{{--                        <div class="form-group row" id="father">--}}
{{--                            <label for="row[1]" class="col-md-4 col-form-label text-md-right">{{ __('row[1]') }}</label>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <input id="row[1]"--}}
{{--                                       type="text"--}}
{{--                                       class="form-control @error('row[1]') is-invalid @enderror"--}}
{{--                                       name="row[1]"--}}
{{--                                       value="{{ old('row[1]') }}"--}}
{{--                                       autocomplete="row[1]"--}}
{{--                                       autofocus--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group row">
                        <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Video(url)') }}</label>
                        <div class="col-md-6">
                            <input id="video"
                                   type="text"
                                   class="form-control @error('video') is-invalid @enderror"
                                   name="video"
                                   value="{{ old('video') }}"
                                   autocomplete="video"
                                   autofocus
                                   required
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description_top" class="col-md-4 col-form-label text-md-right">{{ __('Description top') }}</label>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <textarea name="description_top" id="description_top" class="form-control  @error('description_top') is-invalid @enderror" placeholder="Leave a comment here" id="description_top" style="height: 250px">{{ old('description_top') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description_bottom" class="col-md-4 col-form-label text-md-right">{{ __('Description bottom') }}</label>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <textarea name="description_bottom" id="description_bottom" class="form-control  @error('description_bottom') is-invalid @enderror" placeholder="Leave a comment here" id="description_bottom" style="height: 250px">{{ old('description_bottom') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thumbnail" class="col-md-4 col-form-label text-md-right">{{ __('Thumbnail') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="#" id="thumbnail-preview" alt="">
                                </div>
                                <div class="mb-3">
                                    <input  class="form-control" type="file" name="thumbnail" id="thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 text-right">
                            <input type="submit" class="btn btn-success" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        $(document).ready(function() {
            var max_fields = 10;
            var wrapper = $(".container1");
            var add_button = $(".add_form_field");



            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                // const node = document.getElementById("father");
                // const clone = node.cloneNode(true);
                // $(wrapper).append(clone);
                if (x < max_fields) {
                    x++;
                    // $(wrapper).append('<div><input type="text" name="row['+x+']"/><a href="#" class="delete">Delete</a></div>'); //add input box
                    $(wrapper).append('<div class="form-group row" id="father">'+
                        '<label for="row['+x+']" class="col-md-4 col-form-label text-md-right">{{ __('row[]') }}</label>'+
                        '<div class="col-md-6">'+
                        '<input id="row['+x+']"'+
                        'type="text"'+
                        'class="form-control @error('row[]') is-invalid @enderror"'+
                        'name="row['+x+']"'+
                        'value=""'+
                        'autocomplete="row['+x+']"'+
                        'autofocus' +
                        'required>'+
                        '</div>'+
                        '</div>');

                } else {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click", ".delete", function(e) {
                e.preventDefault();
                // console.log($(this));
                // console.log($(this).parentNode);
                $(this).parent('div').remove();
                x--;
            })
        });

        function myFunction(event) {
            event.preventDefault();
            console.log('qwe');
            $.ajax({
                type : 'POST',
                url : 'form.php',
                data : $('#form').serialize()
            });
        }

    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description_top'))
            .then( editor => {
                editor.ui.view.editable.element.style.height = '250px';
            } )
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#description_bottom'))
            .then( editor => {
                editor.ui.view.editable.element.style.height = '250px';
            } )
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
@push('footer-scripts')
    @vite(['resources/js/images-preview.js'])
@endpush

