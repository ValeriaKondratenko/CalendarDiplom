
<div class="containerMenuHeader">
{{--    <header class="headContent">--}}

{{--    </header>--}}

    <div class="menuAdmin">
        <div class="containerOne">
            <div class="headerMenu">
                <h2>Admin Panel</h2>
                <span>user@gmail.com </span>
            </div>

            <div class="line"></div>

            <div class="menulist">
                <h3>Меню</h3>
                <div class="podmenu">
                    <div class="containerPage">
                        <img src="{{asset('storage/images/iconEvents.png')}}" alt="iconEvent">
                        <a href="{{route('admin.eventsPage')}}">Мероприятия</a>
                    </div>
                    <div class="containerPage">
                        <img src="{{asset('storage/images/iconGraphic.png')}}" alt="iconGraphic">
                        <a href="">Графики</a>
                    </div>
                    <div class="containerPage">
                        <img src="{{asset('storage/images/iconUsers.png')}}" alt="iconUsers">
                        <a href="{{route('admin.users')}}">Пользователи</a>
                    </div>
                    <div class="containerPage">
                        <img src="{{asset('storage/images/iconOrganisation.png')}}" alt="iconOrganisation">
                        <a href="{{route('admin.organizations')}}">Организации</a>
                    </div>
                    <div class="containerPage">
                        <img class="imgBig" src="{{asset('storage/images/iconPlaces.png')}}" alt="iconPlaces">
                        <a href="">Места проведения</a>
                    </div>
                    <div class="containerPage">
                        <img class="imgBig" src="{{asset('storage/images/iconCalendars.png')}}" alt="iconCalendars">
                        <a href="">Типы мероприятий</a>
                    </div>
                </div>


            </div>
        </div>

        <div class="containerTwo">
            <div class="line"></div>
            <div class="btn_logoutadmin">
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <span>Выход</span>
                    <img class="imgBig2" src="{{asset('storage/images/iconLogout.png')}}" alt="iconLogout.png">
                </form>

            </div>
        </div>


    </div>
</div>





