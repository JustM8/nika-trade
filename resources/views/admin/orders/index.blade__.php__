@extends('layouts.admin')
@section('content')
    <div class="container">
{{--        <nav class="navbar navbar-light bg-light rounded product-navbar">--}}
{{--            <form action="{{ route('admin.products.index') }}" method="GET" class="form-inline product-navbar__search-form">--}}
{{--                <input class="form-control mr-sm-3" type="text" name="search" value="{{ request('search') }}" placeholder="Введіть SKU">--}}
{{--                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Шукати</button>--}}
{{--            </form>--}}
{{--            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-dark">{{__('product.All')}}</a>--}}
{{--        </nav>--}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('order.Orders') }}</h3>
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
                        <th class="text-center" scope="col">{{ __('order.ID') }}</th>
                        <th class="text-center" scope="col">{{ __('order.Data') }}</th>
                        <th class="text-center" scope="col">{{ __('order.company_name') }}</th>
                        <th class="text-center" scope="col">{{ __('order.Total') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key=>$order)
                        <tr @if($key%2==0) class="table-secondary product-table-sec" @endif>
                            <td class="text-center" scope="col">{{ $order->id }}</td>
                            <td class="text-center" scope="col">{{ $order->created_at }}</td>
                            <td class="text-center" scope="col">{{ $order->company_name }}</td>
                            <td class="text-center" scope="col">{{ $order->total }}</td>
                            <td class="text-center" scope="col">
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-outline-success form-control">{{ __('order.View') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
