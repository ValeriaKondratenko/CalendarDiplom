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

    <div class="containerCreateEvent" >

        <a href="{{route('admin.adminPage')}}" class="backLink">&lt; Мероприятия</a>

        <h1>Редактирование мероприятия</h1>

        <form class="createEventForm" method="POST" enctype="multipart/form-data" action="{{route('admin.event.update', $event)}}">
            @csrf
            @method('PATCH')

            @include('event.form')
            <button type="submit" class="btnSubmit" >Обновить</button>
        </form>

    </div>


</div>



</body>





