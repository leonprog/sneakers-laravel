@extends("layout.layout")

@section("title", "blog")

@section("content")
    <div class="container mb-3">
        <form action="{{ route('selectedProductDelete_action')}}" method="POST">
            @csrf
            @foreach($products as $product)
                <div class="border p-2 d-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" name="selected_products[]" type="checkbox" value="{{ $product->id }}" id="flexCheckDefault">
                    </div>
                    <div class="content w-75">
                        <div class="title">{{ $product->title }}</div>
                        <div class="content">
                            {{ $product->content }}
                        </div>
                        <div class="price">{{ $product->price }} руб</div>
                    </div>
                    <div class="btns">
                        <button type="submit" class="btn btn-dark ">Изменить</button>
                        <button type="submit" name="product_id" value="{{ $product->id }}" class="btn btn-danger">Удалить</button>
{{--                        <form action="{{ route('productSetting_action', $product->id) }}" method="POST">--}}

{{--                            @csrf--}}
{{--                            <button type="submit" name="action" value="delete" class="btn btn-danger">Удалить</button>--}}
{{--                            <button type="submit" name="action" value="publish" class="btn btn-primary">Опубликовать</button>--}}
{{--                        </form>--}}
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-danger">Удалить Выбранное</button>
        </form>

            @include("components.paginate.index", ['paginate' => $products, 'pageCount' => $pageCount])
    </div>
@endsection
