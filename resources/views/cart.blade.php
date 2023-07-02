@extends("layout.layout")

@section("title", "Cart")

@section("content")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @each("components.product.cartProduct", $products, 'product')
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <form method="POST" action="{{ route('cart.clear') }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark w-75 p-3">Clear Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Использовать промокод</h6>
                        <form action="#">
                            <input type="text" placeholder="Вести промокод">
                            <button type="submit">Применить</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <ul>
                            <li>Всего <span>{{ $currencyPrice['totalPrice'] }} {{ $currencyPrice['symbol'] }}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Оформить Заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
