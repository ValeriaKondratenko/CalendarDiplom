
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

        <h1>Создание организации</h1>

        <form class="createEventForm" method="POST" action="{{route('admin.organization.store')}}">
            @csrf
            @include('organization.formOrganisation')
            <button type="submit" class="btnSubmit" >Создать</button>
        </form>

    </div>


</div>

</body>
