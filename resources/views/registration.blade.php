@extends("layout.layout")

@section("title", "contact")

@section("content")
    <div class="container">
        <div class="contact__form mb-3">
            <form action="{{ route('registration_action') }}" method="POST"  >
                @csrf
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <label>Электронная почта</label>
                <input value="{{ old('email') }}" name="email" placeholder="Введите email">
                <label>Имя</label>
                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <input value="{{ old('name') }}" name="name" placeholder="Введите имя">
                <label>Пароль</label>
                @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <input name="password" placeholder="Введите пароль" type="password">
                <label>Подтвердить пароль</label>
                @error('password_confirmation')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <input name="password_confirmation" placeholder="Введите пароль повторно" type="password">
                <button type="submit" class="site-btn">Зарегистрироваться</button>
            </form>
        </div>
    </div>
@endsection
