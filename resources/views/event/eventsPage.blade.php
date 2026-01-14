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

    <div class="containerEvents">
        <h1>Мероприятия</h1>
        <div class="containerSearchCreate">
            <div class="containerSearch">
                <span>Поиск</span>
{{--                <input placeholder="Поиск">--}}
            </div>
            <a href="{{route('event.create')}}" class="btnCreate">Создать</a>
        </div>

        <div class="events_table">


            <div class="table_header">
                <div>Название</div>
                <div>Описание</div>
                <div>Дата</div>
                <div>Начало</div>
                <div>Конец</div>
                <div>Цена</div>
                <div>Статус</div>
                <div></div>
            </div>


            <div class="table_row">
                <div>Выставка машин</div>
                <div class="description">Короткое описание...</div>
                <div>20.03.2026</div>
                <div>13:00</div>
                <div>18:00</div>
                <div>25 руб.</div>
                <div class="status">Запланировано</div>
                <div class="actions">
                    <div class="btnTrash">
                        <img src="{{asset('storage/images/iconTrash.png')}}" alt="iconTrash">
                    </div>
                    <div class="btnCorrect">
                        <img src="{{asset('storage/images/iconCorrect.png')}}" alt="iconCorrect">
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

</body>
