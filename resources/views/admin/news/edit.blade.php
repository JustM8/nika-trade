@extends('layouts.admin')
@section('title') {{' - Admin - Edit News'}} @endsection
@section('content')
{{--    {{ App::currentLocale() }}--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('news.Update news') }}</h3>
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
                <form action="{{ route('admin.news.update',$news) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('news.Slug') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   name="slug"
                                   value="{{ $news->slug  }}"
                                   autocomplete="title"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('news.Date') }}</label>
                        <div class="col-md-6">
                            <input id="date"
                                   type="date"
                                   class="form-control @error('date') is-invalid @enderror"
                                   name="date"
                                   value="{{ $news->date  }}"
                                   autocomplete="date"
                                   autofocus
                                   required
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('news.Title') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{ $news->title[App::currentLocale()] }}"
                                   autocomplete="title"
                                   autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subtitle_1" class="col-md-4 col-form-label text-md-right">{{ __('news.Subtitle 1') }}</label>
                        <div class="col-md-6">
                            <input id="subtitle_1"
                                   type="text"
                                   class="form-control @error('subtitle_1') is-invalid @enderror"
                                   name="subtitle_1"
                                   value="{{ $news->description['subtitle_1'][App::currentLocale()] }}"
                                   autocomplete="subtitle_1"
                                   autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subtitle_2" class="col-md-4 col-form-label text-md-right">{{ __('news.Subtitle 2') }}</label>
                        <div class="col-md-6">
                            <input id="subtitle_2"
                                   type="text"
                                   class="form-control @error('subtitle_2') is-invalid @enderror"
                                   name="subtitle_2"
                                   value="{{ $news->description['subtitle_2'][App::currentLocale()]  }}"
                                   autocomplete="subtitle_2"
                                   autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('news.Priority') }}</label>
                        <div class="col-md-6">
                            <input id="priority"
                                   type="number"
                                   class="form-control @error('priority') is-invalid @enderror"
                                   name="priority"
                                   value="{{ $news->priority  }}"
                                   autocomplete="priority"
                                   autofocus
                                   min="0"
                                   step="1"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('news.Video(url)') }}</label>
                        <div class="col-md-6">
                            <input id="video"
                                   type="text"
                                   class="form-control @error('video') is-invalid @enderror"
                                   name="video"
                                   value="{{$news->video_url}}"
                                   autocomplete="video"
                                   autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description_top" class="col-md-4 col-form-label text-md-right">{{ __('news.Description top') }}</label>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <textarea name="description_top" id="description_top" class="form-control  @error('description_top') is-invalid @enderror" placeholder="Leave a comment here" id="description_top" style="height: 250px">
                                    {{$news->description['description_top'][App::currentLocale()]  }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description_bottom" class="col-md-4 col-form-label text-md-right">{{ __('news.Description bottom') }}</label>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <textarea name="description_bottom" id="description_bottom" class="form-control  @error('description_bottom') is-invalid @enderror" placeholder="Leave a comment here" id="description_bottom" style="height: 250px">
                                    {{$news->description['description_bottom'][App::currentLocale()]  }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thumbnail" class="col-md-4 col-form-label text-md-right">{{ __('news.Thumbnail') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ $news->thumbnailUrl  }}" id="thumbnail-preview" alt="" class="w-100">
                                </div>
                                <div class="mb-3">
                                    <input  class="form-control" type="file" name="thumbnail" id="thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 text-right">
                            <input type="submit" class="btn btn-info" value="{{ __('news.Update')}}">
                        </div>
                    </div>

                </form>
                <form>

                <div class="form-group row">
                    <div class="col-md-10 text-right">
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-dark">{{ __('news.Cancel')}}</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
            $('#description_top, #description_bottom').summernote({
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
    </script> -->
@endsection
@push('footer-scripts')
    @vite(['resources/js/images-preview.js', 'resources/js/summernote.js'])
@endpush
