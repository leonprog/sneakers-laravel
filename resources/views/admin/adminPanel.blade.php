@extends("layout.layout")

@section("title", "blog")

@section("content")
    <div class="container mb-3">
        <a class="btn btn-dark w-100 mb-3" href="{{ route('addProduct') }}">Добавить продукты</a>
        <a class="btn btn-dark w-100 mb-3" href="{{ route('adminProducts') }}">Все продукты</a>
    </div>
@endsection
