
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

        <h1>Создание типа</h1>

        <form class="createEventForm" method="POST" action="{{route('admin.typeEvent.store')}}">
            @csrf
            @include('typeEvents.formTypeEvent')
            <button type="submit" class="btnSubmit" >Создать</button>
        </form>

    </div>


</div>

</body>
