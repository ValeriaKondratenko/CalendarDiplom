
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

        <h1>Создание места</h1>

        <form class="createEventForm" method="POST" action="{{route('admin.place.store')}}">
            @csrf
            @include('place.formPlace')
            <button type="submit" class="btnSubmit" >Создать</button>
        </form>

    </div>


</div>

</body>
