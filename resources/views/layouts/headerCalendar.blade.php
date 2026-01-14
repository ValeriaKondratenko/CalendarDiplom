<header class="calendar_header_content">

    <span>Календарь ABW.by</span>

    <div class="container_login_like">
        <div class="login_register">
            @if(Route::has('login'))
                @auth
                    @if(auth()->user()->role === \App\Enums\RolesEnum::ADMIN->value)
                        <a href="{{ route('adminPage') }}" class="btn_admin">
                            Админ-панель
                        </a>
                    @endif

                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="btn_logout">Выйти</button>
                    </form>

                @else
                    <a href="{{route('register')}}" class="btn_register">Регистрация</a>
                    @if(Route::has('register'))
                        <a href="{{route('login')}}" class="btn_login">Авторизация</a>
                    @endif

                @endauth
            @endif
        </div>

        <div class="container_like">
            <img src="{{asset('storage/images/iconHeart.png')}}" alt="Icon 1">
        </div>

    </div>

</header>
