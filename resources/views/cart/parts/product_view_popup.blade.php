{{--@dd($row)--}}

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
                    <div class="cart-list-item-descr__row-code text-14 text-black-100">{{ __('cart_popup.Артикул:') }} <span></span></div>
                    <div class="cart-list-item-descr__row-code text-14 text-black-100"> {{ $row->options->SKU }}</div>
                  </div>
                </div>
                <span class="cart-list-item-descr__quantity">
                    <div class="cart-list-item-descr__quantity-container">
                    <form action="{{ route('ajax.cart.count.update', $row->id) }}" data-route="{{ route('ajax.cart.count.update', $row->id) }}" data-row-id="{{$row->rowId}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $row->rowId }}" name="rowId">
                        <input type="text"
                            min="1"
                            value="{{ $row->qty }}"
                            max="{{ $row->model->in_stock }}"
                            name="product_count"
                            class="cart-list-item-descr__quantity-container__input-value"
                        >

                        <div class="cart-list-item-descr__quantity-buttons">
                      <a type="submit"  class="cart-increment-btn product-page-item-info__row-quantity-increment text-14 text-black">
                        <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve">
                          <path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
                        </svg>
</a>
                        <a type="submit" class= "cart-decrement-btn product-page-item-info__row-quantity-decrement text-14 text-black">
                          <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve">
                            <path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
                          </svg>
                          </a>
                      </div>
                    </form>
                  </div>
                </span>
                <span class="cart-list-item-descr__price text-18 text-black-100"> {{$row->qty * $row->price }} </span>
                <div class="cart-list-item-delete">
                  <form data-route="{{ route('ajax.cart.remove') }}" action="{{ route('ajax.cart.remove') }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" value="{{ $row->rowId }}" name="rowId">
                      <!-- <input type="submit"  value="{{ __('') }}"> -->
                      <a type="submit" class="cart-list-item-delete__input"></a>
                  </form>

                  <svg id="icon-trashbin" fill="#ffffff" height="16" width="16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.00 512.00" xml:space="preserve">
                    <path d="M136.546,412.175c1.51,12.018,11.774,21.082,23.876,21.082c1.007,0,2.026-0.064,3.022-0.189 c6.384-0.802,12.072-4.041,16.018-9.122c3.945-5.08,5.678-11.394,4.876-17.776l-22.133-176.139 c-0.803-6.383-4.04-12.072-9.116-16.018c-5.083-3.952-11.403-5.684-17.781-4.875c-6.384,0.802-12.072,4.041-16.018,9.122 c-3.947,5.081-5.678,11.394-4.876,17.776L136.546,412.175z M131.968,228.11c1.316-1.693,3.211-2.773,5.347-3.042 c0.341-0.043,0.683-0.064,1.022-0.064c1.768,0,3.477,0.582,4.896,1.686c1.692,1.315,2.772,3.214,3.04,5.344l22.133,176.139 c0.268,2.127-0.309,4.231-1.626,5.925c-1.315,1.693-3.211,2.773-5.342,3.041c-0.336,0.042-0.679,0.064-1.017,0.064 c-4.027,0-7.441-3.022-7.945-7.028l-22.133-176.139C130.076,231.907,130.653,229.803,131.968,228.11z"></path> <path d="M466.999,69.889h-98.296v-3.355C368.704,29.847,338.856,0,302.169,0h-92.34c-36.686,0-66.534,29.847-66.534,66.533v3.355 H45.001c-16.647,0-30.189,13.542-30.189,30.189v43.52c0,16.647,13.543,30.189,30.189,30.189h5.964l37.56,298.488 c2.85,22.647,22.214,39.726,45.04,39.726h244.872c22.826,0,42.189-17.079,45.04-39.726l37.56-298.488h5.964 c16.647,0,30.189-13.542,30.189-30.189v-43.519C497.189,83.431,483.645,69.889,466.999,69.889z M159.349,66.533h0.003 c0-27.833,22.644-50.477,50.478-50.477h92.339c27.834,0,50.478,22.644,50.478,50.477v3.355h-16.521v-3.355 c0-18.724-15.233-33.957-33.958-33.957h-92.34c-18.724,0-33.958,15.233-33.958,33.957v3.355h-16.521V66.533z M320.071,66.533 v3.355H191.928v-3.355c0-9.87,8.031-17.901,17.902-17.901h92.339C312.04,48.633,320.071,56.663,320.071,66.533z M407.545,470.269 c-1.842,14.638-14.357,25.675-29.109,25.675H133.564c-14.752,0-27.268-11.038-29.109-25.675L67.147,173.785h377.705 L407.545,470.269z M481.133,143.597c0,7.792-6.34,14.133-14.133,14.133H45.001c-7.793,0-14.133-6.34-14.133-14.133v-43.52 c0-7.793,6.34-14.133,14.133-14.133h421.999c7.793,0,14.133,6.34,14.133,14.133V143.597z"></path> <path d="M256,433.256c13.279,0,24.084-10.803,24.084-24.084V233.033c0-13.28-10.804-24.084-24.084-24.084 c-13.279,0-24.084,10.803-24.084,24.084v176.138C231.916,422.452,242.72,433.256,256,433.256z M247.972,233.033 c0-4.427,3.601-8.028,8.028-8.028c4.427,0,8.028,3.601,8.028,8.028v176.138c0,4.427-3.601,8.028-8.028,8.028 c-4.427,0-8.028-3.601-8.028-8.028V233.033z"></path> <path d="M348.551,433.067c1.001,0.126,2.019,0.191,3.026,0.191c12.102,0,22.366-9.064,23.876-21.082l22.133-176.138 c0.803-6.383-0.929-12.696-4.876-17.777c-3.947-5.081-9.635-8.32-16.016-9.122c-6.385-0.8-12.692,0.929-17.772,4.875 c-5.083,3.948-8.325,9.636-9.127,16.018l-22.133,176.138c-0.803,6.383,0.929,12.696,4.876,17.777 C336.483,429.026,342.171,432.266,348.551,433.067z M343.593,408.172l22.133-176.138c0.268-2.126,1.349-4.023,3.044-5.338 c1.424-1.106,3.136-1.69,4.907-1.69c0.336,0,0.677,0.021,1.016,0.063c2.127,0.268,4.024,1.348,5.338,3.041 c1.315,1.693,1.893,3.798,1.626,5.926l-22.133,176.138c-0.547,4.345-4.575,7.515-8.967,6.964 c-2.127-0.268-4.024-1.348-5.338-3.041C343.902,412.403,343.325,410.299,343.593,408.172z"></path>        
                  </svg>
            </div>
            </div>
