@extends('layouts.admin')
@section('title') {{'Admin - News'}} @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
{{--            {{ App::currentLocale() }}--}}
            <br>
        <div class="col-md-12">
                <table class="table align-self-center">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">{{ __('news.Thumbnail') }}</th>
                        <th class="text-center" scope="col">{{ __('news.Slug') }}</th>
                        <th class="text-center" scope="col">{{ __('news.Date') }}</th>
                        <th class="text-center" scope="col">{{ __('news.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
{{--                        @dd($new);--}}
                        <tr>
                            <td class="text-center" scope="col">{{ $new->id }}</td>
                            <td class="text-center" scope="col"><img src="{{ $new->thumbnailUrl }}" width="100" height="100" alt=""></td>
                            <td class="text-center" scope="col">
                                @if(array_key_exists( App::currentLocale(), $new->title))
                                    {{$new->title[App::currentLocale()]}}
                                @else
                                    Empty lang for that lang
                                @endif
                            </td>
                            <td class="text-center" scope="col">{{$new->date}}</td>
                            <td class="text-center" scope="col">
                                <a href="{{ route('admin.news.edit', $new) }}" class="btn btn-info form-control">{{ __('news.Edit') }}</a>
                                <a href="{{ route('news.show', $new->slug) }}" class="btn btn-primary form-control">{{ __('news.Check') }}</a>
                                <form action="{{ route('admin.news.destroy', $new) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger form-control" onclick="confirmDelete(this)">{{ __('news.Remove') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--                {{ $news->links() }}--}}
        </div>
    </div>
</div>


@endsection
@push('footer-scripts')
    @vite(['resources/js/delete.js'])
@endpush
