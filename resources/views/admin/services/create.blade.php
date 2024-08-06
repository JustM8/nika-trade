@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('service.Create Service') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('service.title') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('service.title') }}" name="data[fields][title]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('service.post title') }}</label>
                                <div class="col-md-6">
                                    <div class="post_title-container">
                                    <textarea name="data[fields][post_title]"
                                          class="form-control"
                                          id="post_title"
                                          cols="20"
                                          rows="5">{{ old('post title') }}</textarea>

                                    </div>
                               
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">{{ __('service.description') }}</label>
                                <div class="col-md-6">
                                <textarea name="data[fields][description]"
                                          class="form-control"
                                          id="description"
                                          cols="30"
                                          rows="10">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right" for="designer">
                                        {{ __('service.designer') }}
                                    </label>
                                <div class="col-md-6 align-items-center">
                                    <input class="form-check-input" type="checkbox" id="designer" name="data[fields][designer]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="designer_price"  class="col-md-4 col-form-label text-md-right">{{ __('service.designer price') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="designer_price" placeholder="{{ __('service.designer price') }}" name="data[fields][designer_price]">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="thumbnail" class="col-md-4 col-form-label text-md-right">{{ __('service.Thumbnail') }}</label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="file" name="thumbnail" id="thumbnail">
                                    <div class="row">
                                        <img src="#" id="thumbnail-preview" alt="" class="w-100">
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('service.Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <form>

                            <div class="form-group row">
                                <div class="col-md-10 text-right">
                                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-dark">{{ __('service.Cancel')}}</a>
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
    
    @vite(['resources/js/images-preview.js', 'resources/js/summernote.js'])
    
@endpush
