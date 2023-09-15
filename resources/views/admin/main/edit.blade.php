@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('main.Edit Main Page Data') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.main.update',$mainPage) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
{{--                            <div class="images-wrapper"></div>--}}
                            <h5>Відділ продажів:</h5>
                            <h6>КИЇВ (ГОЛОВНИЙ ОФІС)</h6>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.number') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.number') }}" name="data[fields][0][0][row]" value="{{$mainPage->data[App::currentLocale()]['fields'][0][0]['row']}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.email') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.email') }}" name="data[fields][0][1][row]"  value="{{$mainPage->data[App::currentLocale()]['fields'][0][1]['row']}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('main.address') }}</label>
                                <div class="col-md-6">
                                <textarea name="data[fields][0][2][row]"
                                          class="form-control"
                                          id="post_title"
                                          cols="20"
                                          rows="5">{{$mainPage->data[App::currentLocale()]['fields'][0][2]['row']}}</textarea>
                                </div>
                            </div>

                            <hr>
                            <h6>ДНІПРО (ПРЕДСТАВНИЦТВО)</h6>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.number') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.number') }}" name="data[fields][1][0][row]"  value="{{$mainPage->data[App::currentLocale()]['fields'][1][0]['row']}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.email') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.email') }}" name="data[fields][1][1][row]"  value="{{$mainPage->data[App::currentLocale()]['fields'][1][1]['row']}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('main.address') }}</label>
                                <div class="col-md-6">
                                <textarea name="data[fields][1][2][row]"
                                          class="form-control"
                                          id="post_title"
                                          cols="20"
                                          rows="5">{{$mainPage->data[App::currentLocale()]['fields'][1][2]['row']}}</textarea>
                                </div>
                            </div>


                            <hr>
                            <h5>Соцмережі:</h5>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.telegram') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.telegram') }}" name="data[fields][social][telegram]"  value="{{$mainPage->data[App::currentLocale()]['fields']['social']['telegram']}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.viber') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.viber') }}" name="data[fields][social][viber]" value="{{$mainPage->data[App::currentLocale()]['fields']['social']['viber']}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.instagram') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.instagram') }}" name="data[fields][social][instagram]" value="{{$mainPage->data[App::currentLocale()]['fields']['social']['instagram']}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"  class="col-md-4 col-form-label text-md-right">{{ __('main.facebook') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="title" placeholder="{{ __('main.facebook') }}" name="data[fields][social][facebook]" value="{{$mainPage->data[App::currentLocale()]['fields']['social']['facebook']}}">
                                </div>
                            </div>
                            <hr>

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
                                                                           value="{{$mainPage->data[App::currentLocale()]['slider'][$key]['row'] }}">
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
