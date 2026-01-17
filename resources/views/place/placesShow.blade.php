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

                <div class="table_row">
                    <div>{{$place->name}}</div>
                    <div>{{$place->address}}</div>
                    <div>{{$place->contact_number}}</div>
                    <div>{{$place->region?->name ?? 'Не указан'}}</div>
                    <div class="actions">
                        <form class="formDelBtn" method="POST" action="{{ route('admin.place.destroy', $place->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            {{--                        <div class="" >--}}
                            <button type="submit">Удалить</button>
                            {{--                        </div>--}}
                        </form>
                        {{--                    <a href="" class="btnTrash">--}}
                        {{--                    <img src="{{ asset('storage/images/iconTrash.png') }}" alt="iconTrash">--}}
                        {{--                    </a>--}}
                        <a href="{{route('admin.place.edit', $place->id)}}" class="btnCorrect">
                            <img src="{{asset('storage/images/iconCorrect.png')}}" alt="iconCorrect">
                        </a>
                    </div>
                </div>

            @endforeach

        </div>




    </div>



</div>

</body>
