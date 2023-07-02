@extends("layout.layout")

@section("title", "blog")

@section("content")
    <div class="container">
        <div class="contact__form mb-3">
            <form action="{{ route('addProduct_action') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('post')
                @error('title')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <label>Название продукта</label>
                <input value="{{ old('title') }}" name="title" placeholder="Введите название продукта">

                @error('price')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <label>Цена</label>
                <input value="{{ old('price') }}"  name="price" placeholder="Введите цену">

                @error('content')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <label>Описание</label>
                <textarea value="{{ old('content') }}"  name="content" placeholder="Введите описание">{{ old('content') }}</textarea>

                @error('category_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <label>Выбрать категорию</label>
                <select name="category_id" class="form-select-lg mb-3 w-100" >
                    <option selected>Выбрать категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
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
