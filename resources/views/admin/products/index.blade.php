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
                <h3 class="text-center">{{ __('product.Products') }}
                    @if(!empty($_GET['category']))
                        - {{$selectedCategoryData->name[App::currentLocale()]}}
                    @endif
                </h3>
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
                        <th class="text-center" scope="col">

                        </th>
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
                                    @include('categories.parts.category_view', ['category' => $product->category,'type'=>'products'])
                                @else
                                    @include('categories.parts.categories_view', ['category' => $product->categories,'type'=>'products'])
                                @endif
                            </td>
                            <td class="text-center" scope="col">{{ $product->price }}</td>
                            <td class="text-center" scope="col">
                                <a href="{{ url(route('admin.products.edit', $product) . '?' . http_build_query(request()->query())) }}" class="btn btn-info form-control">{{ __('product.Edit') }}</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger form-control" onclick="confirmDelete(this)">{{ __('product.Remove') }}</button>
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
@push('footer-scripts')
    @vite(['resources/js/delete.js'])
@endpush
