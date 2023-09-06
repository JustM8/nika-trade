@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('Edit product') }}</h3>
                <hr>
            </div>
            <div class="col-md-12">

                @if ($errors->any())
{{--                    @dd($errors);--}}
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
                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{ $product->title[App::currentLocale()] }}"
                                   autocomplete="title"
                                   autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   name="slug"
                                   value="{{ $product->slug }}"
                                   autocomplete="slug"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category"
                               class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}</label>
                        <div class="col-md-6">
                            <select id="category"
                                    class="form-control @error('category') is-invalid @enderror"
                                    name="category_id"
                            >
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}"
                                            {{ $category['id'] === $product->category?->id ? 'selected' : '' }}
                                    >{{ $category['name'][App::currentLocale()] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="SKU" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>
                        <div class="col-md-6">
                            <input id="SKU"
                                   type="text"
                                   class="form-control @error('SKU') is-invalid @enderror"
                                   name="SKU"
                                   value="{{ $product->SKU }}"
                                   autocomplete="SKU"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
                        <div class="col-md-6">
                            <input id="price"
                                   type="text"
                                   class="form-control @error('price') is-invalid @enderror"
                                   name="price"
                                   value="{{ $product->price }}"
                                   autocomplete="price"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>
                        <div class="col-md-6">
                            <input id="discount"
                                   type="text"
                                   class="form-control @error('discount') is-invalid @enderror"
                                   name="discount"
                                   value="{{ $product->discount }}"
                                   autocomplete="discount"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="in_stock"
                               class="col-md-4 col-form-label text-md-right">{{ __('In Stock (Quantity)') }}</label>
                        <div class="col-md-6">
                            <input id="in_stock"
                                   type="number"
                                   class="form-control @error('in_stock') is-invalid @enderror"
                                   name="in_stock"
                                   value="{{ $product->in_stock }}"
                                   autocomplete="in_stock"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description"
                               class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <textarea name="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      id="description"
                                      cols="30"
                                      rows="10">{{ $product->description[App::currentLocale()] }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('Thumbnail') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ $product->thumbnailUrl  }}" style="height: 350px" id="thumbnail-preview" alt="">
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="thumbnail" id="thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('Obj_Model') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-img-top" data-object-container style="width: 200px; height: 300px; margin: 0 auto; display: block;">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="obj_model" id="obj_model">
                                    </div>
                            </div>
                        </div>
                    </div>
                        <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('pdf') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="columns download">
                                        <p>
                                            <a href="{{ $product->pdflUrl  }}" class="button" download>
                                                <i class="fa fa-download"></i>Download PDF</a>
                                        </p>
                                    </div>

                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="pdf" id="pdf">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row images-wrapper">
                                        @foreach($product->images as $image)
                                            @if(Storage::has($image->path))
                                                <div class="col-sm-12 d-flex justify-content-center align-items-center">
                                                    <img src="{{ $image->url }}" class="card-img-top" style="max-width: 80%; margin: 0 auto; display: block;">
                                                    <a data-route="{{ route('ajax.images.delete', $image->id) }}"
                                                       class="btn btn-danger remove-product-image">x</a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="file" name="images[]" id="images" multiple>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="form-group row">
                            <div class="col-md-10 text-right">
                                <input type="submit" class="btn btn-info" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    @vite(['resources/js/images-preview.js', 'resources/js/images-actions.js', 'resources/js/nikaModel.build.js'])
    <script>
        window.addEventListener('DOMContentLoaded',function(evt){
            window.obj3d(document.querySelector('[data-object-container]'), "{{ $product->objmodelUrl  }}");
        });
        console.log(document.querySelector('[data-object-container]'));
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
{{--    <script>--}}
{{--        $('#description').summernote({--}}
{{--            tabsize: 2,--}}
{{--            height: 250,--}}
{{--            toolbar: [--}}
{{--                ['style', ['style']],--}}
{{--                ['font', ['bold', 'underline', 'clear']],--}}
{{--                ['color', ['color']],--}}
{{--                ['para', ['ul', 'ol', 'paragraph']],--}}
{{--                ['table', ['table']],--}}
{{--                ['insert', ['link', 'picture', 'video']],--}}
{{--                ['view', ['fullscreen', 'codeview', 'help']]--}}
{{--            ]--}}
{{--        });--}}
{{--    </script>--}}
@endpush

