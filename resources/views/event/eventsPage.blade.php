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
                <input class="searchinput" type="text" placeholder="Поиск">
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

                        @foreach($events as $event)

                            <div class="table_row">
                                <div>Выставка машин</div>
                                <div class="description">Короткое описание...</div>
                                <div>20.03.2026</div>
                                <div>13:00</div>
                                <div>18:00</div>
                                <div>25 руб.</div>
                                <div class="status">Запланировано</div>
                                <div class="actions">
                                    <a href="{{ route('event.destroy', $event->id) }}" class="btnTrash">
                                        <img src="{{ asset('storage/images/iconTrash.png') }}" alt="iconTrash">
                                    </a>
                                    <a href="{{route('event.edit', $event->id )}}" class="btnCorrect">
                                        <img src="{{asset('storage/images/iconCorrect.png')}}" alt="iconCorrect">
                                    </a>
                                </div>
                            </div>

                        @endforeach

                    </div>




    </div>



</div>

</body>
