
{{--@extends('layouts.formAdminLayouts')--}}
{{--@section('title', 'Форма создания мероприятия')--}}
{{--@section('content')--}}


{{--    <form class="formPanel" method="POST" action="{{route('event.store')}}">--}}
{{--        @csrf--}}
{{--        <h2>Создание мероприятия</h2>--}}
{{--        @include('event.form')--}}
{{--        <button type="submit" class="btnSubmit">Создать</button>--}}
{{--    </form>--}}

{{--@endsection--}}
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

    <div class="containerCreateEvent">

        <a href="{{route('adminPage')}}" class="backLink">&lt; Мероприятия</a>

        <h1>Создание мероприятия</h1>

        <form class="createEventForm">

            <label>
                Название мероприятия
                <input type="text"  >
            </label>

            <label>
                Изображение мероприятия
                <button type="button" class="btnSelectImage">Выбрать</button>
            </label>

            <label>
                Описание
                <textarea></textarea>
            </label>

            <label>
                Дата
                <input type="text" placeholder="dd.mm.yyyy">
            </label>

            <div class="timeRow">
                <label>
                    Начало мероприятия
                    <input type="text" placeholder="--:--">
                </label>

                <label>
                    Конец мероприятия
                    <input type="text" placeholder="--:--">
                </label>
            </div>

            <label>
                Статус
                <input type="text">
            </label>

        </form>

    </div>


</div>

</body>
