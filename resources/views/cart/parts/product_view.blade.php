{{--@dd($row);--}}
<div class="cart-list-item">
    <div class="cart-list-item-img">
        <img src="{{ $row->model->thumbnailUrl }}" alt="">
    </div>
    <div class="cart-list-item-descr-wrap">
        <span class="cart-list-item-descr__name text-24 text-black-100">{{ $row->name[App::currentLocale()] }}</span>
        <div class="cart-list-item-descr__row">
            <span class="cart-list-item-descr__row-size text-14 text-black-100"></span>
            <span class="cart-list-item-descr__row-size text-14 text-black-100"></span>
        </div>
        <div class="cart-list-item-descr__row">
            <div class="cart-list-item-descr__row-code text-14 text-black-100">Артикул:</div>
            <div class="cart-list-item-descr__row-code text-14 text-black-100"> {{ $row->options->SKU }}</div>
        </div>
    </div>
    <span class="cart-list-item-descr__quantity">
                    <div class="cart-list-item-descr__quantity-container">
                        <input type="number"
                               min="1"
                               value="{{ $row->qty }}"
                               max="{{ $row->model->in_stock }}"
                               name="product_count"
                               class="cart-list-item-descr__quantity-container__input-value"
                               data-route="{{ route('ajax.cart.count.update', $row->id) }}" data-row-id="{{$row->rowId}}"
                        >

                    <div class="cart-list-item-descr__quantity-buttons">
                      <button  class="cart-increment-btn product-page-item-info__row-quantity-increment text-14 text-black">
                        <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve">
                          <path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
                        </svg>
                      </button>
                      <button  class= "cart-decrement-btn product-page-item-info__row-quantity-decrement text-14 text-black">
                          <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve">
                            <path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
                          </svg>
                      </button>
                    </div>
                  </div>
                </span>
    <span class="cart-list-item-descr__price text-18 text-black-100">  </span>
    <button class="cart-list-item-delete">
        <form action="{{ route('cart.remove') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{ $row->rowId }}" name="rowId">
            <input type="submit" class="cart-list-item-delete__input" value="{{ __('') }}">
        </form>

        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">

            <path d="M1 11L11 1L1 11ZM11 11L1 1L11 11Z" fill="#C8102E"></path>
            <path d="M11 11L1 1M1 11L11 1L1 11Z" stroke="white" stroke-width="2"></path>
        </svg>
    </button>
</div>
