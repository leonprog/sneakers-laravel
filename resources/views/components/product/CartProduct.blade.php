<tr>
    <td class="product__cart__item">
        <div class="product__cart__item__pic">
            <img style="width: 100px; height: 100px" src="{{ (isset($product->image_path)) ? $product->image_path : 'img/clients/client-8.png' }}" alt="">
        </div>
        <div class="product__cart__item__text">
            <h6>{{ $product->title }}</h6>
            <h5>{{ $product->convertPrice()['price'] }} {{ $product->convertPrice()['symbol'] }}</h5>
        </div>
    </td>
    <td class="cart__price">{{ $product->convertPrice()['symbol'] }} {{ $product->convertPrice()['price'] * $product->pivot->quantity }}</td>
    <td class="cart__close">
        <form method="POST" action="{{ route('cart.delete', $product->cart->id) }}">
            @csrf
            @method('delete')
            <button class="btn" type="submit"><i class="fa fa-close"></i></button>
        </form>
    </td>
</tr>
