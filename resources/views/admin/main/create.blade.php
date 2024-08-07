@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('main.Create Main Page Data') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.main.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h5>{{ __('main.Відділ продажів:') }}</h5>
                            <h6>{{ __('main.КИЇВ (ГОЛОВНИЙ ОФІС)') }}</h6>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.number') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.number') }}" name="data[fields][0][0][row]">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.number') }} 2</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.number') }} 2" name="data[fields][0][1][row]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.email') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.email') }}" name="data[fields][0][2][row]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('main.address') }}</label>
                                <div class="col-md-6">
                                <textarea name="data[fields][0][3][row]"
                                          class="form-control"
                                          id="post_title"
                                          cols="20"
                                          rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.url') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.url') }}" name="data[fields][0][4][row]">
                                </div>
                            </div>

<hr>
                            <h6>{{ __('main.ДНІПРО (ПРЕДСТАВНИЦТВО)') }}</h6>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.number') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.number') }}" name="data[fields][1][0][row]">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.number') }} 2</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.number') }} 2" name="data[fields][1][1][row]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.email') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.email') }}" name="data[fields][1][2][row]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('main.address') }}</label>
                                <div class="col-md-6">
                                <textarea name="data[fields][1][3][row]"
                                          class="form-control"
                                          id="post_title"
                                          cols="20"
                                          rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.url') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.url') }}" name="data[fields][1][4][row]">
                                </div>
                            </div>

<hr>
                            <h5>{{ __('main.Соцмережі:') }}</h5>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.telegram') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.telegram') }}" name="data[fields][social][telegram]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.viber') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.viber') }}" name="data[fields][social][viber]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.instagram') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.instagram') }}" name="data[fields][social][instagram]">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.facebook') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.facebook') }}" name="data[fields][social][facebook]">
                                </div>
                            </div>
<hr>

{{--                            <div class="images-wrapper"></div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <input class="form-control" type="file" name="images[]" id="images" multiple>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('main.Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <form>
                            <div class="form-group row">
                                <div class="col-md-10 text-right">
                                    <a href="{{ route('admin.main.index') }}" class="btn btn-outline-dark">{{ __('main.Cancel')}}</a>
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
{{--    @vite(['resources/js/images-preview-slider.js'])--}}
@endpush
