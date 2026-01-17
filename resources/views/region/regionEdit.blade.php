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

        <a href="{{route('admin.places')}}" class="backLink">&lt; Регионы</a>

        <h1>Редактирование региона</h1>

        <form class="createEventForm" method="POST" action="{{route('admin.region.update', $region)}}">
            @csrf
            @method('PATCH')

            @include('region.formRegion')
            <button type="submit" class="btnSubmit" >Обновить</button>
        </form>

    </div>


</div>



</body>





