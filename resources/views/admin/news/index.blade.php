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
                        <th class="text-center" scope="col">{{ __('news.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
{{--                        @dd($new);--}}
                        <tr>
                            <td class="text-center" scope="col">{{ $new->id }}</td>
                            <td class="text-center" scope="col"><img src="{{ $new->thumbnailUrl }}" width="100" height="100" alt=""></td>
                            <td class="text-center" scope="col">{{ $new->slug }}-
                                @if(array_key_exists( App::currentLocale(), $new->title))
                                    {{$new->title[App::currentLocale()]}}
                                @else
                                    Empty lang for that lang
                                @endif
                            </td>
                            <td class="text-center" scope="col">
                                <a href="{{ route('admin.news.edit', $new) }}" class="btn btn-info form-control">{{ __('news.Edit') }}</a>
                                <form action="{{ route('admin.news.destroy', $new) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger form-control" value="{{ __('news.Remove') }}">
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

{{--    @foreach($news as $item)--}}
{{--        <b>Slug</b> - {{$item->slug}}--}}
{{--        @foreach($item->content[App::currentLocale()] as $key=>$row)--}}
{{--            <p><span>{{$key}}</span>-<span>{{$row}}</span></p>--}}
{{--        @endforeach--}}
{{--    @endforeach--}}
@endsection
@push('footer-scripts')

@endpush
