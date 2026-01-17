
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

        <a href="{{route('admin.regions')}}" class="backLink">&lt; Регионы</a>

        <h1>Создание региона</h1>

        <form class="createEventForm" method="POST" action="{{route('admin.region.store')}}">
            @csrf
            @include('region.formRegion')
            <button type="submit" class="btnSubmit" >Создать</button>
        </form>

    </div>


</div>

</body>
