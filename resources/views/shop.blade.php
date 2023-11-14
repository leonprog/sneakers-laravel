@extends("layout.layout")

@section("title", "shop")

@section("content")
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Каталог</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Главная</a>
                            <a href="{{ route('catalog') }}">Каталог</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{ route('catalog') }}">
                                <input type="text" value="{{ request('search') }}" placeholder="Поиск..." name="search">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <form method="GET" action="">
                            <div class="shop__sidebar__accordion">
                                <div class="accordion" id="accordionExample">
                                    @foreach($filters as $filter)
                                        <div class="card">
                                            <div class="card-heading">
                                                <a data-toggle="collapse"
                                                   data-target="#collapseOne">{{ $filter->title }}</a>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    {{ $filter->render() }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn-primary w-100">Показать</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Показано 1–12 из {{ $products->total() }} результат</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @each("components.product.product", $products, 'product')
                    </div>
                    {{ $products->links('components.paginate.index') }}
                </div>
            </div>
        </div>
    </section>
@endsection
