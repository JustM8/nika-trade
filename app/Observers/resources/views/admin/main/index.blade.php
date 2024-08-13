@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('Services') }}</h3>
            </div>
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <table class="table align-self-center">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col">ID</th>
{{--                        <th class="text-center" scope="col">Image</th>--}}
                        <th class="text-center" scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mainPage as $page)
                        <tr>
                            <td class="text-center" scope="col">{{ $page->id }}</td>
{{--                            <td class="text-center" scope="col"><img src="{{ $page->thumbnailUrl }}" width="100" height="100" alt=""></td>--}}
                            <td class="text-center" scope="col">
                                <a href="{{ route('admin.main.edit', ['mainPage' => $page]) }}" class="btn btn-info form-control">Edit</a>
                                <form action="{{ route('admin.main.destroy', $page) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger form-control" value="Remove">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--                {{ $galleries->links() }}--}}
            </div>
        </div>
    </div>
@endsection
