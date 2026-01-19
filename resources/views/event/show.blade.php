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

<div class="container_info_event">
    <div class="containerImageButton">
{{--        <img class="imageEvent" src="{{asset('storage/images/Event1.png')}}" alt="Img1">--}}
        <div class="container_image">
            <img class="imageEvent" src="{{$event->getCover() }}" alt="{{$event->title}}">
        </div>
        <div class="btnWebSaitEvent">
            <span>Веб-сайт</span>
            <img src="{{asset('storage/images/iconArrow.png')}}" alt="Icon1">
        </div>
    </div>

    <div class="container_info">
        <h2>{{$event->title}}</h2>
        <span>{{$event->description}}</span>
        <div class="container_date">
            <h3>Дата:</h3>
            <span>{{$event->dateEvent->locale('ru')->translatedFormat('l d F')}}</span>
        </div>
        <div class="conrainer_info_group">
            <div class="conrainer_info_group1">
                <div class="container_place">
                    <h3>Место:</h3>
                    <span>{{$event->place->name}}</span>
                </div>
                <div class="container_price">
                    <h3>Цена:</h3>
                    <span>{{$event->price}} руб.</span>
                </div>
            </div>

            <div class="conrainer_info_group2">
                <div class="container_start">
                    <h3>Начало:</h3>
                    <span>{{$event->timeEvent}}</span>
                </div>
                <div class="container_end">
                    <h3>Конец:</h3>
                    <span>{{$event->endEvent}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="other_info_event">
    <div class="container_term">
        <h1>Условия участия</h1>
        <span>{{$event->participation}}</span>
    </div>
    <div class="container_place_info">
        <h1>Информация по месту проведения мероприятия</h1>
        <div class="place_info">
            <h2>Мероприятие проводится по адресу - </h2>
            <span>{{$event->place->address}}</span>
        </div>
        <div class="place_info">
            <h2>Контактный номер - </h2>
            <span>{{$event->place->contact_number}}</span>
        </div>
    </div>
    <div class="container_organisation_info">
        <h1>Организаторы</h1>
        <h2>{{$event->organization->name}}</h2>
        <span>{{$event->organization->description}}</span>
        <span>Наши контакты - {{$event->organization->contact}}</span>
        <span>Мы находимся - {{$event->organization->address}}</span>
    </div>
    <div class="container_people">
        <h1>Программа</h1>
        <span>{{$event->program}}</span>
    </div>
    <div class="container_organisation">
        <h1>Другая информация</h1>
        <span>{{$event->other_info}}</span>
    </div>
</div>


@include('layouts.footerCalendar')



</body>
</html>
