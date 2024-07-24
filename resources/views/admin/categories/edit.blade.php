@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('category.Edit Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.categories.update', array_merge(['category' => $category], request()->query())) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('category.Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ @$category->name[App::currentLocale()] }}" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('category.Slug') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $category->slug }}" required>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="category"
                                       class="col-md-4 col-form-label text-md-right">{{ __('category.Parent Categories') }}</label>
                                <div class="col-md-6">
                                    <select id="category"
                                            class="form-control @error('category') is-invalid @enderror"
                                            name="parent_id"
                                    ><option value="">{{ __('category.No parent') }}</option>
                                        @foreach($parents as $child)
                                          @if($child['id'] != $category->id)
                                                <option value="{{ $child['id'] }}"
                                                    {{ $child['id'] === $category->parent_id ? 'selected' : '' }}
                                                >{{ $child['name'][App::currentLocale()] }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_title" class="col-md-4 col-form-label text-md-right">{{ __('category.post_title') }}</label>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                <textarea name="post_title" id="post_title" class="form-control  @error('post_title') is-invalid @enderror" placeholder="{{ __('category.Leave a comment here') }}" id="post_title" style="height: 250px">
                                    @if(!empty($category->post_title))
                                        {{$category->post_title[App::currentLocale()]}}
                                    @endif
                                </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('category.Description') }}</label>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" placeholder="{{ __('category.Leave a comment here') }}" id="description" style="height: 250px">
                                    @if(!empty($category->description))
                                        {{$category->description[App::currentLocale()]}}
                                    @endif
                                </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('category.Description Left') }}</label>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                <textarea name="description_l" id="description_l" class="form-control  @error('description_l') is-invalid @enderror" placeholder="{{ __('category.Leave a comment here') }}" id="description_l" style="height: 250px">
                                    @if(!empty($category->description_l))
                                        {{$category->description_l[App::currentLocale()]}}
                                    @endif
                                </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('category.Description Right') }}</label>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                <textarea name="description_r" id="description_r" class="form-control  @error('description_r') is-invalid @enderror" placeholder="{{ __('category.Leave a comment here') }}" id="description_r" style="height: 250px">
                                    @if(!empty($category->description_r))
                                        {{$category->description_r[App::currentLocale()]}}
                                    @endif
                                </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="thumbnail"
                                       class="col-md-4 col-form-label text-md-right">{{ __('category.Thumbnail') }}</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if(!empty($category->thumbnail))
                                                @if(Storage::has($category->thumbnail))
                                                <img src="{{ $category->thumbnailUrl}}" id="thumbnail-preview" alt="">
                                                @endif
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" type="file" name="thumbnail" id="thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('category.Update') }}</button>
                                </div>
                            </div>

                        </form>
                        <form>
                            <div class="form-group row">
                                <div class="col-md-10 text-right">
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark">{{ __('category.Cancel')}}</a>
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
