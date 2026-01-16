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

    <div class="containerUsers">
        <h1>Пользователи</h1>
        <div class="containerSearchCreate">
            <a href="{{route('admin.userCreate')}}" class="btnCreate">Создать</a>
        </div>


            <div class="events_table">


                <div class="table_header">
                    <div>Имя</div>
                    <div>Почта</div>
                    <div>Роль</div>
                    <div></div>
                </div>

                @foreach($users as $user)

                    <div class="table_row">
                        <div>{{$user->name}}</div>
                        <div>{{$user->email}}</div>
                        <div>{{$user->role}}</div>
                        <div class="actions">
                            <form method="POST" action="{{ route('admin.user.destroy', $user->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger delete-user" value="Delete user">
                                </div>
                            </form>
{{--                                <button ="{{ route('admin.user.destroy', $user->id) }}" >--}}
{{--                                    <img src="{{ asset('storage/images/iconTrash.png') }}" alt="Удалить">--}}
{{--                                </button>--}}

                                {{--                        <a href="{{route('event.edit', $event->id )}}" class="btnCorrect">--}}
    {{--                            <img src="{{asset('storage/images/iconCorrect.png')}}" alt="iconCorrect">--}}
    {{--                        </a>--}}
                        </div>
                    </div>
                @endforeach

            </div>




    </div>



</div>

</body>
