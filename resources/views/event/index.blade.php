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

@if (session('error'))
    <div class="alert alert-error" id="flash-message">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" id="flash-message">
        {{ session('success') }}
    </div>
@endif


<div class="calendar">
    <div class="calendar_header">
        <button class="btn_header_before" id="prevMonth" > &lt; </button>
        <div class="calendar_month" id="calendar_month"></div>
        <div class="calendar_year" id="calendar_year"></div>
        <button class="btn_header_after" id="nextMonth"> &gt; </button>
    </div>

    <div class="container_filters">
        <div class="icon_calendar">
            <img src="{{asset('storage/images/iconCalendar1.png')}}" alt="IconCalendar">
        </div>

        <div class="container_filter_type">
            <form action="">
                <select name="filter" id="typeFilter">
                    <option value="all" selected>Все типы</option>

                    @foreach($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="container_filter_region">
            <form action="">
                <select name="filterDateType" id="sortSelect">
                    <option value="none" selected>Сортировка</option>
                    <option value="title_asc">От А до Я</option>
                    <option value="title_desc">От Я до А</option>
                </select>
            </form>
        </div>

        <div class="container_form_search">
                <input id="searchInput"  placeholder="Поиск" >
            <div id="searchResults" class="search-results" hidden></div>
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
