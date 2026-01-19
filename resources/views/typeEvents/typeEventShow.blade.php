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
        <h1>Типы мероприятий</h1>

        <div class="containerSearchCreate">
            <a href="{{route('admin.typeEventCreate')}}" class="btnCreate">Создать</a>
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
                <div></div>
            </div>

            @foreach($typeEvents as $typeEvent)

                <div class="table_row" data-title="{{ strtolower($typeEvent->name) }}">>
                    <div>{{$typeEvent->name}}</div>
                    <div class="actions">
                        <form class="formDelBtn" method="POST" action="{{ route('admin.typeEvent.destroy', $typeEvent->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            {{--                        <div class="" >--}}
                            <button class="btnTrash" type="submit">Удалить</button>
                            {{--                        </div>--}}
                        </form>
                        {{--                    <a href="" class="btnTrash">--}}
                        {{--                    <img src="{{ asset('storage/images/iconTrash.png') }}" alt="iconTrash">--}}
                        {{--                    </a>--}}
                        <a href="{{route('admin.typeEvent.edit', $typeEvent->id)}}" class="btnCorrect">
                            <span>Изменить</span>
                        </a>
                    </div>
                </div>

            @endforeach

        </div>




    </div>



</div>

</body>
