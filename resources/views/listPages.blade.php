@extends('layouts.app')

@section('title', 'Менюшка')

@section('content')
    <a href="{{route('event.index')}}">Список мероприятий</a> <br>
    <a href="{{route('about')}}">Другая страница</a>
@endsection
