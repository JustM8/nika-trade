@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('service.Create Service') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.main.update',$mainPage) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
{{--                            <div class="images-wrapper"></div>--}}
                            <div class="form-group row">
                                <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row images-wrapper">
                                                @foreach($mainPage->images as $key=>$image)
                                                    @if(Storage::has($image->path))
                                                        <div class="col-sm-12 d-flex justify-content-center align-items-center">
                                                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('service.title') }}</label>
                                                                <div class="col-md-6">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           id="title"
                                                                           placeholder="{{ __('service.title') }}"
                                                                           name="data[slider][{{$key}}][row]"
                                                                           value="{{$mainPage->data[App::currentLocale()][$key]['row'] }}">
                                                                </div>
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


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Store') }}</button>
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
    @vite(['resources/js/images-preview-slider.js', 'resources/js/images-actions-slider.js'])
@endpush
