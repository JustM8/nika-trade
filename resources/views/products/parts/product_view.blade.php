<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img src="{{ $product->thumbnailUrl }}" height="400" class="card-img-top"
             style="max-width: 100%; margin: 0 auto; display: block;">
        <div class="card-body">
            <p class="card-title">{{ $product->title[App::currentLocale()] }}</p>
            <hr>
            <p class="card-text">{{ __($product->short_description) }}</p>
            <div class="d-flex flex-column justify-content-center align-items-start">
                <div class="btn-group d-flex justify-content-between w-100 align-items-center">
                    <small class="text-muted">Categories: </small>
{{--                    @dd($paramsString);--}}
                    <a href="{{ route('categories.show', $product->category) }}" class="text-muted">
                        {{ __($product->category?->name[App::currentLocale()] ?? '') }}
                    </a>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('product.show', $product) }}"
                       class="btn btn-sm btn-outline-dark">
                        {{ __('Show') }}
                    </a>
                </div>
                <div class="text-muted">
                    @if ($product->price !== $product->end_price)
                        <span class="text-muted old-price">{{ $product->price }} {{ __('product_view.грн') }}</span>
                    @endif
                    <span class="text-muted">{{ $product->end_price }}$</span>
                </div>
            </div>
        </div>
    </div>
</div>
