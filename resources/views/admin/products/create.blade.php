@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('product.Create product') }}</h3>
                <hr>
            </div>
            <div class="col-md-12">
                @if ($errors->any())
{{--                    @dd($errors->all())--}}
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
                <form action="{{ route('admin.products.store', request()->query()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('product.Title') }}</label>
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
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('product.Slug') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   name="slug"
                                   value="{{ old('slug') }}"
                                   autocomplete="slug"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('product.priority') }}</label>
                        <div class="col-md-6">
                            <input
                                name="priority"
                                class="form-control"
                                type="text"
                                id="priority"
                            >

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="is_public" class="col-md-4 col-form-label text-md-right">{{ __('product.is_public') }}</label>
                        <div class="col-md-6">
                            <input
                                name="is_public"
                                class="form-check-input"
                                type="checkbox"
                                id="is_public"
                            >

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.Categories') }}</label>
                        <div class="col-md-6">
                            <select name="category[]"
                                    id="category"
                                    class="form-control @error('category') is-invalid @enderror"
                                    multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'][App::currentLocale()] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="category"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.Parent products') }}</label>
                        <div class="col-md-6">
                            <select id="category"
                                    class="form-control @error('parent_id') is-invalid @enderror"
                                    name="parent_id">
                                <option value="">{{ __('product.No parent') }}</option>
                                @foreach($products as $child)
                                    <option value="{{$child->id}}">{{$child->title[App::currentLocale()]}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
{{--                    sku--}}
                    <div class="form-group row">
                        <label for="SKU" class="col-md-4 col-form-label text-md-right">{{ __('product.SKU') }}</label>
                        <div class="col-md-6">
                            <input id="SKU"
                                   type="text"
                                   class="form-control @error('SKU') is-invalid @enderror"
                                   name="SKU"
                                   value="{{ old('SKU') }}"
                                   autocomplete="SKU"
                                   autofocus
                            >
                        </div>
                    </div>
{{--                    price--}}
                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('product.Price') }}</label>
                        <div class="col-md-6">
                            <input id="price"
                                   type="text"
                                   class="form-control @error('price') is-invalid @enderror"
                                   name="price"
                                   value="{{ old('price') }}"
                                   autocomplete="price"
                                   autofocus
                            >
                        </div>
                    </div>
{{--                    discount--}}
                    <div class="form-group row">
                        <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('product.Discount') }}</label>
                        <div class="col-md-6">
                            <input id="discount"
                                   type="text"
                                   class="form-control @error('discount') is-invalid @enderror"
                                   name="discount"
                                   value="0"
                                   autocomplete="discount"
                                   autofocus
                            >
                        </div>
                    </div>
{{--                    in stock--}}
                    <div class="form-group row"  style="display: none;">
                        <label for="in_stock"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.In Stock (Quantity)') }}</label>
                        <div class="col-md-6">
                            <input id="in_stock"
                                   type="number"
                                   class="form-control @error('in_stock') is-invalid @enderror"
                                   name="in_stock"
                                   value="999"
                                   autocomplete="in_stock"
                                   autofocus
                            >
                        </div>
                    </div>
{{--                    decsription--}}
                    <div class="form-group row">
                        <label for="description"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.Description') }}</label>
                        <div class="col-md-6">
                            <textarea name="description"
                                      class="form-control"
                                      id="description"
                                      cols="30"
                                      rows="10">{{ old('description') }}</textarea>
                        </div>
                    </div>
{{--                    --}}
                    <div class="form-group row">
                        <label for="recommended_id" class="col-md-4 col-form-label text-md-right">{{ __('product.Recommended product') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="recommended_id[]" id="recommended_id" multiple>

                                @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->SKU}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

{{--img--}}
                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.Thumbnail') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="#" id="thumbnail-preview" alt=""  class="w-100">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="thumbnail" id="thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    obj_model--}}
                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.obj_model') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="#" id="obj_model-preview" alt="" class="w-100">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="obj_model" id="obj_model">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                    obj_model 2--}}
                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.obj_model_2') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="#" id="obj_model_2-preview" alt="">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="obj_model_2" id="obj_model_2">
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    pdf--}}
                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('pdf') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="#" id="pdf-preview" alt="">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="pdf" id="pdf">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('product.Images') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row images-wrapper"></div>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="images[]" id="images" multiple>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 text-right">
                            <input type="submit" class="btn btn-info" value="{{ __('product.Create') }}">
                        </div>
                    </div>
                </form>
                <form>
                    <div class="form-group row">
                        <div class="col-md-10 text-right">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-dark">{{ __('product.Cancel')}}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('footer-scripts')
    @vite(['resources/js/images-preview.js', 'resources/js/select.js', 'resources/js/summernote.js'])
@endpush

