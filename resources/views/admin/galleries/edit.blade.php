@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('gallery.Edit Gallery') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.galleries.update', $gallery) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('gallery.Date') }}</label>
                                <div class="col-md-6">
                                    <input id="date"
                                           type="date"
                                           class="form-control @error('date') is-invalid @enderror"
                                           name="date"
                                           value="{{ $gallery->date }}"
                                           autocomplete="date"
                                           autofocus
                                           required
                                    >
                                </div>
                            </div>

                            @foreach($gallery->data[App::currentLocale()] as $key=>$item)
                                @php
                                    $val = $item['row'];

                                @endphp
                                <div class="form-group row">
                                    <label for="row_{{$key+1}}"  class="col-md-4 col-form-label text-md-right">{{ __('gallery.row_'.$key) }}</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="row_{{$key+1}}" placeholder="{{ __('gallery.row_'.$key) }}" name="data[fields][{{$key}}][row]" value=" @if(is_string($val))
                                    {{ $val }}
                                @endif">
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group row">
                                <label for="category"
                                       class="col-md-4 col-form-label text-md-right">{{ __('gallery.categories') }}</label>
                                <div class="col-md-6">
                                    <select id="category"
                                            class="my_select_box form-control @error('gallery.category') is-invalid @enderror"
                                            name="category[]"  {{-- оновлене ім'я поля --}}
                                            multiple
                                    >
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    {{ in_array($category->id, $gallery->categories->pluck('id')->toArray()) ? 'selected' : '' }}
                                            >{{ $category->name[App::currentLocale()] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--                            <div class="form-group row">--}}
                            {{--                                <label for="thumbnail"--}}
                            {{--                                       class="col-md-4 col-form-label text-md-right">{{ __('gallery.Thumbnail') }}</label>--}}
                            {{--                                <div class="col-md-6">--}}
                            {{--                                    <div class="row">--}}
                            {{--                                        <div class="mb-3">--}}
                            {{--                                            <input class="form-control" type="file" name="thumbnail" id="thumbnail">--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="col-md-12">--}}
                            {{--                                            @if(Storage::has($gallery->thumbnail) && !empty($gallery->thumbnail))--}}
                            {{--                                                <img src="{{ $gallery->thumbnailUrl}}" class="img-fluid img-thumbnail" id="thumbnail-preview" alt="">--}}
                            {{--                                            @endif--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="form-group row">
                                <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('product.Images') }}</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row images-wrapper">
                                                @foreach($gallery->images as $image)
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
                                            <input class="form-control"  type="file" name="images[]" id="images" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('index.Update') }}</button>
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
@endpush
