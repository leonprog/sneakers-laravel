@if(!str_contains((isset($product->images[0]['image_path'])), '- копия'))
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="{{ (isset($product->images[0]['image_path'])) ? $product->images[0]['image_path'] : 'img/clients/client-8.png'   }}">
            </div>
            <div class="product__item__text">
                <h6>{{ $product->title }}</h6>
                @auth
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        @method('post')
                        <a class="add-cart">
                            <input hidden name="product_id" value="{{ $product->id }}">
                            <input class="btn btn-outline-danger" type="submit" value="Добавить в корзину">
                        </a>
                    </form>
                @endauth
                <h5>
                    {{ $product->convertPrice()['price'] }} {{ $product->convertPrice()['symbol'] }}
                </h5>
            </div>
        </div>
    </div>

@endif
