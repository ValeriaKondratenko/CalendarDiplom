<header class="calendar_header_content">

    <a href="{{route('event.index')}}">Календарь ABW.by</a>

    <div class="container_login_like">
        <div class="login_register">
            @if(Route::has('login'))
                @auth
                    @if(auth()->user()->role === \App\Enums\RolesEnum::ADMIN->value)
                        <a href="{{ route('admin.adminPage') }}" class="btn_admin">
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
            <a href="{{route('likes')}}"><img src="{{asset('storage/images/iconHeart.png')}}" alt="Icon 1"></a>

        </div>

    </div>

</header>
