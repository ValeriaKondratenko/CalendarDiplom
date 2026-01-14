@extends('layouts.formAdminLayouts')
@section('title', 'Форма редактирования мероприятия')
@section('content')


    <form class="formPanel" method="POST" action="{{route('event.update', $event)}}">
        @csrf
        @method('PATCH')

        <h2>Редактирование мероприятия</h2>

        @include('event.form')
        <button type="submit" class="btnSubmit" >Обновить</button>
    </form>

@endsection
