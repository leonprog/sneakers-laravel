@extends("layout.layout")

@section("title", "contact")

@section("content")
        <div class="container" style="padding-bottom: 250px">
                <div class="contact__form mb-3 ">
                    <form action="{{route('order.store')}}" method="POST">
                        @csrf
                        @error('city')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label>Город</label>
                        <input name="city" placeholder="Город">

                        @error('address')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label>Адресс</label>
                        <input name="address" placeholder="Адресс">

                        @error('index')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label>Индекс</label>
                        <input name="index" placeholder="Индекс">

                        @error('phone')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label>Телефон</label>
                        <input name="phone" placeholder="Телефон">



                        <button type="submit" class="site-btn">Оформить</button>
                    </form>
                </div>
{{--                <a href="{{ route('login.social', 'yandex') }}" class="btn btn-primary">Login with Yandex</a>--}}
{{--                <a href="{{ route('login.social', 'google') }}" class="btn btn-danger">Login with Google</a>--}}
        </div>

@endsection
