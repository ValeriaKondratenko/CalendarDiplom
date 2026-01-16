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
        <h1>Организации</h1>
        <div class="containerSearchCreate">
            <a href="{{route('admin.organizationCreate')}}" class="btnCreate">Создать</a>
        </div>


        <div class="events_table">


            <div class="table_header">
                <div>Название</div>
                <div>Описание</div>
                <div>Контакты</div>
                <div>Адрес</div>
                <div></div>
            </div>

            @foreach($organizations as $organization)

            <div class="table_row">
                <div>{{$organization->name}}</div>
                <div class="description">{{$organization->description}}</div>
                <div>{{$organization->contact}}</div>
                <div>{{$organization->address}}</div>
                <div class="actions">
                    <form class="formDelBtn" method="POST" action="{{ route('admin.organization.destroy', $organization->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

{{--                        <div class="" >--}}
                            <button type="submit">Удалить</button>
{{--                        </div>--}}
                    </form>
{{--                    <a href="" class="btnTrash">--}}
{{--                    <img src="{{ asset('storage/images/iconTrash.png') }}" alt="iconTrash">--}}
{{--                    </a>--}}
                    <a href="{{route('admin.organization.edit', $organization->id)}}" class="btnCorrect">
                        <img src="{{asset('storage/images/iconCorrect.png')}}" alt="iconCorrect">
                    </a>
                </div>
            </div>

            @endforeach

        </div>




    </div>



</div>

</body>
