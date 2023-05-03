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
                    <div class="container1">
                        <button class="add_form_field">Add New Field
                            <span style="font-size:16px; font-weight:bold;">+</span>
                        </button>
                        <div class="form-group row" id="father">
                            <label for="row[1]" class="col-md-4 col-form-label text-md-right">{{ __('row[1]') }}</label>
                            <div class="col-md-6">
                                <input id="row[1]"
                                       type="text"
                                       class="form-control @error('row[1]') is-invalid @enderror"
                                       name="row[1]"
                                       value="{{ old('row[1]') }}"
                                       autocomplete="row[1]"
                                       autofocus
                                >
                            </div>
                        </div>
                    </div>

{{--                    <div class="form-group row">--}}
{{--                        <label for="row[2]" class="col-md-4 col-form-label text-md-right">{{ __('row[2]') }}</label>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <input id="row[2]"--}}
{{--                                   type="text"--}}
{{--                                   class="form-control @error('row[2]') is-invalid @enderror"--}}
{{--                                   name="row[2]"--}}
{{--                                   value="{{ old('row[2]') }}"--}}
{{--                                   autocomplete="row[2]"--}}
{{--                                   autofocus--}}
{{--                            >--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="row[3]" class="col-md-4 col-form-label text-md-right">{{ __('row[3]') }}</label>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <input id="row[3]"--}}
{{--                                   type="text"--}}
{{--                                   class="form-control @error('row[3]') is-invalid @enderror"--}}
{{--                                   name="row[3]"--}}
{{--                                   value="{{ old('row[3]') }}"--}}
{{--                                   autocomplete="row[3]"--}}
{{--                                   autofocus--}}
{{--                            >--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="row[4]" class="col-md-4 col-form-label text-md-right">{{ __('row[4]') }}</label>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <input id="row[4]"--}}
{{--                                   type="text"--}}
{{--                                   class="form-control @error('row[4]') is-invalid @enderror"--}}
{{--                                   name="row[4]"--}}
{{--                                   value="{{ old('row[4]') }}"--}}
{{--                                   autocomplete="row[4]"--}}
{{--                                   autofocus--}}
{{--                            >--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <div class="form-group row">
                        <div class="col-md-10 text-right">
                            <input type="submit" class="btn btn-info" value="Create">
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
@endsection
@push('footer-scripts')

@endpush
