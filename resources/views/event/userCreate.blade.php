<html>
<head>
    <title>

    </title>
    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
])
</head>
<body>

<div class="containerForAll">
    @include('layouts.adminMenu')

    <div class="containerCreateUser" >

        <a href="{{route('users')}}" class="backLink">&lt; Пользователи</a>

        <h1>Создание пользователя</h1>

        <form class="createEventForm" method="POST" action="{{route('user.store')}}">
            @csrf
            <label>
                Имя пользователя
                <input name="name" type="text">
            </label>
            <label>
                Почта
                <input name="email" type="text">
            </label>
            <label>
                Пароль
                <input name="password" type="password"  >
            </label>
            <label>
                Роль
                <input type="text" name="role" >
            </label>
            <button type="submit" class="btnSubmit" >Создать</button>
        </form>

    </div>


</div>

</body>
