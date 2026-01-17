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

<div class="calendar">
    <div class="calendar_header">
        <button class="btn_header_before" > < </button>
        <div class="calendar_month" id="calendar_month"></div>
        <div class="calendar_year" id="calendar_year"></div>
        <button class="btn_header_after"> > </button>
    </div>

    <div class="container_filters">
        <div class="icon_calendar">
            <img src="{{asset('storage/images/iconCalendar1.png')}}" alt="IconCalendar">
        </div>

        <div class="container_filter_type">
            <form action="">
                <select name="filter" id="">
                    <option value="" disabled selected hidden>Фильтры</option>
                    <option value="">Конкурс</option>
                    <option value="">Выставка</option>
                </select>
            </form>
        </div>

        <div class="container_filter_region">
            <form action="">
                <select name="filterDateType" id="">
                    <option value="" disabled selected hidden>Выбрать</option>
                    <option value="">По дате</option>
                    <option value="">По типу</option>
                </select>
            </form>
        </div>

        <div class="container_form_search">
            <form action="" class="">
                <input placeholder="Поиск" >
            </form>
        </div>
    </div>

    @include('layouts.cards')

</div>

@include('layouts.footerCalendar')



    <script>
        const events = @json($events);//берет из контроллера php-массив и превращает в JSON
    </script>
{{--    <script src="js/calendar.js"></script>--}}

<footer></footer>

</body>
</html>
