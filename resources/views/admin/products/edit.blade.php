@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('product.Edit product') }}</h3>
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
                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('product.title') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('product.title') is-invalid @enderror"
                                   name="title"
                                   value="{{ $product->title[App::currentLocale()] }}"
                                   autocomplete="title"
                                   autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('product.slug') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('product.slug') is-invalid @enderror"
                                   name="slug"
                                   value="{{ $product->slug }}"
                                   autocomplete="slug"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.categories') }}</label>
                        <div class="col-md-6">
                            <select id="category"
                                    class="form-control @error('product.category') is-invalid @enderror"
                                    name="category[]"  {{-- оновлене ім'я поля --}}
                                    multiple
                            >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}
                                    >{{ $category->name[App::currentLocale()] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="Parent"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.parent') }}</label>
                        <div class="col-md-6">
                            <select id="Parent"
                                    class="form-control @error('product.parent') is-invalid @enderror"
                                    name="parent_id"
                            ><option value="">No parent</option>
                                @foreach($parents as $child)
                                    @if($child->id != $product->id)
                                        <option value="{{ $child->id }}"
                                            {{ $child->id === $product->parent_id ? 'selected' : '' }}
                                        >{{ $child->title[App::currentLocale()] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="SKU" class="col-md-4 col-form-label text-md-right">{{ __('product.SKU') }}</label>
                        <div class="col-md-6">
                            <input id="SKU"
                                   type="text"
                                   class="form-control @error('product.SKU') is-invalid @enderror"
                                   name="SKU"
                                   value="{{ $product->SKU }}"
                                   autocomplete="SKU"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('product.price') }}</label>
                        <div class="col-md-6">
                            <input id="price"
                                   type="text"
                                   class="form-control @error('product.price') is-invalid @enderror"
                                   name="price"
                                   value="{{ $product->price }}"
                                   autocomplete="price"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('product.discount') }}</label>
                        <div class="col-md-6">
                            <input id="discount"
                                   type="text"
                                   class="form-control @error('product.discount') is-invalid @enderror"
                                   name="discount"
                                   value="{{ $product->discount }}"
                                   autocomplete="discount"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="in_stock"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.Quantity') }}</label>
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
                               class="col-md-4 col-form-label text-md-right">{{ __('product.description') }}</label>
                        <div class="col-md-6">
                            <textarea name="description"
                                      class="form-control @error('product.description') is-invalid @enderror"
                                      id="description"
                                      cols="30"
                                      rows="10">{{ $product->description[App::currentLocale()] }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="recommended_id" class="col-md-4 col-form-label text-md-right">{{ __('product.Recommended product') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="recommended_id[]" id="recommended_id" multiple>
                                <option value="">Open this select menu</option>
                                @foreach($products as $item)
                                    @if( $recommendedProducts->contains($item->id))
                                        <option selected value="{{$item->id}}">{{$item->title[App::currentLocale()]}}</option>
                                    @else
                                        <option value="{{$item->id}}">{{$item->title[App::currentLocale()]}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('product.Thumbnail') }}</label>
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
                               class="col-md-4 col-form-label text-md-right">{{ __('product.Obj_Model') }}</label>
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
                               class="col-md-4 col-form-label text-md-right">{{ __('product.pdf') }}</label>
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
                        <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('product.Images') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row images-wrapper">
{{--                                        @dd($product->images);--}}
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
@endpush

