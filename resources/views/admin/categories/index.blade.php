@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('index.Categories') }}</h3>
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
                        <th class="text-center" scope="col">{{ __('index.ID') }}</th>
                        <th class="text-center" scope="col">{{ __('index.Name') }}</th>
{{--                        <th class="text-center" scope="col">{{ __('index.Description') }}</th>--}}
                        <th class="text-center" scope="col">{{ __('index.Products') }}</th>
                        <th class="text-center" scope="col">{{ __('index.Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="text-center" scope="col">{{ $category->id }}</td>
                            <td class="text-center" scope="col">{{ $category->name[App::currentLocale()] }}</td>
                            <td class="text-center" scope="col">{{ $category->products_count }}</td>
                            <td class="text-center" scope="col">
                                <a href="{{ url(route('admin.categories.edit', $category) . '?' . http_build_query(request()->query())) }}" class="btn btn-info form-control">{{ __('index.Edit') }}</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger form-control" value="{{ __('index.Remove') }}">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
