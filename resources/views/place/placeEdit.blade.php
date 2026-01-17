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

        <a href="{{route('admin.places')}}" class="backLink">&lt; Места проведения</a>

        <h1>Редактирование места</h1>

        <form class="createEventForm" method="POST" action="{{route('admin.place.update', $place)}}">
            @csrf
            @method('PATCH')

            @include('place.formPlace')
            <button type="submit" class="btnSubmit" >Обновить</button>
        </form>

    </div>


</div>



</body>





