@extends("layout.layout")

@section("title", "blog")

@section("content")
    <div class="container">
        <div class="contact__form mb-3">
            <form action="{{ route('admin.update', $product->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('post')
                @error('title')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <label>Название продукта</label>
                <input value="{{ $product->title }}" name="title" placeholder="Введите название продукта">

                @error('price')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <label>Цена</label>
                <input value="{{ $product->price }}"  name="price" placeholder="Введите цену">

                @error('content')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <label>Описание</label>
                <textarea value="{{ $product->content }}"  name="content" placeholder="Введите описание">{{ $product->content }}</textarea>
                @error('category_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <label>Выбрать категорию</label>
                <select name="category_id" class="form-select-lg mb-3 w-100" >
                    <option selected>Выбрать категорию</option>
                    @foreach($categories as $category)
                        @if($category->id === $product->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                        @endif
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>

                <select name="brand_id" class="form-select-lg mb-3 w-100" >
                    <option selected>Выбрать Бренд</option>
                    @foreach($brands as $brand)
                        @if($brand->id === $product->brand_id)
                            <option value="{{ $brand->id }}" selected>{{ $brand->title }}</option>
                        @endif
                            <option value="{{ $brand->id }}" selected>{{ $brand->title }}</option>
                    @endforeach
                </select>

                @error('images')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <input name="images[]" class="form-control form-control-lg"  type="file"  multiple>
                <button type="submit" class="site-btn">Добавить</button>
            </form>
        </div>
    </div>
@endsection
