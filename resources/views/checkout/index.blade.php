@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('index.Checkout') }}</h3>
                @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
            </div>
            <div class="col-md-8">
                <form id="order-form" action="{{ route('order.create') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('index.Company name') }}</label>
                        <div class="col-md-6">
                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('index.Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth()->user()->name }}" autocomplete="name" autofocus>
                        </div>
                    </div>

{{--                    <div class="form-group row">--}}
{{--                        <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('index.Surname') }}</label>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ Auth()->user()->surname }}" autocomplete="surname" autofocus>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('index.E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth()->user()->email }}" autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('index.Phone Number') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth()->user()->phone }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_delivery" class="col-md-4 col-form-label text-md-right">{{ __('index.Phone Delivery') }}</label>

                        <div class="col-md-6">
                            <input id="phone_delivery" type="tel" class="form-control @error('phone_delivery') is-invalid @enderror" name="phone_delivery" value="{{ old('phone_delivery') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('index.City') }}</label>

                        <div class="col-md-6">
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('index.Address') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('index.Comment') }}</label>

                        <div class="col-md-6">
                            <textarea id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment">{{old('comment')}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="delivery_type" class="col-md-4 col-form-label text-md-right">{{ __('index.Delivery type') }}</label>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_type" id="delivery_type_1" value="1" checked>
                                <label class="form-check-label" for="delivery_type_1">
                                    {{ __('index.Самовивіз') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_type" id="delivery_type_2"  value="2">
                                <label class="form-check-label" for="delivery_type_2">
                                    {{ __('index.Доставка в офіс Київ') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_type" id="delivery_type_3"  value="3">
                                <label class="form-check-label" for="delivery_type_3">
                                    {{ __('index.Доставка в офіс Дніпро') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_type" id="delivery_type_4"  value="4">
                                <label class="form-check-label" for="delivery_type_4">
                                    {{ __('index.Доставка перевізником (по Україні)') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit">{{ __('index.Make order') }}</button>
                </form>
            </div>
            <div class="col-md-4">
                <table class="table table-light">
                    <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('index.Product') }}</th>
                        <th>{{ __('index.Qty') }}</th>
                        <th>{{ __('index.Price') }}</th>
                        <th>{{ __('index.Subtotal') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::instance('cart')->content() as $cartItem)
                        <tr>
                            <td>
                                <img src="{{ $cartItem->model->thumbnailUrl }}" alt="{{ $cartItem->name[App::currentLocale()] }}" style="width: 50px;">
                            </td>
                            <td>
                                <a href="{{ route('product.show', $cartItem->id) }}"><strong>{{ $cartItem->name[App::currentLocale()] }}</strong></a>
                            </td>
                            <td>{{ $cartItem->qty }}</td>
                            <td>{{ $cartItem->price }}$</td>
                            <td>{{ $cartItem->subtotal }}$</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <table class="table table-dark">
                    <tbody>
                    <tr>
                        <td colspan="2">&nbsp</td>
                        <td>{{ __('index.Subtotal') }}</td>
                        <td>{{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp</td>
                        <td>{{ __('index.Tax') }}</td>
                        <td>{{ Cart::tax() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp</td>
                        <td>{{ __('index.Total') }}</td>
                        <td>{{ Cart::total() }}</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="col-12">
{{--                    @include('checkout.payments.paypal')--}}
                </div>
            </div>
        </div>
    </div>
@endsection
