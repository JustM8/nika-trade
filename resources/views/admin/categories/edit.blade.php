@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.categories.update', $category) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ @$category->name[App::currentLocale()] }}" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Slug') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $category->slug }}" required>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="category"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Parent Categories') }}</label>
                                <div class="col-md-6">
                                    <select id="category"
                                            class="form-control @error('category') is-invalid @enderror"
                                            name="parent_id"
                                    ><option value="">No parent</option>
                                        @foreach($parents as $child)
                                          @if($child['id'] != $category->id)
                                                <option value="{{ $child['id'] }}"
                                                    {{ $child['id'] === $category->parent_id ? 'selected' : '' }}
                                                >{{ $child['name'][App::currentLocale()] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" placeholder="Leave a comment here" id="description" style="height: 250px">
                                    {{$category->description[App::currentLocale()]}}
                                </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="thumbnail"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Thumbnail') }}</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ $category->thumbnailUrl  }}" id="thumbnail-preview" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" name="thumbnail" id="thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer-scripts')
    @vite(['resources/js/images-preview.js','resources/js/images-actions.js'])

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#description').summernote({
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
    </script>
@endpush
