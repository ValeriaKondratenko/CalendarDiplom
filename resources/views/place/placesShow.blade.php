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
        <h1>Места проведения</h1>

            <div class="containerSearchCreate">
                <a href="{{route('admin.placeCreate')}}" class="btnCreate">Создать</a>
                <div class="container_filter_region_admin">
                    <form action="">
                        <select name="filterDateType" id="sortSelect">
                            <option value="none" selected>Сортировка</option>
                            <option value="title_asc">От А до Я</option>
                            <option value="title_desc">От Я до А</option>
                        </select>
                    </form>
                </div>
            </div>




        <div class="events_table">


            <div class="table_header">
                <div>Название</div>
                <div>Адрес</div>
                <div>Контакты</div>
                <div>Регион</div>
                <div></div>
            </div>

            @foreach($places as $place)

                <div class="table_row" data-title="{{ strtolower($place->name) }}">
                    <div>{{$place->name}}</div>
                    <div>{{$place->address}}</div>
                    <div>{{$place->contact_number}}</div>
                    <div>{{$place->region?->name ?? 'Не указан'}}</div>
                    <div class="actions">
                        <form class="formDelBtn" method="POST" action="{{ route('admin.place.destroy', $place->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            {{--                        <div class="" >--}}
                            <button class="btnTrash" type="submit">Удалить</button>
                            {{--                        </div>--}}
                        </form>
                        {{--                    <a href="" class="btnTrash">--}}
                        {{--                    <img src="{{ asset('storage/images/iconTrash.png') }}" alt="iconTrash">--}}
                        {{--                    </a>--}}
                        <a href="{{route('admin.place.edit', $place->id)}}" class="btnCorrect">
                            <span>Изменить</span>
                        </a>
                    </div>
                </div>

            @endforeach

        </div>




    </div>



</div>

</body>
