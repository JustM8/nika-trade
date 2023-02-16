@extends('layouts.admin')
@section('content')
    {{ App::currentLocale() }}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('Create product') }}</h3>
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
                <form action="{{ route('admin.news.update',$news) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   name="slug"
                                   value="{{ $news->slug  }}"
                                   autocomplete="title"
                                   autofocus
                            >
                        </div>
                    </div>
                    @if(array_key_exists( App::currentLocale(), $news->description))
                        @foreach($news->description[App::currentLocale()] as $key=>$row)
                            <div class="form-group row">
                                <label for="row[{{$key}}]" class="col-md-4 col-form-label text-md-right">{{ __("row[{$key}]") }}</label>
                                <div class="col-md-6">
                                    <input id="row[{{$key}}]"
                                           type="text"
                                           class="form-control @error("row[{$key}]") is-invalid @enderror"
                                           name="row[{{$key}}]"
                                           value="{{ $row }}"
                                           autocomplete="row[{{$key}}]"
                                           autofocus
                                    >
                                </div>
                            </div>
                        @endforeach
                    @else
                        @for($i = 1; $i<=$news->description['count']; $i++)
                            <div class="form-group row">
                                <label for="row[{{$i}}]" class="col-md-4 col-form-label text-md-right">{{ __("row[{$i}]") }}</label>
                                <div class="col-md-6">
                                    <input id="row[{{$i}}]"
                                           type="text"
                                           class="form-control @error("row[{$i}]") is-invalid @enderror"
                                           name="row[{{$i}}]"
                                           value=""
                                           autocomplete="row[{{$i}}]"
                                           autofocus
                                    >
                                </div>
                            </div>
                        @endfor
                    @endif

{{--@dd($news->content[App::currentLocale()]);--}}

                    <div class="form-group row">
                        <div class="col-md-10 text-right">
                            <input type="submit" class="btn btn-info" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('footer-scripts')

@endpush
