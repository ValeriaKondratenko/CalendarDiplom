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

        <a href="{{route('admin.typeEvents')}}" class="backLink">&lt; Типы мероприятий</a>

        <h1>Редактирование типа</h1>

        <form class="createEventForm" method="POST" action="{{route('admin.typeEvent.update', $typeEvent)}}">
            @csrf
            @method('PATCH')

            @include('typeEvents.formTypeEvent')
            <button type="submit" class="btnSubmit" >Обновить</button>
        </form>

    </div>


</div>



</body>





