<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            @guest
                            <a href="{{ route('login') }}">Вход</a>
                            <a href="{{ route('registration') }}">Зарегистрироваться</a>
                            @endguest
                            @auth
                            @can('view-admin-panel', \App\Http\Controllers\Admin\AdminIndexController::class)
                            <a href="{{ route('adminPanel') }}">Админ панель</a>
                            @endcan
                            <a href="{{ route('logout') }}">Выход</a>
                            @endauth
                        </div>
                        <div class="header__top__hover">
                            <span>{{ session('currency') ? session('currency') : 'RUB' }}<i class="arrow_carrot-down"></i></span>
                            <form action="{{ route('set-currency') }}" method="POST">
                                @csrf
                                <ul>
                                    @foreach(__('currency') as $currency)
                                    <button type="submit" name="currency" value="{{ $currency['currency'] }}" class="btn">{{ $currency['currency'] }}</button>
                                    @endforeach
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li {{ Route::is('home') ? 'class=active' : ''}}><a href="{{ route('home') }}">Home</a></li>
                        <li {{ Route::is('catalog') ? 'class=active' : '' }}><a href="{{ route('catalog') }}">Catalog</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                    @auth
                    <a href="#"><img src="img/icon/heart.png" alt=""></a>
                    <a href="{{ route('cart') }}"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                    <div class="price">{{ $currencyPrice['totalPrice'] }} {{ $currencyPrice['symbol'] }}</div>
                    @endauth
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->