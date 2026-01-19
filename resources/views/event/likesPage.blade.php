<html>
<head>
    <title>

    </title>
    {{--    <link rel="stylesheet" href="css/calendar.css">--}}
    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
])

</head>
<body>

@include('layouts.headerCalendar')


<div class="containerLikesEvents">
    <h1>Избранные мероприятия</h1>
    @foreach($events as $event)
        <div class="mini_containerEventsCards">
            <div class="mini_container_info">
                <div class="mini_containerImage">
                    <img src="{{ $event->getCover() }}" alt="{{ $event->title }}">
                </div>
                <div class="mini_card_info">
                    <h2>{{ $event->title }}</h2>
                    <span>{{ $event->dateEvent->locale('ru')->translatedFormat('l d F') }}</span>
                    <span>{{ $event->timeEvent }} – {{ $event->endEvent }}</span>
                </div>
            </div>
            <div class="container_Button">
                <form class="formDelBtn" method="POST" action="{{ route('favorites.remove', $event->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    {{--                        <div class="" >--}}
                    <button class="btnDelLike">
                        <span>Удалить</span>
                    </button>
                    {{--                        </div>--}}
                </form>
                <a href="{{ route('event.show', $event->id) }}" class="btnMoreDetailedLike">
                    Подробнее
                </a>

            </div>
        </div>
    @endforeach

</div>

@include('layouts.footerCalendar')



<script>
    const events = @json($events);//берет из контроллера php-массив и превращает в JSON
</script>
{{--    <script src="js/calendar.js"></script>--}}

<footer></footer>

</body>
</html>
