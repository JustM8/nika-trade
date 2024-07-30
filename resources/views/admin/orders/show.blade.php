@extends('layouts.admin')
@section('content')
    <div class="container">
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
            <div class="col-md-6">
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.ID') }}</p>
                    <p>{{$order->id}}</p>
                </div>
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.company_name') }}</p>
                    <p>{{$order->company_name}}</p>
                </div>
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.phone') }}</p>
                    <p>{{$order->phone}}</p>
                </div>
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.email') }}</p>
                    <p>{{$order->email}}</p>
                </div>
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.delivery_type') }}</p>
                    @switch($order->delivery_type)
                        @case(1)
                            Самовивіз - Михайлівка-Рубежівка (виробнича база)
                        @break;
                        @case(2)
                            Доставка в офіс м. Київ
                        @break;
                        @case(3)
                            Доставка в офіс м. Дніпро
                        @break;
                        @case(4)
                            Доставка перевізником (по Україні)
                        @break;
                        @case(5)
                            Доставка по Києву
                        @break;
                    @endswitch
                </div>
                @if(!empty($order->phone_delivery))
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.phone_delivery') }}</p>
                    <p>{{$order->phone_delivery}}</p>
                </div>
                @endif
                @if(!empty($order->city))
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.city') }}</p>
                    <p>{{$order->city}}</p>
                </div>
                @endif
                @if(!empty($order->address))
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.address') }}</p>
                    <p>{{$order->address}}</p>
                </div>
                @endif
                @if(!empty($order->delivery_info['carrier']))
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.carrier') }}</p>
                    <p>{{$order->delivery_info['carrier']}}</p>
                </div>
                @endif
                @if(!empty($order->delivery_info['branch_number']))
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.branch_number') }}</p>
                    <p>{{$order->delivery_info['branch_number']}}</p>
                </div>
                @endif
                @if(!empty($order->comment))

                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.comment') }}</p>
                    <p>{{$order->comment}}</p>
                </div>
                @endif
                @if(!empty($order->comment_color))
                <div class="form-group row" style="display: flex; flex-wrap: nowrap; justify-content: space-evenly;">
                    <p>{{ __('order.comment_color') }}</p>
                    <p>{{$order->comment_color}}</p>
                </div>
                @endif
            </div>
            <hr>
            <div class="thank-page-list-wrap">
                <div class="thank-page-list__title-wrap">
                    <span class="thank-page-list__title text-24 text-black-100">{{ __('order.orderInfo') }}:</span>
                </div>
                @foreach($order->products as $product)
                    @if($product->parent_id != null)
                    <div class="thank-page-list-item">
                        <div class="thank-page-list-item-row">
                            <span class="thank-page-list-item__key text-14 text-black"> {{ __('product.Name') }}: </span>
                            <span class="thank-page-list-item__value text-14 text-black">{{$product->title[App::currentLocale()]}}</span>
                        </div>
                        <div class="thank-page-list-item-row">
                            <span class="thank-page-list-item__key text-14 text-black">{{ __('product.quantity') }}: </span>
                            <span class="thank-page-list-item__value text-14 text-black">{{$product->pivot->quantity}}</span>
                        </div>
                        <div class="thank-page-list-item-row">
                            <span class="thank-page-list-item__key text-14 text-black">{{ __('product.SKU') }}:<span></span> </span>
                            <span class="thank-page-list-item__value text-14 text-black">{{$product->SKU}}</span>
                        </div>
                        <div class="thank-page-list-item-row">
                            <span class="thank-page-list-item__key text-14 text-black">{{ __('product.price') }}: </span>
                            <span class="thank-page-list-item__value text-14 text-black">{{$product->pivot->single_price}}</span>
                        </div>
                    </div>
                    @endif
                @endforeach
                <div class="thank-page-list-item thank-page-list-item-details">
                    <div class="thank-page-list-item-row">
                        <span class="thank-page-list-item__key text-14 text-black">{{ __('order.ID') }}: </span>
                        <span class="thank-page-list-item__value text-14 text-black">{{ $order->id }}</span>
                    </div>
                    <div class="thank-page-list-item-row">
                        <span class="thank-page-list-item__key text-14 text-black">{{ __('order.Total') }}: </span>
                        <span class="thank-page-list-item__value text-14 text-black">{{ $order->total }} грн.</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="/admin/orders" class="btn btn-primary">{{ __('order.orderReturnBtn') }}</a>
            </div>
        </div>

    </div>
@endsection
