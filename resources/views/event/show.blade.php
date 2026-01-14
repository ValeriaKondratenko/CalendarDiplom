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
        <img class="imageEvent" src="{{asset('storage/images/Event1.png')}}" alt="Img1">
        <div class="btnWebSaitEvent">
            <span>Веб-сайт</span>
            <img src="{{asset('storage/images/iconArrow.png')}}" alt="Icon1">
        </div>
    </div>

    <div class="container_info">
        <h2>Фестиваль ретро-автомобилей</h2>
        <span>Фестиваль ретро-авто — это яркое событие для всех ценителей классических автомобилей. Гостей ждёт выставка легендарных моделей прошлых десятилетий, живая атмосфера, общение с владельцами уникальных машин и погружение в историю автомобильной культуры.</span>
        <div class="container_date">
            <h3>Дата:</h3>
            <span>Понедельник 12 января - Четверг 15 января  </span>
        </div>
        <div class="conrainer_info_group">
            <div class="conrainer_info_group1">
                <div class="container_place">
                    <h3>Место:</h3>
                    <span>г. Минск  </span>
                </div>
                <div class="container_price">
                    <h3>Цена:</h3>
                    <span>50 руб.</span>
                </div>
            </div>

            <div class="conrainer_info_group2">
                <div class="container_start">
                    <h3>Начало:</h3>
                    <span>8:00</span>
                </div>
                <div class="container_end">
                    <h3>Конец:</h3>
                    <span>16:00</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="other_info_event">
    <div class="container_term">
        <h1>Условия участия</h1>
        <span>Фестиваль ретро-авто — это яркое событие для всех ценителей классических автомобилей. Гостей ждёт выставка легендарных моделей прошлых десятилетий, живая атмосфера, общение с владельцами уникальных машин и погружение в историю автомобильной культуры.</span>
    </div>
    <div class="container_people">
        <h1>Что ждет участников</h1>
        <span>Фестиваль ретро-авто — это яркое событие для всех ценителей классических автомобилей. Гостей ждёт выставка легендарных моделей прошлых десятилетий, живая атмосфера, общение с владельцами уникальных машин и погружение в историю автомобильной культуры.</span>
    </div>
    <div class="container_organisation">
        <h1>Организаторы</h1>
        <span>Фестиваль ретро-авто — это яркое событие для всех ценителей классических автомобилей. Гостей ждёт выставка легендарных моделей прошлых десятилетий, живая атмосфера, общение с владельцами уникальных машин и погружение в историю автомобильной культуры.</span>
    </div>
</div>


@include('layouts.footerCalendar')



</body>
</html>
