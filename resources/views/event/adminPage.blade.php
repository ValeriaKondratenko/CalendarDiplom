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
{{--<a href="{{route('index')}}" class="btn_back"> < Вернуться на главную</a>--}}
{{--<div class="line_gray"></div>--}}
{{--<h1>Список мероприятий</h1>--}}
{{--@foreach($events as $event)--}}
{{--    {{dump($event)}}--}}
{{--    <a href="{{route('event.show', ['id' => $event->id])}}" class="nameEvent_container">{{$event->title}}</a> <br>--}}

{{--    <div class="btn_container">--}}
{{--        <a href="{{route('event.edit', ['id' => $event->id])}}" class="editEvent_container">Изменить</a><br>--}}
{{--        <form method="POST" action="{{route('event.destroy', $event)}}">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button type="submit" onclick="return confirm('Удалить мероприятие?')" class="deleteEvent_container">Удалить</button>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--@endforeach--}}

{{--<div class="line_gray"></div>--}}

{{--<h1>Создать новое мероприятие</h1>--}}
{{--<a href="{{route('event.create')}}" class="createEvent_container">Создать</a>--}}

    <div class="containerForAll">
        @include('layouts.adminMenu')

        <div class="containerWelcome">
            <h1>Добро пожаловать!</h1>
        </div>
    </div>
















</body>
