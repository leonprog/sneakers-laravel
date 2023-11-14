@extends("layout.layout")

@section("title", "contact")

@section("content")
        <div class="container" style="padding-bottom: 250px">
                <div class="contact__form mb-3 ">
                    <form action="{{route('login_action')}}" method="POST">
                        @csrf
                        @error('incorrect')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label>Электронная почта</label>
                        <input name="email" placeholder="Введите email">
                        <label>Пароль</label>
                        @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <input name="password" placeholder="Введите пароль" type="password">
                        <button type="submit" class="site-btn">Вход</button>
                    </form>
                </div>
        </div>

@endsection
