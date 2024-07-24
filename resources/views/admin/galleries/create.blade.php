@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('index.Create Gallery') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('gallery.Date') }}</label>
                                <div class="col-md-6">
                                    <input id="date"
                                           type="date"
                                           class="form-control @error('date') is-invalid @enderror"
                                           name="date"
                                           value="{{ old('date', $today) }}"
                                           autocomplete="date"
                                           autofocus
                                           required
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="row_0"  class="col-md-4 col-form-label text-md-right">{{ __('gallery.row_0') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="row_0" placeholder="{{ __('gallery.row_0') }}" name="data[fields][0][row]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="row_1"  class="col-md-4 col-form-label text-md-right">{{ __('gallery.row_1') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="row_1" placeholder="{{ __('gallery.row_1') }}" name="data[fields][1][row]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="row_2"  class="col-md-4 col-form-label text-md-right">{{ __('gallery.row_2') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="row_2" placeholder="{{ __('gallery.row_2') }}" name="data[fields][2][row]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="row_3"  class="col-md-4 col-form-label text-md-right">{{ __('gallery.row_3') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="row_3" placeholder="{{ __('gallery.row_3') }}" name="data[fields][3][row]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="row_4"  class="col-md-4 col-form-label text-md-right">{{ __('gallery.row_4') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="row_4" placeholder="{{ __('gallery.row_4') }}" name="data[fields][4][row]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category"
                                       class="col-md-4 col-form-label text-md-right">{{ __('index.Categories') }}</label>
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

{{--                            <div class="form-group row">--}}
{{--                                <label for="thumbnail" class="col-md-4 col-form-label text-md-right">{{ __('gallery.Thumbnail') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input  class="form-control" type="file" name="thumbnail" id="thumbnail">--}}
{{--                                        <div class="row">--}}
{{--                                            <img src="#" id="thumbnail-preview" alt="">--}}
{{--                                        </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('gallery.Gallery') }}</label>
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

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('gallery.Create') }}</button>
                                </div>
                            </div>
                        </form>
                        <form>
                            <div class="form-group row">
                                <div class="col-md-10 text-right">
                                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-dark">{{ __('gallery.Cancel')}}</a>
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
    @vite(['resources/js/images-preview.js', 'resources/js/select.js'])
@endpush
