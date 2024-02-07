@extends('layouts.admin')
@section('content')
    <div class="container">
        <nav class="navbar navbar-light bg-light rounded product-navbar">
            <form action="{{ route('admin.products.index') }}" method="GET" class="form-inline product-navbar__search-form">
                <input class="form-control mr-sm-3" type="text" name="search" value="{{ request('search') }}" placeholder="Введіть SKU">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Шукати</button>
            </form>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-dark">{{__('product.All')}}</a>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('product.Products') }}</h3>
            </div>
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">{{ __('product.Thumbnail') }}</th>
                        <th class="text-center" scope="col">{{ __('product.title') }}</th>
                        <th class="text-center" scope="col">{{ __('product.SKU') }}</th>
                        <th class="text-center" scope="col">{{ __('product.categories') }}</th>
                        <th class="text-center" scope="col">{{ __('product.price') }}</th>
                        <th class="text-center" scope="col"><a href="{{ route('admin.products.index') }}" class=" btn btn-outline-dark">{{__('product.All')}}</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $key=>$product)
                        <tr @if($key%2==0) class="table-secondary product-table-sec" @endif>
                            <td class="text-center" scope="col">{{ $product->id }}</td>
                            <td class="text-center" scope="col">
                                <img src="{{ $product->thumbnailUrl }}" width="100" height="100" alt=""></td>
                            <td class="text-center" scope="col">{{ $product->title[App::currentLocale()] }}</td>
                            <td class="text-center" scope="col">{{ $product->SKU }}</td>
                            <td class="text-center" scope="col">
                                @if(!empty($product->category))
                                    @include('categories.parts.category_view', ['category' => $product->category])
                                @else
                                    @include('categories.parts.categories_view', ['category' => $product->categories])
                                @endif
                            </td>
                            <td class="text-center" scope="col">{{ $product->price }}</td>
                            <td class="text-center" scope="col">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-info form-control">{{ __('product.Edit') }}</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger form-control" value="{{ __('product.Remove') }}">
                                </form>
                                {{--                                    <a href="{{ route('products.show', $product) }}" class="btn btn-outline-success form-control">View</a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
