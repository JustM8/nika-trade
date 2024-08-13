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
                            @foreach($gallery->data[App::currentLocale()] as $key=>$item)
                            <div class="form-group row">
                                <label for="row_{{$key+1}}"  class="col-md-4 col-form-label text-md-right">{{ __('gallery.row_'.$key) }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="row_{{$key+1}}" placeholder="{{ __('gallery.row_'.$key) }}" name="data[fields][{{$key}}][row]" value="{{$item['row']}}">
                                </div>
                            </div>
                            @endforeach

                            <div class="form-group row">
                                <label for="thumbnail"
                                       class="col-md-4 col-form-label text-md-right">{{ __('gallery.Thumbnail') }}</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="mb-3">
                                            <input class="form-control" type="file" name="thumbnail" id="thumbnail">
                                        </div>
                                        <div class="col-md-12">
                                            @if(Storage::has($gallery->thumbnail) && !empty($gallery->thumbnail))
                                                <img src="{{ $gallery->thumbnailUrl}}" class="img-fluid img-thumbnail" id="thumbnail-preview" alt="">
                                            @endif
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
@endpush
