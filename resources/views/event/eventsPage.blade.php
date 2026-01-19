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
{{--            <div class="containerSearch">--}}
{{--                <input class="searchinput" type="text" placeholder="Поиск">--}}
{{--            </div>--}}
            <div class="container_filter_type_admin">
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

            <div class="container_filter_region_admin">
                <form action="">
                    <select name="filterDateType" id="sortSelect">
                        <option value="none" selected>Сортировка</option>
                        <option value="title_asc">От А до Я</option>
                        <option value="title_desc">От Я до А</option>
                    </select>
                </form>
            </div>
            <a href="{{route('admin.event.create')}}" class="btnCreate">Создать</a>
        </div>


                    <div class="events_table">


                        <div class="table_header">
                            <div>Название</div>
                            <div>Описание</div>
                            <div>Дата</div>
                            <div>Начало</div>
                            <div>Конец</div>
                            <div>Цена</div>
                            <div>Участие</div>
                            <div>Программа</div>
                            <div>Другая информация</div>
                            <div>Статус</div>
                            <div></div>
                        </div>

                        @foreach($events as $event)

                            <div class="table_row" data-title="{{ strtolower($event->title) }}"
                                 data-type="{{ $event->id_event_type }}"
                                 data-date="{{ $event->dateEvent }}">

                                <div>{{$event->title}}</div>
                                <div class="description">{{ \Illuminate\Support\Str::limit($event->description, 10, '...') }}</div>
                                <div>{{$event->dateEvent}}</div>
                                <div>{{$event->timeEvent}}</div>
                                <div>{{$event->endEvent}}</div>
                                <div>{{$event->price}} руб.</div>
                                <div>{{ \Illuminate\Support\Str::limit($event->participation, 10, '...') }}</div>
                                <div>{{ \Illuminate\Support\Str::limit($event->program, 10, '...') }}</div>
                                <div>{{ \Illuminate\Support\Str::limit($event->other_info, 10, '...') }}</div>
                                <div class="status">{{$event->status}}</div>
                                <div class="actions">
                                    <form class="formDelBtn" method="POST" action="{{ route('admin.event.destroy', $event->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        {{--                        <div class="" >--}}
                                        <button class="btnTrash" type="submit">Удалить</button>
                                        {{--                        </div>--}}
                                    </form>
                                    <a href="{{route('admin.event.edit', $event->id )}}" class="btnCorrect">
{{--                                        <img src="{{asset('storage/images/iconCorrect.png')}}" alt="iconCorrect">--}}
                                        <span>Изменить</span>
                                    </a>
                                </div>
                            </div>

                        @endforeach

                    </div>




    </div>



</div>

</body>
