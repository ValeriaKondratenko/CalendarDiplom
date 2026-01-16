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

        <a href="{{route('admin.organizations')}}" class="backLink">&lt; Организации</a>

        <h1>Редактирование организации</h1>

        <form class="createEventForm" method="POST" action="{{route('admin.organization.update', $organization)}}">
            @csrf
            @method('PATCH')

            @include('organization.formOrganisation')
            <button type="submit" class="btnSubmit" >Обновить</button>
        </form>

    </div>


</div>



</body>





