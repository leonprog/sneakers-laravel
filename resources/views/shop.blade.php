@extends("layout.layout")

@section("title", "shop")

@section("content")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <form method="GET" action="">
                            <div class="shop__sidebar__accordion">
                                <div class="accordion" id="accordionExample">
                                @foreach($filters as $filter)
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseOne">{{ $filter->title }}</a>
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
                                    <p>Showing 1–12 of {{ $products->total() }} results</p>
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
    <!-- Shop Section End -->
@endsection
